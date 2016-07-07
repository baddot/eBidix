# eBidix
Penny auction script

## Install
Clone files to your web server directory, create database ebidix & import bdd.sql
```
mysql -u user -p ebidix < bdd.sql
```

## Set good rights to data & upload dir
```
sudo chmod -R 777 data/
sudo chmod -R 777 assets/
```

## Set cron jobs
crontab -e
```
* * * * * curl -s -o /dev/null http://site.com/daemons/close 
* * * * * curl -s -o /dev/null http://site.com/daemons/autobids
```
