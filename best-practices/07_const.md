!SLIDE center cover
![background](../img/background-const.jpg)
# define() vs. const

!SLIDE
# define() vs. const

## namespaces
    @@@ php
    namespace HeadOffice\Presentatie;
    const WORKERS = 100;
    define('HeadOffice\Presentatie\VISITORS', 10);

## expressions
    @@@ php
    const WORKERS = 50 * 2; // compile error
    define('WORKERS', 50 * 2); //

.notes namespace emuleren

!SLIDE
# define() vs. const

## blocks
    @@@ php
    if (true === true) {
        define('MAX_VISITORS', 50); // ok
        const MAX_VISITORS = 50 ; // compile error
    }

## class
    @@@ php
    class Visitor {
        const NUMBER_OF_LEGS = 2; // ok
        define('NUMBER_OF_LEGS', 2); // compile error
    }

!SLIDE
# define()
* run time
* global scope
* expressions (flexibel)

# const
* compile time (minimaal sneller)
* namespace
* global sinds PHP 5.3
* beter leesbaar
