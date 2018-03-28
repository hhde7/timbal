var menu = document.getElementById('menu');
var direction = "right";

menu.addEventListener("click", menuTranslateX);

function menuTranslateX() {
  if (direction === 'right') {
    menu.style.transform = "translate(0px, -25px)";
    direction = 'left';
  } else {
    menu.style.transform = "translate(-100%, -25px)";
    direction = 'right';
  }
}

function courseColor() {
  var courses = document.getElementsByClassName('course-menu');
  var days = document.getElementsByClassName('course-day');

  for (var i = 0; i < days.length; i++) {
    switch (days[i].textContent) {
      case "Monday":
        courses[i].style.backgroundColor = "darksalmon";
        break;
      case "Thursday":
        courses[i].style.backgroundColor = "lightgreen";
        break;
      case "Wednesday":
        courses[i].style.backgroundColor = "lightblue";
        break;
      case "Tuesday":
        courses[i].style.backgroundColor = "lightpink";
        break;
      case "Friday":
        courses[i].style.backgroundColor = "gold";
        break;

      default:

    }

  }
}

courseColor();
