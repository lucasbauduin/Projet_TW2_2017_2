<?php
header("Content-type: text/css; charset=iso-8859-1");
$ct = isset($_GET['contraste']) ? (string) $_GET['contraste'] : null;

if($ct != null) {
	$couleurcontraste = '#'.$ct;
} else {
	$couleurcontraste = '#027bfc'; // #ef62a8 0e86fe
}
?>


* {
  margin: 0;
  padding: 0;
}

body {
  color: #14171a;
  background: #f5f8fa;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}

a {
  color: <?php echo $couleurcontraste; ?>;
}

header {
  width: 100%;
  padding: 4px 0;
  box-sizing: border-box;
  background: #ffffff;
  border-bottom: 1px solid #d0d3d5;
  box-shadow: 0 1px #e9ecee;
  margin: 0 0 12px;
}

.bouton {
text-align: center;
}

form input[type="submit"] {
  padding: 6px 20px;
  margin: 12px 0 0;
  background: <?php echo $couleurcontraste; ?>;
  border: none;
  color: #ffffff;
  border-radius: 3px;
  font-size: 14px;
  -webkit-appearance: none;
}

.separation {
  width: 35%;
  margin: 12px auto 0;
  border-bottom: 1px solid #e5ecf0;
}

header .logo {
  width: 42px;
  height: 42px;
  background-color: <?php echo $couleurcontraste; ?>;
  background-repeat: no-repeat;
  background-size: cover;
  background-image: url('../images/logo.png');
  margin: 4px auto;
}

section#infoUtilisateur {
	width: 100%;
	min-height: 220px;
	border-top: 6px solid #ffffff;
	background-color: <?php echo $couleurcontraste; ?>;
	background-image: url('../images/fond.png');
	background-size: cover;
	padding: 0 0 24px;
  box-sizing: border-box;
}

section#infoUtilisateur #img-profil {
	width: 128px;
	height: 128px;
	margin: 24px auto 0;
	background-size: cover;
	border-radius: 50%;
	background-position: center center;
	background-repeat: no-repeat;
	border: 4px solid #ffffff;
}

section#infoUtilisateur #presentation-profil {
	background: #ffffff;
	border-radius: 4px;
	width: 50%;
	margin: 12px auto 0;
	padding: 24px;
	display: block;
  box-sizing: border-box;
}

section#infoUtilisateur #presentation-profil p {
	color: #657786;
	font-size: 14px;
	line-height: 22px;
	font-style: italic;
}

section#infoUtilisateur h1 {
		text-align: center;
		padding: 24px 0 12px;
		font-weight: normal;
		color: rgba(255,255,255, .75);
}

.fix {
  clear: both;
}


.enveloppe {
  width: 990px;
  margin: 0 auto;
}

.menu {
  width: 22%;
  background: #ffffff;
  border: 1px solid #e5ecf0;
  box-sizing: border-box;
  padding: 12px;
  display: block;
  border-radius: 3px;
}

.gauche {
  float: left;
}

.gauche h1 {
  font-size: 1em;
  font-weight: normal;
  padding: 12px 0 24px;
  margin: 0 0 12px;
  border-bottom: 1px solid #e5ecf0;
  text-align: center;
}

.menu .label {
  font-size: 13px;
  color: #657786;
  font-weight: normal;
  padding: 0 0 12px;
  text-align: center;
}

.gauche input[type="text"], .gauche input[type="password"], gauche textarea {
  margin: 0 0 6px;
}

.gauche textarea.description {
  min-height: 120px;
  max-height: 260px;
}

.droite {
  float: right;
}

.principal {
  width: 54%;
  min-height: 120px;
  margin: 0 1% 0 1%;
}

article.publication {
  width: 100%;
  box-sizing: border-box;
  padding: 12px;
  background: #ffffff;
  border: 1px solid #e5ecf0;
  display:inline-block;
  margin: 0 0 6px;
  border-radius: 3px;
  clear: both;
}

article.publication.more {
  background: linear-gradient(#ffffff, #eff3f5);
  margin: 0;
}

article.publication.more a {
  color: #627787;
  text-decoration: none;
}

.chargerplus {
  color: #627787;
  text-shadow: 0 1px #fff;
  font-size: 14px;
  text-align: center;
  box-sizing: border-box;
}

article.publication .contenu {
  margin-left: 58px;
}

div.img-profil-min {
  width: 48px;
  height: 48px;
  border-radius: 5px;
  float: left;
  display: block;
  clear: both;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
}

.menu .img-profil-min, article.publiform .img-profil-min {
  width: 32px;
  height: 32px;
}

article.publiform {
  border: 1px solid #dcdcdc;
  box-shadow: 0 0 2px 2px #e9ecee;


}
article.publiform .contenu {
  margin-left: 44px;
}

article.publiform input[type="text"] {
  width: 100%;
  max-width: 100%;
  box-sizing: border-box;
  padding: 8px 6px;
  border: 1px solid #EDEDED;
  font-size: 13px;
  -webkit-appearance: none;
  -webkit-border-radius: 0;

  border-radius: 3px;
}

.menu ul#listeUtilisateurs {
	max-height: 210px;
	overflow-y: scroll;
	padding-left: 9Px;
	box-shadow: 0 0 2px #e9ecee inset;
  border: 1px solid #e5ecf0;
}

.menu ul#listeUtilisateurs li {
  vertical-align: middle;
  display: block;
  clear: both;
  line-height: 32px;
  font-size: 14px;
  padding: 6px 0;
  box-sizing: border-box;
  border-bottom: 1px solid #fcfcfc;
}

.menu ul#listeUtilisateurs li:last-child {
  border: none;
}

.menu ul#listeUtilisateurs li div.nom {
  margin: 0 0 0 6px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  width: 135px;
  float: left;
}

article .info-profil {
  font-size: 1.05em;
  display: block;
  font-size: 14px;
  line-height: 20px;
  color: #657786;
}

article .info-profil .nom-profil {
  font-weight: bold;
  color: #14171a;
  line-height: 16px;
}

article .contenu {
  line-height: 18px;
}

article .contenu p {
  font-size: 14px;
}

.menu .rechercheUtilisateurs {
  width: 100%;
  box-sizing: border-box;
  margin: 0 0 6px;
}

.menu input[type="text"], .menu input[type="password"], .menu textarea {
  width: 100%;
  max-width: 100%;
  box-sizing: border-box;
  padding: 6px;
  border: 1px solid #e5ecf0;
  border-radius: 3px;
  -webkit-appearance: none;
  -webkit-border-radius: 0;
  border-radius: 3px;
}


.menu {
  margin-bottom: 12px;
}

p.copyright {
    font-size: 12.2px;
    color: #657786;
    text-align: left;
    line-height: 18px;
}

.pseudo {
  font-size: 13px;
  color: #657786;
  font-weight: normal;
  margin: 0 0 0 6px;
}

footer {
  width: 100%;
  text-align: center;
  font-size: 14px;
  color: #657786;
  padding: 24px 0;
  text-shadow: 0 1px #fff;
}



@media screen and (max-width: 1024px) {
  .enveloppe {
      width: 100%;
  }

  .principal, .menu {
    width: 92%;
    margin: 0 4% 12px;
  }

  .menu ul#listeUtilisateurs li div.nom {
    width: 60%;
  }

  .menu input[type="text"], .menu input[type="password"] {
		padding: 12px 6px;
	}

	section#infoUtilisateur #presentation-profil {
		width: 80%;
	}

}
