<?php
require_once '../connexionbdd.php';
require_once '../fonctions.php';
$pdo = getPdo();

$author = inputFilterString('author', false) ? (String) inputFilterString('author', false) : "null";
$follower = inputFilterInt('follower', false) ? (int) inputFilterInt('follower', false) : "null";
$mentioned = inputFilterInt('mentioned', false) ? (int) inputFilterInt('mentioned', false) : "null";
$before = inputFilterInt('before', false) ? (int) inputFilterInt('before', false) : "null";
$count = inputFilterInt('count', false) ? (int) inputFilterInt('count', false) : 4;
$lesMessages = getLesMessages($author, $follower, $mentioned, $before, $count);
$hasMore = getLesMessages($author, $follower, $mentioned, $before, $count) != getLesMessages($author, $follower, $mentioned, $before, $count + 1);

if($lesMessages == null) {
  $res = ['status' => 'error',
          'args' => $_GET,
          'result' => null];
} else {
  $res = ['status' => 'ok',
          'args' => $_GET,
          'result' => ["list" => $lesMessages, "hasMore" => $hasMore]];
}

echo json_encode($res);
