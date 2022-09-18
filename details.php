<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Review</title>
    <link rel="stylesheet" href="details.css"> 
</head>
<body>
    <div class="cont">
        <div class="bak">
            <a href="userpage.php">Back to Home</a>
        </div>
        <?php
        include_once('connection.php');

        if(isset($_POST['comment'])){
            $ids = $_POST['id'];

            $quers = "SELECT * FROM products WHERE id = '$ids'";
            $quers_ran = mysqli_query($connect, $quers);
            foreach($quers_ran as $row){
                ?>
                <div class="conts">
                    <div class="slid"> 
                         <input type="radio"  name="radio-btn" id="radio1">
                         <input type="radio"  name="radio-btn" id="radio2">
                         <input type="radio"  name="radio-btn" id="radio3"> 

                        <div class="sec first">
                            <img class="im" src="<?php echo "pic/".$row['pic']; ?>" >
                        </div>
                        <div class="sec"> 
                            <img class="im" src="<?php echo "pic/".$row['pic2']; ?>" >
                        </div>
                        <div class="sec">
                            <img class="im" src="<?php echo "pic/".$row['pic3']; ?>" >
                        </div>
                        <div class="manual">
                             <label for="radio1" class="manual-btn"></label>
                             <label for="radio2" class="manual-btn"></label>
                             <label for="radio3" class="manual-btn"></label>
                        </div>
                    </div>
                  <p class="headname"><?php echo $row['name'];?></p>
                  <p class="price">₱ <?php echo $row['price'];?></p>
               </div>
               <div class="center">
                   <div class="star">
                       
                   <form action="upload.php" method="post">
                       <input type="radio" name="rate" id="five" value="5">
                       <label for="five"></label>
                       <input type="radio" name="rate" id="four" value="4">
                       <label for="four"></label>
                       <input type="radio" name="rate" id="three" value="3">
                       <label for="three"></label>
                       <input type="radio" name="rate" id="two" value="2">
                       <label for="two"></label>
                       <input type="radio" name="rate" id="one" value="1">
                       <label for="one"></label>
                       <span class="result"></span>
                       
                            <div class="btk">
                                 <button type="submit" name="rating">Rate</button>
                                 <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                 <input type="hidden" name="mail" value="<?php echo $_SESSION['email']?>">
                            </div>
                    </form>
                       
                   </div>
                   
               </div>
               <p>Comments</p>
               <hr>
               <form action="details.php" method="post">
                   <?php
                   include_once('connection.php');
                   $quer = "SELECT * FROM users WHERE email = '".$_SESSION['email']."'";
                   $query_run = mysqli_query($connect, $quer);
                    foreach( $query_run as $rows){
                        ?>
                        <div class="coment">
                           <form action="details.php" method="post" enctype="multipart/form-data">
                           <input type="text" name="comment" class="inpcom">
                           <button type="submit" name="subcom" class="post">Post Comment</button>
                      
                           <input type="hidden" name="id" value="<?php echo $row['id']?>">
                           <input type="hidden" name="mail" value="<?php echo $rows['email']?>">
                           <input type="hidden" name="name" value="<?php echo $row['name']?>">
                           <input type="hidden" name="price" value="<?php echo $row['price']?>">
                           </form>
                        </div>
                        <?php
                    }
                   ?>
               
               </form>
                <?php
            }
        }
        
        ?>
        
    </div>
    
    <!---------- This area is the direct CRUD of the comment feature---------------------->
    <?php
    include_once('connection.php');

    if (isset($_POST['subcom'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $mail = $_POST['mail']; 
        $comment = $_POST['comment']; 
    
        
        $query ="INSERT INTO comment(Id,email,name,price,comment) VALUES('$id','$mail','$name','$price','$comment')";
            $query_run = mysqli_query($connect, $query);
            if($query_run){
                $_SESSION['id'] = $id;
                echo '<script>';
                echo 'alert("Comment has been posted"); 
                window.location.href="userpage.php"';
                echo '</script>';
            }
            else{
                echo '<script>';
                echo 'alert("Something went wrong Please try again.");
                window.location.href="userpage.php"';
                echo '</script>';
            }
    
    }?>
   <!---------- This area is displaying the comment---------------------->
   <?php
   include_once('connection.php');
  
   
   $querys = "SELECT * FROM comment WHERE Id = '$ids'";
   $ss_run = mysqli_query($connect ,$querys);

   if (mysqli_num_rows($ss_run)) {
    foreach ($ss_run as  $rower)  {
        ?>
        <div class="collect">
            <p class="author"><?php echo $rower['email'];?></p>
            <p class="mail"><?php echo $rower['comment'];?></p>  
                            
        </div>
        <?php
    }
   }
    
   ?>
   
</body>
</html>