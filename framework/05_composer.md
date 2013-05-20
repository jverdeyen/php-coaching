!SLIDE center cover
# Composer
![background](../img/background-composer.jpg)

!SLIDE
# Composer en PEAR
* package managers in PHP
* managen van externe libraries
* publishen van eigen libraries

!SLIDE
# PEAR
system wide packages (global)

# Composer
per project packages

.notes (pear kan ook per package)

!SLIDE
# Composer

* identieke versies van externe libraries
* code stabiel en voorspelbaar


!SLIDE
# voorbeeld: Doctrine

## PEAR

    @@@ sh
    $ pear channel-discover pear.doctrine-project.org
    $ pear install doctrine/DoctrineCommon
    $ pear install doctrine/DoctrineDBAL
    $ pear install doctrine/DoctrineORM

    $ doctrine -V
    Doctrine Command Line Interface version 2.1.4

!SLIDE
# voorbeeld: Doctrine

    @@@ sh
    $ doctrine -V
    Doctrine Command Line Interface version 2.1.4

fork een project, gebruikt.. Doctrine 2.3.0 !

collega developer heeft.. Doctrine 2.2.3 !

!SLIDE center
# voorbeeld: Doctrine
gebruik Composer
![composer](../img/logo-composer-transparent.png)

!SLIDE
# voorbeeld: Doctrine
getcomposer.org

local install

    @@@ sh
    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar --version
    Composer version 6f576d4

system wide install

    @@@ sh
    $ curl -s http://getcomposer.org/installer | php
    $ sudo mv composer.phar /usr/local/bin/composer
    $ php composer.phar --version
    Composer version 6f576d4

!SLIDE center cover
# Composer installed !!!
![background](../img/success-kid.jpg)

!SLIDE
# voorbeeld: Doctrine

composer.json in project map

    @@@ json
    {
        "require": {
            "doctrine/orm": "2.3.4"
        }
    }

.notes orm heeft dbal nodig en common

!SLIDE
# voorbeeld: Doctrine

    @@@ sh
    $ composer install

    Loading composer repositories with package information
    Installing dependencies
      - Installing doctrine/common (2.3.0)
        Loading from cache

      - Installing symfony/console (v2.2.1)
        Downloading: 100%

      - Installing doctrine/dbal (2.3.4)
        Downloading: 100%

      - Installing doctrine/orm (2.3.4)
        Downloading: 100%

    doctrine/orm suggests installing symfony/yaml (If you want to use YAML Metadata Mapping Driver)
    Writing lock file
    Generating autoload files

!SLIDE
# voorbeeld: Doctrine

    @@@ php
    require_once "vendor/autoload.php";

!SLIDE
# Composer
* composer.json
* composer.lock
* vendor map

!SLIDE
# Composer

gebruik versies uit composer.lock

    @@@ sh
    $ composer install

update alle versies uit composer.json

    @@@ sh
    $ composer update
    $ composer update doctrine/common





