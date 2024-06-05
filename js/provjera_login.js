document.getElementById("submit").onclick = function (event) {
    var kIme = document.getElementById("kIme");
    var kImeSpan = document.getElementById("kImeError");
    var lozinka = document.getElementById("lozinka");
    var lozinkaSpan = document.getElementById("lozinkaError");
    kIme.style.border = "1px solid black";
    kImeSpan.innerHTML = "";
    kImeSpan.style.color = "red";
    lozinka.style.border = "1px solid black";
    lozinkaSpan.innerHTML = "";
    lozinkaSpan.style.color = "red";
    slanjeForme = true;
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

    if (!slanjeForme) event.preventDefault();
}

