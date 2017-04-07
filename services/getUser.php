<?php
require_once '../connexionbdd.php';
require_once '../fonctions.php';
$pdo = getPdo();

$id = inputFilterInt('id', true);

$lUser = getUser($id, "long");
if($lUser == null) {
  $res = ['status' => 'error',
          'args' => $_GET,
          'result' => null];
} else {
  $res = ['status' => 'ok',
          'args' => $_GET,
          'result' => $lUser];
}
echo json_encode($res);
