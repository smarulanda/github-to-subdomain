#!/bin/bash

cd /var/www/html
git clone git@github.com:user/repo.git $1 	# your repo here
cd $1

git fetch origin
git checkout -b $1 origin/$1

sed 's/{SITE}/$1/g' vhost.template > /etc/apache2/sites-available/$1.conf

a2ensite $1.conf

apachectl restart