
<?php
session_start();
include "db_connect.php";
if(isset($_POST["is_submit"])) {
$namefile=pathinfo($_FILES["answer"]["name"]);
$name=$_FILES["answer"]["name"];
$ext=$namefile['extension'];
//echo $ext;
$target_dir = "assignments/";
$target_name =$_SESSION['student_id']."_".$_SESSION['task_id'].".".$ext;
$target_file=$target_dir.$target_name;
//echo $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(empty($_FILES["answer"]["name"]))
{
echo "<script>alert('Content missing. Try again!.')</script>";
$uploadOk=0;
}

if ($uploadOk == 0) {
  echo "<script>alert('Sorry, your file was not uploaded.')</alert>";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["answer"]["tmp_name"], $target_file)) {
    $sql="update tasks set Submission_file='$target_name' where Student_Id=$_SESSION[student_id] and task_id=$_SESSION[task_id]";
    mysqli_query($conn, $sql);
    $sql="update tasks set Task_status=2 where Student_Id=$_SESSION[student_id] and task_id=$_SESSION[task_id]";
    mysqli_query($conn, $sql);
    $d=date('Y-m-d H:i:s');
    $sql="update tasks set Submission_date_timestamp='$d' where Student_Id=$_SESSION[student_id] and task_id=$_SESSION[task_id]";
    mysqli_query($conn, $sql);
    $sql="update tasks set Submission_Name='$name' where Student_Id=$_SESSION[student_id] and task_id=$_SESSION[task_id]";
    mysqli_query($conn, $sql);
    
}

    
 else {
    echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
  }
  echo date("Y-m-d H:i:s");
}
}