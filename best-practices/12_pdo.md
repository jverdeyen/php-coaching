!SLIDE center cover
# PDO (PHP Data Objects)

!SLIDE
# wat is PDO
* interface voor interactie met database
* verschillende type databases
* schrijft geen sql (geen database abstraction layer)
* sinds PHP 5.1 native
* ipv mysql of mysqli extensie

!SLIDE
# verschillende drivers

    @@@ php
    print_r(PDO::getAvailableDrivers());

* PDO_DBLIB ( FreeTDS / Microsoft SQL Server / Sybase )
* PDO_FIREBIRD ( Firebird/Interbase 6 )
* PDO_MYSQL ( MySQL 3.x/4.x/5.x )
* PDO_OCI ( Oracle Call Interface )
* PDO_PGSQL ( PostgreSQL )
* PDO_SQLITE ( SQLite 3 and SQLite 2 )
* PDO_4D ( 4D )
* ..

!SLIDE
# connectie via string
    @@@ php
    try {
        $connection = new PDO(
            "mysql:host=$host;dbname=$dbname",
            $user,
            $pass
        );
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }

    // connectie afsluiten
    $connection = null;

!SLIDE
# insert en update via statements
    @@@ php
    $stmt = $connection->prepare(
        "INSERT INTO visitor (name) VALUES ('dave')"
    );

    $stmt->execute();

of

    @@@ php
    $connection->exec(
        "INSERT INTO visitor (name) VALUES ('dave')"
    );

!SLIDE
# prepared statements
* precompiled SQL statement
* veilig voor SQL injection
* met/zonder (named/unnamed) placeholders

!SLIDE
# prepared statements

geen placeholders

    @@@ php
    // kwetsbaar voor SQL injection
    ->prepare("INSERT INTO visitor (name) VALUES ($name)");

!SLIDE
# prepared statements

unnamed placeholders

    @@@ php
    $stmt = $db->prepare("INSERT INTO visitor (name, street) VALUES (?, ?)");
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $street);
    $stmt->execute();

of

    @@@ php
    $data = array('dave', 'jumpstreet');

    $stmt = $db->prepare("INSERT INTO visitor (name, street) VALUES (?, ?)");
    $stmt->execute($data);

.notes $data[0] moet juiste indexen hebben

!SLIDE
# prepared statements

named placeholders

    @@@ php
    $stmt = $db->prepare("INSERT INTO visitor (name, street) VALUES (:name, :street)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':street', $street);
    $stmt->execute();

of

    @@@ php
    $data = array(
        'name'  => 'dave',
        'street' => 'jumpstreet
    ');

    $stmt = $db->prepare(
        "INSERT INTO visitor (name, street) VALUES (:name, :street)"
    );
    $stmt->execute($data);

!SLIDE
# prepared statements
objecten

    @@@ php
    class Person {
        public $name;
        public $street;

        function __construct($name, $street) { .. }
    }

    $dave = new Person('dave', 'jumpstreet');

    $stmt = $db->prepare(
        "INSERT INTO visitor (name, street) VALUES (:name, :street)"
    );

    $stmt->execute((array) $dave);

.notes cast naar array maakt er assoc array van

!SLIDE
# fetch
verschillende opties

* PDO::FETCH_ASSOC: assoc array (kolom naam)
* PDO::FETCH_OBJ: in nieuwe object
* PDO::FETCH_CLASS: in bestaand object
* PDO::FETCH_BOTH (standaard)
* ..

instellen

    @@@ php
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->fetch(PDO::FETCH_OBJ);

.notes bound: bindColumn (namen van kolommen aanpassen), class (matched met members), into: bestaande class

!SLIDE
# handig

auto incremented id van laatste insert

    @@@ php
    $stmt->lastInsertId();

prepared statements fallback

    @@@ php
    $stmt->quote($unsafeString);

aantal rijen

    @@@ php
    $stmt->rowCount();



