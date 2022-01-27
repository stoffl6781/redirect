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

    $date = new DateTime();
    $date = $date->format("y.m.d h:i:s");
    if (!file_exists('log.txt')) {
        touch('log.txt');
    } else {
        file_put_contents('log.txt', PHP_EOL . $date .': '. htmlentities($_GET['id']), FILE_APPEND);
    }
}