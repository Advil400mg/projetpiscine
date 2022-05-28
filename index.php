<?php

    include_once 'header.php';
    
?>

<div class="wrapper">
  
  <br>
  <br>
  <br>

  <div class="banner">
    <img class="banner-image" src="img/banner.jpg">
  </div>
  
  <div class="title">
  <h1>Retrouvez les actualités d'Omnes Santé</h1>
  
  <br>
  <br>
  <div>
    <a href = "event.php"><button type="buttontitle"><span></span>Évènement de la semaine</button></a>
    <a href ="bulletin.php"><button type="buttontitle"><span></span>Bulletin de la semaine</button></a>
  </div>
  </div>

    
  <center>
  <div class="bienvenu">
    <h2>OMNES Santé prend soin de vous et des personnes que vous aimez</h2>
  </div>
  <br>
  <br>
  </center>

  <div class="valeurs"> 
  <center>
    <div class="images">
      <img class="image1" src="img/valeurs1.jpg" width= "50%;"> 
      <div class="text">Prise de RDV rapide</div>
    </div> 
    
    <div class="images">
      <img class="image2" src="img/valeurs2.jpg" width= "50%;">
      <div class="text">Des professionnels disponibles</div>
    </div>
    
    <div class="images">
      <img class="image3" src="img/valeurs3.jpg" width= "50%;">
      <div class="text">Toujours proche de vous</div>   
    </div>
  </center>
    </div>

  <br>
  <br>
  <br>
  <center>
    <div class="specialiste">
        <h2>Nos spécialistes de santé à votre disposition</h2>
    </div>
    <br>
    
    <div class="img-slider">
      <div class="slide active">
      <img src="img/1.jpg" alt="">
    </div>
    
    <div class="slide">
      <img src="img/2.jpg" alt="">
    </div>
    
    <div class="slide">
      <img src="img/3.jpg" alt="">
    </div>
    
    <div class="slide">
      <img src="img/4.jpg" alt="">
    </div>
    
    <div class="slide">
      <img src="img/5.jpg" alt="">
    </div>

    <div class="slide">
      <img src="img/6.jpg" alt="">
    </div>
    
    <div class="slide">
      <img src="img/7.jpg" alt="">
    </div>
    
    <div class="slide">
      <img src="img/8.jpg" alt="">
    </div>
    
    <div class="slide">
      <img src="img/9.jpg" alt="">
    </div>
    
    <div class="slide">
      <img src="img/10.jpg" alt="">
    </div>
    
    <div class="slide">
      <img src="img/11.jpg" alt="">
    </div>
    
    <div class="slide">
      <img src="img/12.jpg" alt="">
    </div>
    
    <div class="slide">
      <img src="img/13.jpg" alt="">
    </div>
    
    <div class="navigation">
      <div class="btn active"></div>
      <div class="btn"></div>
      <div class="btn"></div>
      <div class="btn"></div>
      <div class="btn"></div>
      <div class="btn"></div>
      <div class="btn"></div>
      <div class="btn"></div>
      <div class="btn"></div>
      <div class="btn"></div>
      <div class="btn"></div>
      <div class="btn"></div>
      <div class="btn"></div>
    </div>
  
  </div>

    <script type="text/javascript">
    var slides = document.querySelectorAll('.slide');
    var btns = document.querySelectorAll('.btn');
    let currentSlide = 1;

    // Javascript pour les images slider navigation navigation 
    var manualNav = function(manual){
      slides.forEach((slide) => {
        slide.classList.remove('active');

        btns.forEach((btn) => {
          btn.classList.remove('active');
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

    // Javascript pour les images slider navigation en autoplay
    var repeat = function(activeClass){
      let active = document.getElementsByClassName('active');
      let i = 1;

      var repeater = () => {
        setTimeout(function(){
          [...active].forEach((activeSlide) => {
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
    </script>
    </center>
  </div>

<?php
    include_once "footer.php"; 
?>
