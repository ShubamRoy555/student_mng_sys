<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}/*Check if a user fill-up the username or not.if not send it to login page */
elseif($_SESSION['usertype']=='student'){
    header("location:login.php");/*If usertype is admin send to login*/
}

$host="localhost";

$user="root";

$password="";/*NULL*/

$database="schoolproject";


$data=mysqli_connect($host,$user,$password,$database);

if(isset($_POST['add_student'])){
    $user_name=$_POST['name'];
    $user_email=$_POST['email'];
    $user_phone=$_POST['phone'];
    $user_password=$_POST['password'];
    $user_type="student";

    $sql="INSERT INTO user (user,email,phone,usertype,password) VALUES ('$user_name','$user_email','$user_phone','$user_type','$user_password')";

    $result=mysqli_query($data,$sql);

    if($result){
        echo "<script type='text/javascript'>
        alert('Data Uploaded Successfully');
        </script>";
    }

}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>
    <style type="text/css">
        label{
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_deg{
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
	<?php
    include 'admin_css.php';
	?>
</head>
<body>

	<?php
    include 'admin_sidebar.php';
	?>

	<div class="content">
        <center>
		<h1>Add Student</h1>
        <div class="div_deg">
            <form action="#" method="POST">
                <div>
                    <label>Username</label>
                    <input type="text" name="name">
                </div>
                <div>
                    <label>Email</label>
                    <input type="text" name="email">
                </div>
                <div>
                    <label>Phone</label>
                    <input type="number" name="phone">
                </div>
                <div>
                    <label>Password</label>
                    <input type="text" name="password">
                </div>
                <div>
                    <input type="submit" name="add student" value="ADD-STUDENT" class="btn btn-primary">
                </div>
            </form>
        </div>
        </center>
	</div>

</body>
</html>