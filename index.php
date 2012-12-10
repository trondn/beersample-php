<!DOCTYPE html>
<?php include "tools.php" ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Couchbase Beer-Sample</title>
        <?= getStylesheets() ?>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="container-narrow">
            <div class="masthead">
                <ul class="nav nav-pills pull-right">
                    <li><a href="<?= getContext() ?>">Home</a></li>
                    <li><a href="<?= getContext() ?>/beers">Beers</a></li>
                    <li><a href="<?= getContext() ?>/breweries">Breweries</a></li>
                </ul>
                <h2 class="muted">Couchbase Beer-Sample</h2>
            </div>
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <?php
                    if (getPath() == "") {
                        ?>
                        <div class="span6">
                            <div class="span12">
                                <h4>Browse all Beers</h4>
                                <a href="<?= getContext() ?>/beers" class="btn btn-warning">Show me all beers</a>
                                <hr />
                            </div>
                            <div class="span12">
                                <h4>Browse all Breweries</h4>
                                <a href="<?= getContext() ?>/breweries" class="btn btn-info">Take me to the breweries</a>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="span12">
                                <h4>About this App</h4>
                                <p>Welcome to Couchbase!</p>
                                <p>This application helps you to get started on application
                                    development with Couchbase. It shows how to create, update and
                                    delete documents and how to work with JSON documents.</p>
                                <p>The official tutorial can be found
                                    <a href="http://www.couchbase.com/docs/couchbase-sdk-java-1.1/tutorial.html">here</a>!</p>
                            </div>
                        </div>
                        <?php
                    } else {
                        $script = getRealScript() . ".php";
                        if (file_exists($script)) {
                            include $script;
                        } else {
                            echo "Internal error!!!";
                        }
                    }
                    ?>
                </div>
            </div>
            <hr>
            <div class="footer">
                <p>&copy; Couchbase, Inc. 2012</p>
            </div>
        </div>
        <script src="<?= getContext() ?>/js/jquery.min.js"></script>
        <script src="<?= getContext() ?>/js/bootstrap.min.js"></script>
        <script src="<?= getContext() ?>/js/beersample.js"></script>
    </body>
</html>
