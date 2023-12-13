// VERIFICATION DE LA DATE VERIFIE SI ELLE EST PLUS PETIT QUE CELLE D'AUJOURD'HUI
const dates = document.querySelectorAll("input[name^='date']");
const dateAujourdhui = new Date();
dates.forEach((date) => {
  date.addEventListener("input", () => {
    let dateValue = new Date(date.value);
    if (dateValue < dateAujourdhui) {
      let formatDate = dateAujourdhui.toISOString().slice(0, 10);
      date.value = formatDate;
    }
  });
});

// VERIFIE SI LE DEBUT DATE N'EST PAS PLUS GRANDE QUE LA FIN DE DATE OU SI LA DATE DE FIN N'EST PAS PLUS PETIT QUE LA DATE DE DEBUT
const datesDebut = document.querySelectorAll("input[name^='date_debut']");
const datesFin = document.querySelectorAll("input[name^='date_fin']");
datesDebut.forEach((dateDebut) => {
  dateDebut.addEventListener("input", () => {
    let dateDebutValue = new Date(dateDebut.value);
    datesFin.forEach((dateFin) => {
      let dateFinValue = new Date(dateFin.value);
      if (dateDebutValue > dateFinValue) {
        dateFin.value = dateDebut.value;
      }
    });
  });
});
datesFin.forEach((dateFin) => {
  dateFin.addEventListener("input", () => {
    let dateFinValue = new Date(dateFin.value);
    datesDebut.forEach((dateDebut) => {
      let dateDebutValue = new Date(dateDebut.value);
      if (dateFinValue < dateDebutValue) {
        dateDebut.value = dateFin.value;
      }
    });
  });
});
