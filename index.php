<?php 
if (isset($_GET['id'])) 
{

    $file = new SplFileObject('url.csv');
    if (($handle = fopen("url.csv", "r")) !== FALSE) 
    {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
        {
            if ($data[0] == htmlentities($_GET['id'])) {
                $log = true;
                Redirect($data['1'], false);
            }else {
                $log = false;
            }
        }
        fclose($handle);
    }

    if ($log !== true) 
    {
        WriteToLog();
    }
    
}

function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}

function WriteToLog() 
{
    $logfilestokeep = 1;
    $logfile = 'log.txt';

    LogRotation($logfilestokeep, $logfile);

    $date = new DateTime();
    $date = $date->format("y-m-d h:i:s");
    if (!file_exists($logfile)) {
        touch($logfile);
    }

    file_put_contents($logfile, PHP_EOL . $date .': '. htmlentities($_GET['id']), FILE_APPEND);
}

function LogRotation($logfilestokeep, $logfile) 
{
    if (file_exists($logfile)) {
        if (date ("Y-m-d", filemtime($logfile)) !== date('Y-m-d')) {
            if (file_exists($logfile . "." . $logfile)) {
                unlink($logfile . "." . $logfile);
            }
            for ($i = $logfilestokeep; $i > 0; $i--) {
                if (file_exists($logfile . "." . $i)) {
                    $next = $i+1;
                    rename($logfile . "." . $i, $logfile . "." . $next);
                }
            }
            rename($logfile, $logfile . ".1");
        }
    }
}