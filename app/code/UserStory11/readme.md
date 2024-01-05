# Akeneo Local Setup
* Akeneo pim is a whole project in itself and not a magento module, hence an instance of akeneo pim is to be created in local machine. Ensure that there in the project folder of akeneo pim exists a .env file, consisting of db_configuration and project-domain name.

* create a db with name specified in env file DB_NAME in local machine 
```sudo mysql -u kartik -p hbwsl@kartik;```
```CREATE DATABASE akeneo_pim;```
```Exit;```

* after that create your server in /etc/hosts 127.0..0.1  test.akeneo.com && sites-available/akeneo.conf and sites-enabled/akeneo.conf 
sudo nginx -t
sudo systemctl restart nginx

* now in the url type test.akeneo.com, and akeneo dashboard should be opened