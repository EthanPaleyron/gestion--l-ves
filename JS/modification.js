// CHOIX DI TYPE DE FORMATION
const formations = document.querySelectorAll("[name^='id_formations']");
let formationValue;
console.log(formations);
formations.forEach((formation, index) => {
  formationValue = formation.value;
  formation.addEventListener("input", () => {
    formationValue = formation.value;
    formateursAttribuer();
  });

  // RETIRATION DES FORMATEUR QUI NE FORME PAS LA FOMATION
  const formateurs = document.querySelectorAll("[name^='formateurs']");
  const champsDates = document.querySelectorAll("[name^='date']");
  const keys = document.querySelectorAll(".fomateurs");
  keys.forEach((key) => {
    function formateursAttribuer() {
      formateurs.forEach((formateur) => {
        formateur.removeAttribute("disabled");
        if (formateur.dataset.metier != formationValue && index == key) {
          formateur.checked = false;
          formateur.setAttribute("disabled", "");
        }
      });
      champsDates.forEach((champsDate) => {
        champsDate.removeAttribute("disabled");
        if (champsDate.dataset.metier != formationValue && index == key) {
          champsDate.setAttribute("disabled", "");
        }
      });
    }
    formateursAttribuer();
  });
});
