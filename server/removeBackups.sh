#!/bin/bash

# Remove oldest files if there are more than 10
cd /home/user/backups/ && ls -t | sed -e '1,10d' | xargs -d '\n' rm