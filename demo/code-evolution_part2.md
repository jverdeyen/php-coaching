# code evolution deel 2

* http://lyrixx.github.io/Silex-Kitchen-Edition/

## vertrokken van
* zéér basic mini framework
* standaard validatie
* standaard sanitization

## waar naartoe
* silex
* enkele symfony compenten
* modulaire core
* tests
* meer structuur
* layout blijft identiek

## start
* composer aanpassen
* silex = router + dependency container
* pimple = zeer klein
* index.php -> new Silex\Application();
* $app->get('/', function() { });
* $app->run();

* http://silex.sensiolabs.org/
* twig toevoegen als provider, register
* serivce provider = plugin/module
* gebruik van closures
* $app->get('/', function() use ($app) { .. })
* $app['twig']->render('index.html.twig');
* $app['debug'] = true;

## post
* symfony Request opbject
* $app->post('/', function(Request $request) use ($app) {});

## validation
* form validation service
* in pimple steken, contact form object meegeven

## combine POST|GET
* $app ->match('/', ..)->method('GET|POST');
* $request->getMethod('POST')

## template
* extend een layout
* include een layout
* macro voor input veldje


## config/app.php
* require config/app.php
* alle service providers in deze file


## controller as service
* http://silex.sensiolabs.org/doc/providers/service_controller.html

## url generator
* http://silex.sensiolabs.org/doc/providers/url_generator.html
* method(...)->bind('home');

