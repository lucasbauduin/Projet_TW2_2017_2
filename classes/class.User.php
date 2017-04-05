<?php
/**
 *
 */
class User
{
  private $identifiant, $pseudo, $nom, $presentation, $imagedeprofil
  function __construct($identifiant, $pseudo, $nom, $presentation)
  {
    $this->identifiant = $identifiant;
    $this->pseudo = $pseudo;
    $this->nom = $nom;
    $this->presentation = $presentation;
  }
}
