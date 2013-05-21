!SLIDE center cover
# single vs. double quotes

!SLIDE
# enkele vs. dubbele aanhalingstekens
enkele worden niet geparsed

    @@@ php
    $name = 'dave';
    $string = 'hallo $name, \n hoe gaat ie?';

    // hallo $name, \n hoe gaat ie?

dubbele worden geparsed voor PHP variables

     @@@ php
     $name = 'dave';
     $string = "hallo $var, \n hoe gaat ie?";

     // hallo dave,
     // hoe gaat ie?

!SLIDE
# enkele vs. dubbele aanhalingstekens
* snelheid
    * enkel bij extreme high-load apps
* wees consistent

of sprintf

    @@@ php
    $name = 'dave';
    $sentence = 'hallo %s, \n hoe gaat ie?'
    $string = sprintf($sentence, $name);

    // hallo dave, \n hoe gaat ie?
