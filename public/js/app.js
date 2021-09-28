

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 

// When the user clicks on <span> (x), close the modal


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}



function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


var slides = document.querySelectorAll('.slide');
        var btns = document.querySelectorAll('.btnx');
        let currentSlide = 1 ;


        var manualNav = function(manual){

            slides.forEach((slide) => {
                slide.classList.remove('active');

                btns.forEach((btn) => {
                slide.classList.remove('active');
                });
            });


            slides[manual].classList.add('active');
            btns[manual].classList.add('active');
        }

        btns.forEach((btn, i) => {
            btn.addEventListener("click", () => {
                manualNav(i);
                currentSlide = i;
            });
        });


        var repeat = function(activeClass){
          let active = document.getElementsByClassName('active');
          let i = 1;

          var repeater = () => {
            setTimeout(function(){
              [...active].forEach((activeSlide) =>{
                activeSlide.classList.remove('active');
              });
              slides[i].classList.add('active');
              btns[i].classList.add('active');
              i++;

              if(slides.length == i){
                i = 0;
              }
              if(i >= slides.length){
                return;
              }
              repeater();
            }, 10000);
          }
          repeater();
        }
        repeat();












