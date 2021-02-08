<?php
require('../config/credentials.php');

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();
$capsule->addConnection([
  "driver" => DB_DRIVER,
  "host" => DB_HOST,
  "database" => DB_NAME,
  "username" => DB_USER,
  "password" => DB_PASS,
  "charset" => "UTF8",
  "collation" => "utf8_general_ci",
  "prefix" => ""
]);

$capsule->bootEloquent();
