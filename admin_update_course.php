<?php
session_start();
error_reporting(0);
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

if($_GET['course_id']){
    $c_id=$_GET['course_id'];
    $sql="SELECT * FROM course where id='$c_id'";
    $result=mysqli_query($data,$sql);

    $info=$result->fetch_assoc();
}
if(isset($_POST['update_course_image'])){
    $id=$_POST['id'];
    $c_name=$_POST['name'];
    $c_desc=$_POST['description'];
    $file=$_FILES['image']['name'];
    $dst="./image/".$file;
    $dst_db="/image/".$file;
    move_uploaded_file($_FILES['image']['tmp_name'],$dst);
    if($file){
        $sql2="UPDATE teacher SET name='$c_name',description='$c_desc',immage='$dst_db' WHERE id='$id'";
    }
    else{
        $sql2="UPDATE teacher SET name='$c_name',description='$c_desc' WHERE id='$id'";
    }
    $result2=mysqli_query($data,$sql2);
    if($result2){
       header("location:admin_view_course.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>

	<?php
    include 'admin_css.php';
	?>
    <style type="text/css">
        label{
            display: inline-block;
            width: 150px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .form_deg{
            background-color: skyblue;
            width: 600px;
            padding-top: 70px;
            padding-bottom: 70px;
            }
    </style>
</head>
<body>

	<?php
    include 'admin_sidebar.php';
	?>

	<div class="content">
		<center>
		<h1>Update Course Data</h1>
        <form class="form_deg" action="#" method="POST"  enctype="multipart/form-data">
            <input type="text" name="id" value="<?php echo "{$info['id']}"?>" hidden>
            <div>
                <label>Course Name</label>
                <input type="text" name="name" value="<?php echo "{$info['name']}"?>">
            </div>
            <div>
                <label>Course Description</label>
                <textarea name="description"><?php echo "{$info['description']}"?></textarea>
            </div>
            <div>
                <label>Course Old Image</label>
                <img height="100px" src="<?php echo "{$info['image']}"?>">
            </div>
            <div>
                <label>Course New Image</label>
                <input type="file" name="image">
            </div>
            <div>
                <input class="btn btn-success" type="submit" name="update_course_image">
            </div>
        </form>
        </center>
	</div>

</body>
</html>