<?php

include 'dbconnect.php';

if(isset($_POST['admin_id'])){
    $qry = $con->prepare('SELECT * FROM admin_student_mapping
                            INNER JOIN student_details
                            ON admin_student_mapping.Student_id = student_details.Student_id
                            WHERE admin_student_mapping.Admin_id = ?');
    //echo $con->error;
    $qry->bind_param('s', $_POST['admin_id']);
    $qry->execute();

    if($res = $qry->get_result()){
        ?>
        <div style="overflow-x:auto;">
        <table class="table table-dark table-striped">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Student Id.</th>
              <th scope="col">Student Name</th>
              <th scope="col">Bio</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
                <?php
                $i = 1;
                while($row = $res->fetch_assoc()){
                  ?>
                    <tr>
                    <th scope='row'><?php echo $i ?></th>
                    <td><?php echo $row['Student_Id']?></td>
                    <td><?php echo $row['Name'] ?></td>
                    <td><?php echo $row['Bio'] ?></td>
                    <td><?php echo $row['Email'] ?></td>
                    <td><?php echo $row['Phone'] ?></td>
                    <td>
                    <a class='btn btn-success' href='view_student.php?student_id=<?php echo $row['Student_Id'] ?>'>View Student</a>
                    <!--button class='btn btn-danger' >Remove</button -->
                  </tr>
        <?php
                  $i++;
                }
                ?>
        </tbody>
        </table>
        </div>

        <?php
    }else{
        echo $con->error;
    }
}
?>