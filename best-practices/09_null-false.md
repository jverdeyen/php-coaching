!SLIDE center cover
![background](../img/background-null-false.jpg)
# null and false

!SLIDE
# null and false
* PHP is loosely typed
* == (gelijk)
* === (identiek)

!SLIDE
# null and false

    @@@ php
    0 == null   // true ??
    is_null(0)  // false
    0 === null  // false

!SLIDE
# strpos

    @@@ php
    if (strpos('abc', 'a')) {
        echo "gevonden";
    }

.notes geef 0 terug -> php denkt false

!SLIDE
# strpos

    @@@ php
    if (strpos('abc', 'a') !== false) {
        echo "gevonden";
    }

.notes expliciet check

!SLIDE
# isset

    @@@ php
    $x = null;
    isset($x); // false

    $x = false;
    isset($x); // true

    $x = 0;
    isset($x); // true

!SLIDE
# 0 vs. string

    @@@ php
    0 == ''
    0 == 'string'

.notes true


