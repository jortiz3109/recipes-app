#!/bin/bash

mysql -u root -p$MYSQL_ROOT_PASSWORD --execute \
"CREATE DATABASE IF NOT EXISTS ${MYSQL_DATABASE}_test COLLATE 'utf8_general_ci';
GRANT ALL PRIVILEGES ON ${MYSQL_DATABASE}_test.* TO '$MYSQL_USER'@'%';
DELETE FROM mysql.user WHERE User='root' AND Host NOT IN ('localhost', '127.0.0.1', '::1');"
