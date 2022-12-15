<head>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>
<body>

<section class="behandlinger">

<div class="contact-heading">
        <h2>Behandlinger</h2>
</div>

<div class="wrapper">
  <div class="cards">

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]">
        <h3>Fysioterapi</h3>
        <i class="fa fa-folder-o"></i>
      </div>
      <div class="card__expander">
        <i class="fa fa-close [ js-collapser ]"></i>
        <div class="card__expander-text">
        <h5>Fysioterapi</h5>
        <p>Formålet med fysioterapi er at fremme livskvalitet og evnen til at bevæge sig. Fysioterapi anvendes når bevægelse og funktionsevne er truet på grund af alder, sygdom, eller hvis du er kommet til skade. Behandling hos en fysioterapeut baseres på en grundig undersøgelse og analyse af din bevægelighed, muskler og led.</p>
        </div>  
    </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]">
        <h3>Genoptræning</h3>
        <i class="fa fa-folder-o"></i>
      </div>
      <div class="card__expander">
        <i class="fa fa-close [ js-collapser ]"></i>
        <div class="card__expander-text">
        <h5>Genoptræning</h5>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ducimus error adipisci voluptatem officiis quisquam, harum magni provident maiores, minima corrupti autem explicabo neque quibusdam aliquid molestiae asperiores. Inventore, provident! Exercitationem dolorem suscipit consequuntur minima ad itaque consequatur labore totam.</p>
        </div>  
    </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]">
        <h3>Massage</h3>
        <i class="fa fa-folder-o"></i>
      </div>
      <div class="card__expander">
        <i class="fa fa-close [ js-collapser ]"></i>
        <div class="card__expander-text">
        <h5>Massage</h5>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ducimus error adipisci voluptatem officiis quisquam, harum magni provident maiores, minima corrupti autem explicabo neque quibusdam aliquid molestiae asperiores. Inventore, provident! Exercitationem dolorem suscipit consequuntur minima ad itaque consequatur labore totam.</p>
        </div>  
    </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]">
        <h3>Andre ydelser</h3>
        <i class="fa fa-folder-o"></i>
      </div>
      <div class="card__expander">
        <i class="fa fa-close [ js-collapser ]"></i>
        <div class="card__expander-text">
        <h5>Andre ydelser</h5>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ducimus error adipisci voluptatem officiis quisquam, harum magni provident maiores, minima corrupti autem explicabo neque quibusdam aliquid molestiae asperiores. Inventore, provident! Exercitationem dolorem suscipit consequuntur minima ad itaque consequatur labore totam.</p>
        </div>  
    </div>
    </div>

  </div>

</div>
</section>
<script>
    var $cell = $('.card');

//open and close card when clicked on card
$cell.find('.js-expander').click(function() {

  var $thisCell = $(this).closest('.card');

  if ($thisCell.hasClass('is-collapsed')) {
    $cell.not($thisCell).removeClass('is-expanded').addClass('is-collapsed').addClass('is-inactive');
    $thisCell.removeClass('is-collapsed').addClass('is-expanded');
    
    if ($cell.not($thisCell).hasClass('is-inactive')) {
      //do nothing
    } else {
      $cell.not($thisCell).addClass('is-inactive');
    }

  } else {
    $thisCell.removeClass('is-expanded').addClass('is-collapsed');
    $cell.not($thisCell).removeClass('is-inactive');
  }
});

//close card when click on cross
$cell.find('.js-collapser').click(function() {

  var $thisCell = $(this).closest('.card');

  $thisCell.removeClass('is-expanded').addClass('is-collapsed');
  $cell.not($thisCell).removeClass('is-inactive');

});
</script>




