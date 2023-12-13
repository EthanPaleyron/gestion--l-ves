// CHOIX DI TYPE DE FORMATION
const formations = document.querySelector("#formations");
let formation = formations.value;
formations.addEventListener("input", () => {
  formation = formations.value;
  formateursAttribuer();
});

// RETIRATION DES FORMATEUR QUI NE FORME PAS LA FOMATION
const formateurs = document.querySelectorAll("[name^='formateurs']");
const champsDates = document.querySelectorAll("[name^='date']");
function formateursAttribuer() {
  formateurs.forEach((formateur) => {
    formateur.removeAttribute("disabled");
    if (formateur.dataset.metier != formation) {
      formateur.checked = false;
      formateur.setAttribute("disabled", "");
    }
  });
  champsDates.forEach((champsDate) => {
    champsDate.removeAttribute("disabled");
    if (champsDate.dataset.metier != formation) {
      champsDate.setAttribute("disabled", "");
    }
  });
}
formateursAttribuer();
