#!/bin/bash
rsync -avz -e "ssh" --progress  --exclude=".git" --exclude=".DS_Store"  /Users/myakubmizan/CODE/www_root/twilio-location-bot/ root@104.239.228.29:/var/www/html/locationbot.mymizan.rocks/
