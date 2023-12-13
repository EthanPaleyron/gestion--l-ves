// RETIRATION DES FORMATEUR QUI NE FORME PAS LA FOMATION
const formations = document.querySelectorAll("[name^='id_formations']");
const formateurs = document.querySelectorAll("[name^='formateurs']");
const champsDates = document.querySelectorAll("[name^='date']");
function formateursAttribuer() {
  formateurs.forEach((formateur) => {
    if (
      formateur.dataset.metier != formationValue &&
      formateur.dataset.key == stagiaireValue
    ) {
      formateur.checked = false;
      formateur.setAttribute("disabled", "");
    } else if (
      formateur.dataset.metier == formationValue &&
      formateur.dataset.key == stagiaireValue
    ) {
      formateur.removeAttribute("disabled");
    }
  });
  champsDates.forEach((champsDate) => {
    champsDate.removeAttribute("disabled");
    if (
      champsDate.dataset.metier != formationValue &&
      champsDate.dataset.key == stagiaireValue
    ) {
      champsDate.setAttribute("disabled", "");
    } else if (
      champsDate.dataset.metier == formationValue &&
      champsDate.dataset.key == stagiaireValue
    ) {
      champsDate.removeAttribute("disabled");
    }
  });
}

// CHOIX DI TYPE DE FORMATION
let formationValue;
let stagiaireValue;
formations.forEach((formation) => {
  formationValue = formation.value;
  stagiaireValue = formation.dataset.key;
  formation.addEventListener("input", () => {
    formationValue = formation.value;
    stagiaireValue = formation.dataset.key;
    formateursAttribuer();
  });
});
