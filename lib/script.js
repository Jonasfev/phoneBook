function newPopup() {
    varWindow = window.open('popup.html', 'popup');
}

var input = document.getElementById("myInput");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("myBtn").click();
  }
});

document.getElementById("dub-arrow").onclick = function () {
  location.href = "logoff.php";
}
