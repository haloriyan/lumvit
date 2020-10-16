<?php

$scan = glob("../app/Model/*");
foreach ($scan as $k => $s) {
    // if ($s != "../app/Model/autoload.php" && $s != "../app/Model/Controller.php") {
    if ($s != "../app/Model/autoload.php") {
        include realpath($s);
    }
}