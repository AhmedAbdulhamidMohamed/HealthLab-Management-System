<?php

    require_once '../../config.php';

    require BL.'functions/validate.php';



   if(isset($_POST['submit']))
   {
       $name = ucfirst(trim($_POST["name"]));
       $id = $_POST["id"];
       if(checkEmpty($name) && checkLength($name,3))
       {
           $row = rowGet('cities', 'id', $id);
           if($row)
           {
               $sql = "UPDATE cities SET `name` = '$name' WHERE id = $id";
               $success_message = db_update($sql);
               header("refresh:2; url=" .BUA."cities");
           }
           else
           {
               $error_message = "Type Data Correctly";
           }
       }
       else{
           $error_message = "fill all the required fields";
       }
   }





    require_once BLA.'inc/header.php';
    require BL.'functions/error.php';
    require_once BLA.'inc/footer.php';

