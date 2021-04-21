var currentLocation = location.href;
var tab = document.querySelectorAll("#menu a");
var tabLength = tab.length;
for (let i = 0; i < tabLength; i++) {
  if (tab[i].href === currentLocation) {
    tab[i].parentNode.className = "selected";
  }
}
