<?php
require_once 'db.php';

use QueryBuilder\DB;

$query = new DB();

//$result = $query->table('users')->select('password', 'name')->where([])->execute();
//$query->where(['id' => 1]);
//$query->select('password', 'name');

//$result = $query->table('users')->update(['password' => '123', 'name' => 'marifua'])->where(['id' => '2'])->execute();

//$result = $query->table('users')->delete(['password' => '123', 'name' => 'marifua'])->where(['name' => 'mustafa', 'id' => 2])->execute();
$result = $query
    ->table('users')
    ->insert([
        ['password' => '123456789' , 'name' => 'Argisht' , 'email' => 'argisht@mail.ru'],
        ['password' => '3456' , 'name' => 'Poxod' , 'email' => 'afay@mail.ru'],
    ])
    ->execute();

echo "<pre>";
var_dump($result);


