# Install

## Server setup

```
sudo apt update
sudo apt dist-upgrade

sudo apt install apache2
sudo apt install php-fpm

a2enmod proxy proxy_fcgi
a2enconf php7.2-fpm

systemctl restart apache2

reboot
```
