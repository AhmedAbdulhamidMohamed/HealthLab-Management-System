<?php
    require_once '../../functions/db.php';


    $item_id = $_GET['item_id'];
    $field = $_GET['field'];
    $table = $_GET['table'];

    $query = "DELETE FROM $table WHERE $field = '$item_id'";
    $delete = deleteRow($query);

    if ($delete) {
        $data['status'] = "success";
        $data['message'] = "Item has been deleted";
    } else {
        $data['status'] = "error";
        $data['message'] = "Failed to delete item";
    }



    echo json_encode($data);


