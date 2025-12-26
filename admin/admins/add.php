<?php
    require_once '../../config.php';
    require_once BLA.'inc/header.php';
    require BL.'functions/validate.php';



    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        if(checkEmpty($name) AND checkLength($name,8)) {
            if(checkEmail($email)) {
                if(checkEmpty($password) AND checkLength($password,8)){
                    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO admins (`name`,`email`,`password`)
                    VALUES ('$name','$email','$hashedpassword') ";
                    $success_message = db_insert($sql);

                }else{
                    $error_message = "please enter valid password";
                }
            }else{
                $error_message = "please enter valid email address";
            }
        }else{
            $error_message = "Please enter correct name";
        }

        require BL.'functions/error.php';
    }


?>
<!--    <div>-->
<!--        --><?php
//        echo " $name <br> $email <br> $password";
//        ?>
<!--    </div>-->
    <div class="col-sm-6 offset-sm-3 border p-3">
        <h3 class="text-center p-3 bg-primary text-white">Add New Admin</h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label >Name </label>
                <input type="text" name="name" class="form-control" >
            </div>

            <div class="form-group">
                <label >Email </label>
                <input type="email" name="email" class="form-control" >
            </div>

            <div class="form-group">
                <label >Password </label>
                <input type="password" name="password" class="form-control" >
            </div>


            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>

    </div>

<?php
    require_once BLA.'inc/footer.php';