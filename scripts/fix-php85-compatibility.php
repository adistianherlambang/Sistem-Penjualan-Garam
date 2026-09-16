<?php

/**
 * Script untuk memastikan kompatibilitas Laravel Framework dengan PHP 8.5+.
 * Menangani deprecation PDO::MYSQL_ATTR_SSL_CA menjadi Pdo\Mysql::ATTR_SSL_CA.
 */

$databaseConfigFile = __DIR__ . '/../vendor/laravel/framework/config/database.php';
if (file_exists($databaseConfigFile)) {
    $content = file_get_contents($databaseConfigFile);
    if (str_contains($content, "PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA')")) {
        $updated = str_replace(
            "PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA')",
            "(defined('\\Pdo\\Mysql::ATTR_SSL_CA') ? \\Pdo\\Mysql::ATTR_SSL_CA : PDO::MYSQL_ATTR_SSL_CA) => env('MYSQL_ATTR_SSL_CA')",
            $content
        );
        file_put_contents($databaseConfigFile, $updated);
    }
}

$mysqlSchemaStateFile = __DIR__ . '/../vendor/laravel/framework/src/Illuminate/Database/Schema/MySqlSchemaState.php';
if (file_exists($mysqlSchemaStateFile)) {
    $content = file_get_contents($mysqlSchemaStateFile);
    if (str_contains($content, '\PDO::MYSQL_ATTR_SSL_CA')) {
        $updated = str_replace(
            '\PDO::MYSQL_ATTR_SSL_CA',
            "(defined('\\Pdo\\Mysql::ATTR_SSL_CA') ? \\Pdo\\Mysql::ATTR_SSL_CA : \\PDO::MYSQL_ATTR_SSL_CA)",
            $content
        );
        file_put_contents($mysqlSchemaStateFile, $updated);
    }
}
