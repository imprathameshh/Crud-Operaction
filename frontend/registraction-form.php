<?php 
include("./includes/push.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="includes/style-resgistraction.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
  <body class="container">
    <div class="heading-sec">
      <h2 class="text-center pt-4">New User Registration</h2>
    </div>

    <div class="col-md-7 col-lg-6 ml-auto form-wrap">
      <form action=""  enctype="multipart/form-data"  name="myForm" method="post" onsubmit ="return validateForm()"> 
        <div class="row">

          <!-- First Name -->
          <div class="input-group col-lg-6 mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text bg-white px-4 border-md">
                <i class="fa fa-user text-muted"></i>
              </span>
            </div>
            <input id="firstName" type="text" name="first_name" placeholder="First Name"
              class="form-control bg-white border-left-0 " id="name">
              <br>
              <span class="formerror"></span>
          </div>

          <!-- Last Name -->
          <div class="input-group col-lg-6 mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text bg-white px-4 ">
                <i class="fa fa-user text-muted"></i>
              </span>
            </div>
            <input id="lastName" type="text" name="last_name" placeholder="Last Name"
              class="form-control bg-white border-left-0 border-md" >
          </div>

          <!-- Email Address -->
          <div class="input-group col-lg-12 mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text bg-white px-4 border-md border-right-0">
                <i class="fa fa-envelope text-muted"></i>
              </span>
            </div>
            <input id="email" type="email" name="email" placeholder="Email Address"
              class="form-control bg-white border-left-0 border-md" >
          </div>

          <!-- Phone Number -->
          <div class="input-group col-lg-12 mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text bg-white px-4 border-md border-right-0">
                <i class="fa fa-phone-square text-muted"></i>
              </span>
            </div>
            <select id="countryCode" name="countryCode" style="max-width: 80px"
              class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
              <option value="">+91</option>
              <option value="">+12</option>
              <option value="">+15</option>
              <option value="">+18</option>
            </select>
            <input id="phoneNumber" type="tel" name="phone" placeholder="Phone Number"
              class="form-control bg-white border-md border-left-0 pl-3" >
          </div><br>

          <!-- Job -->
          <div class="input-group col-lg-12 mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text bg-white px-4 border-md border-right-0">
                <i class="fa-solid fa-briefcase"></i> </span>
            </div>
            <select id="job" name="jobtitle" class="form-control custom-select bg-white border-left-0 border-md" required>
              <option value="0" selected disabled>Choose your Department</option>
              <option value="1">Designer</option>
              <option value="2">Developer</option>
              <option value="3">Manager</option>
              <option value="4">Accountant</option>
            </select>
          </div>

          <!-- Password -->
          <div class="input-group col-lg-6 mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text bg-white px-4 border-md border-right-0">
                <i class="fa fa-lock text-muted"></i>
              </span>
            </div>
            <input id="password" type="password" name="password" placeholder="Password"
              class="form-control bg-white border-left-0 border-md" >
          </div>

          <!-- Password Confirmation -->
          <div class="input-group col-lg-6 mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text bg-white px-4 border-md border-right-0">
                <i class="fa fa-lock text-muted"></i>
              </span>
            </div>
            <input id="passwordConfirmation" type="password" name="passwordConfirmation" placeholder="Confirm Password"
              class="form-control bg-white border-left-0 border-md" >
          </div>

          <!-- Gender-Section  -->
          <div class="pb-1 d-flex pb-3 ">
            <label for="gender" class="control-label gender-text">Gender :</label>
            <div class="form-check mail-radio ">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1" checked required>
              <label class="form-check-label" for="flexRadioDefault1"> Male </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"  value="0" required>
              <label class="form-check-label" for="flexRadioDefault2"> Female </label>
            </div>
          </div>
          </span>

          <!-- Select File  -->
          <div class="d-flex pb-2 select-file">
            <p> Select image to upload : </p>
            <input type="file" name="image" id="fileToUpload" class="input-file" >
          </div>

          <!-- Check-Box  -->
          <div class="input-group mb-3">
            <div class="input-group-text">
              <input class="form-check-input mt-0" type="checkbox" value="1" aria-label="Checkbox for following text input" required>
              <label for="subscribeNews" class="checkbox-text">Agree to Terms and Conditions</label>
            </div>
          </div>
          
          <!-- Submit Button -->
          <div class=" form-group col-lg-12 mx-auto mb-0 ">
            <input name="submit" type="submit" class="btn btn-primary btn-block py-2 btn-create-account but "></input>
          </div>

          <!-- Divider Text -->
          <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
            <div class="border-bottom w-100 ml-5 line-or"></div>
            <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
            <div class="border-bottom w-100 mr-5 line-or "></div>
          </div>

          <!-- Social Login -->
          <div class="form-group col-lg-12 social-button">
            <a href="https://www.facebook.com/campaign/landing.php?campaign_id=14884913640&extra_1=s%7Cc%7C589460569891%7Cb%7Cfacebook%20signin%7C&placement=&creative=589460569891&keyword=facebook%20signin&partner_id=googlesem&extra_2=campaignid%3D14884913640%26adgroupid%3D128696221832%26matchtype%3Db%26network%3Dg%26source%3Dnotmobile%26search_or_content%3Ds%26device%3Dc%26devicemodel%3D%26adposition%3D%26target%3D%26targetid%3Dkwd-3821998899%26loc_physical_ms%3D9061741%26loc_interest_ms%3D%26feeditemid%3D%26param1%3D%26param2%3D&gclid=CjwKCAjwuqiiBhBtEiwATgvixIktrOZA21Qc8G2tYgfnR3e87jmoqPrSUHI2tMmY-m_Urb_9WrWemBoCRH4QAvD_BwE"
              class="btn btn-primary btn-block py-2 btn-facebook">
              <i class="fa-brands fa-facebook-f"></i>
              <span class="font-weight-bold">Continue with Facebook</span>
            </a>
            <a href="https://twitter.com/i/flow/login" class="btn btn-primary btn-block py-2 btn-twitter">
              <i class="fa-brands fa-twitter"></i>
              <span class="font-weight-bold">Continue with Twitter</span>
            </a>
          </div>

          <!-- Already Registered -->
          <div class="text-center w-100 pt-3">
            <p class="text-muted font-weight-bold">Already Registered? <a href="index.php"
                class="already-registered ml-2">Login</a>
            </p>
          </div>
        </div>
      </form>
    </div>
    </div>
  </body>

  <script>
function clearErrors(){

errors = document.getElementsByClassName('formerror');
for(let item of errors)
{
    item.innerHTML = "";
}


}
function seterror(id, error){
//sets error inside tag of id 
element = document.getElementById(id);
element.getElementsByClassName('formerror')[0].innerHTML = error;

}

function validateForm(){
var returnval = true;
clearErrors();

//perform validation and if validation fails, set the value of returnval to false
var name = document.forms['myForm']["fname"].value;
if (name.length<5){
    seterror("name", "*Length of name is too short");
    returnval = false;
}

if (name.length == 0){
    seterror("name", "*Length of name cannot be zero!");
    returnval = false;
}

// var email = document.forms['myForm']["femail"].value;
// if (email.length>15){
//     seterror("email", "*Email length is too long");
//     returnval = false;
// }

// var phone = document.forms['myForm']["fphone"].value;
// if (phone.length != 10){
//     seterror("phone", "*Phone number should be of 10 digits!");
//     returnval = false;
// }

// var password = document.forms['myForm']["fpass"].value;
// if (password.length < 6){

//     // Quiz: create a logic to allow only those passwords which contain atleast one letter, one number and one special character and one uppercase letter
//     seterror("pass", "*Password should be atleast 6 characters long!");
//     returnval = false;
// }

// var cpassword = document.forms['myForm']["fcpass"].value;
// if (cpassword != password){
//     seterror("cpass", "*Password and Confirm password should match!");
//     returnval = false;
// }

return returnval;
}


  </script>
  
</html>

