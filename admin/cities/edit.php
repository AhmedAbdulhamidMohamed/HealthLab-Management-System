<?php

    require_once '../../config.php';
    require_once BLA.'inc/header.php';
    require BL.'functions/validate.php';



    if(isset($_GET['id']))
    {
        $row = rowGet('cities', 'id', $_GET['id']);
        if($row)
        {
            $id = $row['id'];
        }
        else
        {
            header('location:'.BUA);
        }
    }
    else
    {
        header('location:'.BUA);
    }
?>


    <div class="col-sm-6 offset-sm-3 border p-3">
        <h3 class="text-center p-3 bg-primary text-white">Edit City</h3>
        <form method="post" action="<?php echo BUA.'cities/update.php'?>">
            <div class="form-group">
                <label >Name Of City</label>
                <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            </div>

            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>

    </div>





<?php     require_once BLA.'inc/footer.php'; ?>
