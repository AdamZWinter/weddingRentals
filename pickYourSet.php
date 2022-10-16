<?php

//comments
require('header.php');
?>
  <br>
  <br>

  <form name="pickYourSetForm" action="pickYourSet.php" onsubmit="return validateForm()" method="get">
  <div class = "container-fluid">
    <div class = "row">      
        <div class = "col-3 d-none d-md-block"></div>
        <div class = "col-1 d-none d-md-block"></div>
        <div class = "col-12 col-md-4 text-center">
          <p>Please, select or enter your wedding date.</p>
        </div>
        <div class = "col-1 d-none d-md-block"></div>
        <div class = "col-3 d-none d-md-block"></div>
    </div><!--end of row--> 
    <div class = "row">      
        <div class = "col-3 d-none d-md-block"></div>
        <div class = "col-1 d-none d-md-block"></div>
        <div class = "col-12 col-md-4 text-center">
          <input type="date" id="weddingDate" name="weddingDate" onchange=showSets() value="2022-11-07">
          <button class="btn btn-primary w-100" data-bs-toggle="collapse" data-bs-target="#pickSet" aria-expanded="false" aria-controls="pickSet" hidden></button>
        </div>
        <div class = "col-1 d-none d-md-block"></div>
        <div class = "col-3 d-none d-md-block"></div>
    </div><!--end of row--> 
  </div><!--End of container-fluid-->

    <!--input type="date" class= "form-select date-selector-centered" id="weddingDate" name="weddingDate"-->
    <button class="btn btn-primary w-100" id="showSetButton" data-bs-toggle="collapse" data-bs-target="#pickSet" aria-expanded="false" aria-controls="pickSet" hidden></button>

  <script>
    function showSets(){
      document.getElementById('showSetButton').click();
    }
  </script>

  <div class="collapse" id="pickSet">
  <div class="card card-body">


    <div class = "container-fluid">
      <div class = "row" style="height:300px">      
        <div class = "col-3 d-none d-md-block"></div>
        <div class = "col-1 d-none d-md-block"></div>
        <div class = "col-12 col-md-4 text-center">
          <a href="layeredArchSet.html">
          <img class= "fit-img rounded-circle mx-auto d-block" src= "img/layeredarch.jpg" alt= "photo of layered arch">
          </a>
          <h3 class="under-start text-center">Layered Arch</h3>
        </div>
        <div class = "col-1 d-none d-md-block"></div>
        <div class = "col-3 d-none d-md-block"></div>
      </div><!--end of row--> 

      <div class = "row" style="height:350px">      
        <div class = "col-1 d-none d-md-block"></div>
        <div class = "col-6 col-md-4">
          <a href="modernround.html">
          <img class= "fit-img rounded-circle float-end" src= "img/modernround.jpg" alt= "photo of modern round">
          </a>
          <h3 class="under-end text-end">Modern Round</h3>
        </div>
        <div class = "col-2 d-none d-md-block"></div>
        <div class = "col-6 col-md-4">
          <a href="vintagemirror.html">
          <img class= "fit-img rounded-circle float-start" src= "img/vintagemirror.jpg" alt= "photo of vintage mirror">
          </a>
          <h3 class="under-start text-start">Vintage Mirror</h3>
        </div>
        <div class = "col-1 d-none d-md-block"></div>
      </div><!--end of row--> 

      <div class = "row" style="height:300px">      
        <div class = "col-1 d-none d-md-block"></div>
        <div class = "col-6 col-md-4">
          <a href="darkwalnut.html">
          <img class= "fit-img rounded-circle float-end" src= "img/darkwalnut.jpg" alt= "photo of dark walnut">
          </a>
          <h3 class="under-end text-end">Dark Walnut</h3>
        </div>
        <div class = "col-2 d-none d-md-block"></div>
        <div class = "col-6 col-md-4">
          <a href="rusticWoodSet.html">
          <img class= "fit-img rounded-circle float-start" src= "img/rusticwood.jpg" alt= "photo of rustic wood">
          </a>
          <h3 class="under-start text-start">Rustic Wood</h3>
        </div>
        <div class = "col-1 d-none d-md-block"></div>
      </div><!--end of row--> 
    </div><!--End of container-fluid-->


  </div><!-- Card collapse -->
  </div>
</form>

  




<?php

//comments
require('footer.php');
?>

