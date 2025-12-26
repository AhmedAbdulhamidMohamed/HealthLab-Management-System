<?php

    require_once '../../config.php';

    require BL.'functions/validate.php';


    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $id = $_POST['id'];


        if(checkEmpty($name) && checkLength($name,3)){
            $row = getRow('id', $id, 'services');
            if($row){
                $query = "UPDATE `services` SET `name` = '$name' WHERE `id` = '$id'";
                $success_message = db_update($query);
                header("refresh:2; url=" .BUA."services");
            }else{
                $error_message = "Type Data Correctly";
            }
        }else{
            $error_message = "fill all the required fields";
        }
    }

    require_once BLA.'inc/header.php';
    require BL.'functions/error.php';
    require_once BLA.'inc/footer.php';
