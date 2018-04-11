var menu = document.getElementById('menu');
var direction = "right";

menu.addEventListener("click", menuTranslateX);

function menuTranslateX() {
  if (direction === 'right') {
    menu.style.transform = "translate(0px, -25px)";
    direction = 'left';
  } else if (direction === 'left') {
    menu.style.transform = "translate(-100%, -25px)";
    direction = 'right';
  }
}

function columnWidth() {
  var column = $('.time-table');
  var numberOfColumn = $('.course-day');
  var n = numberOfColumn.length;
  column.css('width', 100 / n + '%');
}

function dayColor() {
  var courses = document.getElementsByClassName('course-menu');
  var courseDays = document.getElementsByClassName('course-day');

  for (var i = 0; i < courseDays.length; i++) {
    switch (courseDays[i].textContent) {
      case "Monday":
        courseDays[i].style.backgroundColor = "rgba(173, 230, 39, 0.76)";
        break;
      case "Tuesday":
        courseDays[i].style.backgroundColor = "rgba(12, 186, 255, 0.65)";
        break;
      case "Wednesday":
        courseDays[i].style.backgroundColor = "rgba(14, 191, 109, 0.78)";
        break;
      case "Thursday":
        courseDays[i].style.backgroundColor = "rgba(255, 81, 64, 0.72)";
        break;
      case "Friday":
        courseDays[i].style.backgroundColor = "rgba(204, 20, 55, 0.68)";
        break;
      case "Saturday":
        courseDays[i].style.backgroundColor = "rgba(102, 63, 158, 0.7)";
        break;
      case "Sunday":
        courseDays[i].style.backgroundColor = "rgb(239, 190, 24)";
        break;

      default:

    }

  }
}

dayColor();
columnWidth();
