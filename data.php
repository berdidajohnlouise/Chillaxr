<?php
$fname= $age= '';
   if(isset($_POST['submit']))
    { 
      $_POST['fname'] || $_POST['age']; 

      if (preg_match("/[^A-Za-z'-]/",$_POST['fname'] )) {
         die ("invalid name and name should be alpha");
      }
      echo "Welcome ". $_POST['fname']. "<br />";
      echo "You are ". $_POST['age']. " years old.";
      
      exit();
  
}
?>
<html>
   <body>
   
      <form action = "<?php $_PHP_SELF ?>" method = "POST">
         Name: <input type = "text" name = "fname" />
         Age: <input type = "text" name = "age" />
         <input type = "submit" name="submit" value="Submit" />
      </form>
   
   </body>
</html>