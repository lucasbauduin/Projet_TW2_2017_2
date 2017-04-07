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
    return null;
  } else {
    return ["id" => $identifiant, "author" => $res['auteur'], "content" => $res['contenu'], "datetime" => $res['date']];
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
    return null;
  } else {
    $user = ["ident" => $identifiant, "name" => $res['nom']];
    if($type == "long") {
      $user = array_merge($user, ["description" => $res['presentation']]);
    }
    return $user;
  }
}

function getLesMessages($author = null, $follower = null, $mentioned = null, $before= null, $count = 15) {
  global $pdo;
  $sql = "SELECT * FROM publications";
  if($author != null || $follower != null || $mentioned != null || $before != null) {
    $sql .= " WHERE";
    $dejaclause = false;
    if($author != null) {
      $dejaclause = true;
      $sql .= " auteur = $author";
    }
    if($follower != null) {
      if($dejaclause) {
        $sql .= " AND";
      }
      $sql .= " auteur IN (SELECT aqui FROM estabonnea WHERE qui = $follower)";
    }
    if($mentioned != null) {
      if($dejaclause) {
        $sql .= " AND";
      }
      $sql .= " identifiant IN (SELECT idpublication FROM citations WHERE idutilisateur = $mentioned)";
    }
    if($before != null) {
      if($dejaclause) {
        $sql .= " AND";
      }
      $sql .= " identifiant < $before";
    }
  }
  $sql .= " ORDER BY identifiant DESC LIMIT ".$count;
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $res = $stmt->fetchAll();
  $lesMessages = [];
  foreach ($res as $unMessage) {
    $lesMessages[] = [
      "id" => $unMessage['identifiant'],
      "author" => $unMessage['auteur'],
      "content" => $unMessage['contenu'],
      "datetime" => $unMessage['date']
    ];
  }
  return $lesMessages;
}
