#!/bin/bash
rsync -avz -e "ssh" --progress --exclude="_machine_config.php" --exclude="deploy.sh"  --exclude=".git" --exclude=".DS_Store"  /Users/myakubmizan/CODE/www_root/twilio-location-bot/ root@104.239.228.29:/var/www/html/locationbot.mymizan.rocks/
