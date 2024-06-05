document.getElementById("submit").onclick = function (event) {
    var naslov = document.getElementById("naslov");
    var naslovSpan = document.getElementById("naslovError");
    var sadrzaj = document.getElementById("sadrzaj");
    var sadrzajSpan = document.getElementById("sadrzajError");
    var tekst = document.getElementById("tekst");
    var tekstSpan = document.getElementById("tekstError");
    var slika = document.getElementById("slika");
    var slikaSpan = document.getElementById("slikaError");
    naslov.style.border = "1px solid black";
    naslovSpan.innerHTML = "";
    naslovSpan.style.color = "red";
    sadrzaj.style.border = "1px solid black";
    sadrzajSpan.innerHTML = "";
    sadrzajSpan.style.color = "red";
    tekst.style.border = "1px solid black";
    tekstSpan.innerHTML = "";
    tekstSpan.style.color = "red";
    slika.style.border = "none";
    slikaSpan.innerHTML = "";
    slikaSpan.style.color = "red";
    slanjeForme = true;
    if (naslov.value.length < 5 || naslov.value.length > 30) {
        naslov.style.border = "1px dashed red";
        naslovSpan.innerHTML = "Naslov vijesti mora imati između 5 i 30 znakova!"
        slanjeForme = false;
    }
    if (sadrzaj.value.length < 10 || sadrzaj.value.length > 100) {
        sadrzaj.style.border = "1px dashed red";
        sadrzajSpan.innerHTML = "Kratki sadržaj mora imati između 10 i 100 znakova!"
        slanjeForme = false;
    }
    if (tekst.value.length == 0) {
        tekst.style.border = "1px dashed red";
        tekstSpan.innerHTML = "Sadržaj mora biti unesen!"
        slanjeForme = false;
    }
    if (slika.value.length == 0) {
        slika.style.border = "1px dashed red";
        slikaSpan.innerHTML = "Slika mora biti unesena!";
        slanjeForme = false;
    }

    if (!slanjeForme) event.preventDefault();
}

