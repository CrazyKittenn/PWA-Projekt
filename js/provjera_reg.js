document.getElementById("submit").onclick = function (event) {
    var ime = document.getElementById("ime");
    var imeSpan = document.getElementById("imeError");
    var prezime = document.getElementById("prezime");
    var prezimeSpan = document.getElementById("prezimeError");
    var kIme = document.getElementById("kIme");
    var kImeSpan = document.getElementById("kImeError");
    var lozinka = document.getElementById("lozinka");
    var lozinkaSpan = document.getElementById("lozinkaError");
    var lozinkaP = document.getElementById("lozinkaP");
    var lozinkaPSpan = document.getElementById("lozinkaPError");
    ime.style.border = "1px solid black";
    imeSpan.innerHTML = "";
    imeSpan.style.color = "red";
    prezime.style.border = "1px solid black";
    prezimeSpan.innerHTML = "";
    prezimeSpan.style.color = "red";
    kIme.style.border = "1px solid black";
    kImeSpan.innerHTML = "";
    kImeSpan.style.color = "red";
    lozinka.style.border = "1px solid black";
    lozinkaSpan.innerHTML = "";
    lozinkaSpan.style.color = "red";
    lozinkaP.style.border = "1px solid black";
    lozinkaPSpan.innerHTML = "";
    lozinkaPSpan.style.color = "red";
    slanjeForme = true;
    if (ime.value == "") {
        ime.style.border = "1px dashed red";
        imeSpan.innerHTML = "Ime mora biti uneseno!"
        slanjeForme = false;
    }
    if (prezime.value == "") {
        prezime.style.border = "1px dashed red";
        prezimeSpan.innerHTML = "Prezime mora biti uneseno!"
        slanjeForme = false;
    }
    if (kIme.value == "") {
        kIme.style.border = "1px dashed red";
        kImeSpan.innerHTML = "Korisničko ime mora biti uneseno!"
        slanjeForme = false;
    }
    if (lozinka.value == "") {
        lozinka.style.border = "1px dashed red";
        lozinkaSpan.innerHTML = "Lozinka mora biti unesena!"
        slanjeForme = false;
    }
    if (lozinkaP.value == "") {
        lozinkaP.style.border = "1px dashed red";
        lozinkaPSpan.innerHTML = "Ponovljena lozinka mora biti unesena!";
        slanjeForme = false;
    }
    else if (lozinka.value != lozinkaP.value) {
        lozinka.style.border = "1px dashed red";
        lozinkaP.style.border = "1px dashed red";
        lozinkaPSpan.innerHTML = "Ponovljena lozinka mora biti ista kao i lozinka!";
        slanjeForme = false;
    }

    if (!slanjeForme) event.preventDefault();
}

