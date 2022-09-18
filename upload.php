<?php

include_once('connection.php');

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
            window.location.href="adminpage.php"';
            echo '</script>';
        }
        else{
            echo '<script>';
            echo 'alert("Failed to Upload !!!");
            window.location.href="adminpage.php"';
            echo '</script>';
        }

    }
    else{
        echo '<script>';
        echo 'alert("Please check the file type!!!!");
        window.location.href="adminpage.php"';
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
             window.location.href="adminpage.php"';
         echo '</script>';
  
    }
    else{
      echo '<script>';
             echo 'alert("Failed to Delete!!!!");
             window.location.href="adminpage.php"';
         echo '</script>';
    }
  
  }

/*----------Update Product------------------*/
if(isset($_POST['update'])){

  $ids = $_POST['up_id'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $stock = $_POST['stock']; 

  $query = "UPDATE products SET name = '$name', price = '$price', stock ='$stock' WHERE id = '$ids'";
  $queran = mysqli_query($connect, $query);

  if($queran){
      echo '<script>';
           echo 'alert("Successfully Updated!!!!");
           window.location.href="adminpage.php"';
       echo '</script>'; 

  }
  else{
      echo '<script>';
           echo 'alert("Failed to Update!!!!");
           window.location.href="adminpage.php"';
       echo '</script>';
  }

}

  /*----------Update User------------------*/
  if(isset($_POST['uptodate'])){
    
    $upid = $_POST['upid'];
    $name = $_POST['name'];
    $mail = $_POST['email'];
    $add = $_POST['address'];
    $cont = $_POST['contact'];
    $pass = $_POST['pass'];
    $cpass = $_POST['conpass'];
    
    $quered = "UPDATE users SET name ='$name', email ='$mail', address ='$add', contact ='$cont', pass ='$pass', conpass ='$cpass' WHERE Id ='$upid'";
    $querans = mysqli_query($connect, $quered);

    if($querans){
        echo '<script>';
             echo 'alert("Successfully Updated!!!!");
             window.location.href="index.html"';
       echo '</script>'; 

    }
    else{
        echo '<script>';
             echo 'alert("Failed to Update!!!!");
             window.location.href="userpage.php"';
         echo '</script>';
    }

  }
  /*----------Add to Cart------------------*/
  
  if(isset($_POST['addcart'])){
    $id = $_POST['id'];
    $idol = $_POST['idol'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $mail = $_POST['mail']; 
    $selmail = $_POST['selmail']; 
    $orig = $_POST['stock'];
    $quan = $_POST['quan']; 
    $stock = $_POST['stock']-$_POST['quan'];
    $total = $_POST['quan']*$_POST['price']; 
    
    
    
    $query ="INSERT INTO cart(selmail,userID,userEmail,Id,Pname,Pprice,quantity,total,stock,origstock) VALUES('$selmail','$id','$mail',$idol,'$name','$price','$quan','$total','$stock','$orig')";
    $query_run = mysqli_query($connect, $query);
    

    if($query_run){
      echo '<script>';
      echo 'alert("Item added to cart"); 
      window.location.href="userpage.php"';
      echo '</script>';
  }
  else{
      echo '<script>';
      echo 'alert("Failed to add cart");
      window.location.href="userpage.php"';
      echo '</script>';
  }
        
}

/*----------Update Product------------------*/
if(isset($_POST['addcart'])){

  $ids = $_POST['idol'];
  $quan = $_POST['quan'];
  $stock = $_POST['stock'];

  $min = $_POST['stock']-$_POST['quan'];

  $query = "UPDATE products SET stock = '$min' WHERE id = '$ids'";
  $queran = mysqli_query($connect, $query);

  if($queran){
      

  }
  else{
      echo '<script>';
           echo 'alert("Failed to Update!!!!");
           window.location.href="userpage.php"';
       echo '</script>';
  }

}
/*--------------------------------------Sold Product------------------*/
if(isset($_POST['addcart'])){

  $mail = $_POST['mail'];
  $selmail = $_POST['selmail']; 
  $id = $_POST['idol'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $quan = $_POST['quan'];
  $total = $_POST['quan']*$_POST['price']; 

  
  $query = "INSERT INTO sold(selmail,userEmail,Id,Pname,Pprice,quantity,total) VALUES ('$selmail','$mail','$id','$name','$price','$quan','$total')";
  $query_run = mysqli_query($connect, $query);
  if($query_run){
  
  }
  else{
    echo '<script>';
           echo 'alert("Sold item failed!!!");
           window.location.href="cart.php"';
       echo '</script>';
  }
  

}
if(isset($_POST['ups'])){
  $id = $_POST['id'];
  $mail = $_POST['mail'];
  $total = $_POST['quan']*$_POST['price']; 
  $quan = $_POST['quan'];
  
  $query = "UPDATE sold SET quantity = '$quan', total = '$total' WHERE Id = '$id'";
  $query_run = mysqli_query($connect, $query);

  if($query_run){
    echo '<script>';
           echo 'alert("Product Updated");
           window.location.href="cart.php"';
       echo '</script>';
  }
  else{
    echo '<script>';
           echo 'alert("Cant update product");
           window.location.href="cart.php"';
       echo '</script>';
  }
}

/*----------Remove from the Cart------------------*/
if(isset($_POST['cancel'])){
  $id = $_POST['id'];

  $query = "DELETE FROM cart WHERE id = '$id'";
  $query_runned = mysqli_query($connect, $query);

  if($query_runned){
    echo '<script>';
           echo 'alert("Item removed!!!");
           window.location.href="cart.php"';
       echo '</script>';

  }
  else{
    echo '<script>';
           echo 'alert("Cancel item failed!!!");
           window.location.href="cart.php"';
       echo '</script>';
  }

}
/*----------Update Product------------------*/
if(isset($_POST['cancel'])){

$ids = $_POST['id'];
$quan = $_POST['quan'];
$stock = $_POST['stock'];

$min = $_POST['origstock'];

$query = "UPDATE products SET stock = '$min' WHERE id = '$ids'";
$queran = mysqli_query($connect, $query);

if($queran){
    

}
else{
    echo '<script>';
         echo 'alert("Failed to Update!!!!");
         window.location.href="userpage.php"';
     echo '</script>';
}

}


 /*----------------This area is the update of the products quantity-------------*/

 if(isset($_POST['ups'])){
  $id = $_POST['id'];
  $mail = $_POST['mail'];
  $total = $_POST['quan']*$_POST['price']; 
  $quan = $_POST['quan'];
  
  $query = "UPDATE cart SET quantity = '$quan', total = '$total' WHERE Id = '$id'";
  $query_run = mysqli_query($connect, $query);

  if($query_run){
    echo '<script>';
           echo 'alert("Product Updated");
           window.location.href="cart.php"';
       echo '</script>';
  }
  else{
    echo '<script>';
           echo 'alert("Cant update product");
           window.location.href="cart.php"';
       echo '</script>';
  }
}
 /*----------Update Product------------------*/
if(isset($_POST['ups'])){

$ids = $_POST['id'];
$quan = $_POST['quan'];
$stock = $_POST['stock'];

$min = $_POST['origstock']-$_POST['quan'];

$query = "UPDATE products SET stock= '$min' WHERE id = '$ids'";
$queran = mysqli_query($connect, $query);

if($queran){
    

}
else{
    echo '<script>';
         echo 'alert("Failed to Update!!!!");
         window.location.href="userpage.php"';
     echo '</script>';
}

}
/*----------Remove from the Cart to purchase------------------*/
if(isset($_POST['purchase'])){
  $mail = $_POST['mail'];
  $check = $_POST['ids'];

  $query = "DELETE FROM cart WHERE userEmail = '$mail'";
  $query_runned = mysqli_query($connect, $query);
  if($query_runned){
      
    header('Location: purchase.html');

  }
  else{
    echo '<script>';
           echo 'alert("Purchase item failed!!!");
           window.location.href="cart.php"';
       echo '</script>';
  }

}

  /*--------------------------------this area is for the rating features---------------- */
  if(isset($_POST[''])){
     $pid = $_POST['id'];
     $mail = $_POST['mail'];
     $rates = $_POST['rate'];

     $query ="UPDATE rate SET id = '$pid', rate = '$rates' WHERE userEmail = '$mail'";
     $query_run = mysqli_query($connect, $query);

     if($query_run){
      echo '<script>';
      echo 'alert("Rated successfully");
      window.location.href="userpage.php"';
      echo '</script>';

     }
     else{
      echo '<script>';
      echo 'alert("Cant rate the product");
      window.location.href="userpage.php"'; 
      echo '</script>';
     }
  }
  if(isset($_POST['rating'])){
    $pid = $_POST['id'];
    $mail = $_POST['mail'];
    $rates = $_POST['rate'];

    $query ="INSERT INTO rate(userEmail, id, rate) VALUES('$mail','$pid','$rates')";
    $query_run = mysqli_query($connect, $query);

    if($query_run){
      $_SESSION['id'] = $pid;
     echo '<script>';
     echo 'alert("Rated successfully");
     window.location.href="userpage.php"'; 
     echo '</script>';

    }
    else{
     echo '<script>';
     echo 'alert("Cant rate the product");
     window.location.href="userpage.php"';
     echo '</script>';
    }
 }
 if(isset($_POST['remove'])){
    $id = $_POST['id'];

    $query ="DELETE  FROM sold WHERE autoID = '$id'";
    $query_run = mysqli_query($connect, $query);
    if($query_run){
       header('Location: sold.php'); 
    }
    else{
      echo '<script>';
      echo 'alert("Cant remove from the list");
      window.location.href="sold.php"';
      echo '</script>';
     }
 }
?>