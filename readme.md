![GitHub](https://img.shields.io/github/license/stoffl6781/redirect)
![GitHub release (latest by date including pre-releases)](https://img.shields.io/github/downloads-pre/stoffl6781/redirect/V1.0.0/total)
![GitHub release (latest SemVer)](https://img.shields.io/github/v/release/stoffl6781/redirect)
# URL redirection with PHP and a CSV file

## Intro
With this PHP script, URLs can be easily redirected using predefined paths. Intended use e.g. Book printing, etc. So that links that change are always kept up to date.

The URLs that need to be linked are specified in the url.csv. The first entry is the listening URL and the second entry is the URL to be referred. 

Take care if you use with another Framework. 

> Be careful when using this script with another framework.
The htaccess file must be adjusted. eg. wordpress etc
The script is not intended to work in parallel with another framework.

## Installation
Download the current release, unpack the ZIP file and upload the files to your web space.
To configure the URLS and paths, modify the url.csv file

## index.php

In the index.php the entries are checked and compared with the url.csv to see if it exists.
If there is no entry, you could be redirected to a domain here.
Furthermore, a log file is written that saves all entries. The Roation per default is 15 days.

## url.csv

The file consists of two fields.
The first field is the ID that the script should listen to.
The second field is the destination address

Note that the fields must begin with a comma ',' and the data with a double quote. `"listening string" , "destination address"`

> Example: `"mysuerlink","https://example.com"`

## How it works?

The CSV file url.csv must be filled.
Make sure that the htaccess file is also copied to your web server.
After that, open your domain and add the URL you want to hear
Example: `www.mydomain.com/myurl`

If `"mpath","https://www.example.com"` is now stored in the CSV file, the visitor will be redirected to www.example.com.

## License

Free software. Do whatever the hell you want with it.  
Redirect is released under the [MIT license](LICENSE).