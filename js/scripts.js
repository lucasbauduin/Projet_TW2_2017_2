var searched = document.getElementById('searched');
searched.addEventListener('keyup',function(){
  var listeUtilisateurs = document.querySelector('ul#listeUtilisateurs');
  listeUtilisateurs.textContent = "";
  findUtilisateurs(searched.value);

});

function chargeAccueil() {
  getMessages(null, null, null, null, 4);
  findUtilisateurs("");
}

function getMessages(author, follower, mentioned, before, count) {
  var requeteM = new XMLHttpRequest();
  requeteM.open("GET", "http://192.168.0.251:8888/tw2_projet2/services/findMessages.php?author="+author+"&follower="+follower+"&mentioned="+mentioned+"&before="+before+"&count="+count, true);
  requeteM.addEventListener("load", traitePublications);
  requeteM.addEventListener("error", traiteErreur);
  requeteM.send(null);
}

function getAuteursPublications() {
  var requeteA = new XMLHttpRequest();
  requeteA.open("GET", "http://192.168.0.251:8888/tw2_projet2/services/findUsers.php", true);
  requeteA.addEventListener("load", traiteAuteursPublications);
  requeteA.addEventListener("error", traiteErreur);
  requeteA.send(null);
}

function findUtilisateurs(searched) {
  var requeteU = new XMLHttpRequest();
  requeteU.open("GET", "http://192.168.0.251:8888/tw2_projet2/services/findUsers.php?searched="+searched);
  requeteU.addEventListener("load", traiteRechercheUtilisateurs);
  requeteU.addEventListener("error", traiteErreur);
  requeteU.send(null);
}

function traitePublications(ev) {
  var lesPublications = JSON.parse(this.responseText);
  var blocListePublications = document.querySelector("div#listePublications");


  var i;
  for(i = 0; i < lesPublications.result.list.length; i++) {
    var article = document.createElement("article");
    article.classList.add("publication");
    article.setAttribute('id', lesPublications.result.list[i].id);
    var nom_profil = document.createElement("span");
    nom_profil.classList.add("nom-profil");
    nom_profil.setAttribute('id', lesPublications.result.list[i].author);
    var info_profil = document.createElement("div");
    info_profil.classList.add("info-profil");
    var info_profil_2 = document.createElement("div");
    info_profil_2.classList.add("info-profil");
    info_profil_2.classList.add("date");
    info_profil_2.textContent = lesPublications.result.list[i].datetime;
    var img_profil_min = document.createElement("div");
    img_profil_min.classList.add("img-profil-min");
    img_profil_min.style.backgroundImage = "url('images/"+lesPublications.result.list[i].author+".jpg')";
    var contenu = document.createElement("div");
    contenu.classList.add("contenu");
    var p = document.createElement("p");
    p.textContent = lesPublications.result.list[i].content;

    article.appendChild(img_profil_min);
    info_profil.appendChild(nom_profil);
    contenu.appendChild(info_profil);
    contenu.appendChild(info_profil_2);
    contenu.appendChild(p);
    article.appendChild(contenu);
    blocListePublications.appendChild(article);
    getAuteursPublications();
  }

  if(lesPublications.result.hasMore == false) {
    var article = document.createElement("article");
    article.classList.add("publication");
    article.classList.add("more");
    article.setAttribute('id', "voirplus");

    var chargerplus = document.createElement("div");
    var article = document.createElement("article");
    article.classList.add("publication");
    article.classList.add("more");
    article.setAttribute('id', "voirplus");
    var chargerplus = document.createElement("div");
    var text = document.createElement("span");
    chargerplus.classList.add("chargerplus");
    text.textContent = "Il n'a pas d'autre contenu";
    chargerplus.appendChild(text);
    article.appendChild(chargerplus);
    document.querySelector("div#parentvoirplus").appendChild(article);
    var dernierchargerplus = document.querySelector("article#voirplus");
    dernierchargerplus.parentNode.replaceChild(article, dernierchargerplus);
  } else {
    var article = document.createElement("article");
    article.classList.add("publication");
    article.classList.add("more");
    article.setAttribute('id', "voirplus");
    var chargerplus = document.createElement("div");
    var lien = document.createElement("a");
    lien.setAttribute('href', "javascript:getMessages(null, null, null, "+(lesPublications.result.list[i-1].id)+", 4)");
    chargerplus.classList.add("chargerplus");
    lien.textContent = "Je veux en voir plus !";
    chargerplus.appendChild(lien);
    article.appendChild(chargerplus);
    document.querySelector("div#parentvoirplus").appendChild(article);
    var dernierchargerplus = document.querySelector("article#voirplus");
    dernierchargerplus.parentNode.replaceChild(article, dernierchargerplus);
  }
}

function traiteAuteursPublications(ev) {
  var lesUtilisateurs = JSON.parse(this.responseText);
  var listeBlocsNoms = document.getElementsByClassName('nom-profil');
  for(var i=0; i<lesUtilisateurs.result.list.length; i++) {
    for(var j=0; j<listeBlocsNoms.length; j++) {
      if(lesUtilisateurs.result.list[i].ident == listeBlocsNoms[j].getAttribute("id")) {
        var pseudo = document.createElement("span");
        pseudo.classList.add("pseudo");
        pseudo.textContent = "@"+lesUtilisateurs.result.list[i].ident;
        listeBlocsNoms[j].textContent = lesUtilisateurs.result.list[i].name;
        listeBlocsNoms[j].appendChild(pseudo);
      }
    }
  }
}


function traiteRechercheUtilisateurs(ev) {
  var lesUtilisateurs = JSON.parse(this.responseText);
  var listeUtilisateurs = document.querySelector('ul#listeUtilisateurs');
  if(lesUtilisateurs.status == "ok") {
    listeUtilisateurs.textContent = "";
    for(var i=0; i<lesUtilisateurs.result.list.length; i++) {
      var nom = document.createElement("div");
      nom.classList.add("nom");
      var pseudo = document.createElement("span");
      pseudo.classList.add("pseudo");
      pseudo.textContent = "@"+lesUtilisateurs.result.list[i].ident;
      nom.textContent = lesUtilisateurs.result.list[i].name;
      var fix = document.createElement("div");
      fix.classList.add("fix");
      var img_profil_min = document.createElement("div");
      img_profil_min.classList.add("img-profil-min");
      img_profil_min.style.backgroundImage = "url('images/"+lesUtilisateurs.result.list[i].ident+".jpg')";
      var li = document.createElement("li");


      nom.appendChild(pseudo);
      li.appendChild(img_profil_min);
      li.appendChild(nom);
      li.appendChild(fix);
      listeUtilisateurs.appendChild(li);
    }
  } else {
    var message = document.createElement("div");
    message.classList.add("chargerplus");
    message.textContent = "Aucun résultat.";
    var li = document.createElement("li");
    li.appendChild(message);
    listeUtilisateurs.appendChild(li);
  }
}

function traiteErreur(ev) {
  alert("erreur");
}
