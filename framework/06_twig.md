!SLIDE center cover
# Twig
![background](../img/background-twig.png)

!SLIDE
# wat is Twig

* templating language voor PHP
* jinja2 syntax en idee
* flexibel en volledig aanpasbaar

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

.notes jinja2 = template engine in python