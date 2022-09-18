<?php 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angela's Beauty Shop | Customer Page</title>
    <link rel="stylesheet" href="userpage.css">
    
</head>
<body>
    <div class="container">
        <div class="cont">
            <nav>
                <ul>
                    <img src="log.png" class="logs">
                    <li><a href="userpage.php"><img src="./logo/home.png" class="home" title="Home"></a></li>
                    <li><a href="cart.php"><img src="./logo/cart.png" class="cart" title="My Cart"></a></li>
                    
                    <div class="drop">
                    <li><a href="#"><img src="./logo/person.png" class="acc"></a></li>
                       <div class="dropcont">
                           <?php 
                           include_once('connection.php');
                           $quer = "SELECT * FROM users WHERE email = '".$_SESSION['email']."'";
                           $query_run = mysqli_query($connect, $quer);
                            foreach( $query_run as $row){
                                ?>
                                <form action="userinfo.php" method="post">
                                <button class="acs" name="acc">Account</button>
                                <input type="hidden" name="id" value="<?php echo $row['Id']?>">
                                </form>
                                
                                <?php

                            }
                           
                           ?>
                          
                          <a href="index.html" class="logas">Log Out</a>
                       </div>
                    </div>
                </ul>
                <div class="circle">
                    <?php 
                    include_once('connection.php'); 
                    $query = "SELECT * FROM cart WHERE userEmail = '".$_SESSION['email']."'";
                    if($result = mysqli_query($connect, $query)){
                        $rowcount = mysqli_num_rows($result);

                    }
            
                    ?>
                        <p><?php echo $rowcount?></p>
                </div>
            </nav>
        </div>
    </div>
    <div class="drop">
        <div class="dropcont">
            <a href="" class="acs">Account</a>
            <a href="" class="logas">Log Out</a>
        </div>
    </div>
    <div class="contain">
        <div class="search">
            <form action="search.php" method="post" >
              <input type="text" class="inp" name="item" placeholder="Search" title="Press Enter Button" required>
              <button type="submit" name="search"><img src="./logo/search.png" class="sear"></button>
            </form>
        </div>
    </div>
    <div class="collect">
        <div class="dots">
            <?php
            include_once("connection.php");
            $query = "SELECT * FROM products ORDER BY id DESC";
            $query_ran = mysqli_query($connect, $query);
            
            if(mysqli_num_rows($query_ran)){
                foreach($query_ran as $row){
                    ?>
                    <div class="pic">
                    <img src="<?php echo "pic/".$row['pic']?>">
                       <div class="set">
                          <h3><?php echo $row['name']?></h3>
                          
                          <h4>₱<?php echo $row['price']?></h4>
                          <h4 >Stock: <span style="color: black;"><?php echo $row['stock']?></span></h4>
                          <div class="sets">

                          <?php 
                           include_once('connection.php');
                           $quer = "SELECT * FROM users WHERE email = '".$_SESSION['email']."'";
                           $query_run = mysqli_query($connect, $quer);
                            foreach( $query_run as $rows){
                                $id = $row['id'];
                                 

                                 $sq = $connect->query("SELECT * FROM rate WHERE id = '$id'");
                                 $num_run = $sq->num_rows;

                                 $sql = $connect->query("SELECT SUM(rate) AS total FROM rate WHERE id = '$id'");
                                 $data_run = $sql-> fetch_array();
                                 $total = $data_run['total'];

                                 $avg = "";
                                 if($num_run !=0){
                                     if(is_nan(round( ($total / $num_run),1 ))){
                                       $avg = 0;
                                     }
                                     else{
                                        $avg = $total / $num_run;
                                     }
                                 }
                                 else{
                                     $avg = 0;
                                 }
                                ?>
                                <form action="upload.php" method="POST">
                                <input type="number" class="num" name="quan" min="1" max="10" required>
                                 <button class="up" name="addcart" >Add to Cart</button>
                                 <input type="hidden" name="id" value="<?php echo $rows['Id']?>">
                                 <input type="hidden" name="mail" value="<?php echo $rows['email']?>">
                                 <input type="hidden" name="name" value="<?php echo $row['name']?>">
                                 <input type="hidden" name="price" value="<?php echo $row['price']?>">
                                 <input type="hidden" name="stock" value="<?php echo $row['stock']?>">
                                 <input type="hidden" name="idol" value="<?php echo $row['id']?>">
                                 <input type="hidden" name="selmail" value="<?php echo $row['email']?>">
                                </form>
                                <form action="details.php" method="post">  
                                 <button class="com" name="comment"><?php echo $num_run?> Review</button>
                                 <input type="hidden" name="id" value="<?php echo $rows['Id']?>">
                                 <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                 <input type="hidden" name="mail" value="<?php echo $rows['email']?>">
                                 <input type="hidden" name="name" value="<?php echo $row['name']?>"> 
                                 <input type="hidden" name="price" value="<?php echo $row['price']?>">
                                </form>
                            
                                <p class="ret"><?php echo $avg?>/5</p>
                                <?php

                            }
                           
                           ?>
                        
                             
                          </div>
                       </div>
                    </div>
                    <?php
                }

            }
            ?>
            
        </div>
    </div>
    <div class="footer">
        <div class="foot">
            <p>Angela's Beauty | Alright Reserved 2022</p>
        </div>
    </div>
</body>
</html>