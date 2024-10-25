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

$sql="SELECT * FROM course";

$result=mysqli_query($data,$sql);

if($_GET['course_id']){//when clicked on delete the teacher id is stored in the teacher_id varible.
    $c_id=$_GET['course_id'];
    $sql2="DELETE FROM course where id='$c_id'";
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
       .table_th{
        padding: 20px;
        font-size: 20px;
       } 
       .table_td{
        padding: 20px;
        background-color: skyblue;
       }
    </style>
</head>
<body>

	<?php
    include 'admin_sidebar.php';
	?>

	<div class="content">
    <center>
		<h1>View All Course Data</h1>
        <table border="5px solid black">
            <tr>
                <th class="table_th">Course Name</th>
                <th class="table_th">About Course</th>
                <th class="table_th">Image</th>
                <th class="table_th">Delete</th>
                <th class="table_th">Update</th>
            </tr>
            <?php
             while($info=$result->fetch_Assoc()){
            ?>
            <tr>
                <td class="table_td"><?php echo "{$info['name']}"; ?></td>
                <td class="table_td"><?php echo "{$info['description']}"; ?></td>
                <td class="table_td">
                    <img height="100px" width="200px" src="<?php echo "{$info['image']}"; ?>">
                </td>
                <td class="table_td">
                    <?php
                    echo "
                    <a onClick=\"javascript:return confirm('Are You Sure?');\" class='btn btn-danger' href='admin_view_course.php?course_id={$info['id']}'>DELETE</a>
                    ";
                    ?>
                </td>
                <td class="table_td">
                    <a class='btn btn-primary' href='admin_update_course.php?course_id=<?php echo $info['id']; ?>'>UPDATE</a>
                </td>
            </tr>
            <?php
             }
            ?>
        </table>
        </center>
	</div>

</body>
</html>