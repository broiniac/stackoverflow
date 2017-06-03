<?php

$connect = new PDO(
    'mysql:dbname=stackoverflow_44346949;host=localhost',
    'stackoverflow',
    'stackoverflow'
);

// $connect->exec('CREATE TABLE files (
//     file VARCHAR(255) NOT NULL,
//     path VARCHAR(255) NOT NULL,
//     type VARCHAR(255) NOT NULL
// ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
