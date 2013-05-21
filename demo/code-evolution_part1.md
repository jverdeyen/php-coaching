# code evolution deel 1

## standard contact form
* standaard contact form
* alles in index.php
* process.php om mailtje te sturen + header
* redirect naar thankyou.php

## wat?
* verbeteren aan de hand van iteraties, refactoring
* veiliger maken
* geen validatie aanwezig
* geen error checks aanwezig

* register globals uit!! opletten
* zekerheid vars initialiseren

## validation / sanitization
* html5 required attribute (recente browsers)
* edit via html mogelijk
* html5 type=email
* hoe kan je hier naar andere emails sturen? exploit voor spammers
* newline invoegen, headers toevoegen
* array gebruiken bij zéér veel velden

* general validation - standaard
* name => filter_var - FILTER_SANITIZE_STRING
* email => filter_var - FILTER_SANITIZE_EMAIL
* message => filter_var - FILTER_SANITIZE_STRING
* name => preg_replace("/\n|\r/", '', $name);

## errors
* errors weergeven
* if isset($_POST['contact']) in index.php + code van process.php (verplaats)
* action blank maken
* $error = false; (register globals)
* ?error=true bij register globals = drama
* trim($message)

* if message == '' -> $error => "This .."
* if error == false -> toon form
* false == $error (om toewijzing ter vermijden)
* if ($error != false ): endif; (templating syntax)
* <div class="error"><?php echo $error; ?>

## data opnieuw invullen
* form is weer leeg.. bij fout
* array contact ('name' => '', ..)
* value ingeven <?php echo $contact['name']; ?>
* placeholder
* cleanup html

## injection
* $contact = $_POST['contact']
* injection - "/><script>alert('hello');</script>
* htmlentities('', ENT_QUOTES, 'UTF-8');
* escaped alle html specifieke characters

## csrf
* cross site request forgery
* bescherming tegen xss mbv sessies
* start_session();
* $_SESSION['csrf'] = uniqid('csrf_token');
* input in form steken met csrf_token
* alleen via die pagina gegaan (niet voor webscrapers.. je kan er altijd rond)
* als token verschillend is of leeg -> $error
* ( reload the page message -> REQUEST_URI -> anders als de te lang op de pagina zit)

## anti robot
* bescherming tegen robot, input field hidden met css, address, robot denkt ingevuld, user niet. Dus als ingevuld weten we dat het een robot is
* captcha
* are you human (sums etc.)
* veel mogelijkheden


## opdelen views
* form.php, thankyou.php (views map)
* $view = 'form'; $view = 'thankyou'
* body blijft in index.php
* requre __DIR__ ../../$view.php

## logica in src dir
* includes/formCheck.php
* alle logica erin
* require file in index.php

* template.php in views (body + include $view.php)
* alle overige code erin

* minder conflicten als alle opgedeelt is

## Contact class
* src/Contact.php
* class Contact (name, email, message)
* array contact -> object contact
* fromPost($_POST) method
* fromPost in contructor als $data == null
* sanitize kan in contact class

### testing
* composer
* vendor/autoload.php
* tests folder
* phpunit.xml
* bootstrap -> vendor/autoload.php
* tests/ContactTest.php
* class ContactTest extrends PHPUnit_Framework_TestCase
* protected $contact
* public function setup(); -> new contact
* testThatContactIsEmpty()
* testThatContactDetectsBrokenEmail
* newline sanitization mag weg (zien we uit tests)

* swiftMailer ipv mail (composer)
