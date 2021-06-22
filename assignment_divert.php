<?php
session_start();
$id=$_GET['identity'];
$_SESSION['task_id']=$id;
echo $_SESSION['task_id'];
?>