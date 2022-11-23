<?php

$db_host = $_ENV["DB_HOST"];
$db_name = $_ENV["DB_NAME"];
$db_user = $_ENV["DB_USER"];
$db_password = $_ENV["DB_PASSWORD"];

$submission_table = $_ENV["SUBMISSION_TABLE"];

/*create db if not exist*/
try {
    $db = new PDO("mysql:host=$db_host", $db_user, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "create database if not exists $db_name";
    $db->exec($sql);
} catch (PDOException $th) {
    echo $th->getMessage();
    echo "<br><lbockquote>Wrong db config for create db</lbockquote>";
    exit();
}

/*create table if not exist*/
try {
    $db = new PDO("mysql:host=$db_host", $db_user, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "create table if not exists $submission_table(
            ID int auto_increment primary key,
            name varchar(100) not null,
            language varchar(8),
            exercice_number int,
            file_path varchar(255),
            grade float
    )";
    $db->exec($sql);
} catch (PDOException $th) {
    echo $th->getMessage();
    echo "<br><blockquote>Wrong db config for create table</blockquote>";
    exit();
}


?>