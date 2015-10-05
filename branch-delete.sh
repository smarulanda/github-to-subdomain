#!/bin/bash

rm -rf /var/www/html/$1
rm /etc/apache2/sites-available/$1.conf

apachectl restart