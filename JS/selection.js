const stagiaires = document.querySelectorAll("[name='stagiaires[]']");
const tickAll = document.querySelector("#tickAll");
stagiaires.forEach((stagiaire) => {
  tickAll.addEventListener("click", () => {
    if (stagiaire.checked == false) {
      stagiaire.checked = true;
    } else {
      stagiaire.checked = false;
    }
  });
});
