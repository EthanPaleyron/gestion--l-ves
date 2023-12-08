// CHOIX DI TYPE DE FORMATION
const formations = document.querySelector("#formations");
let formation = formations.value;
formations.addEventListener("change", () => {
  formation = formations.value;
  formateursAttribuer();
});

// RETIRATION DES FORMATEUR QUI NE FORME PAS LA FOMATION
const formateurs = document.getElementsByName("formateurs[]");
function formateursAttribuer() {
  formateurs.forEach((formateur) => {
    formateur.removeAttribute("disabled");
    if (formateur.dataset.metier == formation) {
      formateur.setAttribute("disabled", "");
    }
  });
}
formateursAttribuer();

// VERIFICATION DE LA DATE VERIFIE SI ELLE EST PLUS PETIT QUE CELLE D'AUJOURD'HUI
const dates = document.querySelectorAll("input[name^='date']");
const dateNow = new Date();
console.log();
dates.forEach((date) => {
  date.addEventListener("input", () => {
    let lastValue = date.value;
    if (date.value < dateNow.toLocaleDateString()) {
      date.value = lastValue;
    }
    console.log(date.value);
  });
});

// VERIFIE SI LE DEBUT DATE N'EST PAS PLUS GRANDE QUE LA FIN DE DATE OU SI LA DATE DE FIN N'EST PAS PLUS PETIT QUE LA DATE DE DEBUT
