<?php
    require_once '../../config.php';
    require_once BLA . 'inc/header.php';
    require BL . 'functions/validate.php';

    if (isset($_GET['id'])) {
        $data = getRow('id', $_GET['id'], 'services');
        if($data){
            $id = $data['id'];
        }else{
            header('Location:'.BUA);
        }
    }else{
        header('Location:'.BUA);
    }


?>
<div class="col-sm-6 offset-sm-3 border p-3">
        <h3 class="text-center p-3 bg-primary text-white"> Edit Service</h3>
        <form method="post" action="<?php echo BUA.'services/update.php'; ?>">
            <div class="form-group">
                <label >Name Of Service</label>
                <label>
                    <input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>" >
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                </label>
            </div>

            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>
    </div>
<?php
    require_once BLA . 'inc/footer.php';
