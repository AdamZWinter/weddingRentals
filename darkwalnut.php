<?php
require('header.php');
?>


<script>
  document.getElementById("headerImage").style.backgroundImage = "url('img/headerImages/darkWalnutHeader.jpg')";
  document.getElementById("headerImage").style.backgroundPosition = "50% 45%";
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Walnut</title>
    <link href="extras.css" rel="stylesheet" type="text/css" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body id="body">
    <div class="container-fluid upper">
        <div class="row">
          <div class="col-md-3"><img src="img/logo.png" class="logo"> </div>
            <div class="col-md-9"></div>
        </div>
    </div>

    <!------ NAV BAR ----------------->
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
<!-------- End of NAV BAR ---------------------->
    
<!--carousel style-->
    <center>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/darkWalnutImages/carousel1.jpg" class= "img-size" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="img/darkWalnutImages/carousel2.jpg" class= "img-size" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="img/darkWalnutImages/carousel3.jpg" class= "img-size" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="img/darkWalnutImages/carousel4.jpg" class= "img-size" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="img/darkWalnutImages/carousel5.jpg" class= "img-size" class="d-block w-100" alt="...">
        </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>
    </div>
    </center>
    <!--<h2 class="section-head">DARK WALNUT RENTAL PIECES</h2>-->
    <div id="buttonDiv" class="row justify-content-center">
        <button id="checkAvailButton" type="submit" class="btn">CHECK AVAILABILITY</button></button>
    </div>

    <!--Dark walnut full package rental-->
    <section>
        <h2 class="section-head" class="smallHead" class="added-sh"><strong>Dark Walnut Full Package Rental</strong></h2>
        <div class="row justify-content-around">
            <center>
                <img src="img/darkWalnutImages/walnut1.jpg" class="img-fluid" alt="medium square mirror on an easel">
            </center>
        </div>
        <p id="price">$299 plus tax</p>
        <div class="package-list">
            <ul>
                <li>“Welcome to Our Beginning” Round (24” diameter, with easel) or Rectangular (35.5” x 21” with easel)</li>
                <li>“Find your Seat”  (35.5” x 21” organizer with 30 clips & easel) </li>
                <li>Table Numbers, double-sided (Numbers 1-30, 3.5” x 9”)</li>
                <li>Antique Jug with “Honeymoon Fund” (jug & mini-hanger, 4.75” x 10”) (2pc)</li>
                <li>“Mr. & Mrs.” Head Table Sign with small easel 7.25” x 22.5”</li>
                <li>“We know that you would be here today if Heaven weren’t so far away”  (10” x 10.5” memorial sign or seat saver with small easel)</li>
                <li>“Here comes the Bride” ring bearer carrier  (10.25” x 17.25” with cord)</li>
                <li>“Better” & “Together” Chair Hangers (with cord 10.25” x 17.25”) (2pc)</li>
            </ul>
            <ul>
                <li>“Please Sign our Guestbook” (self standing 7.25” x 16”)</li>
                <li>“Just Married” & “Thank You” (reversible photo-shoot prop 7.25” x 31”)</li>
                <li>“Take One” (7.25” x 7.25”)</li>
                <li>“Programs” (7.25” x 16”)</li>
                <li>“Enjoy the Moment, no photography please” 10.5” x 17” with small easel</li>
                <li>8 Reserved signs (3.5” x 12”  4 with cord hanger option) (8pc)</li>
                <li>Antique Leather and Wooden Trunk with “Cards” Banner</li>
            </ul>
        </div>
    </section>

    <hr>

    <!--Dark Walnut “No Seating” Rental-->
    <section>
        <h2 class="section-head" class="smallHead"><strong>Dark Walnut “No Seating” Rental</strong></h2>
        <div class="row justify-content-around">
            <center>
                <img src="img/darkWalnutImages/walnut1.jpg" class="img-fluid" alt="medium square mirror on an easel">
            </center>
        </div>
        <center>
            <div class="m-4">
                <p>
                <!-- Trigger Buttons HTML -->
                    <button type="button" id="price" class="pck-btn" class="btn btn-primary ms-4" data-bs-toggle="collapse" data-bs-target="#myCollapse">
                        $245 plus tax</button>
                </p>
            </center>
                <!-- Collapsible Element HTML -->
                <div class="collapse show" id="myCollapse">
                    <div class="card card-body">
                        <ul>
                            <li>“Welcome to Our Beginning” Round (24” diameter, with easel) or Rectangular (35.5” x 21” with easel)</li>
                            <li>Antique Jug with “Honeymoon Fund” (jug & mini-hanger, 4.75” x 10”) (2pc)</li>
                            <li>“Mr. & Mrs.” Head Table Sign with small easel 7.25” x 22.5”</li>
                            <li>“We know that you would be here today if Heaven weren’t so far away”  (10” x 10.5” memorial sign or seat saver with small easel)</li>
                            <li>“Here comes the Bride” ring bearer carrier  (10.25” x 17.25” with cord)</li>
                            <li>“Better” & “Together” Chair Hangers (with cord 10.25” x 17.25”) (2pc)</li>
                            <li>“Please Sign our Guestbook” (self standing 7.25” x 16”)</li>
                            <li>“Just Married” & “Thank You” (reversible photo-shoot prop 7.25” x 31”)</li>
                            <li>“Take One” (7.25” x 7.25”)</li>
                            <li>“Programs” (7.25” x 16”)</li>
                            <li>“Enjoy the Moment, no photography please” 10.5” x 17” with small easel</li>
                            <li>8 Reserved signs (3.5” x 12”  4 with cord hanger option) (8pc)</li>
                            <li>Antique Leather and Wooden Trunk with “Cards” Banner</li>
                        </ul>
                    </div>
                </div>
            </div>
    </section>
    <hr>

    <!--Dark Walnut “You Pick Four” Rental-->
    <section>
        <h2 class="section-head" class="smallHead"><strong>Dark Walnut “You Pick Four” Rental</strong></h2>
        <center>
            <div class=text-box>
                <p id="setDescription" class="description"><p>SELECT ANY 4 OF THE FOLLOWING</p>                
            </div>
        </center>

        <div class="package-list">
            <img src="img/darkWalnutImages/up4_1.jpg" class="pad-left" class="img-fluid" alt="medium square mirror on an easel">
            <img src="img/darkWalnutImages/up4_2.jpg" class="img-fluid" alt="medium round mirror on an easel">
        </div>

        <div class="package-list">
            <img src="img/darkWalnutImages/up4_3.jpg" class="pad-left" class="img-fluid" alt="medium square mirror on an easel">
            <img src="img/darkWalnutImages/up4_4.jpg" class="img-fluid" alt="medium round mirror on an easel">
        </div>

        <div class="package-list">
            <img src="img/darkWalnutImages/up4_5.jpg" class="pad-left" class="img-fluid" alt="medium square mirror on an easel">
            <img src="img/darkWalnutImages/up4_6.jpg" class="img-fluid" alt="medium round mirror on an easel">
        </div>

        <div class="package-list">
            <img src="img/darkWalnutImages/up4_7.jpg" class="pad-left" class="img-fluid" alt="medium square mirror on an easel">
            <img src="img/darkWalnutImages/up4_8.jpg" class="img-fluid" alt="medium round mirror on an easel">
        </div>

        <div class="package-list">
            <img src="img/darkWalnutImages/up4_9.jpg" class="pad-left" class="img-fluid" alt="medium square mirror on an easel">
            <img src="img/darkWalnutImages/up4_10.jpg" class="img-fluid" alt="medium round mirror on an easel">
        </div>

        <div class="package-list">
            <img src="img/darkWalnutImages/up4_11.jpg" class="pad-left" class="img-fluid" alt="medium square mirror on an easel">
            <img src="img/darkWalnutImages/up4_12.jpg" class="img-fluid" alt="medium round mirror on an easel">
        </div>

        <div class="package-list">
            <img src="img/darkWalnutImages/up4_13.jpg" class="pad-left" class="img-fluid" alt="medium square mirror on an easel">
            <img src="img/darkWalnutImages/up4_14.jpg" class="img-fluid" alt="medium round mirror on an easel">
        </div>

        <div class="package-list">
            <img src="img/darkWalnutImages/up4_15.jpg" class="pad-left" class="img-fluid" alt="medium square mirror on an easel">
            <img src="img/darkWalnutImages/up4_16.jpg" class="img-fluid" alt="medium round mirror on an easel">
        </div>
        
        <div class="package-list">
            <img src="img/darkWalnutImages/up4_17.jpg" class="pad-left" class="img-fluid" alt="medium square mirror on an easel">
        </div>

        <center>
            <div class="m-4">
                <p>
                <!-- Trigger Buttons HTML -->
                    <button type="button" id="price" class="pck-btn" class="btn btn-primary ms-4" data-bs-toggle="collapse" data-bs-target="#myCollapse">
                        $199 plus tax</button>
                </p>
            </center>
                <!-- Collapsible Element HTML -->
                <div class="collapse show" id="myCollapse">
                    <div class="card card-body">
                        <ul>
                            <li>“Welcome to Our Beginning” Round (24” diameter, with easel) or Rectangular (35.5” x 21” with easel)</li>
                            <li>“Find your Seat”  (35.5” x 21” organizer with 30 clips & easel) </li>
                            <li>Table Numbers, double-sided (Numbers 1-30, 3.5” x 9”)</li>
                            <li>Antique Jug with “Honeymoon Fund” (jug & mini-hanger, 4.75” x 10”) (2pc)</li>
                            <li>“Mr. & Mrs.” Head Table Sign with small easel 7.25” x 22.5”</li>
                            <li>“We know that you would be here today if Heaven weren’t so far away”  (10” x 10.5” memorial sign or seat saver with small easel)</li>
                            <li>“Here comes the Bride” ring bearer carrier  (10.25” x 17.25” with cord)</li>
                            <li>“Better” & “Together” Chair Hangers (with cord 10.25” x 17.25”) (2pc)</li>
                            <li>“Please Sign our Guestbook” (self standing 7.25” x 16”)</li>
                            <li>“Just Married” & “Thank You” (reversible photo-shoot prop 7.25” x 31”)</li>
                            <li>“Take One” (7.25” x 7.25”)</li>
                            <li>“Programs” (7.25” x 16”)</li>
                            <li>“Enjoy the Moment, no photography please” 10.5” x 17” with small easel</li>
                            <li>8 Reserved signs (3.5” x 12”  4 with cord hanger option) (8pc)</li>
                            <li>Antique Leather and Wooden Trunk with “Cards” Banner</li>
                        </ul>
                    </div>
                </div>
            </div>
    </section>
    <hr>
    <!--choose either...-->
    <section>
        <h2 class="section-head" class="smallHead">Choose either “Welcome Sign” below when selecting your rental package…</h2>
        <center>
            <h6>WELCOME SIGNS INCLUDE EASEL FOR DISPLAY</h6>
            <div class=text-box>
                <p id="setDescription" class="description"><p>Choose from "Rectangular" (left)</p>
                <p>or</p><p>"Round" (right)</p>                     
            </div>
        </center>
        <div class="row justify-content-around">
            <div class="col-4">
                <img src="img/darkWalnutImages/carousel5.jpg" class="img-fluid" alt="medium square mirror on an easel">
            </div>
            <div class="col-4">
                <img src="img/darkWalnutImages/up4_1.jpg" class="img-fluid" alt="medium round mirror on an easel">
            </div>
        </div>
    </section>
    <hr>

    <!--aisle runner-->
    <section>
        <div class="side">
            <div class="text-left">
                 <h6>AISLE RUNNER ADD-ON</h6>
                 <p>Six signs featuring phrases of the 1 Corinthians 13 “Love Chapter.”</p>
                 <p>$99 with any rental package</p>
            </div>
            <div class="image">
                 <img src="img/darkWalnutImages/add-on1.jpg" class="img-fluid" alt="table with flowers and five numbered mirrors">
            </div>
         </div>
        <hr>
         <!--Vintage typewriter-->
         <div class="side">
             <div class="image">
                 <img src="img/darkWalnutImages/add-on2.jpg" class="img-fluid" alt="mirror on table top easel and flowers on a table">
             </div>
             <div class="text-right">
                 <h6>VINTAGE TYPWRITER WITH MESSAGE TO GUESTS</h6>
                 <p>Travels in custom vintage</p>
                 <p>Walnut Ridge shipping crate.</p>
                 <p>$99 with any rustic wood rental package.</p>
             </div>
         </div>
        
    </section>
    <hr>
    <p id="photo">Product images courtesy of ROSIE photography.</p>
   

<!-- <footer class="extras-footer">
    <center>
      <a class = "footer-style" href="extras.html">Contact Us</a>
      <br><br>
      <p class= "footer-style">WALNUT RIDGE LEATHER COMPANY<br>
  ORRVILLE, OHIO</p>
      <a class= "footer-style" href = "mailto: Walnutridgeleathercompany@gmail.com">Walnutridgeleathercompany@gmail.com</a>
    </center>
  </footer> -->
  <?php
//footer
require('footer.php');
?>
</body>
</html>