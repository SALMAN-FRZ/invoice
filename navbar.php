   <?php  
   
    include_once  'header.php'; 
     include_once  'dbConnect.php'; 
         
       
   ?>


   <head>
       <meta charset="euc-jp">
       <link rel="icon" href="images/abs_blue_icon.ico" />
       <title>Invoice</title>

       <meta name="viewport" content="width=device-width, initial-scale=1" />

       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />


       <style>
       .user-image {
           vertical-align: middle;
           width: 24px;
           height: 24px;
           border-radius: 50%;
       }
       </style>





       <!-- include_once  CSS -->

       <!-- Bootstrap core CSS -->
       <link href="<?php echo $ROOT_URI ;?>css/bootstrap.min.css" rel="stylesheet">
       <link href="<?php echo $ROOT_URI ;?>css/sidebar.css" rel="stylesheet">
       <!-- include_once  JS FILE -->
       <script src="<?php echo $ROOT_URI ;?>js/jquery.min.js"></script>
       <script src="<?php echo $ROOT_URI ;?>js/bootstrap.min.js"></script>


       <!--</nav>-->

       <nav class="navbar bg-primary py-2">
           <div class="container-fluid ">
               <div class="navbar-header">
                   <img src="<?php echo $ROOT_URI ;?>img/Fingent-Logo-01.png" alt="" width="110" />
                   <!-- <a class="navbar-brand" href="#">WebSiteName</a> -->


               </div>
               <!--  -->
               <ul class="nav navbar-nav navbar-right d-flex flex-row align-items-left">
                   <li>
                       <div id="brudcumb" class="    w-100" style="margin-left:2%; font-size :11px;"> </div>
                   </li>
                   <li><a href="#" class="text-white p-2 m-2"><img src="<?php echo $ROOT_URI ;?>img/user.jpg" alt=""
                               class="user-image" /> Admin</a></li>

                   <li><a href="#" class="text-white p-2 m-2"><span class="fa fa-bell"></span></a></li>
                   <li><a href="<?php echo $ROOT_URI ;?>logout.php?id=" class="text-white"><span
                               class="fa fa-sign-out"></span> Sign Out</a></li>
               </ul>
           </div>
       </nav>


   </head>