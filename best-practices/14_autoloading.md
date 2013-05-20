!SLIDE center cover
# autoloading

!SLIDE
# autoloading

    @@@ php
    require 'Visitor.php';
    $visitor = new Visitor('dave', 'street');

!SLIDE
# autoloading in PHP 5

autoloading in the "Olden days"

    @@@ php
    function __autoload($className) {
        $filename = $className . ".php";

        if (is_readable($filename)) {
            require $filename;
        }
    }

max. 1 functie!

.notes file_exists kijkt niet naar permissies

!SLIDE
# autoloading sinds PHP 5.1.2

    @@@ php
    function autoloadService($className) {
        $filename = "services/". $className . ".php";

        if (is_readable($filename)) {
            require $filename;
        }
    }

    function autoloadController($className) {
        $filename = "controllers/". $className . ".php";

        if (is_readable($filename)) {
            require $filename;
        }
    }

    spl_autoload_register("autoloadService");
    spl_autoload_register("autoloadController");

.notes overschijft __autoload()

!SLIDE
# autoloading standards
PEAR Coding Standard (voor namespaces)

bestand

    @@@ php
    class Zend_Translate

locatie

    @@@ php
    Zend/Translate.php

iedereen eigen implementatie

!SLIDE
# autoloading standards
PSR-0 Standard (na 5.3)

    @@@ php
    <?php
    namespace Vendor\Package\Service;

    class Example
    {

    }

locatie

    @@@ php
    Vendor/Package/Service/Example.php



