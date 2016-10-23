# eBidix
Penny auction script

## Install
* Clone files to your web server directory
* Open the url yourdomain.com/install in your favorite browser and follow instructions

## Set good rights to data & upload dir
```
sudo chmod -R 777 data/
sudo chmod -R 777 assets/
```

## Set cron jobs
crontab -e
```
* * * * * curl -s -o /dev/null http://site.com/daemons.php?type=close 
* * * * * curl -s -o /dev/null http://site.com/daemons.php?type=autobid
```
