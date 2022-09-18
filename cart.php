<?php
include_once('connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angela's Beauty Shop | My Cart</title> 
    <link rel="stylesheet" href="cart.css">
</head>

<body>
    <div class="container">
        <div class="cont">
            <nav>
                <ul>
                    <img src="log.png" class="logs">
                    <li><a href="userpage.php"><img src="./logo/home.png" class="home" title="Home"></a></li>
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
            </nav>
        </div>
    </div>
    <div class="tab">
        <table>
            
            <tr>
                
                <th>Name of Item</th>
                <th>Item Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Options </th>
            </tr>
            <?php
            include_once('connection.php');
              
            $query = "SELECT * FROM cart WHERE userEmail = '".$_SESSION['email']."'";
            $query_run = mysqli_query($connect, $query);

            if(mysqli_num_rows($query_run)){
                foreach($query_run as $rows){
                    
                    ?>
                    <tr>
                    
                    <td><?php echo $rows['Pname']?></td>
                    <td style="color: green;">₱<?php echo $rows['Pprice']?></td>
                    <td>
                        <form action="upload.php" method="post">
                        <input type="number" min="1" max="10" class="nom" name="quan" value="<?php echo $rows['quantity']?>"><button name="ups" class="upbtn">Update</button>
                        <input type="hidden" name="mail" value='<?php echo $rows['email']?>'>
                        <input type="hidden" name="id" value="<?php echo $rows['Id']?>">
                        <input type="hidden" name="price" value="<?php echo $rows['Pprice']?>">
                        <input type="hidden" name="total" value="<?php echo $rows['total']?>">
                        <input type="hidden" name="origstock" value="<?php echo $rows['origstock']?>">
                        <input type="hidden" name="stock" value="<?php echo $rows['stock']?>">
                        
                        </form>
                    </td>
                    <td style="color: green;">₱<?php echo $rows['total']?></td>
                    <td>
                        <form action="upload.php" method="post">
                         <button type="submit" name="cancel">Cancel Order</button>
                         <input type="hidden" name="mail" value='<?php echo $rows['email']?>'>
                         <input type="hidden" name="id" value="<?php echo $rows['Id']?>">
                         <input type="hidden" name="stock" value="<?php echo $rows['stock']?>">
                         <input type="hidden" name="quan" value="<?php echo $rows['quantity']?>">
                         <input type="hidden" name="origstock" value="<?php echo $rows['origstock']?>">
                        </form>
                        
                    </td>
                </tr>
                    <?php

                }
                ?>
                </table>
        <div class="mod">
            <div class="mods">
                <?php
                include_once('connection.php');
                $qry = "SELECT SUM(total) AS count FROM cart WHERE userEmail = '".$_SESSION['email']."'";
                $total = 0;
                $duration = $connect->query($qry);
                $record = $duration->fetch_array();
                $total = $record['count'];
                ?>
                <h2>₱<?php echo number_format($total) ?></h2>
                
                <form action="upload.php" method="post">
                  <button class="btn" name="purchase" type="submit">Purchase</button>
                  <input type="hidden" name="mail" value="<?php echo $_SESSION['email']?>">
                </form>
            </div>

        </div>
                <?php
            }
            
            ?>
        
        
    </div>
</body>
</html>