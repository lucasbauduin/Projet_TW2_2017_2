<?php
require_once '../connexionbdd.php';
require_once '../classes/class.Message.php';
$pdo = getPdo();

$id = 4;


$leMessage = getMessage($id);

if($leMessage == NULL) {
  $res = ['status' => 'error',
          'args' => ['id' => $id],
          'result' => null];

} else {
  $res = ['status' => 'ok',
          'args' => ['id' => $id],
          'result' => $leMessage];
}

/*
$lUser = getUser($id, "long");
if($lUser == NULL) {
  $res = ['status' => 'error',
          'args' => $_GET,
          'result' => null];

} else {
  $res = ['status' => 'ok',
          'args' => $_GET,
          'result' => $lUser];
}
*/

echo json_encode($res);
