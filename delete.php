<?php
session_start();
$host="localhost";

$user="root";

$password="";/*NULL*/

$database="schoolproject";


$data=mysqli_connect($host,$user,$password,$database);

if($_GET['student_id']){
    $user_id=$_GET['student_id'];
    $sql="DELETE FROM user where id='$user_id'";
    $result=mysqli_query($data,$sql);
    if($result){
        $_SESSION['massage']='Student Data Is Successfully Deleted';
        header("location:view_student.php");
    }
}
?>