// Função para abrir ou fechar o menu em telas pequenas com um clique.
function openMobileMenu() {
  let navMobile = document.getElementById("navMobile");
  if (navMobile.className.indexOf("w3-show") == -1) {
    navMobile.className += " w3-show";
  } else {
    navMobile.className = navMobile.className.replace(" w3-show", "");
  }
}

//Função para abrir ou fechar o submenu em telas pequenas.
function openSubMenu(subMenuName) {
  let submenu = document.getElementById(subMenuName);
  if(submenu.style.display == "none") {
    submenu.style.display = "block";
  } else {
    submenu.style.display = "none";
  }
}