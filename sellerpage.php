
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angela's Beauty Shop | Seller Page</title>
    <link rel="stylesheet" href="adminpage.css">
</head>
<body>
    <div class="container">
        <div class="pp">
        <img src="log.png" >
        </div>
        <?php
        include_once('connection.php'); 
        $query = "SELECT * FROM users WHERE email = '".$_SESSION['email']."'";
        $query_run = mysqli_query($connect, $query);

        foreach($query_run as $rows){
            ?>
             <p><?php echo $rows['name']?></p>
            <?php

        }

        
        ?>
       
        <div class="bt">
        <a href="index.html">Log Out</a>
        </div>
    </div>
    <div class="heads">
        <button class="adds" id="open">+ Add Product</button>
        <?php
        include_once('connection.php');
        $query = "SELECT * FROM sold WHERE selmail ='".$_SESSION['email']."' ORDER BY id DESC";
        if($query_run = mysqli_query($connect, $query)){
             $count = mysqli_num_rows($query_run);
        }

        ?>
        <a href="sellersold.php" class="sold"><?php echo $count?> Sold Items</a>
        
    </div>
    <div class="collect">
        <div class="dots">
            <?php
            include_once("connection.php");
            $query = "SELECT * FROM products WHERE email='".$_SESSION['email']."' ORDER BY id DESC";
            $query_ran = mysqli_query($connect, $query);

            if(mysqli_num_rows($query_ran)){
                foreach($query_ran as $row){
                    ?>
                    <div class="pic"> 
                    <img src="<?php echo "pic/".$row['pic']?>"> 
                       <div class="set">
                          <h3><?php echo $row['name']?></h3> 
                          
                          <h4>₱<?php echo $row['price']?></h4>
                          <h4>Stock: <span style="color: black;"><?php echo $row['stock']?></span></h4>
                          <div class="sets">
                        
                              <form action="sellerdetails.php" method="POST">
                                 <button class="up" name="update" >Update</button>
                                 <input type="hidden" name="up_id" value="<?php echo $row['id']?>"> 
                              </form>
                             
                              <form action="Users.php" method="post">
                                 <button class="del" name="delete">Delete</button>
                                 <input type="hidden" name="del_id" value="<?php echo $row['id']?>">
                              </form>
                             
                          </div> 
                       </div> 
                    </div>
                    <?php
                }

            }
            ?>
        
        </div>
    </div>
    <div class="model">
        <div class="conts">
            <div class="cols">
                <form action="Users.php" method="post" enctype="multipart/form-data">
                <div class="inp1">
                    <p>First Photo</p>
                    <input type="file" name="file" required >
                </div>
                <div class="inpu1">
                    <p>Second Photo</p>
                    <input type="file" name="file2" required >
                </div>
                <div class="inpu1">
                    <p>Third Photo</p>
                    <input type="file" name="file3" required >
                </div>
                <div class="inp2">
                    <input type="text" name="name" placeholder="Product Name" required >
                </div>
                <div class="inp3">
                    <input type="text" name="price" placeholder="Price" required>
                </div> 
                <div class="inp3"> 
                    <input type="text" name="stock" placeholder="Stock" required>
                </div>
                <div class="bts">
                    <button class="save" name="save">Save</button>
                    <button class="can" id="close">Cancel</button>
                    <input type="hidden" name="mail" value="<?php echo $_SESSION['email']?>">
                </div>     
                </form>
                       
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="foot">
            <p>Angela's Beauty | Alright Reserved 2022</p>
        </div>
    </div>
    
    <script src="popup.js"></script>
    <script src="pop.js"></script>
</body>
</html>