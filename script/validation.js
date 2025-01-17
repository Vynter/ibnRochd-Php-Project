var modal = document.querySelector(".box-modale");
var overlay = document.querySelector(".overlay");
var btn = document.querySelector(".btn");
var form = document.getElementById("myForm");
console.log(form);

var submit = document.querySelector("#sbmt");

overlay.addEventListener("click", function () {
  modal.style.display = "none";
});

btn.addEventListener("click", function () {
  modal.style.display = "none";
});

//regex

//telephone
function tel(num) {
  var regex = new RegExp(/^(0)[0-9]{9}$/);
  var match = false;
  var numr = parseInt(num);

  if (regex.test(num)) {
    match = true;
  }
  return match;
}

//email
function emailTest(text) {
  var regex = new RegExp(
    /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
  );
  var match = false;

  if (regex.test(text)) {
    match = true;
  }
  return match;
}

//validation

submit.addEventListener("click", function (e) {
  e.preventDefault();

  let prenom = document.querySelector("#prenom").value;
  let nom = document.querySelector("#nom").value;
  let telephone = document.querySelector("#telephone").value;
  let email = document.querySelector("#email").value;
  let permis = document.querySelector("#permis").value;
  let lng = document.querySelector("#lng").value;
  let log = document.querySelector("#log").value;
  let dateD = document.querySelector("#dateD").value;
  let dateF = document.querySelector("#dateF").value;
  let entreprise = document.querySelector("#entreprise").value;
  let secteur = document.querySelector("#secteur").value;
  let poste = document.querySelector("#poste").value;
  let mission = document.querySelector("#mission").value;
  let diplome = document.querySelector("#diplome").value;
  let etablissement = document.querySelector("#etablissement").value;
  let loisir = document.querySelector("#loisir").value;
  let adresse = document.querySelector("#adresse").value;

  let valid = true;

  if (
    prenom == "" ||
    nom == "" ||
    telephone == "" ||
    email == "" ||
    permis == "" ||
    lng == "" ||
    log == "" ||
    dateD == "" ||
    dateF == "" ||
    entreprise == "" ||
    secteur == "" ||
    poste == "" ||
    mission == "" ||
    diplome == "" ||
    etablissement == "" ||
    loisir == ""
  ) {
    modal.style.display = "flex";
    console.log("submit done");
    return false;
  }

  if (emailTest(email) == false) {
    alert("le format de l'Email n'est pas correcte");
    valid = false;
  }

  if (tel(telephone) == false) {
    alert("le format du telephone est faux");
    valid = false;
  }

  if (nom.length > 25) {
    alert("Le nom ne doit pas dépasser une longueur de 25");
    valid = false;
  }
  if (prenom.length > 25) {
    alert("Le prénom ne doit pas dépasser une longueur de 25");
    valid = false;
  }
  if (adresse.length > 25) {
    alert("Le adresse ne doit pas dépasser une longueur de 25");
    valid = false;
  }
  if (email.length > 35) {
    alert("Le adresse email ne doit pas dépasser une longueur de 35");
    valid = false;
  }

  if (entreprise.length > 25) {
    alert("Le nom de l'entreprise ne doit pas dépasser une longueur de 25");
    valid = false;
  }

  if (secteur.length > 25) {
    alert("Le nom du secteur ne doit pas dépasser une longueur de 25");
    valid = false;
  }

  if (poste.length > 35) {
    alert("Le titre du poste ne doit pas dépasser une longueur de 35");
    valid = false;
  }

  if (diplome.length > 35) {
    alert("Le titre du diplome ne doit pas dépasser une longueur de 35");
    valid = false;
  }

  if (etablissement.length > 35) {
    alert("Le nom de l'établissement ne doit pas dépasser une longueur de 35");
    valid = false;
  }

  if (valid) {
    form.submit();
  }
});
