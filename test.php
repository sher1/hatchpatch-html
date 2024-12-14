<?php
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/');
$dotenv->load();
// $dotenv->required([
//     'USER',
//     'SERVER',
//     'PASSWORD',
//     'DBNAME',
// ]);
print_r($_ENV);
die();

?>