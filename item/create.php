 <?php 

$page = 'item';
include_once  '../navbar.php'; ?>
 <!DOCTYPE html>
 <html lang="en">

 <!-- include_once  navbar -->


 <body>



     <div class="row" id="body-row" style="height: 10%;">

         <div class="col-2">
             <!-- include_once  sidebar -->
             <?php include_once  '../sidebar.php'; ?>
         </div>
         <div class="col-10">

             <form action="../backend/item.php" method="post" class="m-2">

                 <h5>BASIC DETAILS</h5>
                 <hr>
                 <div class="row mt-3">
                     <div class="col">
                         <label>Item Name</label>
                         <input type="text" class="form-control" placeholder="Item Name " name="item_name" required>
                     </div>

                 </div>
                 <div id="ajax_result_for_itemCode">
                     <div class="row mt-3">
                         <div class="col">
                             <label>Quantity</label>
                             <input type="text" class="form-control" placeholder="Quantity " name="quantity" required>
                         </div>

                     </div>
                 </div>
                 <div class="row mt-2">
                     <div class="col">
                         <label>Unit Price </label>
                         <input type="text" class="form-control" placeholder="Unit Price    " name="price">
                     </div>


                 </div>



                 <div class="row mt-2">
                     <div class="col">
                         <label>Tax </label>
                         <input type="text" class="form-control" placeholder="Tax " name="tax">
                     </div>
                 </div>




                 <br>
                 <button class="  btn btn-primary" name="add_item">SAVE</button>
             </form>
         </div>


     </div>



 </body>

 </html>