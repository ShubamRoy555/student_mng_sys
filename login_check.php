<?php
error_reporting(0);
session_start();
$host="localhost";

$user="root";

$password="";/*NULL*/

$database="schoolproject";


$data=mysqli_connect($host,$user,$password,$database);

if($data===false){
    die("Connection Failed!!!");
}
/*$_SERVER is a PHP super global variable which holds information about headers, paths, and script locations.*/
if($_SERVER["REQUEST_METHOD"]=="POST"){/*Returns the request method used to access the page (such as POST)*/
    $name=$_POST['username'];/*Username comes from the databese*/
    $pass=$_POST['password'];

    $sql="SELECT * FROM user WHERE user='".$name."' AND password='".$pass."' ";

    $result=mysqli_query($data,$sql);/*The result will be stored here */

    $row=mysqli_fetch_array($result);/*Get Some data here*/


    if($row["usertype"]=="student"){
        $_SESSION['username']=$name;
        $_SESSION['usertype']="student";
        header("location:studenthome.php");
    }
    else if($row["usertype"]=="admin"){
        $_SESSION['username']=$name;
        $_SESSION['usertype']="admin";
        header("location:adminhome.php");
    }
    else{
        session_start();

        $massage="username or password doesn't matched...";

        $_SESSION['loginMassage']=$massage;

        header("location:login.php");
    }
}




?>