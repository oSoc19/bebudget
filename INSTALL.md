# Install

## Server setup

```
sudo apt update
sudo apt dist-upgrade

sudo apt install apache2
sudo apt install php-fpm

a2enmod proxy proxy_fcgi
a2enconf php7.2-fpm php7.2-mysql php7.2-xml php7.2-zip

systemctl restart apache2

reboot
```

### Install composer

See <https://getcomposer.org/>

## Application

```
cd /var/www
git clone https://github.com/oSoc19/bebudget.git

cd /var/www/bebudget
php composer.phar install
```
