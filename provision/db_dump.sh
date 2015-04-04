#!/bin/bash
mysqldump --compact --skip-extended-insert --add-drop-table loyaltydb > /vagrant/provision/database.sql
