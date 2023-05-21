<!-- delete offence from database -->

<?php
	include'connect.php';
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM reported_offence WHERE id= :post_id");
	$result->bindParam(':post_id', $id);
        if($result->execute()){    
      header("location:view-offence.php");
        }else{
            echo 'error, Please retry';
        }     
?>