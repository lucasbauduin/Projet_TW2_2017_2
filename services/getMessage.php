<?php
require_once '../connexionbdd.php';
require_once '../fonctions.php';
$pdo = getPdo();

$id = inputFilterInt('id', false) ? (int) inputFilterInt('id', false) : null;

$leMessage = getMessage($id);
if($leMessage == null) {
  $res = ['status' => 'error',
          'args' => ['id' => $id],
          'result' => null];
} else {
  $res = ['status' => 'ok',
          'args' => ['id' => $id],
          'result' => $leMessage];
}

echo json_encode($res);
