var devismodal = document.getElementById("devismodal");
var devisbtn = document.getElementById("devisbtn");

var closedevis = document.getElementById("closedevis");
var devisspan = document.getElementsByClassName("close")[0];

devisbtn.onclick = function () {
    devismodal.style.display = "block";
}

devisspan.onclick = function () {
    devismodal.style.display = "none";
}

closedevis.onclick = function () {
    devismodal.style.display = "none";
}