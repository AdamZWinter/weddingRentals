<?php

//comments test
require('header.php');

if(!isset($_GET['displaySets']) || $_GET['displaySets'] == 'false'){
  $displaySets = 'false';
  $collapse = 'collapse';
}else{
  $displaySets = 'true';
  $collapse = 'collapse show';
}

if( !isset($_GET['weddingDate']) ){
  $weddingDate = date('Y-m-d');
}else{
  $weddingDate = $_GET['weddingDate'];
}

if( !isset($_GET['setOption']) ){
  $setOption = '';
}else{
  $setOption = $_GET['setOption'];
}



?>


  <br>
  <br>

  <form name="pickYourSetForm" id="pickYourSetForm" action="packages.php" method="get" onsubmit="event.preventDefault();">
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
          <input type="date" id="weddingDate" name="weddingDate" onchange="showSets()" value="<?php echo $weddingDate;?>">
          <input type="hidden" id="displaySets" name="displaySets" value="<?php echo $displaySets;?>">
          <input type="hidden" id="setOption" name="setOption" value="<?php echo $setOption;?>">
          <button class="btn btn-primary w-100" data-bs-toggle="collapse" data-bs-target="#pickSet" aria-expanded="false" aria-controls="pickSet" hidden></button>

          <p id="dateFeedback" class="text-danger"></p>
        </div>
        <div class = "col-1 d-none d-md-block"></div>
        <div class = "col-3 d-none d-md-block"></div>
    </div><!--end of row--> 
  </div><!--End of container-fluid-->

    <button class="btn btn-primary w-100" id="showSetButton" data-bs-toggle="collapse" data-bs-target="#pickSet" aria-expanded="false" aria-controls="pickSet" hidden></button>

  <script>
    function showSets(){
      let weddingDate = document.getElementById('weddingDate').value;
      let dateNow = Date.now();
      let weddingDateUnix = Date.parse(weddingDate);
      //console.log(weddingDate);
      //console.log(weddingDateUnix);
      //console.log(dateNow);
      //console.log(weddingDateUnix - dateNow);
      let oneWeek = 2 * 24 * 60 * 60 * 1000;
      let twoYears = 2 * 365 * 24 * 60 * 60 * 1000;
      //console.log(oneWeek);
      //console.log(weddingDateUnix - dateNow - oneWeek);
      let displaySets = document.getElementById('displaySets').value;
      //console.log(displaySets);
      //if(((weddingDateUnix - dateNow - oneWeek) > 0) && displaySets == false){
      //console.log('checking displaySets.');
      if(((weddingDateUnix - dateNow - oneWeek) > 0) && ((weddingDateUnix - dateNow) < twoYears) && displaySets == "false"){
        console.log('displaySets is false.');
        document.getElementById('showSetButton').click();
        document.getElementById('displaySets').value = true;
        document.getElementById("dateFeedback").innerHTML = '';
        return false;
      }else if(((weddingDateUnix - dateNow - oneWeek) > 0) && displaySets == "true"){
        document.getElementById("dateFeedback").innerHTML = '';
      }else{
        console.log('displaySets is true.');
        document.getElementById("dateFeedback").innerHTML = 'Date must be more than two days from now, and not more than two years away.';
        //do not click the button twice
        return false;
      }
    }//end showSets()

    function submitSetPic(setOption){
      console.log('submitSetPic was called.');
      document.getElementById('setOption').value = setOption;
      document.getElementById('pickYourSetForm').submit();
      //return false;
    }

    function validateForm(){
      return false;
    }
  </script>

  <div class="<?php echo $collapse;?>" id="pickSet">
  <div class="card card-body">


    <div class = "container-fluid">
      <div class = "row" style="height:300px">      
        <div class = "col-3 d-none d-md-block"></div>
        <div class = "col-1 d-none d-md-block"></div>
        <div class = "col-12 col-md-4 text-center">
          <h2>Pick Your Set</h2>
          <img class= "fit-img rounded-circle mx-auto d-block" src= "img/layeredarch.jpg" alt= "photo of layered arch" onclick="submitSetPic('layeredarch')">
          <h3 class="under-start text-center">Layered Arch</h3>
        </div>
        <div class = "col-1 d-none d-md-block"></div>
        <div class = "col-3 d-none d-md-block"></div>
      </div><!--end of row--> 

      <div class = "row" style="height:350px">      
        <div class = "col-1 d-none d-md-block"></div>
        <div class = "col-6 col-md-4">
          <img class= "fit-img rounded-circle float-end" src= "img/modernround.jpg" alt= "photo of modern round" onclick="submitSetPic('modernround')">
          <h3 class="under-end text-end">Modern Round</h3>
        </div>
        <div class = "col-2 d-none d-md-block"></div>
        <div class = "col-6 col-md-4">
          <img class= "fit-img rounded-circle float-start" src= "img/vintagemirror.jpg" alt= "photo of vintage mirror" onclick="submitSetPic('vintagemirror')">
          <h3 class="under-start text-start">Vintage Mirror</h3>
        </div>
        <div class = "col-1 d-none d-md-block"></div>
      </div><!--end of row--> 

      <div class = "row" style="height:300px">      
        <div class = "col-1 d-none d-md-block"></div>
        <div class = "col-6 col-md-4">
          <img class= "fit-img rounded-circle float-end" src= "img/darkwalnut.jpg" alt= "photo of dark walnut" onclick="submitSetPic('darkwalnut')">
          <h3 class="under-end text-end">Dark Walnut</h3>
        </div>
        <div class = "col-2 d-none d-md-block"></div>
        <div class = "col-6 col-md-4">
          <img class= "fit-img rounded-circle float-start" src= "img/rusticwood.jpg" alt= "photo of rustic wood" onclick="submitSetPic('rusticwood')">
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

