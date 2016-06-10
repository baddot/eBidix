# eBidix script
Penny auction script

## Set cron jobs
crontab -e
```
* * * * * curl -s -o /dev/null http://site.com/daemons/close 
* * * * * curl -s -o /dev/null http://site.com/daemons/autobids
```
