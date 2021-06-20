 <?php 

$page = 'invoice';
include_once  '../navbar.php'; 

// Select items data
$query_= $con->prepare("SELECT *
FROM item
WHERE STATUS=1");
$query_->execute();
$result_= $query_->get_result();
?>
 <!DOCTYPE html>
 <html lang="en">

 <!-- include_once  navbar -->

 <link href="<?php echo $ROOT_URI ;?>css/invoice.css" rel="stylesheet">

 <body>



     <div class="row" id="body-row" style="height: 10%;">

         <div class="col-2">
             <!-- include_once  sidebar -->
             <?php include_once  '../sidebar.php'; ?>
         </div>
         <div class="col-10">

             <div id="main_row">
                 <div class="row">
                     <?php 
                //  include items selection section
                 include_once  'Item/item.php'; 
                 
                //  include selected item section
                 include_once  'Selected/selected.php';
                 ?>

                 </div>

                 <div class="row">
                     <div class="col-8"></div>
                     <div class="col-4">
                         <div class="row  ">
                             <div class="col-2 pt-2"> <button class="btn btn-primary"
                                     onclick="printDiv();">Print</button>
                             </div>
                             <div class="col-10 pt-2"> <i class="fa fa-inr fa-2x"></i> &nbsp;<span class="font-2  "
                                     id="total_amount_invoice">0.00</span></div>

                         </div>
                     </div>

                 </div>
             </div>

             <!-- div for print -->
             <?php
              include_once  'Print/print.php';
                 ?>

         </div>


     </div>

     <!-- include sale js -->
     <script src="<?php echo $ROOT_URI ;?>js/custom-sale.js"></script>


 </body>

 </html>