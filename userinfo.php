<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angela's Beauty Shop | Customer Information</title>
    <link rel="stylesheet" href="userinfo.css">
</head>
<body>
    <div class="container">
        <div class="lami">
        <img src="log.png" >
        </div>
        <?php
        if(isset($_POST['acc'])){

            include_once('connection.php');
            $id = $_POST['id'];
            $quer = "SELECT * FROM users WHERE Id ='$id'";
            $querdag = mysqli_query($connect, $quer); 
            
            foreach($querdag as $row){
                $_SESSION['id'] = $id;
                ?>
                <p><?php echo $row['name']?></p>
                <?php

            }
        }
    
        ?>
    
        <div class="sett">
            <a href="userpage.php"><img src="./logo/home.png" class="homi" title="Home"></a>
            <a href="index.html"><img src="./logo/out.png" class="out" title="Log Out"></a>
        </div>
    </div>
    <div class="contain">
        <div class="modal">
            <?php
            include_once('connection.php');
        
            if(isset($_POST['acc'])){
                $id = $_POST['id'];
                
                $quer = "SELECT * FROM users WHERE Id ='$id'";
                $querdag = mysqli_query($connect, $quer); 

                foreach($querdag as $row){ 
                    ?>
                    <form action="upload.php" method="post">
                    <div class="inp1">
                      <input type="text" placeholder="Name" name="name"   value="<?php echo $row['name'];?>" required>
                   </div>
                   <div class="inp2">
                      <input type="text" placeholder="Email" name="email"   value="<?php echo $row['email'];?>" required>
                   </div>
                   <div class="inp3">
                      <input type="text" placeholder="Address" name="address"   value="<?php echo $row['address'];?>" required>
                  </div>
                  <div class="inp4">
                      <input type="text" placeholder="Contact" name="contact"  value="<?php echo $row['contact'];?>" required >
                  </div>
                  <div class="inp5">
                      <input type="password" placeholder="Password" name="pass"   value="<?php echo $row['pass'];?>" required>
                  </div>
                  <div class="inp6">
                      <input type="password" placeholder="Confirm Password" name="conpass"  value="<?php echo $row['conpass'];?>" required>
                  </div>
                  <div class="btn">
                      <button  name="uptodate">Update</button>
                      <input type="hidden" name="upid" value="<?php echo $row['Id']?>">
                  </div>
                    </form>
                    
                    <?php
                }

            }
            
            ?>
            
        </div>
    </div>

</body>
</html>