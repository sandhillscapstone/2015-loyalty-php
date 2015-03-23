#!/bin/bash
apt-get update

apt-get install -y mysql-client

echo mysql-server mysql-server/root_password select vagrant | debconf-set-selections
echo mysql-server mysql-server/root_password_again select vagrant | debconf-set-selections

apt-get install -y apache2 mysql-server libapache2-mod-php5 php5-mysql

cp /vagrant/provision/http-loyalty.conf /etc/apache2/sites-available/
a2enmod rewrite
a2dissite 000-default
a2ensite http-loyalty
/etc/init.d/apache2 restart

[ -f /usr/local/bin/composer ] || (curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer)
cp /vagrant/provision/composer_install /usr/local/bin/
su -l -c 'composer_install' vagrant
