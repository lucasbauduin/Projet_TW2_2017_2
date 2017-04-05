<?php
class Message {
  public $identifiant, $contenu, $auteur, $date;

  public function __construct($identifiant, $contenu, $auteur, $date)
  {
    $this->identifiant = $identifiant;
    $this->contenu = $contenu;
    $this->auteur = $auteur;
    $this->date = $date;
  }
}
