<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}/*Check if a user fill-up the username or not.if not send it to login page */
elseif($_SESSION['usertype']=='student'){
    header("location:login.php");/*If usertype is admin send to login*/
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
</head>
<body>

	<?php
    include 'admin_sidebar.php';
	?>

	<div class="content">
		
		<h1>Admin Dashboard</h1>
	</div>

</body>
</html>