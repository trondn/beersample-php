What is beersample-php
======================

The beersample-php project is a tiny application that utilize the PHP
Couchbase extension to connect to a Couchbase cluster to give you an
indication on how you may utilize the driver in your application.

Requirements
------------

In order to use this application you need:

* A webserver capable of running PHP
* The Couchbase PHP extension
* Libcouchbase
* A Couchbase cluster with the beer-sample dataset available.

Views
-----

You need to create the following views

brewery - by_name

    function (doc, meta) {
        if (doc.type == "brewery") {
            emit(meta.id, doc.name);
        }
    }

beers - by_name

    function (doc, meta) {
        if (doc.type == "beer") {
            emit(doc.name, doc.brewery_id);
        }
    }

Couchbase configuration
-----------------------

Edit couchbase.php and set the correct values for the tunables.


TODO
----

As all software projects there are a lot of loose ends in this project:

* Create views automatically
* Make it look more like a PHP application
* The configuration parameters for the Couchbase cluster should be placed
  somewhere.


Contact us
----------

The developers from the SDK team usually hang out in the `#libcouchbase`
IRC channel on freenode.net.


Cheers,

Trond Norbye
