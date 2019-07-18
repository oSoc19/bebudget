# Install

## Server setup

```
sudo apt update
sudo apt dist-upgrade

sudo apt install apache2
sudo apt install php-fpm
sudo apt install mysql-server

sudo a2enmod proxy proxy_fcgi
sudo a2enconf php7.2-fpm php7.2-mysql php7.2-xml php7.2-zip

sudo systemctl restart apache2

sudo reboot
```

### MySQL

1. Create `bebudget` user
2. Create `budgetdata` database
3. Give access to `bebudget` user on `budgetdata` database

### Install composer

See <https://getcomposer.org/>

## Application

```
cd /var/www
git clone https://github.com/oSoc19/bebudget.git

cd /var/www/bebudget
composer install
```
