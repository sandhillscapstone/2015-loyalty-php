#!/bin/bash
cp /vagrant/provision/my.cnf /root/.my.cnf
cp /vagrant/provision/my.cnf /home/vagrant/.my.cnf

mysql -e 'drop database loyaltydb;'
mysql -e 'create database loyaltydb;'

/vagrant/provision/db_reload.sh
