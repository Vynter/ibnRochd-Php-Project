var modal = document.querySelector(".box-modale");
var overlay = document.querySelector(".overlay");
var btn = document.querySelector(".btn");

var submit = document.querySelector("#sbmt");

submit.addEventListener("click", function (e) {
  e.preventDefault();
  console.log(prenom);
  modal.style.display = "flex";
});

overlay.addEventListener("click", function () {
  modal.style.display = "none";
});

btn.addEventListener("click", function () {
  modal.style.display = "none";
});

//validation

let prenom = document.querySelector("#prenom").value;
let prenom = document.querySelector("#prenom").value;
let prenom = document.querySelector("#prenom").value;
let prenom = document.querySelector("#prenom").value;
let prenom = document.querySelector("#prenom").value;
console.log(prenom);
