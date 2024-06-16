


<?php

if (isset($_POST['login']) && isset($_POST["user_type"]) && $_POST["user_type"] == 'admin') {
	$email =mysqli_real_escape_string($con,$_POST['email']);
	$password =mysqli_real_escape_string($con,$_POST['password']);

	if($email=='user')
	{
		$veri_user = mysqli_query($con,"SELECT *FROM staffinformation  WHERE staff_code='$password' && staff_status='active'");
		$verify_login = mysqli_num_rows($veri_user);

		$fetch_admin = mysqli_query( $con,"SELECT * FROM admin_users WHERE email = '$email' AND password = '$password'");
		$row = mysqli_fetch_assoc($fetch_admin);
		$_SESSION['user_id']=$row['id'];
	if($verify_login>0)
	{

		$_SESSION['user_id']=$row['id'];
		$_SESSION['admin']='1';
		$_SESSION['authority']='user';
	echo "<script>window.location='dashboard.php'</script>";
	}
	else
		{
			$error="Access Denied!";
		}
	}
	else
	{

		//check email
		$chk_email=mysqli_query($con,"SELECT * FROM admin_users WHERE email='$email'");
		$ct_emails=mysqli_num_rows($chk_email);

		if ($ct_emails>0) {
			// code...
			$row=mysqli_fetch_array($chk_email);
			$passkey=htmlentities($row['password']);
			$id=htmlentities($row['id']);
			if (/*password_verify($password, $passkey)*/ $passkey == $password) {
				// code...
				$_SESSION['authority']='superadmin';
				$_SESSION['admin']='1';
				echo "<script>window.location='dashboard.php'</script>";
			}
			else
			{
				$error="Invalid Password !";
			}
		}
	}
}
else if(isset($_POST['login']) && isset($_POST["user_type"]) && $_POST["user_type"] == 'farmer')
{
	$email =mysqli_real_escape_string($con,$_POST['email']);
	$password =mysqli_real_escape_string($con,$_POST['password']);

	$veri_user = mysqli_query($con,"SELECT *FROM suppliers WHERE supplieremail='$email' AND password = '$password'");
	$verify_login = mysqli_num_rows($veri_user);

	if($verify_login > 0)
	{
		$fetch = mysqli_fetch_array($veri_user);
		if($fetch['supplier_status'] == 'active'){
			$_SESSION['supplier_number'] = $fetch['supplierphone'];
			$_SESSION['farmer_id'] = $fetch['id'];
			echo "<script>window.location='dashboard2.php'</script>";
		}
		else{
			$error="Access Denied";
		}
	}
	else
	{
		$error="Wrong Credentials";
	}
}
// else{
// 	//email doesn't exist
// 	$error="Invalid User Name!";
// }
?>