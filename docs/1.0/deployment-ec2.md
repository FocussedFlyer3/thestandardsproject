# Deployment to AWS EC2


---


- [Overview](/{{route}}/{{version}}/deployment-ec2#section-1)
- [EC2 environment](/{{route}}/{{version}}/deployment-ec2#section-2)
- [Clone source code into EC2](/{{route}}/{{version}}/deployment-ec2#section-3)
- [Set .env variables](/{{route}}/{{version}}/deployment-ec2#section-4)
- [Configure Nginx](/{{route}}/{{version}}/deployment-ec2#section-5)

<a id="section-1"></a>
## Overview
To deploy on AWS, we must have these resources ready to use:
- [RDS](https://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/CHAP_Tutorials.WebServerDB.CreateDBInstance.html)
- [EC2 Instance](https://docs.aws.amazon.com/efs/latest/ug/gs-step-one-create-ec2-resources.html)

<a id="section-2"></a>
## EC2 environment
- Ubuntu 18.04
- Nginx 1.16
- PHP 7.3
- PHP 7.3-FPM
- PHP 7.3-XML
- MySQL PDO drivers
- Composer
- Npm

<br/>

Update packages to latest version
```bash
sudo apt-get update
```

<br/>

To download Nginx
```bash
nginx=stable                         // to get stable version
add-apt-repository ppa:nginx/$nginx
apt-get update  
```

Install Nginx
```bash
apt-get install nginx
```

> {info} check Nginx version with `nginx -v` command

<br/>

To download PHP 7.3 and PHP 7.3-FPM
```bash
apt-get install software-properties-common      // get necessary packages
add-apt-repository ppa:ondrej/php               // add repo
sudo apt update
```

Install PHP 7.3, PHP 7.3-FPM and PHP 7.3-XML
```bash
sudo apt install php7.3 php7.3-FPM php7.3-xml
```

> {info} check PHP version with `php -v` command  

<br/>  

To download MySQL PDO drivers
```bash
sudo apt-get install php-mysql  
```

<br/>  
  
To download Composer
```bash
curl -sS https://getcomposer.org/installer | php
```
Move composer to make it executable
```bash
mv composer.phar /usr/local/bin/composer
```

<br/>

To download Npm
```bash
sudo apt-get install nodejs
```

<br/>

<a id="section-3"></a>
## Clone source code into EC2
cd into the main directory to place our source code
```bash
cd /var/www
```
Clone repo from [github](https://github.com/FocussedFlyer3/thestandardsproject)
```bash
git clone https://github.com/FocussedFlyer3/thestandardsproject.git
```
Set ownership and proper permission of the directory
```bash
chown -R www-data:www-data thestandardsproject/
chmod -R 775 thestandardsproject/
```

> {warning} Ensure AWS has correct permissions on every files in that newly created folder.

<br/>

<a id="section-4"></a>
## Set .env variables
cd into src/ folder and copy the .env file
```bash
cd /var/www/thestandardsproject/src/
cp .env.example .env
```

Edit the .env file using `nano .env` with the necessary variable, looks something like:
```bash
APP_NAME=LearningManagementSystem
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=<set domain url>

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=<insert RDS connection here>
DB_PORT=3306 <replace RDS connection port here>
DB_DATABASE=<insert RDS DB name here>
DB_USERNAME=<RDS username>
DB_PASSWORD=<RDS password>

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

> {info} run `php artisan key:generate` to generate APP_KEY for system.

<br/>

<a id="section-5"></a>
## Configure Nginx
cd into sites-available folder on Nginx
```bash
cd /etc/nginx/sites/available
```
Edit the default config folder
```bash
nano default
```
Ensure config is as below:
```bash
#location / {
    try_files $uri $uri/ /index.php;
#}

location ~ \.php$ {
    #try_files $uri /index.php =404;
    try_files $uri =404;
    fastcgi_split_path_info ^(.+\.php)(/.+)$;
    fastcgi_pass unix:/var/run/php/php7.3-fpm.sock;
    fastcgi_index index.php;
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    include fastcgi_params;
}
```

Run below command to ensure nginx configure is safe to run:
```bash
nginx -t
```
If above command pass, restart nginx with:
```bash
service nginx restart
```

> {info} Visit [here](/{{route}}/{{version}}/installation#section-3) to install all dependencies, migrate and seed database

<br/>

Now backend should be live on AWS public dns provided, should look something like:
```perl
ec2-52-90-8-225.compute-1.amazonaws.com
```
> {info} The public DNS can be obtain inside your EC2 instance under description tab.