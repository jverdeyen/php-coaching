!SLIDE center cover
# passwords
![background](../img/background-passwords.jpg)

!SLIDE
# passwords
* nooit plain text password opslaan!
* eigen hash algorithm
* niet alleen md5 of sha1
* salt indien nodig
* phppass (library)

!SLIDE
# eigen hash algorithm

    @@@ php
    $salt = '_^jh?NF(~/pKp,]1UH;)d2NQc/h<|go@nf|;fxze+Q-l~Wb_+./?F2/+S1[;SN_`';

    $password = 'test';

    $storePassword = crypt($password, $salt);

!SLIDE
# phppass

    @@@ php
    // Include the phpass library
    require_once('phpass-0.3/PasswordHash.php');

    // Initialize the hasher
    $hasher = new PasswordHash(8, false);

    // Hash the password
    $hashedPassword = $hasher->HashPassword('my super cool password');

    // compare
    $hasher->CheckPassword('the wrong password', $hashedPassword); // false

    $hasher->CheckPassword('my super cool password', $hashedPassword); // true
