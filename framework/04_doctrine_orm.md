!SLIDE
# Object Relational Mapper
* bovenopen DBAL en Common
* Doctrine Query Language
* XML, YAML of Annotations voor metadata
* query cache
* result cache
* ..

!SLIDE
# Doctrine Query Language (DQL)

* queries op modellen
* niet verwarren met relational schema (sql)

voorbeeld dql

    @@@ php
    $query = $em->createQuery('select u from Project\Entity\User u');
    $users = $query->execute();


!SLIDE
# Doctrine Query Language (DQL)

via de QueryBuilder API

    @@@ php
    $qb = $em->createQueryBuilder();

    $qb->select('u')
       ->from('Project\Entity\User', 'u');

    $q = $qb->getQuery();
    $users = $q->execute();

!SLIDE
# Cache drivers

interface voor alle cache drivers
(APC, Memcache, Xcache)

* fetch($id)
* contains($id)
* save($id, $data, $lifeTime = false)
* delete($id)