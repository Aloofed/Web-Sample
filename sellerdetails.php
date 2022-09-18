<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angela's Beauty Shop | Product Details</title>
    <link rel="stylesheet" href="adminpage.css">  
</head>
<body>
    <div class="modals" id="modals">
        <div class="contain"> 
            <div class="cold">
                <?php
                    include_once('connection.php'); 
            
                 if(isset($_POST['update'])){
                    $ids = $_POST['up_id'];

                    $quers = "SELECT * FROM products WHERE id = '$ids'";
                    $quers_ran = mysqli_query($connect, $quers);
                    foreach($quers_ran as $row){
                        ?>
                        <div class="cool">
                         <input type="radio"  name="radio-btn" id="radio1">
                         <input type="radio"  name="radio-btn" id="radio2">
                         <input type="radio"  name="radio-btn" id="radio3"> 

                         <div class="sic first">
                             <img src="<?php echo "pic/".$row['pic']; ?>" alt="">
                         </div>
                         <div class="sic">
                             <img src="<?php echo "pic/".$row['pic2']; ?>" alt="">
                         </div>
                         <div class="sic">
                             <img src="<?php echo "pic/".$row['pic3']; ?>" alt="">
                         </div>
                         <div class="manual">
                             <label for="radio1" class="manual-btn"></label>
                             <label for="radio2" class="manual-btn"></label>
                             <label for="radio3" class="manual-btn"></label>
                             
                          </div>
                        </div>
                        <form action="Users.php" method="post" enctype="multipart/form-data">
                
                        <div class="inps2">
                             <input type="text" name="name" placeholder="Product Name" value="<?php echo $row['name'];?>" required >
                        </div>
                    
                        <div class="inps3">
                            <input type="text" name="price" placeholder="Price" value="<?php echo $row['price'];?>" required>
                        </div> 
                        <div class="inps3"> 
                            <input type="text" name="stock" placeholder="Stock" value="<?php echo $row['stock'];?>" required>
                        </div> 
                        <div class="btsn">
                           <button class="save" name="updating">Update</button>
                           <input type="hidden" name="up_id" value="<?php echo $row['id']?>">
                           <a class="cans" href="sellerpage.php">Cancel</a>
                        </div>     
                        </form>
  


                        <?php

                    }
                  }
                ?>
                
                       
            </div>
        </div>
    </div>
    
</body>
</html>