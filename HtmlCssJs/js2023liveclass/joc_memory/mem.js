
//icons un array de imagini
var icons = [
    "icon1",
    "icon2",
    "icon3",
    "icon4",
    "icon5",
    "icon6",
    "icon7",
    "icon8",
    "icon9",
    "icon10",
    "icon11",
    "icon12",
  ];
  //apoi inca un array got de imagini
  var images = [];
  
  // get images, place them in an array & randomize the order
 
  //am 12 iconite deci imi formez 12 imagini
  //cu push imi adaug imaginile,am 2 pt ca imi adaug pereche 
  //deci o sa am 24 de elemente
  for (i = 0; i < 12; i++) {
    var img = 'images/' + icons[i] + '.png';
    images.push(img);
    images.push(img);
  }
  //se apeleaza functia si mi le amesteca
  shuffle();
  
  function shuffle() {
    Array.prototype.randomize = function () {
      var i = this.length, j, temp;
      while (--i) {
        j = Math.floor(Math.random() * (i - 1));
        temp = this[i];
        this[i] = this[j];
        this[j] = temp;
      }
    };
  
    images.randomize();
  }
  function restart(steps) {
    document.getElementById("grid").style.display = 'none';
    var success = "<h1> Felicitari ai terminat jocul in " + steps + " de pasi!";
    document.getElementById("success").innerHTML = success;
  }
  
  
  // output images then hide them
  var output = "<ul>";
  for (var i = 0; i < 24; i++) {
    output += "<li>";
    output += "<img src = '" + images[i] + "' width='96' height='96' style='visibility:hidden'/>";
    output += "</li>";
  }
  output += "</ul>";
  document.getElementById("grid").innerHTML = output;
  
  
  var first = null;
  var second = null;
  var selected = 0;
  var correct = 0;
  var steps = 0;
  var countclick = 0;
  
  items = document.querySelectorAll('li');
  
  items.forEach(item => item.addEventListener('click', function (event) {
    if (countclick % 2 == 0) {
      steps += 1;
    }
    if (selected === 2) return;
  
    // increment guess count, show image, mark it as face up
    selected++;
    let x = event.target.querySelector('img');
    if (x != null) {
      event.target.querySelector('img').style.visibility = 'visible';
  
  
  
      //First turn
      if (selected === 1) {
        first = event.target;
      } else {
        second = event.target;
  
        if (first.querySelector('img').src === second.querySelector('img').src) {
          correct++;
          selected = 0;
          if (correct === 12) {
            restart(steps);
          }
        } else {
          setTimeout(function () {
            first.querySelector('img').style.visibility = 'hidden';
            second.querySelector('img').style.visibility = 'hidden';
            selected = 0;
          }, 1000);
        }
      }
      ++countclick
    }
    else {
      // click same img
      first.querySelector('img').style.visibility = 'hidden';
      selected = 0;
      ++countclick
    }
  }));