
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
        <a href="sellerpage.php" class="add" >Products</a>
    </div>
    <h2 class="hed">Sold Items</h2>
    <div class="collector">
        <table>
            <tr>
                <th>Customer</th>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Options </th>
            </tr>
            
            <?php
                include_once('connection.php');
                $query ="SELECT * FROM sold WHERE selmail ='".$_SESSION['email']."'";
                $query_run = mysqli_query($connect, $query);

                if(mysqli_num_rows($query_run)){
                   foreach ($query_run as $rows) {
                       ?>
                       <tr>
                       <td><?php echo $rows['userEmail'];?></td>
                       <td><?php echo $rows['Pname'];?></td> 
                       <td style="color: green;">₱ <?php echo $rows['Pprice'];?></td>
                       <td><?php echo $rows['quantity'];?></td>
                       <td style="color: green;">₱ <?php echo $rows['total'];?></td> 
                    <td>
                        <form action="Users.php" method="post">
                         <button type="submit" class="remo" name="remove">X</button>
                         <input type="hidden" name="id" value="<?php echo $rows['autoID'];?>">
                        </form>
                        
                       
                    </td>
                    </tr> 
                       
                       <?php
                   }
                }
                
                ?>
                
            
        </table>
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