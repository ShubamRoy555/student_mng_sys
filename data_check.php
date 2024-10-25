<?php
session_start();
$host="localhost";

$user="root";

$password="";/*NULL*/

$database="schoolproject";

$data=mysqli_connect($host,$user,$password,$database);

if($data===false){
    die("Connection Failed!!!");
}

if(isset($_POST['apply'])){
    $data_name=$_POST['name'];//The names of the input fileds
    $data_email=$_POST['email'];
    $data_phone=$_POST['phone'];
    $data_massage=$_POST['massage'];

    $sql="INSERT INTO admission(name,email,phone,massage) VALUES ('$data_name','$data_email','$data_phone','$data_massage')";

    $result=mysqli_query($data,$sql);

    if($result){
        $_SESSION['massage']="Application Successfully Sent";
        header("location:index.php");
    }
else{
    echo "Application Failed to sent";
}
}
?>