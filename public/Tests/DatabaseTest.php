<?php

use PHPUnit\Framework\TestCase;

require_once '../DB/connectMysql.php';

class DatabaseTest extends TestCase
{
    public function testConnection()
    {
        $connection = connectMysql();

        $this->assertInstanceOf(PDO::class, $connection);
    }
}
