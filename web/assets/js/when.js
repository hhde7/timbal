var chosenDay = document.getElementById('chosen-day');
var buttonDays = document.getElementsByClassName('day');
var chosenDay = document.getElementById('chosen-day');
var hours = document.getElementsByClassName('hours');
var chosenHour = document.getElementById('chosen-hour');
var chosenMinutes = document.getElementById('chosen-minutes');

for (var i = 0; i < buttonDays.length; i++) {
  buttonDays[i].addEventListener("click", function(e) {
    var day = e.target.textContent.toLowerCase();
    switch (day) {
      case 'm':
        day = "Monday";
        break;
      case 't':
        day = "Tuesday";
        break;
      case 'w':
        day = "Wednesday";
        break;
      case 'th':
        day = "Thursday";
        break;
      case 'f':
        day = "Friday";
        break;
      case 's':
        day = "Saturday";
        break;
      case 'sn':
        day = "Sunday";
        break;
      default:
        day = "What ?";
    }
    chosenDay.textContent = day;
  })
}

for (var i = 0; i < hours.length; i++) {
  hours[i].addEventListener("click", function(e) {
    chosenHour.textContent = e.target.textContent + ' ' + e.target.textContent;
  });
}
