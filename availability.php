<?php

//comments
require('header.php');
?>
  
  </div>
 </div>
  <form id = "rentalForm" onsubmit="return validateForm()">
    <div class= "container-fluid">
      <div class="row">
        
        <div class="col-6">
          <label for="set" class="rental-head">First Name:              </label>
          <input type="text" class= "form-control" id="fname" name="fname">
        </div>
        
        <div class="col-6">
          <label for="set" class="rental-head">Last Name:               </label>
          <input type="text" class= "form-control" id="lname" name="lname">
        </div>        
        </div>
 
      
      <div class="row">       
        
        <div class="col-6">
          <label for="set" class="rental-head">Phone:</label>
          <input type="text" class= "form-control" id="phone" name="phone"></div>

        <div class="col-6">
          <label for="set" class="rental-head">E-mail:</label>
          <input type="email" class= "form-control" id="email" name="email">
        </div>      
      </div>
   

      <div class="row">
        
        <div class="col-6">
          <label for="set" class="rental-head">Wedding Date:            </label>
          <input type="date" class= "form-control" id="weddingDate" name="weddingDate">
        </div>
        
        <div class="col-6">
          <div class="form-group">     
            <label for="set" class="rental-head">Choose Your Rental Set:</label>
          
            <br>
            <select class="form-control form-select" id="exampleFormControlSelect1">
              <option class="option-style">Layered Arch</option>
              <option class="option-style">Modern Round</option>
              <option class="option-style">Vintage Mirror</option>
              <option class="option-style">Dark Walnut</option>
             <option class="option-style">Rustic Wood</option>
            </select>
          </div>
        </div>    
        
        </div>
      
      
 
      
    
    <br>
    
      <div class="row ">
        
        <div class="col-6">
          
          <div class = "form-group"> 
            <label for="extras" class="rental-head">Choose Your Extras:</label>
            <br>
            <input  type="checkbox" id="extras" name="extras" value="HexArbor">
            <label for="HexArbor" class = "option-style">  Hexagon Arbor</label>
            <br>
            <input type="checkbox" id="extras" name="extras" value="Sofa">
            <label for="sofa" class = "option-style"> Vintage Sofa</label>
            <br>
            <input type="checkbox" id="extras" name="extras" value="AntiqueJugs">
            <label for="AntiqueJugs" class = "option-style"> Antique Gallon Jugs</label>   
            <br>
            <input type="checkbox" id="extras" name="extras" value="XLWineJug">
            <label for="XLWineJug" class = "option-style"> XL Wine Jugs</label>
            <br>
            <input type="checkbox" id="extras" name="extras" value="ClearJars">
            <label for="ClearJars" class = "option-style"> Clear Antique Ball Jars</label>
            <br>
            <input type="checkbox" id="extras" name="extras" value="BlueJars">
            <label for="BlueJars" class = "option-style"> Blue Antique Ball Jars</label>   
          </div>
        </div>
      </div>
      <br><br><br>
        <div class= "row">
          <div class= "col-12">
          <label for="questions" class="option-style">Do you have any specific questions or would you like to request a phone call to ask questions directly?</label>
          <input type="text" class= "form-control" id="question" name="question">
        

        <br>
            <div class= "col-12">
        <label for="coupon" class="option-style">Coupon Code (if applicable):</label>
          <input type="text" class= "form-control" id="coupon" name="coupon">
        </div>
          
          
        </div>
        
      </div>
    </div>
    <br>
  <center>
        <input class="btn btn-primary button"  type="submit" value="submit">
  </center>
    
  </form>

<script>

function validateForm(){
  //all form validation functions will be called here
  let FnameResult = validateFname();
  let LnameResult = validateLname();
  let dateResult = validateDate();
  let phoneResult = validatePhone();
  let emailResult = validateEmail();

  
  if(FnameResult && LnameResult && dateResult &&  phoneResult && emailResult){
    alert("Form submitted!");
    return true;
  }else{
  return false;
 
  }
}
const validateEmail = function(){
    let email = document.getElementById("email").value;
    if(email == ""){
        alert("Enter an email address.");
        return false;
    }
    return true;
}

const validateFname = function(){
  let fname= document.getElementById("fname").value;
  //validate that fname is filled out
  if(fname == ""){
    alert("First name must be filled out");
    return false;
  }
  return true;
}

const validateLname = function(){
  let lname = document.getElementById("lname").value;
  //validate that lname is filled out
  if(lname == ""){
    alert("Last name must be filled out");
    return false;
  }
  return true;
  
}

const validateDate = function(){
  let date =new Date( document.getElementById("weddingDate").value);
  let month = date.getMonth()+1;
  let day = date.getDate();
  let year = date.getFullYear();
  
  
  let today = new Date();
  let dd = today.getDate();
  let mm = today.getMonth()+1; 
  let yyyy = today.getFullYear();
 


  //ensure that date is filled and in the future
  console.log(date);
  if(date == "Invalid Date"){
      alert("Invalid date");
      return false;
  }
  if(year<yyyy){
    alert("Event date must be a future date.");
    return false;
  }
  if(year == yyyy){
    if(month == mm & day < dd){
    alert("Event date must be a future date.");
    return false;
    }
    if(month < mm){
      alert("Event date must be a future date.");
    return false;
    }
  }
  return true;
  
}

const validatePhone = function(){
  const format = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
  let phone = document.getElementById("phone").value;
  //ensure input is valid phone number
  if(phone.match(format)){
    return true;
  }else{
    alert("Enter valid phone number");
    return false;
  }

  
}
</script>
 




<?php
//<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
//comments
require('footer.php');
?>
