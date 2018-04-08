var notification = document.getElementById('notification');
var daysButtons = document.getElementsByClassName('day');
var chosenDay = document.getElementById('lfp_timbalbundle_course_day');
var chosenTime = document.getElementById('chosen-time');
var timeSeparator = document.getElementById('time-separator');
var time = document.getElementsByClassName('time');
var hourPm = document.getElementsByClassName('hour-pm');
var hourAm = document.getElementsByClassName('hour-am');
var chosenHour = document.getElementById('lfp_timbalbundle_course_chosenHour');
var chosenMinute = document.getElementById('lfp_timbalbundle_course_chosenMinute');
var innerCircle = document.getElementById('inner-circle');
var outerCircle = document.getElementById('outer-circle');
var chosenDuration = document.getElementById('chosen-duration');
var maxHourDuration = 4;
var durationTime = document.getElementsByClassName('duration-time');
var durationHour = document.getElementById('lfp_timbalbundle_course_durationHour');
var durationMinute = document.getElementById('lfp_timbalbundle_course_durationMinute');
var courseDuration = document.getElementById('course-duration');
var underClock = document.getElementById('under-clock');
var addThisCourseBtn = document.getElementsByClassName('save')[0];

var clock = {
  // Clock launch
  start: function() {
    clock.displayDay();
    clock.flashMessage();
  },
  // Inserts the day in the clock, according to the pressed day button
  displayDay: function() {
    // A click on days buttons reset the clock system
    for (var i = 0; i < daysButtons.length; i++) {
      daysButtons[i].addEventListener("click", function(e) {
        if (chosenDay.value === "Day ?") {
          chosenDay.style.transform = "translate(0, -320%)";
          clock.displayTimeSeparator();
          clock.bubblesBuilder("blue");
          clock.bubblesBuilder("pink");
          clock.displayBubbles("hours");
        } else if (chosenDay.value != "" &&
          chosenHour.value != "" ||
          chosenMinute.value != "" ||
          durationHour.value != "") {

          clock.deleteChild();
          clock.bubblesBuilder("blue");
          clock.bubblesBuilder("pink");
          clock.displayBubbles("hours");
        }
        chosenDay.value = e.target.title;
        chosenHour.value = "";
        chosenMinute.value = "";
        durationHour.value = "";
        durationMinute.value = "";
        courseDuration.style.display = "none";
        addThisCourseBtn.style.cursor = "not-allowed";
        addThisCourseBtn.setAttribute("disabled", true);
        addThisCourseBtn.setAttribute("title", "Fill time first");
      });
    }
  },
  // Sets delay on the display of time separator ':', after day slide-up
  // NOTE: inversion naming displayTimeSeparator et delayDisplayTS
  displayTimeSeparator: function() {
    if (timeSeparator.textContent === "") {
      var setDelay = setTimeout(this.delayDisplayTS, 300);
    } else {
      // Skip delayDisplayTS, timeSeparator.textContent already sets
    }
  },
  // Displays time separator
  delayDisplayTS() {
    chosenTime.style.display = "block";
    timeSeparator.textContent = ':';
    timeSeparator.style.display = "block";
    timeSeparator.style.color = "grey";
    timeSeparator.style.transform = "translateY(83px)";
  },
  // Displays am and pm hours and sets listeners
  bubblesBuilder: function(color) {
    // Creates bubbles html elements
    var minute = 0;
    var hour = 0;

    if (color === "blue") {
      // Blue bubbles
      for (var i = 12; i < 24; i++) {
        var buttonElt = document.createElement('button');
        buttonElt.setAttribute("type", "button");
        buttonElt.setAttribute("name", "button");
        buttonElt.setAttribute("class", "hour-pm time minutes hour-" + i);
        // Sets id on each bubble
        if (i < 14) {
          buttonElt.id = "minute-0" + minute;
        } else {
          buttonElt.id = "minute-" + minute;
        }
        minute += 5;
        outerCircle.appendChild(buttonElt);
      }
    } else if (color === "pink") {
      // Pink bubbles
      for (var i = 0; i < 12; i++) {
        var buttonElt = document.createElement('button');
        buttonElt.setAttribute("type", "button");
        buttonElt.setAttribute("name", "button");
        buttonElt.setAttribute("class", "hour-am time");
        // Sets id on each bubble
        if (i < 10) {
          buttonElt.id = "hour-0" + hour;
        } else {
          buttonElt.id = "hour-" + hour;
        }
        hour++;
        innerCircle.appendChild(buttonElt);
      }
    } else if (color === "white-DH") {
      // White duration hours bubbles, with limited hours to maxHourDuration
      for (var i = 1; i < maxHourDuration + 1; i++) {
        var buttonElt = document.createElement('button');
        buttonElt.setAttribute("type", "button");
        buttonElt.setAttribute("name", "button");
        buttonElt.setAttribute("class", "duration-time");
        // Sets id on each bubble
        if (i < 10) {
          buttonElt.id = "duration-0" + i;
        } else {
          buttonElt.id = "duration-" + i;
        }
        chosenDuration.appendChild(buttonElt);
      }
    } else if (color === "white-DM") {
      // White duration minutes bubbles
      for (var i = 0; i < 12; i++) {
        var buttonElt = document.createElement('button');
        buttonElt.setAttribute("type", "button");
        buttonElt.setAttribute("name", "button");
        buttonElt.setAttribute("class", "duration-time");
        // Sets id on each bubble
        if (i < 10) {
          buttonElt.id = "duration-0" + i;
        } else {
          buttonElt.id = "duration-" + i;
        }
        chosenDuration.appendChild(buttonElt);
      }
    }
  },
  displayBubbles: function(type) {
    if (type === "hours") {
      clock.setHoursBubbles();
    } else if (type === "minutes") {
      clock.bubblesBuilder("blue");
      clock.setMinutesBubbles();
    } else if (type === "white-DH") {
      clock.bubblesBuilder("white-DH");
      clock.setDHBubbles();
      courseDuration.style.display = "block";
    } else if (type === "white-DM") {
      clock.bubblesBuilder("white-DM");
      clock.setDMBubbles();
    }
  },
  setHoursBubbles: function() {
    // Sets pink bubbles
    for (var i = 0; i < 12; i++) {
      time[i].textContent = time[i].id.slice(5, 8);
      time[i].style.display = "block";
    };
    // Sets blue bubbles
    for (var i = 12; i < 24; i++) {
      time[i].textContent = time[i].getAttribute("class").slice(26, 28);
      time[i].style.display = "block";
    }
    clock.setHoursListeners(true);

  },
  setHoursListeners: function(state) {
    for (var i = 0; i < time.length; i++) {
      time[i].addEventListener("click", function(e) {
        if (state === true) {
          //chosenHour.textContent = e.target.textContent;
          chosenHour.style.display = "block";
          // underClock.style.top = "66px";
          chosenHour.value = e.target.textContent;
          clock.deleteChild();
          clock.displayBubbles("minutes");
        }
      });
    }
  },
  setMinutesBubbles: function() {
    // Sets blue bubbles
    for (var i = 0; i < 12; i++) {
      time[i].textContent = time[i].id.slice(7, 9);
      time[i].style.display = "block";
    }
    clock.setMinutesListeners(true);
  },
  setMinutesListeners: function(state) {
    for (var i = 0; i < time.length; i++) {
      time[i].addEventListener("click", function(e) {
        if (state === true) {
          chosenMinute.style.display = "block";
          // underClock.style.top = "16px";
          chosenMinute.value = e.target.textContent;
          clock.deleteChild();
          clock.displayBubbles("white-DH");
        }
      });
    }
  },
  setDHBubbles: function() {
    // Sets white duration hours bubbles
    for (var i = 0; i < maxHourDuration; i++) {
      durationTime[i].textContent = durationTime[i].id.slice(9, 11);
      durationTime[i].style.display = "block";
    }
    clock.setDHListeners(true);
  },
  setDHListeners: function(state) {
    for (var i = 0; i < durationTime.length; i++) {
      durationTime[i].addEventListener("click", function(e) {
        if (state === true) {
          durationHour.style.display = "block";
          // underClock.style.top = "-18px";
          durationHour.value = e.target.textContent;
          clock.deleteChild();
          clock.displayBubbles("white-DM");
        }
      });
    }
  },
  setDMBubbles: function() {
    var minute = 0;
    // Sets white duration hours bubbles
    for (var i = 0; i < durationTime.length; i++) {
      if (minute < 10) {
        durationTime[i].textContent = "0" + minute;
      } else {
        durationTime[i].textContent = minute;
      }
      durationTime[i].style.display = "block";
      minute += 5;
    }
    clock.setDMListeners(true);
  },
  setDMListeners: function(state) {
    for (var i = 0; i < durationTime.length; i++) {
      durationTime[i].addEventListener("click", function(e) {
        if (state === true) {
          durationMinute.style.display = "block";
          addThisCourseBtn.removeAttribute("disabled");
          addThisCourseBtn.style.cursor = "pointer";
          addThisCourseBtn.setAttribute("title", "Go");

          // underClock.style.top = "-52px";
          durationMinute.value = e.target.textContent;
          clock.deleteChild();
        }
      });
    }
  },
  deleteChild: function() {
    // Deletes the bubbles of both circles
    outerCircle.innerHTML = "";
    innerCircle.innerHTML = "";
    // Deletes duration hour
    if (durationTime.length > 0) {
      var nbBubbles = durationTime.length;
      for (var i = 0; i < nbBubbles; i++) {
        chosenDuration.removeChild(durationTime[0]);
      }
    }

  },
  flashMessage: function() {
    if (notification !== null) {
      setInterval(function() {
        notification.style.opacity = "0";
        notification.style.transform = "translateX(-250px)";
        clock.hideFlashMessage();
      }, 3000);
    }
  },
  hideFlashMessage: function() {
    if (notification !== null) {
      setInterval(function() {
        notification.style.display = "none";
      }, 100);
    }
  }
}

clock.start();
