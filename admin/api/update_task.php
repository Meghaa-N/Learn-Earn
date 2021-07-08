<?php

include 'dbconnect.php';

if (isset($_POST['Task_id'])) {
    $output = $_POST;

    $qry = $con->prepare("UPDATE tasks 
                            SET Task_title=?,
                            Description = ?,
                            Task_status=3,
                            Due_Timestamp=TIMESTAMP(?),
                            Marks = ?,
                            Marks_possible=?,
                            Comment=?
                            
                            WHERE 
                            Task_id = ?");
    $qry->bind_param(
        "sssiisi",
        $output['Task_title'],
        $output['Description'],
        $output['Due_Timestamp'],
        $output['Marks'],
        $output['Marks_possible'],
        $output['Comment'],
        $output['Task_id']
    );

    if ($qry->execute()) {
        echo "Updated";
    } else {
        echo $con->error;
    }
} else {
    echo "boo";
}
