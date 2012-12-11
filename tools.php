<?php

include "couchbase.php";

function getCouchbaseHandle() {
    return new Couchbase(COUCHBASE_CONFIG_HOST,
                    COUCHBASE_CONFIG_USER,
                    COUCHBASE_CONFIG_PASSWD,
                    COUCHBASE_CONFIG_BUCKET,
                    true);
}

function getContext() {
    return $_SERVER['SCRIPT_NAME'];
}

function getContextRoot() {
    $full = $_SERVER['SCRIPT_NAME'];
    $context = substr($full, 0, strrpos($full, '/'));
    return $context;
}

function getPath() {
    return $_SERVER['PATH_INFO'];
}

function getRealScript() {
    $full = $_SERVER['SCRIPT_FILENAME'];
    $idx = strrpos($full, DIRECTORY_SEPARATOR);
    return substr($full, 0, $idx) . getPath();
}

function getStylesheets() {
    $files = array("bootstrap.min.css", "beersample.css", "bootstrap-responsive.min.css");
    $ret = "";
    foreach ($files as $value) {
        $ret = $ret . "<link href=\"" . getContextRoot() . "/css/" . $value . "\" rel=\"stylesheet\">";
    }
    return $ret;
}

function buildParamArray() {
    $url = "";
    foreach ($_SERVER["argv"] as $v) {
        if ($url == "") {
            $url = $v;
        } else {
            $url = $url . " " . $v;
        }
    }

    $argv = array();
    $start = 0;
    do {
        $end = strpos($url, "&", $start);
        if ($end) {
            $line = substr($url, $start, $end - $start);
        } else {
            $line = substr($url, $start);
        }
        $idx = strpos($line, "=");
        $key = substr($line, 0, $idx);
        $value = substr($line, $idx + 1);
        $argv[$key] = $value;
        $start = $end + 1;
    } while ($end);

    return $argv;
}

function getParamValue($key) {
    foreach (buildParamArray() as $k => $value) {
        if ($key == $k) {
            return $value;
        }
    }

    return "";
}

?>
