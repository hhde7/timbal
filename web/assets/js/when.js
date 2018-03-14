var chosenDay = document.getElementById('chosen-day');
var buttonDays = document.getElementsByClassName('day');
var chosenDay = document.getElementById('chosen-day');
var hours = document.getElementsByClassName('hours');
var chosenHour = document.getElementById('chosen-hour');
var chosenMinute = document.getElementById('chosen-minute');
var minutes = document.getElementsByClassName('minutes');
var hourAm = document.getElementsByClassName('hour-am');
var hourPm = document.getElementsByClassName('hour-pm');
var hours = document.getElementsByClassName('hours');

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
    chosenHour.textContent = "";
    chosenMinute.textContent = "";
    minute = 0;

    var hour = 12;

    for (var i = 0; i < hourPm.length; i++) {
      hourPm[i].style.display = 'block';
      hourPm[i].textContent = hour;
      hour++;
    }
    var hour = 0;
    for (var i = 0; i < hourAm.length; i++) {
      hourAm[i].style.display = 'block';
      if (hour < 10) {
        hours[i].textContent = '0' + hour;
      } else {
        hours[i].textContent = hour;
      }
      hour++;
    }

  })
}

for (var i = 0; i < hours.length; i++) {
  var minute = 0;
  hours[i].addEventListener("click", function(e) {
    if (minute === 0) {
      chosenHour.textContent = e.target.textContent;
    } else {
      chosenMinute.textContent = e.target.textContent;
    }
    for (var i = 0; i < hourAm.length; i++) {
      hours[i].style.display = 'none';

    }
    for (var i = 0; i < minutes.length; i++) {
      if (minute < 10) {
        minutes[i].textContent = '0' + minute;
      } else {
        minutes[i].textContent = minute;
      }
      minute += 5;
    }
  });
}

for (var i = 0; i < minutes.length; i++) {
  minutes[i].addEventListener("click", function(e) {
    console.log(chosenMinute.textContent);
    if (chosenMinute.textContent > 0 || chosenMinute.textContent === '00') {
      for (var i = 0; i < minutes.length; i++) {
        minutes[i].style.display = "none";
      }
    }
  })
}
