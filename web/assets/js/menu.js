var menuCall = document.getElementById('menu-call');
var menu = document.getElementById('menu');
var direction = "right";

menuCall.addEventListener("click", menuTranslateX);

function menuTranslateX() {
  if (direction === 'right') {
    console.log(direction);
    menu.style.transform = "translateX(0px)";
    direction = 'left';
  } else {
    console.log(direction);
    menu.style.transform = "translateX(-170px)";
    direction = 'right';
  }
}
