<?php

    require_once '../../config.php';
    require_once BLA . 'inc/header.php';
    require BL . 'functions/validate.php';

?>

<?php
    if (isset($_POST['submit'])) {
        $serviceName = $_POST['name'];
        if(checkEmpty(trim($serviceName)) and checkLength($serviceName, 3) and preg_match('/^[a-zA-Z ]+$/', $serviceName)) {

                $query = "INSERT INTO services (name) VALUES ('$serviceName')";
                $success_message = db_insert($query);

        }else{
            $error_message = "Service name must contain letters only (no numbers or symbols) and be at least 3 characters.";
        }

    }
        require BL . 'functions/error.php';
?>
    <div class="col-sm-6 offset-sm-3 border p-3">
        <h3 class="text-center p-3 bg-primary text-white">Add New Service</h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label >Name Of Service</label>
                <label>
                    <input type="text" name="name" class="form-control" >
                </label>
            </div>

            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>
    </div>

<?php

require_once BLA . 'inc/footer.php';
