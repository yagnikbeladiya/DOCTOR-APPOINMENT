<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                <h1 class="text-uppercase text-white font-weight-bold">Feedback</h1>
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
		background: url(assets/img/bg/asdf.png);
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
<main id="main" class=" bg-dark">
  		<div id="login-left">
  			<div class="logo">
  				<span class="fa fa-laptop-medical"></span>
  			</div>
  		</div>
  		<div id="login-right">
  			<div class="card col-md-8">
  				<div class="card-body">
					<center> <img src="admin/logo.png" ><br><br>
					<form action="" method="post" class="text-left form-group">
						<table>
						<tr>Email:</tr><br>
						<tr><input type="email" name="email" maxlength="100" required></tr></br></br>
						<tr>Feedback:</tr></br>
						<tr><textarea name="feedback" id="" cols="30" rows="4" placeholder="Type here..." required></textarea></tr></br></br>
						
						<tr><button name="submit" type="submit" class='badge badge-info ' style="margin-left: 120px;width: 85px;border-radius: 3px; ">Submit</button> </tr>
						</table>
						<?php 
							include('admin/db_connect.php');
							if(isset($_POST['submit']))
							{
								$sql="INSERT INTO feedback (email,feedback) VALUES ('" . $_SESSION["login_name"] ."','" . $_POST["feedback"] ."')";
								if ($conn->query($sql) === TRUE)
								{
									echo "<script>alert('Thanks for your feedback!');</script>";
								}
								else 
								{
									echo "<script>alert('There was an Error');<script>";
								}	
							}
						?>
					</form> <br>&nbsp;&nbsp;&nbsp;
					</img>
			</div>
  		</div>
  	</div>
   

</main>
</body>
</html>
