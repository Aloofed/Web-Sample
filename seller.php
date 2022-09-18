<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angela's Beauty Shop | Admin Page</title> 
    <link rel="stylesheet" href="seller.css"> 
</head>
<body>
    <div class="container">
        <div class="pp">
        <img src="log.png" >
        </div>
        <p>Administrator</p>
        <div class="bt">
        <a href="index.html">Log Out</a>
        </div>
    </div>
    <div class="heads">
        <a href="adminpage.php" class="add" >Go Back</a>
        <a href="new.html" class="sold">+ New Account</a> 
    </div>
    <h2 class="hed">Seller Account List</h2>
    <div class="collector">
        <div class="coll">
            
            <div class="model2">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Password</th>
                        <th>Type</th>
                        <th>Option</th>
                    </tr>
                    <?php
                    include_once('connection.php');

                    $query ="SELECT * FROM users WHERE type = 'Seller'";
                    $query_run = mysqli_query($connect, $query);
                    if(mysqli_num_rows($query_run)){
                        foreach($query_run as $rows){
                            ?>
                            <tr>
                                <td><?php echo $rows['name']?></td>
                                <td><?php echo $rows['email']?></td>
                                <td><?php echo $rows['address']?></td>
                                <td><?php echo $rows['contact']?></td>
                                <td><?php echo $rows['pass']?></td> 
                                <td><?php echo $rows['type']?></td>
                                <td>
                                    <form action="Users.php" method="post">
                                    <div class="btn">
                                        <button type="submit" name="del-seller">Delete</button>
                                        <input type="hidden" name="id" value="<?php echo $rows['Id']?>">
                                    </div>
                                    </form>
                                    
                                </td>
                    </tr>
                            <?php

                        }

                    }
                    
                    ?>
                    
                    
                </table>
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