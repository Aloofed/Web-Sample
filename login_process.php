<?php

include_once('connection.php');

if(isset($_REQUEST['login'])) //login button name is "btn_login" and set this
{
 $email  = $_REQUEST['email']; //textbox name &#34;txt_email&#34;
 $password = $_REQUEST['password']; //textbox name &#34;txt_password&#34;
 $type  = $_REQUEST['type'];  //select option name &#34;txt_role&#34; 
  
 
 if($email AND $password AND $type) 
 {
  try
  {
   $select_stmt=$db->prepare("SELECT email,pass,type FROM users
          WHERE
          email=:uemail AND pass=:upass AND type=:utype"); //sql select query
   $select_stmt->bindParam(":uemail",$email);
   $select_stmt->bindParam(":upass",$password); //bind all parameter
   $select_stmt->bindParam(":utype",$type);
   $select_stmt->execute(); //execute query
     
   while($row=$select_stmt->fetch(PDO::FETCH_ASSOC)) //fetch record from MySQL database
   {
    $dbemail =$row["email"];
    $dbpassword =$row["pass"];  //fetchable record store new variable they are &#34;$dbemail&#34;,&#34;$dbpassword&#34;,&#34;$dbrole&#34;
    $dbtype  =$row["type"];
   }
   if($email!=null AND $password!=null AND $type!=null) //check taken fields not null after countinue
   {
    if($select_stmt->rowCount() > 0) //check row greater than &#34;0&#34; after continue
    {
     if($email==$dbemail AND $password==$dbpassword AND $type==$dbtype) //check type textbox email,password,role and fetchable record new variables are true after continue
     {
      switch($dbtype)  //role base user login start
      {
       case "Admin":
        $_SESSION["admin_login"]=$email;   //session name is &#34;admin_login&#34; and store in &#34;$email&#34; variable
        $loginMsg="Admin... Successfully Login..."; //admin login success message
        header("Location: adminpage.php"); //refresh 3 second after redirect to &#34;admin_home.php&#34; page
        $_SESSION['email'] = $email;
        break;
        
       case "Seller": 
        $_SESSION["employee_login"]=$email;    //session name is &#34;employee_login&#34; and store in &#34;$email&#34; variable
        $loginMsg="Employee... Successfully Login...";  //employee login success message
        header("Location: sellerpage.php"); //refresh 3 second after redirect to &#34;employee_home.php&#34; page
        $_SESSION['email'] = $email;
        break;
        
       case "Customer":
        $_SESSION["user_login"]=$email;    //session name is &#34;user_login&#34; and store in &#34;$email&#34; variable
        $loginMsg="User... Successfully Login..."; //user login success message
        header("Location: userpage.php");  //refresh 3 second after redirect to &#34;user_home.php&#34; page
        $_SESSION['email'] = $email;
        break;
        
       default:
        $errorMsg[]="wrong email or password or type";
      }
     }
     else
     {
      
      echo '<script>';
            echo 'alert("Wrong email or password or type"); 
            window.location.href="login.php"';
      echo '</script>';
     }
    }
    else
    {
        echo '<script>';
        echo 'alert("Wrong email or password or type"); 
        window.location.href="login.php"';
        echo '</script>';
    }
   }
   else
   {
      echo '<script>';
            echo 'alert("Wrong email or password or type"); 
            window.location.href="login.php"'; 
      echo '</script>';
   }
  }
  catch(PDOException $e)
  {
   $e->getMessage();
  }  
 }
 else
 {
    echo '<script>';
    echo 'alert("Wrong email or password or type"); 
    window.location.href="login.php"';
    echo '</script>';   
 }
}


?>