# Installation
---


- [Download Project](/{{route}}/{{version}}/installation#section-1)
- [Installating Homestead](/{{route}}/{{version}}/installation#section-2)
- [Setting Up Environment](/{{route}}/{{version}}/installation#section-3)

<a id="section-1"></a>
## Download Project
Download/Clone [Learning Management System](https://github.com/FocussedFlyer3/thestandardsproject) repository from GitHub.  

<a id="section-2"></a>
## Installing Homestead
Before running Homestead environment, install [Virtual Box](https://www.virtualbox.org/wiki/Downloads) and [Vagrant](https://www.vagrantup.com/downloads.html) to manage the Virtual Box.  
<br/>
Add `laravel/homestead` box into Virtual Box using:
```bash
vagrant box add laravel/homestead
```

> {info} If this command fails, make sure your Vagrant installation is up to date.

<br/>
Clone Homestead repository into a Homestead folder within your "home" directory, as the Homestead box will serve as the host for this project:
```bash
git clone https://github.com/laravel/homestead.git ~/Homestead
```

<br/>

Once you have cloned the Homestead repository, run the bash `init.sh` command from the Homestead directory to create the Homestead.yaml configuration file.
```bash
cd ~/Homestead
bash init.sh
```

<br/>

Configured Homestead.yaml file.
```yaml
---
ip: "192.168.10.10"     // address homestead will be hosting at
memory: 2048
cpus: 1
provider: virtualbox

authorize: ~/.ssh/id_rsa.pub

keys:
    - ~/.ssh/id_rsa

folders:
    - map: ~/GitHub/thestandardsproject/src     // location of project
      to: /home/vagrant/code

sites:
    - map: homestead.test
      to: /home/vagrant/code/public

databases:
    - homestead                                // name of database

```

<br/>

If everything runs smoothly, run `vagrant up` from Homestead directory to boot up system.
```bash
// boot up
vagrant up

// enter into system
vagrant ssh

// shut down system
vagrant halt 
```

<a id="section-3"></a>
## Setting Up Environment
`vagrant ssh` to enter into system and enter into source code directory with `cd code/`.  
<br/>
In your source code directory, perform the followings:

Install dependencies:
```bash
composer install
npm install
```

Rebuild database:
```bash
php artisan migrate:refresh --seed
```

<br/>
During development run: 
```bash
npm run watch
```
This builds the system on every save (CTRL+S), ensuring the latest changes is applied.  
