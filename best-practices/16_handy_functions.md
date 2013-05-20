!SLIDE center cover
# handige functies
![background](../img/background-handy_functions.jpg)

!SLIDE
# array_rand

    @@@ php
    $sites = ["Scott", "Trek", "Kona", "Orbea"];
    $k = array_rand($sites);
    $sites[$k];

.notes 2e param bepaald aantal keys

!SLIDE
# basename

    @@@ php
    $path = '/home/user/site/www/index.php';
    $filename1 = basename($path); // index.php
    $filename2 = basename($path, '.php'); // index


!SLIDE
# list

    @@@ php
    $array = ["Steve", "Jobs"];
    list($firstName, $lastName) = $array;

    echo $firstName; // Steve
    echo $lastName; // Jobs

met explode

    @@@ php
    $data = "foo:*:1023:1000::/home/foo:/bin/sh";
    list($user, $pass, $uid, $gid, $gecos, $home, $shell) = explode(":", $data);

.notes /etc/passwd output


!SLIDE
# range

    @@@ php
    range(0, 10); // array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10)
    range('a', 'f'); // array('a', 'b', 'c', 'd', 'e'. 'f');

    range(2, 10, 2); // array(2, 4, 6, 8, 10);

!SLIDE
# is_readable

    @@@ php
    $filename = 'test.txt';

    if (is_readable($filename)) {
        echo 'The file is readable';
    } else {
        echo 'The file is not readable';
    }

!SLIDE
# uniqid

    @@@ php
    echo md5(time() . mt_rand(1,1000000));

    echo uniqid(); // 4bd67c9472340

    echo uniqid('foo_',true);  // foo_4bd67d6cd8b8f

    echo uniqid('bar_',true);  // bar_4bd67da367b650.43684647


!SLIDE
# gzcompress

    @@@ php
    $veryLongString = "Lorem ipsum dolor sit amet, consectetur adipiscing elit...";

    echo strlen($veryLongString); // 800

    $compressed = gzcompress($veryLongString);

    echo strlen($compressed); // 418

    $original = gzuncompress($compressed);

