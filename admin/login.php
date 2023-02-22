<?php
session_start();
$title = "Login";
include ('include/head.php');
?>
<body class="hold-transition login-page loginScreen" style="background: -webkit-linear-gradient(left, #003366,#004080,#0059b3
, #0073e6); background-repeat: no-repeat;
background-attachment: fixed;
background-position: center;   background-repeat: no-repeat; background-size: cover;">
<div class="login-box">
    <div class="overlay-wrapper">
        <div class="overlay" id="loading">
            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
            <div class="text-bold pt-2 ml-2">Loading...</div>
        </div>
        <div  style="background-color:  #1e90ff; background-repeat: no-repeat; background-size: 100% 100%;" class="p-5 rounded shadow">
            <div class="row">
                <img src="../img/logo_1.png" width="120" class="img-fluid mx-auto">
            </div>
            <p class="login-box-msg text-white"><strong>Sign in with your Mobile and Password</strong></p>
            <form class="loginFrm" autocomplete="new-password">
                <div class="input-group mb-3">
                    <input type="text" class="form-control border-0" placeholder="Mobile No" name="mobile" maxlength="10" autocomplete="new-password" required oninvalid="this.setCustomValidity('Please Enter Mobile Number')" oninput="setCustomValidity('')" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                        <div class="input-group-append"  style="border: none;">
                            <div class="input-group-text bg-white">
                                <span class="fas fa-mobile-alt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control border-0" name="password" id="password" placeholder="Password" required="true" oninvalid="this.setCustomValidity('Please Enter Password')"oninput="setCustomValidity('')" autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text bg-white" style="border: none;">
                                <span class="fas fa-eye-slash" id="toggle"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="lgn" value="loginProcess">
                            <button type="submit" name="loginBtn" class="btn btn-success text-bold btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.login-logo -->
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- </div> -->
    <!-- /.login-box -->
    <?php
    include ('include/script.php');
    include ('include/loginScript.php');
    ?>
</body>
</html>
