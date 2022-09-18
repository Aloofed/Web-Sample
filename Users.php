<?php

include_once('connection.php');

if(isset($_POST['register'])){
    $name = $_POST['username'];
    $email = $_POST['email'];
    $add = $_POST['address'];
    $cont = $_POST['contact'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $type = $_POST['type'];

    if($pass != $cpass){
        echo '<script>';
            echo 'alert("Password doesnt match!!!"); 
            window.location.href="register.php"';
        echo '</script>';
    }
    else{
        $query = "INSERT INTO users(name,email,address,contact,pass,conpass,type) VALUES('$name','$email','$add','$cont','$pass','$cpass','$type')";
        $queryran = mysqli_query($connect, $query);
        if($queryran){
            echo '<script>';
            echo 'alert("Registered Successfully"); 
            window.location.href="login.php"';
            echo '</script>';
        }
        else{
            echo '<script>';
            echo 'alert("Failed to Register!!!"); 
            window.location.href="register.php"';
        echo '</script>';
        }
    }
}

if(isset($_POST['login'])){
   $email= $_POST['email'];
   $pass= $_POST['password'];
   $type = $_POST['type'];

   $querys = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass' AND type = '$type'";
   $querys_rans = mysqli_query($connect, $querys);

   if($email == "admin@gmail.com" && $pass == "admin" && $type == "Admin"){
    $_SESSION['email'] = $email;
      header("Location: adminpage.php");
      die();
   }
   else{
    
       if (mysqli_num_rows($querys_rans) == 1) {
           $_SESSION['email'] = $email;
        header("Location: userpage.php");
        die();
       }
       else{
            echo '<script>';
            echo 'alert("Email and Password not found"); 
            window.location.href="login.php"';
            echo '</script>';
       }
   }
}

/*---------------------Register multiple seller----------------------------*/
if(isset($_POST['seller'])){
    $name = $_POST['username'];
    $email = $_POST['email'];
    $add = $_POST['address'];
    $cont = $_POST['contact'];
    $pass = $_POST['password'];
    $type = $_POST['type'];

    foreach($name as $index => $names){
        $sname = $names;
        $semail = $email[$index];
        $sadd = $add[$index];
        $scont = $cont[$index];
        $spass = $pass[$index];
        $stype = $type[$index];

        $query = "INSERT INTO users(name,email,address,contact,pass,type) VALUES('$sname','$semail','$sadd','$scont','$spass','$stype')";
        $query_run = mysqli_query($connect,$query);

    }
    if($query_run){
        echo '<script>';
            echo 'alert("Seller Registered"); 
            window.location.href="seller.php"';
        echo '</script>';
    }
    else{
        echo '<script>';
            echo 'alert("Registration failed"); 
            window.location.href="new.html"';
        echo '</script>';
    }


}
if(isset($_POST['del-seller'])){
    $id = $_POST['id'];

    $query = "DELETE FROM users WHERE Id = '$id'";
    $query_run = mysqli_query($connect, $query);
    if($query_run){
        echo '<script>';
            echo 'alert("Seller Account has been deleted"); 
            window.location.href="seller.php"';
        echo '</script>';
    }
    else{
        echo '<script>';
            echo 'alert("Registration failed"); 
            window.location.href="new.html"';
        echo '</script>';
    }

}
if(isset($_POST['save'])){
    $filepic = $_FILES["file"]["name"];
    $file2 = $_FILES["file2"]["name"];
    $file3 = $_FILES["file3"]["name"];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $mail = $_POST['mail'];
    

    $fileExt = explode('.',$filepic);
    $fileAct = strtolower(end($fileExt)); 
    $fileAllow = array('jpg','jpeg');
    if(in_array($fileAct,$fileAllow)){
        $query ="INSERT INTO products(pic,pic2,pic3,name,price, stock, email) VALUES('$filepic','$file2','$file3','$name','$price', '$stock', '$mail')";
        $query_run = mysqli_query($connect, $query); 
        if($query_run){
            move_uploaded_file($_FILES["file"]["tmp_name"], "pic/". $_FILES["file"]["name"] );
            move_uploaded_file($_FILES["file2"]["tmp_name"], "pic/". $_FILES["file2"]["name"] );
            move_uploaded_file($_FILES["file3"]["tmp_name"], "pic/". $_FILES["file3"]["name"] );
            echo '<script>';
            echo 'alert("Uploaded Successfully"); 
            window.location.href="sellerpage.php"';
            echo '</script>';
        }
        else{
            echo '<script>';
            echo 'alert("Failed to Upload !!!");
            window.location.href="sellerpage.php"';
            echo '</script>';
        }

    }
    else{
        echo '<script>';
        echo 'alert("Please check the file type!!!!");
        window.location.href="sellerpage.php"';
        echo '</script>';
    }
}
if(isset($_POST['updating'])){

    $ids = $_POST['up_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock']; 
  
    $query = "UPDATE products SET name = '$name', price = '$price', stock ='$stock' WHERE id = '$ids'";
    $queran = mysqli_query($connect, $query);
  
    if($queran){
        echo '<script>';
             echo 'alert("Successfully Updated!!!!");
             window.location.href="sellerpage.php"';
         echo '</script>'; 
  
    }
    else{
        echo '<script>';
             echo 'alert("Failed to Update!!!!");
             window.location.href="sellerpage.php"';
         echo '</script>';
    }
  
  }
  if(isset($_POST['delete'])){
    $id = $_POST['del_id'];
  
    $query = "DELETE FROM products WHERE id = '$id'";
    $query_runned = mysqli_query($connect, $query);
  
    if($query_runned){
      echo '<script>';
             echo 'alert("Successfully Deleted!!!");
             window.location.href="sellerpage.php"';
         echo '</script>';
  
    }
    else{
      echo '<script>';
             echo 'alert("Failed to Delete!!!!"); 
             window.location.href="sellerpage.php"';
         echo '</script>';
    }
  
  }
  if(isset($_POST['remove'])){
    $id = $_POST['id'];

    $query ="DELETE  FROM sold WHERE autoID = '$id'";
    $query_run = mysqli_query($connect, $query);
    if($query_run){
       header('Location: sellersold.php'); 
    }
    else{
      echo '<script>';
      echo 'alert("Cant remove from the list");
      window.location.href="sellersold.php"';
      echo '</script>';
     }
 }
 if(isset($_POST['delete'])){
    $id = $_POST['del_id'];
  
    $query = "DELETE FROM products WHERE id = '$id'";
    $query_runned = mysqli_query($connect, $query);
  
    if($query_runned){
      echo '<script>';
             echo 'alert("Successfully Deleted!!!");
             window.location.href="sellerpage.php"'; 
         echo '</script>';
  
    }
    else{
      echo '<script>';
             echo 'alert("Failed to Delete!!!!");
             window.location.href="sellerpage.php"';
         echo '</script>';
    }
  
  }
?>