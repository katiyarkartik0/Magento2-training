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

# Installing the connector on Akeneo PIM

* go to https://help.akeneo.com/adobe-commerce-connector-setting-up/adobe-commerce-connector-installation and do se:up and se:di:co and c:f, the changes will reflect in magenot dashboard, stores>configuration>catalog>akeneoconnector  

# Connecting Akeneo connctor using API secret keys, password, username, domainname, etc

* do not forget to add base configuration in stores>configuration>catalog>akeneoconnector>AKENEO_API_CONFIGURATION>website_mapping before importing fammilies/products/catalogs from akeneo dashboard.

* command to import akeneo families into magento 2 -> ```php bin/magento akeneo_connector:import --code=family```