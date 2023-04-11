<?php


$host = 'mariadb';
$dbname = 'DEVEVOLUTION';
$username = 'root';
$password = 'mariadb';



function connectMysql() {
    global $host, $dbname, $username, $password;

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
}
?>