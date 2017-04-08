<?php
require_once '../connexionbdd.php';
require_once '../fonctions.php';
$pdo = getPdo();

$searched = inputFilterString('searched', false) ? (String) inputFilterString('searched', false) : null;
$scope = inputFilterString('scope', false) ? (String) inputFilterString('scope', false) : "both";
$type = inputFilterString('type', false) ? (String) inputFilterString('type', false) : "short";

$lesUtilisateurs = getLesUtilisateurs($searched, $scope, $type);



if($lesUtilisateurs == null) {
  $res = ['status' => 'error',
          'args' => $_GET,
          'result' => null];
} else {
  $res = ['status' => 'ok',
          'args' => $_GET,
          'result' => ["list" => $lesUtilisateurs]];
}

echo json_encode($res);
