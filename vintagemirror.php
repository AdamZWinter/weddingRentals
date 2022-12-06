<?php
require('header.php');
?>


<script>
  document.getElementById("headerImage").style.backgroundImage = "url('img/vintagemirror.jpg')";
  document.getElementById("headerImage").style.backgroundPosition = "50% 45%";
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vintage Mirror Set</title>
    <link href="extras.css" rel="stylesheet" type="text/css" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
       <!--
    -------------------- NAV BAR ---------------------------------------------------------------
  -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <!--a class="navbar-brand" href="#">Navbar</a-->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Sign Rental Sets
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="layeredArchSet.html">Layered Arch</a></li>
              <li><a class="dropdown-item" href="modernround.html">Modern Round</a></li>
              <li><a class="dropdown-item" href="vintagemirror.html">Vintage Mirror</a></li>
              <li><a class="dropdown-item" href="darkwalnut.html">Dark Walnut</a></li>
              <li><a class="dropdown-item" href="rusticWoodSet.html">Rustic Wood</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="extras.html">Extras</a></li>
            </ul>
          </li>
          <!--li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li-->
        </ul>
      </div>
    </div>
  </nav>
<!--
-------------------- End of NAV BAR ---------------------------------------------------------------
-->

     <!--General layout inherited from extras.html -->
  <h1 class="extras-head">VINTAGE MIRROR RENTAL PIECES</h1>
  <section class= "sectionSetDescription">
    <div class="topper">
  <h2 class="section-head">VINTAGE MIRROR RENTAL PIECES</h2>
      <center>
        <div class=text-box>
            <p id="setDescription" class="description"><p>Each framed mirror was selected and 
        refinished to give a collected yet cohesive look.</p><p> Many pieces can be
         completely customized for a truly personalized decor statement.</p><p> Rental
          Package Pricing includes our delivery and pick-up service for ease of
           the client and protection of our unique pieces. </p>                     
        </div>
      </center>
    </div>
    <div id="buttonDiv" class="row justify-content-center">
        <button  <button onclick="window.location.href='extras.html';" id="checkAvailabilityButton" type="submit" class="btn">CHECK AVAILABILITY</button></button>
    </div>
  </section> 

  <!--side-by-side large picture section-->
  <section>
     <!--<div class="container text-center">-->
        <div class="side">
            <div class="image">
                <img src="img/vmpictures/vm2.jfif" class="img-fluid" alt="mirror on an easel with a welcome message">
            </div>
            <div class="text-right">
                <h6>WELCOME SIGN</h6>
                <p>Customized with couple's name and wedding date, wrought iron easel included.</p>
            </div>
        </div>
        <div class="side">
            <div class="text-left">
               <h6>WAX SEAL SEATING CHART</h6>
               <p>Choose any large mirror from our  customizable mirror collection for this application,
                 wrought iron easel included. </p> 
                <p>Table card print service and wax seal application may be added to any rental package. ($4/card) </p>
                <p>(Mirror pictured “Gabriella”) </p>
            </div>
            <div class="image">
                <img src="img/vmpictures/vm3.jpg" class="img-fluid" alt="mirror on easel with 12 cards attached on">
            </div>
        </div>
        <div class="side">
            <div class="image">
                <img src="img/vmpictures/vm4.jpeg" class= "img-fluid" alt="Two mirrors on easels">
            </div>
            <div class="text-right"> 
                <h6>PAIR OF LINEN CORD STRINGERS</h6>
                <p>Pair of ornate mirrors hold up to a total of 30 3”x 5” Table Assignment Cards, wrought iron easels included.  </p>
                <p>Heading may be removed for use as a photo display or creative escort card holders. </p>
                <p>Table card print service may be added for an additional fee. ($2/card)</p>
            </div>
        </div>
     </div>
  </section>
  <hr>
  <!--smaller side-by-side picture section-->
   
  <section>
    <!--<div class="container text-center">-->
       <div class="side">
           <div class="text-left">
                <h6>TABLE NUMBERS</h6>
                <p>1-30</p>
                <p>Numbers are self-standing and in various orientations, giving a collected yet cohesive feel.</p>
           </div>
           <div class="image">
                <img src="img/vmpictures/vm5.jfif" class="img-fluid" alt="table with flowers and five numbered mirrors">
           </div>
        </div>
        <div class="side">
            <div class="image">
                <img src="img/vmpictures/vm6.jfif" class="img-fluid" alt="mirror on table top easel and flowers on a table">
            </div>
            <div class="text-right">
                <h6>NO PHOTOGRAPHY PLEASE</h6>
                <p>Includes table top metal easel for display.</p>
            </div>
        </div>
        <div class="side">
            <div class="text-left" id="guestbook">
                <h6 >GUESTBOOK SIGN</h6>
                <p>Includes tabletop easel for display.</p>
            </div>
            <div class="image">
                <img src="img/vmpictures/vm7.jfif" class="img-fluid" alt="mirror on table top easel with a guestbook sign on it">
            </div>
        </div>
        <div class="side">
            <div class="image">
                <img src="img/vmpictures/vm8.jfif" class="img-fluid" alt="leather trunk, flowers, and mirror on a mini easel on a table">
            </div>
            <div class="text-right">
                <h6>LEATHER CARD TRUNK</h6>
                <p>Includes small “Cards” mirror and easel for display.</p>
            </div>
        </div>
        <div class="side">
            <div class="text-left">
                <h6>ANTIQUE TYPEWRITER WITH MESSAGE TO GUESTS</h6>
                <p>Use this message to give unique guestbook instructions, welcome your guests to cocktail hour, or honor deceased loved ones.</p>
            </div>
            <div class="image">
                <img src="img/vmpictures/vm9.jfif" class="img-fluid" alt="typrewriter and flowers on a table">
            </div>
        </div>
        <div class="side">
            <div class="image">
                <img src="img/vmpictures/vm10.jfif" class="img-fluid" alt="mirror with message and flowers on a table">
            </div>
            <div class="text-right">
                <h6>TAKE ONE</h6>
                <p>Great for favors, programs, dessert or cocktail area.</p>
            </div>
        </div>
        </div>
    </div>
    <hr>
  </section>
  <!--small custom mirrors section-->
  <section>
    <h2 class="section-head" class="smallHead">SMALL CUSTOM MIRRORS</h2>
        <center>
            <div class=text-box>
                <p id="setDescription" class="description"><p>12 WORDS OR LESS</p><p>COMMONLY USED FOR HASHTAG, VERSE,
                SONG LYRIC, or HIS & HERS COCKTAILS</p><p>TABLE-TOP METAL EASEL INCLUDED FOR DISPLAY</p>
                <p>Rectangular “Sydney” 20” x 9.5” OR Oval “Ryleigh” 16” x 20”</p>                     
            </div>
        </center>
        <div class="row justify-content-around">
            <div class="col-4">
                <img src="img/vmpictures/vm_smallCustom1.jfif" class="img-fluid" alt="mirror on mini easel and flowers on a table">
            </div>
            <div class="col-4">
                <img src="img/vmpictures/vm_smallCustom2.jfif" class="img-fluid" alt="round mirror on easel and flowers on a table">
            </div>
        </div>
    <hr>
    </section>
<!--medium custom mirror section-->  
    <section>
        <h2 class="section-head" class="smallHead">MEDIUM CUSTOM MIRRORS</h2>
        <center>
            <div class=text-box>
                <p id="setDescription" class="description"><p>24 WORDS OR LESS</p><p>COMMONLY USED FOR 
                    COCKTAIL MENU, SONG LYRIC, MEANINGFUL DATES</p><p>LARGE WROUGHT IRON EASEL INCLUDED IN RENTAL</p>
                <p>Rectangular “Jadyn” 22” x 26” OR Oval “Mary Kate & Ashley” (2 identical available) 31” x 25” </p>                     
            </div>
        </center>
        <div class="row justify-content-around">
            <div class="col-4">
                <img src="img/vmpictures/vm_smallCustom3.jfif" class="img-fluid" alt="medium square mirror on an easel">
            </div>
            <div class="col-4">
                <img src="img/vmpictures/vm_smallCustom4.jfif" class="img-fluid" alt="medium round mirror on an easel">
            </div>
        </div>
    </section>
<!--large custom mirror section-->
    <section>
        <h2 class="section-head" class="smallHead">LARGE CUSTOM MIRRORS</h2>
        <center>
            <div class=text-box>
                <p id="setDescription" class="description"><p>60 WORDS OR LESS</p><p>COMMONLY USED FOR WAX SEAL
                    SEATING CHARTS, MENUS, ORDER OF EVENTS, OR COCKTAIL MENUS</p><p>Curvy Ornate “Gladys” 39” x 44”
                    or Ornate Detailed Top “Gabriella” 25" x 39” or Rectangular “Laverne & Shirley” (2 very similar available) 41” x 29”</p>                     
            </div>
        </center> 
        <div class="row justify-content-around">
            <div class="col-4">
                <img src="img/vmpictures/vm_LCustom1.jfif" class="img-fluid" alt="curvy ornate mirror on an easel">
            </div>
            <div class="col-4">
                <img src="img/vmpictures/vm_LCustom2.jpg" class="img-fluid" alt="rectangular mirror on an easel">
            </div>
            <div class="col-4">
                <img src="img/vmpictures/vm_LCustom3.jpeg" class="img-fluid" alt="rectangular mirror on an easel">
            </div>
        </div>
        <hr>
    </section>

    <!--package rental section-->
    <section>
        <section>
        <h4>Vintage Mirror Platinum Package Rental $849</h4>
        <center>
        <p><strong>PRICING INCLUDES DELIVERY AND TEARDOWN WITHIN A 30 MILE RADIUS OF ORRVILLE, OH</strong></p>
        </center>
        <div class="package-list">
            <ul>
                <li>Welcome Sign with custom names & date & large wrought iron easel</li>
                <li>Antique Typewriter Rental with customized message (100 words or less)</li>
                <li>Choice of Linen Seating Chart Stringer or Large Custom Mirror for gold seal application</li>
                <li>Table Numbers 1-30</li>
                <li>Leather Domed Trunk with “cards” mirror with stand</li>
                <li>“Enjoy the Moment- no photography please” mirror with stand</li>
            </ul>
            <ul>
                <li>“Guestbook” mirror with stand</li>
                <li>“Take One” small vanity mirror</li>
                <li>1 Large Full Custom Mirror (50 words or less) with large wrought iron easel</li>
                <li>1 Medium Full Custom Mirror (20 words or less)  with large wrought iron easel</li>
                <li>1 Small Custom Mirror (10 words or less) with wrought iron easel</li>
            </ul>
        </div>
        </section>
        <hr>
        <!---->
        <h4>Vintage Mirror Gold Package Rental $799</h4>
        <center>
        <p><strong>PRICING INCLUDES DELIVERY AND TEARDOWN WITHIN A 30 MILE RADIUS OF ORRVILLE, OH</strong></p>
        <div class="m-4">
            <p>
            <!-- Trigger Buttons HTML -->
                <button type="button" class="pck-btn" class="btn btn-primary ms-4" data-bs-toggle="collapse" data-bs-target="#myCollapse">
                    INCLUDES ALL THE FOLLOWING 8 ITEMS</button>
            </p>
        </center>
            <!-- Collapsible Element HTML -->
            <div class="collapse show" id="myCollapse">
                <div class="card card-body">
                    <ul>
                        <li>Welcome Sign with custom names & date & large wrought iron easel</li>
                        <li>Antique Typewriter Rental with customized message (100 words or less)</li>
                        <li>Choice of Linen Seating Chart Stringer or Large Custom Mirror for gold seal application</li>
                        <li>Table Numbers 1-30</li>
                        <li>Leather Domed Trunk with “cards” mirror with stand</li>
                        <li>“Enjoy the Moment- no photography please” mirror with stand</li>
                        <li>“Guestbook” mirror with stand</li>
                        <li>“Take One” small vanity mirror</li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <!---->
        <h4>Vintage Mirror Pick 6 Rental Package $649</h4>
        <center>
        <p><strong>PRICING INCLUDES DELIVERY AND TEARDOWN WITHIN A 30 MILE RADIUS OF ORRVILLE, OH</strong></p>
        <div class="m-4">
            <p>
                <!-- Trigger Buttons HTML -->
                <button type="button" class="pck-btn" class="btn btn-primary ms-4" data-bs-toggle="collapse" data-bs-target="#myCollapse">
                    CHOOSE 6 OF THE FOLLOWING ITEMS</button>
            </p>
        </center>    
            <!-- Collapsible Element HTML -->
            <div class="collapse show" id="myCollapse">
                <div class="card card-body">
                    <ul>
                        <li>Welcome Sign with custom names & date & large wrought iron easel</li>
                        <li>Antique Typewriter Rental with customized message (100 words or less)</li>
                        <li>Pair of 2 Linen Stringers with wrought iron easels </li>
                        <li>Large Custom Mirror for gold seal application</li>
                        <li>Table Numbers 1-30</li>
                        <li>Leather Domed Trunk with “cards” mirror with stand</li>
                        <li>“Enjoy the Moment- no photography please” mirror with stand</li>
                        <li>“Guestbook” mirror with stand</li>
                        <li>“Take One” small vanity mirror</li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <!---->
        <h4>Vintage Mirror Pick 4 Rental Package $599</h4>
        <center>
        <p><strong>PRICING INCLUDES DELIVERY AND TEARDOWN WITHIN A 30 MILE RADIUS OF ORRVILLE, OH</strong></p>
        <div class="m-4">
            
            <p>
            <!-- Trigger Buttons HTML -->
                <button type="button" class="pck-btn" class="btn btn-primary ms-4"  data-bs-toggle="collapse" data-bs-target="#myCollapse">
                    CHOOSE 4 OF THE FOLLOWING ITEMS</button>
                
            </p>
        </center>
            <!-- Collapsible Element HTML -->
            <div class="collapse show" id="myCollapse">
                <div class="card card-body">
                    <ul>
                        <li>Welcome Sign with custom names & date & large wrought iron easel</li>
                        <li>Antique Typewriter Rental with customized message (100 words or less)</li>
                        <li>Pair of 2 Linen Stringers with wrought iron easels </li>
                        <li>Large Custom Mirror for gold seal application</li>
                        <li>Table Numbers 1-30</li>
                        <li>Leather Domed Trunk with “cards” mirror with stand</li>
                        <li>“Enjoy the Moment- no photography please” mirror with stand</li>
                        <li>“Guestbook” mirror with stand</li>
                        <li>“Take One” small vanity mirror</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <hr>
        <!---->
        <h4>Additional Custom Mirrors</h4>
        <ul style="list-style: none;">
            <li>➼ SMALL (up to 12 words) $40</li>
            <li>➼ MEDIUM (up to 24 words) $60</li>
            <li>➼ LARGE (up to 60 words) $80 </li>
        </ul>
        <p>More words may be added depending on the design.
            Additional words may require an additional fee.</p>
    </section>
    <div id="buttonDiv" class="row justify-content-center">
        <button  <button onclick="window.location.href='extras.html';" id="checkAvailabilityButton" type="submit" class="btn">CHECK AVAILABILITY</button></button>
    </div>

    <!-- <footer class="extras-footer">
        <center>
          <a class = "footer-style" href="extras.html">Contact Us</a>
          <br><br>
          <p class= "footer-style">WALNUT RIDGE LEATHER COMPANY<br>
      ORRVILLE, OHIO</p>
          <a class= "footer-style" href = "mailto: Walnutridgeleathercompany@gmail.com">Walnutridgeleathercompany@gmail.com</a>
        </center>
      </footer> -->
</body>
</html>

<?php
//footer
require('footer.php');
?>
