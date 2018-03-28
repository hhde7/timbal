function instructions() {

  // ARRAY OF SLIDES CONTENT => TITLE WITH OPTIONNAL DESCRIPTION
  var slidesContent = [
    slide1 = {
      title: 'Timbal',
      description: 'Your TimeTable Maker'
    },
    slide2 = {
      title: 'Ready ?'
    }
  ]

  // SLIDE CONSTRUCTOR
  function Slide(slideId) {

    this.title = slideId.title;
    this.description = slideId.description;

    var instructions = document.getElementById('instructions');
    var instructionsH1 = document.getElementById('instructions-h1');
    var instructionsDd = document.getElementById('instructions-dd');

    // CONDITIONS AROUND SLIDE CONTENT FORMAT
    if (this.description != undefined) {
      instructionsH1.textContent = this.title;
      instructionsDd.textContent = this.description;
    } else if (Array.isArray(this.title)) {
      // LINE BREAK SYSTEM, BASED ON DIVs AND ARRAY
      for (var i = 0; i < this.title.length; i++) {
        divElt = document.createElement('div');
        divElt.textContent = this.title[i];
        instructionsH1.appendChild(divElt);
      }
    } else {
      instructionsH1.textContent = this.title;
    }
  }

  // DOES WHAT ITS NAME SAYS
  function createSlide(id) {
    h1Elt = document.getElementById('instructions-h1');
    ddElt = document.getElementById('instructions-dd');
    h1Elt.textContent = "";
    ddElt.textContent = "";
    var slide = new Slide(slidesContent[i]);
  }

  var i = 0;

  // STARTS THE SLIDER FROM SLIDE1, THEN MOVE TO NEXT ONE, EACH 3000ms
  function launchSlider() {
    createSlide(i);
    i++;
    var slideAnimation = setInterval(function() {
      createSlide(i);
      i++;
      // STOPS THE SLIDER ANIMATION AFTER THE LAST SLIDE IS DISPLAYED
      if (i > slidesContent.length - 1) {
        clearInterval(slideAnimation);
        setInterval(fadeToAdd, 2000);
      }
    }, 2000);
  }

  function fadeToAdd() {
    var instructions = document.getElementById('instructions');
    instructions.style.opacity = "0";
    window.location.href="id";

  }

  launchSlider();
}

instructions();
