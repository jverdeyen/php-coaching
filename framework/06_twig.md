!SLIDE center cover
# Twig
![background](../img/background-twig.png)

!SLIDE
# wat is Twig

* templating language voor PHP
* jinja2 syntax en idee
* flexibel en volledig aanpasbaar

.notes jinja2 = template engine in python

!SLIDE
# maar..
# PHP is een templating language

!SLIDE
# PHP is een templating language

    @@@ php
    <?php echo $var; // XSS? ?>

    <?php echo htmlspecialchars($var, ENT_QOUTES, 'UTF-8'); ?>

    <?php echo h($var); ?>

autoescaping in twig:

    @@@ php
    {{ var }}

!SLIDE
# voordelen van Twig

* makkelijke syntax
* automatisch HTML escaping
* veel ingebouwde functies en filters
* uit te breiden met eigen functies en filters
* duidelijke afscheiding van view
* opsplitsing van templates


!SLIDE center
# plain PHP vs. Twig

!SLIDE
# condities

plain PHP

    @@@ php
    <? php if (!empty($var): ?>
    ...
    <?php endif; ?>

Twig

    @@@ php
    {% if var %}
    ..
    {% endif %}


!SLIDE
# loops

plain PHP

    @@@ php
    <? php

    if (!empty($var):
        foreach ( (array) $var as $i => $v ) :
            printf(
                '%s : %s',
                htmlspecialchars($i, ENT_QOUTES, 'UTF-8'),
                htmlspecialchars($v, ENT_QOUTES, 'UTF-8'));
        endforeach;
    else:
        echo 'nothing';
    endif;

!SLIDE
# loops

Twig

    @@@ php
    {% for i, v in var %}
        {{ i }} : {{ v }}
    {% else %}
        nothing
    {% endfor %}

!SLIDE
# loops

Twig

    @@@ php
    {% for user in users if user.active %}
        {{ user.name }} : {{ user.email }}
    {% else %}
        no active users
    {% endfor %}


!SLIDE center
# basis Twig

!SLIDE
# toegang tot variabelen

    @@@ php
    {{ user }}
    {{ user.name }}
    {{ user['name'] }}

.notes user kan array zijn, object, met of zonder getters

!SLIDE
# toegang tot variabelen

    @@@ php
    {{ user }}
    {{ user.name }}

* user is een array, met name als key
* user is een object, met name als attribute
* user is een object, met name als functie
* user is een object, met getName functie
* user is een object, met isName functie


!SLIDE
# variabelen declareren

    @@@ php
    {% set name = 'dave' %}

    {% set numbers = [1, 2] %}

    {% set users = { 'foo' : 'bar' } %}

!SLIDE center
# control structures

!SLIDE
# foreach

    @@@ php
    {% for user in users %}
        {{ user.username }}
    {% endfor %}

!SLIDE
# for

    @@@ php
    {% for i in 0..10 %}
        {{ i }}
    {% endfor %}

!SLIDE
# for-else

    @@@ php
    {% for user in users %}
        {{ user.username }}
    {% else %}
        no users found
    {% endfor %}

!SLIDE
# variabelen in loop

    @@@ php
    {{ loop.index }} // huidige iteratie (vanaf 1)

    {{ loop.revindex }} // omgekeerd (vanaf einde)

    {{ loop.first }} // true, bij eerste iteratie

    {{ loop.length }} // items in loop

    {{ loop.parent }} // parent context

!SLIDE
# if

    @@@ php
    {% if count <= 0 %}
        no results
    {% endif %}

!SLIDE center
# filters

!SLIDE
# filters

    @@@ php
    {{ name | upper }}

"dave" => "DAVE"

!SLIDE
# filters

    @@@ php
    {{ list | join(', ') }}

array("kona", "scott", "bmc") => "kona, scott, bmc"

!SLIDE
# filters

    @@@ php
    {{ list | join(', ') | upper }}

array("kona", "scott", "bmc") => "KONA, SCOTT, BMC"

!SLIDE
# filters

    @@@ php
    {{ post.publishDate | date('Y-m-d') }}

    {{ stringForJavascript | escape('js') }}
    {{ stringForJavascript | e('js') }}

    {{ thisIsHtml | raw }}

    {{ iNeedJson | json_encode }}

    {{ iHasLineBreaks | nl2br }}

    {{ "%s% users" | replace( { '%s%': number } ) }}

    {{ "%s users" |  format('no') }}

!SLIDE center
# include, block, extends


!SLIDE
# include

    @@@ php
    {% include "navigation.html.twig" %}

!SLIDE
# block, extends

layout.html.twig

    @@@ php
    <html>
        <body>
            {% block content %}
                standaard content
            {% endblock %}
        </body>
    </html>


home.html.twig

    @@@ php
    {% extends "layout.html.twig" %}

    {% block content %}
        Home!
    {% endblock %}


!SLIDE
# block, extends

output

    @@@ html
    <html>
        <body>
            Home!
        </body>
    </html>

!SLIDE center
# eigen functies


!SLIDE
MyTwigExtension.php

    @@@ php
    namespace Project\Extension\Twig;

    class MyTwigExtension extends \Twig_Extension
    {
        public function getFilters()
        {

        }

        public function getFunctions()
        {
            return array(
                'myFunction' => new \Twig_Function_Method($this, 'myFunction');
            );
        }

        public function myFunction($string)
        {
            return 'My function says: '. $string;
        }


    }

!SLIDE
# eigen functies

    @@@ php
    <p>{{ myFunction('hello') }}</p>

output

    @@@ html
    <p>My function says: hello</p>


!SLIDE center
# macro

!SLIDE
# macro

macro.html.twig

    @@@ php
    {% macro link(href, text) %}
        <a href="{{ href }}">{{ text }}</a>
    {% endmacro %}

!SLIDE
# macro

home.html.twig

    @@@ php
    {% import 'macro.html.twig' as helper %}

    <p>{{ helper.link('http://www.google.be', 'google') }}</p>

output

    @@@ html
    <p><a href="http://www.google.be">google</a></p>

!SLIDE
# Twig
* veel functionaliteit
* flexibel
* uitbereidbaar
* snel
* veilig
* (werkt goed samen met Symfony2)


