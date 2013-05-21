!SLIDE
# Database Abstraction Layer
* bovenop PDO
* DDL (data definition language) statement api
* lightweight
* veel meer extra features
* verschillende databases
    * MySQL
    * Sqlite
    * Pgsql
    * ..

.notes DDL : taal om datastrucutren te beschrijven, waar pdo enkel voor connectie zorgt

!SLIDE
# queries uitvoeren

    @@@ php
    $stmt = $conn->execute('SELECT * FROM user WHERE name = ?', array('joeri'));
    $user = $stmt->fetch();

!SLIDE
# schema informatie ophalen (Schema-Manager)

    @@@ php
    $sm = $conn->getSchemaManager();

    $databases = $sm->listDatabases();

    $columns = $sm->listTableColumns('user');

    $foreignKeys = sm->listTableForeignKeys('user');

!SLIDE
# schema's aanmaken (Schema-Representation)

    @@@ php
    $platform = $em->getConnection()->getDatabasePlatform();

    $schema = new \Doctrine\DBAL\Schema\Schema();
    $newTable = $schema->createTable('user');
    $newTable->addColumn('id', 'integer', array('unsigned' => true));
    $newTable->addColumn('name', 'string', arary('length' => 32));
    $newTable->setPrimaryKey(array('id'))

    // create table queries
    $queries = $schema->toSql($platform);

    // drop schema
    $dropsSchema = $schema->toDropSql($platform);

!SLIDE
# schema's vergelijken

    @@@ php
    $comparator = \Doctrine\DBAL\Schema\Comparator();

    $schemaDiff = $comparator->compare($fromSchema, $toSchema);

    // queries om van het ene naar het andere schema te gaan
    $queries = $schemaDiff->toSql($platform);

!SLIDE
# schema via annotations (Doctrine ORM)

    @@@ php
    <?php

    namespace Entity;

    /**
     * @Entity @Table(name="users")
     */
     class User
     {
        /** @Id @Column(type="integer") @GeneratedValue */
        private $id;

        /** @Column(length=50) */
        private $name;

        /** @OneToOne(targetEntity="Address") */
        private $address;
     }

!SLIDE
# entiteiten opslaan

    @@@ php
    $user = new User();
    $user->setName('dave');

    $em->persist($user);
    $em->flush();

.notes meerdere transacties zijn sneller dan native php, door transacties

!SLIDE
# insert performance

insert 20 records met Doctrine

    @@@ php
    for ($i = 0; $i < 20; $++) {
        $user = new User();
        $user->setName('dave');
        $em->persist($user);
    }

    $em->flush

!SLIDE
# insert performance

insert 20 records via raw PHP

    @@@ php
    for ($i = 0; $i < 20; $++) {
        mysql_query("INSERT INTO users (name) VALUES ('dave')", $conn);
    }

!SLIDE
## insert performance
Doctrine is sneller! Waarom?

* Doctrine: 1 transaction voor geheel
* raw PHP: 1 transaction voor elke insert

!SLIDE
# insert performance

wat doet Doctrine:

    @@@ php
    mysql_query('START TRANSACTION', $link);

    for ($i = 0; $i < 20; $++) {
        mysql_query("INSERT INTO users (name) VALUES ('dave')", $conn);
    }

    mysql_query('COMMIT', $link);

