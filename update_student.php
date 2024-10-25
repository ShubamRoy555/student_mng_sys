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

$id=$_GET['student_id'];

$sql="SELECT * FROM admission WHERE id='$id'";

$result=mysqli_query($data,$sql);

$info=$result->fetch_assoc();

if(isset($_POST['update'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $address=$_POST['address'];

    $sql2="UPDATE user SET user='$name',email='$email',phone='$phone',password='$password' address='$address' WHERE id='$id'";

    $result2=mysqli_query($data,$sql2);

    if($result2){
        header("location:view_student.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update Profile</title>

	<?php
    include 'admin_css.php';
	?>
    <style type="text/css">
        label{
            display: inline-block;
            width: 100px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_deg{
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px
        }
    </style>
</head>
<body>

	<?php
    include 'admin_sidebar.php';
	?>

	<div class="content">
        <center>
		<h1>Update Student Profile</h1>
        <br><br>
            <form action="#" method="POST"><?php /*# used to redirect in this page */?>
            <div class="div_deg">
                <div>
                    <label>Username</label>
                    <input type="text" name="name" value="<?php echo "{$info['name']}" ?>">
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo "{$info['email']}" ?>">
                </div>
                <div>
                    <label>Phone</label>
                    <input type="number" name="phone" value="<?php echo "{$info['phone']}" ?>">
                </div>
                <div>
                    <label>Address</label>
                    <input type="text" name="address" value="<?php echo "{$info['address']}" ?>">
                </div>
                <div>
                    <label>Password</label>
                    <input type="text" name="password" value="<?php echo "{$info['password']}" ?>">
                </div>
                <div>
                    <input class="btn btn-success" type="submit" name="update" value="UPDATE">
                </div>
            </form>
        </div>
        </center>
	</div>

</body>
</html>