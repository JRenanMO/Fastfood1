<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

$pdo = new PDO('mysql:host=localhost;dbname=elfutec_fast_food', 'root', '!@#89m@X');
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$stmt = $pdo->prepare('select * from cardapios');
$stmt->execute();

$cardapios = $stmt->fetchAll(); 
