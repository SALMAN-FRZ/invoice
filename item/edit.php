 <?php 

$page = 'item';
include_once  '../navbar.php'; 

// select data of edited item
$sql_items = "SELECT * 
FROM item
WHERE id=? ";
$stmt_items= $con->prepare($sql_items); 
$stmt_items->bind_param("i", $_GET['id']);
$stmt_items->execute();
$result_items= $stmt_items->get_result();
$items = $result_items->fetch_assoc(); // fetch data 
?>
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
                         <input type="text" class="form-control" placeholder="Item Name " name="item_name"
                             value="<?php echo $items['name']; ?>" required>
                         <!-- Hidden field for  edit id-->
                         <input type="hidden" name="edit_id" value="<?php echo $_GET['id']; ?>">
                     </div>

                 </div>
                 <div id="ajax_result_for_itemCode">
                     <div class="row mt-3">
                         <div class="col">
                             <label>Quantity</label>
                             <input type="text" class="form-control" placeholder="Quantity " name="quantity"
                                 value="<?php echo $items['qnty']; ?>" required>
                         </div>

                     </div>
                 </div>
                 <div class="row mt-2">
                     <div class="col">
                         <label>Unit Price </label>
                         <input type="text" class="form-control" placeholder="Unit Price    "
                             value="<?php echo $items['price']; ?>" name="price">
                     </div>


                 </div>



                 <div class="row mt-2">
                     <div class="col">
                         <label>Tax </label>
                         <input type="text" class="form-control" placeholder="Tax " value="<?php echo $items['tax']; ?>"
                             name="tax">
                     </div>
                 </div>




                 <br>
                 <button class="  btn btn-primary" name="edit_item">SAVE</button>
             </form>
         </div>


     </div>



 </body>

 </html>