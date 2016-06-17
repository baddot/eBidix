# eBidix script
Penny auction script

## Set cron jobs
crontab -e
```
* * * * * curl -s -o /dev/null http://site.com/daemons/close 
* * * * * curl -s -o /dev/null http://site.com/daemons/autobids
```

## Set good rights to data & upload dir
```
sudo chmod -R 777 data/
sudo chmod -R 777 assets/
```
