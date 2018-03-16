var menu = document.getElementById('menu');
var direction = "right";

menu.addEventListener("click", menuTranslateX);

function menuTranslateX() {
  if (direction === 'right') {
    menu.style.transform = "translate(0px, -5px)";
    direction = 'left';
  } else {
    menu.style.transform = "translate(-199px , -5px)";
    direction = 'right';
  }
}
