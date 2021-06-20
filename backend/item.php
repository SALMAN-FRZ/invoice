<?php
 // include_once  dB
include_once ("../dbConnect.php");







// add item
if(isset($_POST['add_item'])){

    	$item_name=$_POST['item_name'];
		$quantity=$_POST['quantity'];
		$price=$_POST['price'];
		$tax=$_POST['tax'];

		// Status =1, is active items
		$status=1;


    $stmt_items= $con->prepare("INSERT INTO item (status,name,qnty,price,tax) VALUES 
	(?, ?, ?,  ?, ?)");
	$stmt_items->bind_param("issss",
    $status,$item_name,$quantity,$price,$tax);
	$stmt_items->execute();

	
header('Location: ../item/items.php');
	return;



}




// Edit item
if(isset($_POST['edit_item'])){

    	$item_name=$_POST['item_name'];
		$quantity=$_POST['quantity'];
		$price=$_POST['price'];
		$tax=$_POST['tax'];

		$edit_id=$_POST['edit_id'];

		

		// Status =1, is active items
		$status=1;
		$edit_status=0;


// Update old row as inactive
	$update_items= $con->prepare("UPDATE item SET status = ?  WHERE id = ?  ");
	$update_items->bind_param("ii", $edit_status,$edit_id);
	$update_items->execute();


    $stmt_items= $con->prepare("INSERT INTO item (status,name,qnty,price,tax) VALUES 
	(?, ?, ?,  ?, ?)");
	$stmt_items->bind_param("issss",
    $status,$item_name,$quantity,$price,$tax);
	$stmt_items->execute();

	
header('Location: ../item/items.php');
	return;


}






// DELETE item
if(isset($_GET['del_id'])){
	
 $del_id= $_GET['del_id'];
	  
// Update old row as status inactive
	$update = $con->prepare("UPDATE item SET status = 0 WHERE id = ? ");
$update->bind_param("i", $del_id);
$update->execute();
header('Location: ../item/items.php');
	return;


}