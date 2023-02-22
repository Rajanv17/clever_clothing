<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'head.php'; ?>
  <style>
   @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
   *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }
  html,body{
    display: grid;
    height: 100%;
    width: 100%;
    place-items: center;
    background: -webkit-linear-gradient(left, #003366,#004080,#0059b3
      , #0073e6);
  }
  ::selection{
    background: #1a75ff;
    color: #fff;
  }
  .wrapper{
    overflow: hidden;
    max-width: 590px;
    background: #fff;
    padding: 30px;
    margin-top: 20px;
    border-radius: 15px;
    box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
  }
  .wrapper .title-text{
    display: flex;
    width: 200%;
  }
  .wrapper .title{
    width: 50%;
    font-size: 35px;
    font-weight: 600;
    text-align: center;
    transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
  }
  .wrapper .slide-controls{
    position: relative;
    display: flex;
    height: 50px;
    width: 100%;
    overflow: hidden;
    margin: 30px 0 10px 0;
    justify-content: space-between;
    border: 1px solid lightgrey;
    border-radius: 15px;
  }
  .slide-controls .slide{
    height: 100%;
    width: 100%;
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    text-align: center;
    line-height: 48px;
    cursor: pointer;
    z-index: 1;
    transition: all 0.6s ease;
  }
  .slide-controls label.signup{
    color: #000;
  }
  .slide-controls .slider-tab{
    position: absolute;
    height: 100%;
    width: 50%;
    left: 0;
    z-index: 0;
    border-radius: 15px;
    background: -webkit-linear-gradient(left,#003366,#004080,#0059b3
      , #0073e6);
    transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
  }
  input[type="radio"]{
    display: none;
  }
  #signup:checked ~ .slider-tab{
    left: 50%;
  }
  #signup:checked ~ label.signup{
    color: #fff;
    cursor: default;
    user-select: none;
  }
  #signup:checked ~ label.login{
    color: #000;
  }
  #login:checked ~ label.signup{
    color: #000;
  }
  #login:checked ~ label.login{
    cursor: default;
    user-select: none;
  }
  .wrapper .form-container{
    width: 100%;
    overflow: hidden;
  }
  .form-container .form-inner{
    display: flex;
    width: 200%;
  }
  .form-container .form-inner form{
    width: 50%;
    transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
  }
  .form-inner form .field{
    height: 50px;
    width: 100%;
    margin-top: 20px;
  }
  .form-inner form .field input{
    height: 100%;
    width: 100%;
    outline: none;
    padding-left: 15px;
    border-radius: 15px;
    border: 1px solid lightgrey;
    border-bottom-width: 2px;
    font-size: 17px;
    transition: all 0.3s ease;
  }
  .form-inner form .field input:focus{
    border-color: #1a75ff;
    box-shadow: inset 0 0 3px #fb6aae;
  }
  .form-inner form .field input::placeholder{
    color: #999;
    transition: all 0.3s ease;
  }
  form .field input:focus::placeholder{
    color: #1a75ff;
  }
  .form-inner form .pass-link{
    margin-top: 5px;
  }
  .form-inner form .signup-link{
    text-align: center;
    margin-top: 30px;
  }
  .form-inner form .pass-link a,
  .form-inner form .signup-link a{
    color: #1a75ff;
    text-decoration: none;
  }
  .form-inner form .pass-link a:hover,
  .form-inner form .signup-link a:hover{
    text-decoration: underline;
  }
  form .btn{
    height: 50px;
    width: 100%;
    border-radius: 15px;
    position: relative;
    overflow: hidden;
  }
  form .btn .btn-layer{
    height: 100%;
    width: 300%;
    position: absolute;
    left: -100%;
    background: -webkit-linear-gradient(right,#003366,#004080,#0059b3
      , #0073e6);
    border-radius: 15px;
    transition: all 0.4s ease;
  }
  form .btn:hover .btn-layer{
    left: 0;
  }
  form .btn input[type="submit"]{
    height: 100%;
    width: 100%;
    z-index: 1;
    position: relative;
    background: none;
    border: none;
    color: #fff;
    padding-left: 0;
    border-radius: 15px;
    font-size: 20px;
    font-weight: 500;
    cursor: pointer;
  }
  .logo{
    margin-left: 40%;
    margin-bottom: 10px;
  }

</style>
</head>
<body>

  <div class="wrapper">
    <div class="logo"><img src="img/logo_1.png" alt="" width="100px" height="100px"></div>
    <div class="title-text">
      <div class="title login">Login</div>
      <div class="title signup">Signup</div>
    </div>
    <div class="form-container">
      <div class="slide-controls">
        <input type="radio" name="slide" id="login" checked>
        <input type="radio" name="slide" id="signup">
        <label for="login" class="slide login">Login</label>
        <label for="signup" class="slide signup">Signup</label>
        <div class="slider-tab"></div>
      </div>
      <div class="form-inner">
        <form  class="login">
          <div class="field">
            <input type="text" name="mobile" placeholder="Contact Number" required>
          </div>
          <div class="field">
            <input type="password" name="password" placeholder="Password" required>
          </div>
          <!-- <div class="pass-link"><a href="#">Forgot password?</a></div> -->
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" id="loginBtn" value="Login">
            <input type="hidden" name="lgn" value="loginProcess">
          </div>
          <div class="signup-link">Not a member? <a href="">Signup now</a></div>
        </form>
        <form  class="signup">
          <div class="field">
            <input type="text" name="name" placeholder="Name" required>
          </div>
          <div class="field">
            <input type="text" name="email" placeholder="Email Address" required>
          </div>
          <div class="field">
            <input type="text" name="mob" placeholder="Mobile No." required>
          </div>
          <div class="field">
            <input type="text" name="state" placeholder="State" required>
          </div>
          <div class="field">
            <input type="text" name="city" placeholder="City" required>
          </div>
          <div class="field">
            <input type="text" name="add" placeholder="Address" required>
          </div>
          <div class="field">
            <input type="password" name="pass" id="siPass" placeholder="Password" required>
          </div>
          <div class="field">
            <input type="password" name="conPass" id="conPass" placeholder="Confirm password" required>
          </div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="Signup">
            <input type="hidden" name="process" value="signup">
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="admin/plugins/toastr/toastr.min.js"></script>
  <script>
    $('form.login').submit(function(e){
      e.preventDefault();
      var form_data = new FormData(this);
      $('#loading').show();
      $.ajax({
        url : "frontProcess.php",
        method : "POST",
        data : form_data,
        contentType : false,
        processData : false,
        dataType : "json",
        success : function(response) {
          $('#loading').hide();
          if (response.code == 100)
          {
            alert('Wrong Credentials');
          }
          else if (response.code == 200)
          {
            window.location.href = 'home.php';
          }
        }
      });
    });
    $('form.signup').submit(function(e){
        e.preventDefault();
      if(($('#siPass').val()) != ($('#conPass').val())){
        alert('Wrong Password');
      }
      else{
        var form_data = new FormData(this);
        $('#loading').show();
        $.ajax({
          url : "frontprocessdata.php",
          method : "POST",
          data : form_data,
          contentType : false,
          processData : false,
          dataType : "json",
          success : function(response) {
            $('#loading').hide();
            if (response.code==100) {
              alert(response.msg);
            }
            else if (response.code==200) {
              window.location.reload();
            }
          }
        });
      }
    });
    const loginText = document.querySelector(".title-text .login");
    const loginForm = document.querySelector("form.login");
    const loginBtn = document.querySelector("label.login");
    const signupBtn = document.querySelector("label.signup");
    const signupLink = document.querySelector("form .signup-link a");
    signupBtn.onclick = (()=>{
      loginForm.style.marginLeft = "-50%";
      loginText.style.marginLeft = "-50%";
    });
    loginBtn.onclick = (()=>{
      loginForm.style.marginLeft = "0%";
      loginText.style.marginLeft = "0%";
    });
    signupLink.onclick = (()=>{
      signupBtn.click();
      return false;
    });

  </script>
</body>
</html>