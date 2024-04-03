<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                <h1 class="text-uppercase text-white font-weight-bold">change password</h1>
                <hr class="divider my-4" />
            </div>
        </div>
    </div>
</header>

<style>
	body
	{
		width: 100%;
	    height: calc(100%);
		background: rgba(256,256,256,0.5);
	}
	main#main
	{
		width:100%;
		height: calc(100%);
		background:white;
	}
	#login-right
	{
		position: absolute;
		right:0;
		width:40%;
		height: calc(100%);
		background:white;
		display: flex;
		align-items: center;
	}
	#login-left
	{
		position: absolute;
		left:0;
		width:60%;
		height: calc(100%);	
		align-items: center;
		background: url(assets/img/bg/getty.jpg);
	    background-repeat: no-repeat;
	    background-size: cover;
	}
	#login-right .card
	{
		margin: auto
	}

    header.masthead
	{
		background: url(assets/img/<?php echo $_SESSION['setting_cover_img'] ?>);
		background-repeat: no-repeat;
		background-size: cover;
	}
</style>

<title>Doctor's appointment system</title>


<?php if(!isset($_SESSION))
{
	session_start();
}  
?>

<main id="main" class=" bg-dark">
  		<div id="login-left">
  			<div class="logo">
  				<span class="fa fa-laptop-medical"></span>
  			</div>
  		</div>
  		<div id="login-right">
  			<div class="card col-md-8">
  				<div class="card-body">
					<form action="" method="post" class="text-left">
						
						<table >
						<tr>Old Password: </tr>
						<tr><input type="password" name="password"  placeholder="Current password" required></tr></br></br>
					
						<tr>New Password:</tr>
						<tr><input type="password" name="newpassword"  placeholder="New password" required></tr></br></br>
						
						<tr>Confirm Password:</tr>
						<tr><input type="password" name="confpassword" placeholder=" re-type password" required></tr></br></br>
						
						<tr><button name="submit" type="submit" style="margin-right: -200px;" class="badge badge-info">Update Password</tr>
						</table>
	
						<?php 
						$newpassword='';
						$confpassword='';
							
						include('admin/db_connect.php');
						if(isset($_POST["submit"]))
						{
							$sql= "SELECT * FROM users WHERE id= '" . $_SESSION['login_id']."' AND password= '" . $_POST['password']."' and type=3";

							$query=mysqli_query($conn,$sql);
							$row=mysqli_num_rows($query);

							if($row > 0)
							{
								//check the new password
								if($newpassword==$confpassword)
								{
									$sql1="UPDATE users SET password='" . $_POST["newpassword"]  ."' WHERE id='" .$_SESSION['login_id'] ."'";
									mysqli_query($conn,$sql1);
									echo "<script>alert('Password Has been Updated');</script>";
								}
								else
								{
									echo "<script>alert('Password did not match');</script>";

								}
							}
							else
							{
								echo "<script>alert('Input Correct Password');</script>";
							}
						}
						?>
					</form> <br>&nbsp;&nbsp;&nbsp;
				</div>
			</div>
		</div>
   

</main>
</body>
</html>
