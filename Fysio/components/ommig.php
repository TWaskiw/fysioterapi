<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Fysioterapi</title>
    <script src="https://kit.fontawesome.com/491b6e8995.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>
<body>
<head>
  <title>FlexBox Exercise #3 - Image carousel / Responsive </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<div class="contact-heading">
        <h2>Om mig</h2>
</div>

<section class="om-mig">
<div class="carousel">
  <div class="carousel__nav">
   <span id="moveLeft" class="carousel__arrow">
        <svg class="carousel__icon" width="24" height="24" viewBox="0 0 24 24">
    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path>
</svg>
    </span>
    <span id="moveRight" class="carousel__arrow" >
      <svg class="carousel__icon"  width="24" height="24" viewBox="0 0 24 24">
  <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
</svg>    
    </span>
  </div>
  <div class="carousel-item carousel-item--1">
    <div class="carousel-item__image"></div>
    <div class="carousel-item__info">
      <div class="carousel-item__container">
      <h2 class="carousel-item__subtitle">Mark Skals </h2>
      <h1 class="carousel-item__title">Hvem er jeg?</h1>
      <p class="carousel-item__description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
      <a href="#" class="carousel-item__btn">Se mere på min Linkedin</a>
        </div>
    </div>
  </div>

  <div class="carousel-item carousel-item--4">
    <div class="carousel-item__image"></div>
    <div class="carousel-item__info">
      <div class="carousel-item__container">
      <h2 class="carousel-item__subtitle">2012-2022 </h2>
      <h1 class="carousel-item__title">Uddannelse </h1>
      <p class="carousel-item__description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
      <a href="#" class="carousel-item__btn">Explore the beach</a>
        </div>
    </div>
  </div>

  <div class="carousel-item carousel-item--2">
    <div class="carousel-item__image"></div>
    <div class="carousel-item__info">
      <div class="carousel-item__container">
      <h2 class="carousel-item__subtitle">Fritidsinterresser </h2>
      <h1 class="carousel-item__title">Fodbold siden 2004 </h1>
      <p class="carousel-item__description">Clear Glass Window With Brown and White Wooden Frame iste natus error sit voluptatem accusantium doloremque laudantium.</p>
      <a href="#" class="carousel-item__btn">Read the article</a>
        </div>
    </div>
  </div>
    <div class="carousel-item carousel-item--3">
    <div class="carousel-item__image"></div>
    <div class="carousel-item__info">
      <div class="carousel-item__container">
      <h2 class="carousel-item__subtitle">Hvorfor? </h2>
      <h1 class="carousel-item__title">Hvorfor Fysioterapi?</h1>
      <p class="carousel-item__description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
      <a href="#" class="carousel-item__btn">Explore the palms</a>
        </div>
    </div>
  </div>
  
</div>
</section>

<script>
    $(function(){
  $('.carousel-item').eq(0).addClass('active');
  var total = $('.carousel-item').length;
  var current = 0;
  $('#moveRight').on('click', function(){
    var next=current;
    current= current+1;
    setSlide(next, current);
  });
  $('#moveLeft').on('click', function(){
    var prev=current;
    current = current- 1;
    setSlide(prev, current);
  });
  function setSlide(prev, next){
    var slide= current;
    if(next>total-1){
     slide=0;
      current=0;
    }
    if(next<0){
      slide=total - 1;
      current=total - 1;
    }
           $('.carousel-item').eq(prev).removeClass('active');
           $('.carousel-item').eq(slide).addClass('active');
      setTimeout(function(){

      },800);
    

    
    console.log('current '+current);
    console.log('prev '+prev);
  }
});
</script>
</body>

