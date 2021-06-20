<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ include_once  the above in your HEAD tag ---------->

<!-- include css file -->
<link rel="stylesheet" href="css/login.css" />

<script src="js/sha256.jquery.debug.js" type="text/javascript"></script>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first m-5">
            <img src="img/Fingent-Logo-01.png" id="icon" alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form method="POST" action="backend/login.php">
            <input type="hidden" id="random_number" name="random_number" value="<?php echo(rand(10,100)); ?>">
            <input type="hidden" id="final_password" name="final_password">
            <input type="text" class="fadeIn second" name="user_id" placeholder="User ID">
            <input type="password" class="fadeIn third" placeholder="Password" id="password">
            <input type="submit" class="fadeIn fourth mt-4  btn-danger" value="Login" name="btnLogin" id="btnLogin">
        </form>

        <!-- Alert setcions -->
        <?php if($_GET['login']==="usfalse")  { ?>
        <div class="alert alert-danger alert-dismissible m-2">

            <strong>! </strong> User Not Found
        </div>
        <?php } ?>
        <?php if($_GET['login']==="psfalse")  { ?>
        <div class="alert alert-danger alert-dismissible m-2">

            <strong> !</strong> Password is incorrect
        </div>
        <?php } ?>
        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>

    </div>

</div>

<footer class="py-2">
    <div class="container">
        <div class="small text-center text-muted">
            Copyright © 2021 - .
        </div>
    </div>
</footer>


<script>
//script for hashing password

$("#btnLogin").click(function() {

    //get passwor from text feild

    var user_password = $('#password').val();


    // hashing to pasword and store to variable hash_password
    var hash_password = $.sha256(user_password);



    //get random number in text feild
    var random_number = $("#random_number").val();

    //appent hashed password and random number
    var appented_password = hash_password + random_number;



    //hash again appented password
    var password = $.sha256(appented_password);
    console.log(password);


    //assign final hashed password in to a hidden text box 
    document.getElementById("final_password").value = password;



});
</script>