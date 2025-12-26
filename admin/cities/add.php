<?php

    require_once '../../config.php';
    require_once BLA.'inc/header.php';
    require BL.'functions/validate.php';
?>
<?php

    if(isset($_POST["submit"]))
    {
        $name = ucfirst(trim($_POST["name"]));
        if(checkEmpty($name) && checkLength($name,3))
        {
            $sql = "INSERT INTO cities (`name`) VALUES ('$name') ";
            $success_message = db_insert($sql);
        }
        else{
            $error_message = "Name should be at least 5 characters";
        }
    }

    require BL.'functions/error.php';
?>

    <div class="col-sm-6 offset-sm-3 border p-3">
        <h3 class="text-center p-3 bg-primary text-white">Add New City</h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label >Name Of City</label>
                <input type="text" name="name" class="form-control" >
            </div>

            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>

    </div>





<?php     require_once BLA.'inc/footer.php'; ?>
