 <?php 
include 'dbconnect.php';

if (isset($_POST["productId"])) {
  
    
    
    $productId = $_POST["productId"];
    $sql1 = "UPDATE products SET status = '1' WHERE id=".$productId."";
    $result1 = mysqli_query($conn, $sql1);
        if($result1){
            $sql2 ="select * from products where status = 1  and id=".$productId."";
            $result2 = $conn->query($sql2);
             $row = $result2->fetch_assoc();
             
             echo   '<tr id="ProductRowID'.$row["id"].'">
             
             <td class="image"><img src="'.$row["image_link"].'"
             alt="Item Name"></td>
             <td>
             <div class="cart-item-title">
             <a
             href="page-product-details.php?product_id='.$row["id"].'">'.$row["name"].'</a>
							</div>
							<div class="desc">'.$row["description"].'</div>

						</td>

						<td>

							<div class="feature">
								Product ID: <b>'.$row["id"].'</b>
							</div>
							<div class="feature">
								Category: <b>'.$row["category"].'</b>
							</div>
							<div class="feature">
								Condition: <b>'.$row["pCondition"].'</b>
							</div>
							<div class="feature">
								Seller ID: <b>'.$row["FR_studentid"].'</b>
							</div>
							<div class="feature">
								Price: <b>'.$row["price"].'SAR</b>
							</div>

						</td>

						<td>
							<div class="btn-group btn-group-lg">
								<button type="button" class="btn btn-success"
									onclick="acceptRequest('.$row["id"].')">Accept</button>
								<button type="button" class="btn btn-danger"
									onclick="rejectRequest('.$row["id"].')">Reject</button>
						
						</td>


					</tr> ';
            
            
            
            
    
  
   
        
        
        
        
        
        
        
   
} else {
    echo   'alert(error)';
}
}
?>