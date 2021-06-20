 <?php 

$page = 'item';
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
 <style>
#scroll {
    overflow: scroll;
    height: 75vh;
}
 </style>

 <body>



     <div class="row" id="body-row" style="height: 10%;">

         <div class="col-2">
             <!-- include_once  sidebar -->
             <?php include_once  '../sidebar.php'; ?>
         </div>
         <div class="col-10">
             <div class="row mt-1 mb-1">

                 <div class="col-9">
                     <div class="btn-group me-2">
                         <a href="create.php"> <button type="button" class="btn btn-primary">Add
                                 Item</button></a>
                     </div>
                 </div>
             </div>
             <hr>
             <div class="my-3 p-3 bg-body rounded shadow-sm">

                 <h6 class="border-bottom pb-2 mb-0">Item List</h6>

                 <div id="scroll">


                     <?php while($row_ = $result_->fetch_assoc()) {  ?>








                     <div class="d-flex text-muted pt-3">

                         <a href="item.php?id=<?php echo $row_ ['id']; ?>">


                             <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
                                 preserveAspectRatio="xMidYMid slice" focusable="false">
                                 <title>Placeholder</title>
                                 <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff"
                                     dy=".3em">32x32</text>
                             </svg>

                             <div class="pb-3 mb-0 small lh-sm border-bottom w-100">

                                 <div class="d-flex justify-content-between m-2">

                                     <div class="search-word"><strong
                                             class="text-gray-dark"><?php echo $row_ ['name']; ?></strong>
                                     </div>

                                     <div>
                                         <a class="m-2" href="edit.php?id=<?php echo $row_ ['id']; ?>">Edit</a>
                                         <a class="m-2">|</a>
                                         <a class="m-2" onclick="return confirm('Are you sure?');"
                                             href="../backend/item.php?del_id=<?php echo $row_['id']; ?>">Delete</a>
                                     </div>

                                 </div>

                                 <table>
                                     <tr>
                                         <td>Quantity</td>
                                         <td>:</td>
                                         <td> <?php echo $row_ ['qnty']; ?></td>
                                     </tr>
                                     <tr>
                                         <td>Price</td>
                                         <td>:</td>
                                         <td> <?php echo $row_ ['price']; ?></td>
                                     </tr>
                                     <tr>
                                         <td>Tax</td>
                                         <td>:</td>
                                         <td> <?php echo $row_ ['tax']; ?></td>
                                     </tr>
                                 </table>



                             </div>

                         </a>
                     </div>


                     <?php } ?>


                 </div>

             </div>
         </div>


     </div>



 </body>

 </html>