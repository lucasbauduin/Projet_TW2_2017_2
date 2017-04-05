<?php
function getPdo() {
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=rezozio','root', 'root');
    $pdo->query("SET CHARACTER SET utf8");
    return $pdo;
  } catch (Exception $e) {
    echo "<h1>Echec de la connexion</h1><hr /><p>".$e->getMessage()."</p>";
    die;
  }
}

function getMessage($identifiant) {
  global $pdo;
  $sql = "SELECT * FROM publications WHERE identifiant = :identifiant";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':identifiant', $identifiant, PDO::PARAM_INT);
  $stmt->execute();
  $res = $stmt->fetch();
  if($res == false) {
    return NULL;
  } else {
    return new Message($identifiant, $res['contenu'], $res['auteur'], $res['date']);
  }
}

function getUser($identifiant, $type = "short") {
  global $pdo;
  $sql = "SELECT * FROM utilisateurs WHERE identifiant = :identifiant";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':identifiant', $identifiant, PDO::PARAM_INT);
  $stmt->execute();
  $res = $stmt->fetch();
  if($res == false) {
    return NULL;
  } else {
    $user = ["ident" => $identifiant, "name" => $res['nom']];
    if($type == "long") {
      $user = array_merge($user, ["description" => $res['presentation']]);
    }
    return $user;
  }
}
