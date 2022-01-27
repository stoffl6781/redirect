# Redirect PHP and CSV based

With this PHP code URLS can easily be redirected. This applies to book printing when sources change.

The URLs that need to be linked are specified in the url.csv. The first entry is the listening URL and the second entry is the URL to be referred. 

## index.php

in the index.php the entries are checked and compared with the url.csv to see if it exists.
if there is no entry, you could be redirected to a domain here.
Furthermore, a log file is written that saves all entries.

## url.csv

the file consists of two fields.
the first field is the ID that the script should listen to.
The second field is the destination address

note that the fields must begin with a comma ',' and the data with a double quote. `"listening string" , "destination address"`

Example: `"mysuerlink","https://example.com"`

## How it works?

The CSV file url.csv must be filled.
Make sure that the htaccess file is also copied to your web server.
After that, open your domain and add the URL you want to hear
Example: `www.mydomain.com/myurl`

if `"myurl","https://www.example.com"` is now stored in the CSV file, the visitor will be redirected to www.example.com.

## License

Free software. Do whatever the hell you want with it.  
Redirect is released under the [MIT license](LICENSE).