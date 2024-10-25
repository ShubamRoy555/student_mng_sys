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

if(isset($_POST['add_teacher'])){
    $t_name=$_POST['name'];
    $t_description=$_POST['description'];
    $file=$_FILES['image']['name'];//image is the image name in the input filed.
    $dst="./image/".$file;//used to locate where the file is stored.  
    $dst_db="image/".$file;//used to store the file to the database.
    move_uploaded_file($_FILES['image']['tmp_name'],$dst);

    $sql="INSERT INTO teacher (name,description,immage) VALUES ('$t_name','$t_description','$dst_db')";

    $result=mysqli_query($data,$sql);

    if($result){
        header("location:admin_view_teacher.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>
    <style>
        label{
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_deg{
            background-color: skyblue;
            padding-top: 70px;
            padding-bottom: 70px;
            width: 500px;
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
		<h1>Add Teacher</h1><br><br>
        <div class="div_deg">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div>
                    <label>Name</label>
                    <input type="text" name="name">
                </div><br>
                <div>
                    <label>Description</label>
                    <textarea name="description"></textarea>
                </div><br>
                <div>
                    <label>Image</label>
                    <input type="file" name="image">
                </div><br>
                <div>
                    <input type="submit" name="add_teacher" value="ADD_TEACHER" class="btn btn-primary">
                </div>
            </form>
        </div>
        </center>
	</div>

</body>
</html>