var chosenDay = document.getElementById('chosen-day');
var buttonDays = document.getElementsByClassName('day');
var chosenDay = document.getElementById('chosen-day');
var hours = document.getElementsByClassName('hours');

var chosenTime = document.getElementById('chosen-time');
var separator = document.getElementById('separator');
var chosenHour = document.getElementById('chosen-hour');
var chosenMinute = document.getElementById('chosen-minute');

var minutes = document.getElementsByClassName('minutes');
var hourAm = document.getElementsByClassName('hour-am');
var hourPm = document.getElementsByClassName('hour-pm');
var hours = document.getElementsByClassName('hours');

var chosenDuration = document.getElementById('chosen-duration');
var durationHour = document.getElementById('duration-hour');
var durationMinute = document.getElementById('duration-minute');

var durationTime = document.getElementsByClassName('duration-time');

function displayDay() {
  for (var i = 0; i < buttonDays.length; i++) {
    buttonDays[i].addEventListener("click", function(e) {
      var day = e.target.textContent.toLowerCase();
      // Inserts day in clock
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
      chosenDuration.style.display = 'none';
      chosenDay.style.display = 'block';
      chosenDay.style.transform = 'translateY(42px)';
      chosenDay.value = day;
      chosenTime.style.display = 'block';
      chosenHour.value = "";
      chosenMinute.value = "";
      minute = 0;

      var hour = 12;
      // Creates Pm Hours
      for (var i = 0; i < hourPm.length; i++) {
        hourPm[i].style.display = 'block';
        hourPm[i].textContent = hour;
        hour++;
      }
      var hour = 0;
      // Creates Am Hours
      for (var i = 0; i < hourAm.length; i++) {
        hourAm[i].style.display = 'block';
        if (hour < 10) {
          hours[i].textContent = '0' + hour;
        } else {
          hours[i].textContent = hour;
        }
        hour++;
      }
      if (separator.textContent !== ":") {
        var setDelay = setInterval(displaySeparator, 300);
      } else {
        clearInterval(setDelay);
      }
    })
  }
}


function displaySeparator() {
  separator.textContent = ':';
}

for (var i = 0; i < hours.length; i++) {
  var minute = 0;
  var skip = false;
  hours[i].addEventListener("click", function(e) {
    if (minute === 0) {
      chosenHour.value = e.target.textContent;
    } else {
      chosenMinute.value = e.target.textContent;
    }
    // Skip the loop if the first hour circle is already hidden
    if (hours[0].style.display != 'none') {
      for (var i = 0; i < hourAm.length; i++) {
        hours[i].style.display = 'none';
      }
    }
    // Skip the loop if the firt minute circle is already set at 00
    if (minutes[0].textContent != '00') {
      for (var i = 0; i < minutes.length; i++) {
        if (minute < 10) {
          minutes[i].textContent = '0' + minute;
        } else {
          minutes[i].textContent = minute;
        }
        minute += 5;
      }
    }
  });
}

for (var i = 0; i < minutes.length; i++) {
  minutes[i].addEventListener("click", function(e) {
    if (chosenMinute.value > 0 || chosenMinute.value === '00') {
      for (var i = 0; i < minutes.length; i++) {
        minutes[i].style.display = "none";
      }
      chosenDuration.style.display = 'block';
    }
    if (chosenMinute.value > 0 || chosenMinute.value === '00') {}
  });
}

hour = 0;

for (var i = 0; i < durationTime.length; i++) {
  durationTime[i].textContent = hour;
  durationTime[i].addEventListener("click", function(e) {
    durationHour.value = e.target.textContent;
    a();
  })
  hour++;
}

minute = 0;

function a() {
  for (var i = 0; i < durationTime.length; i++) {
    durationTime[i].textContent = minute;
    durationTime[i].addEventListener("click", function(e) {
      durationMinute.value = e.target.textContent;
    })
    minute += 5;
  }
}

console.log(durationHour);





displayDay();
