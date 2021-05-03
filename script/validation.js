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

//validation

//let prenom = document.querySelector("#prenom").value;

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
  let error = document.querySelector("#error").value;

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
  form.submit();
});
