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
//text without number and special caractere

function ch(text) {
  var regex = new RegExp(/^[a-zA-ZÀ-ú]{1,30}$/g);
  var match = false;

  if (regex.test(text)) {
    match = true;
  }
  return match;
}
//email format

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
  //let error = document.querySelector("#error").value;
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
  if (ch(prenom) == false) {
    alert("le format du prenom n'est pas correcte");
    valid = false;
  }
  if (ch(nom) == false) {
    alert("le format du Nom n'est pas correcte");
    valid = false;
  }
  if (ch(secteur) == false) {
    alert("le format du Secteur n'est pas correcte");
    valid = false;
  }
  if (ch(poste) == false) {
    alert("le format du Poste n'est pas correcte");
    valid = false;
  }

  if (emailTest(email) == false) {
    alert("le format de l'Email n'est pas correcte");
    valid = false;
  }

  if (tel(telephone) == false) {
    alert("le format du telephone est faux");
    valid = false;
  }

  if (valid) {
    form.submit();
  }
});
