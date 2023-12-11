const stagiaires = document.querySelectorAll("[name='stagiaires[]']");
document.querySelector("#tickAll").addEventListener("click", () => {
  stagiaires.forEach((stagiaire) => {
    stagiaire.checked = true;
  });
});
