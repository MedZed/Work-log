<?php include 'includes/_header.html'; ?>
<?php
	session_start();
	
	require("conection/connect.php");
	
	$msg="";
	if(isset($_POST['btn_log'])){
		$uname=$_POST['username'];
		$pwd=$_POST['password'];
		
		$sql=mysqli_query($con,"SELECT * FROM users_tbl
								WHERE username='$uname' AND password='$pwd' 
								
							");
						
		$cout=mysqli_num_rows($sql);
			if($cout>0){
                $row=mysqli_fetch_array($sql);
                
                $_SESSION['username'] =$row['username'];
              
                if(!empty($_SESSION['username'])){
						header("location: everyone.php");
            }
        }


			
			else
					// $msg="Wrong Username and Password";
							echo "<br><br><div class='container'>" 
										."<div class='alert alert-danger col-md-4 col-md-offset-4'>"
										."<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
										."</button>"
										."<strong> wrong username/password. </strong>"
										."</div>"
										."</div>";
}

?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<form role="form" data-toggle="validator" method="post" class="login_form logo_div">
			 	<h4 class="text-center">LOGIN</h4>
			 	<p>Please fill out the following form with your login credentials.</p>
			 	<div class="form-group">
			    <div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
			    	<input type="text" class="form-control" id="username" name="username"  placeholder="Your Username..." required>
			    </div>
			    <div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
			    <div class="input-group">
						<span class="input-group-addon"><i class="fa fa-key"></i></span>
			    	<input type="password" class="form-control" id="password" name="password"  placeholder="Passowrd" required>
			    </div>
			    <div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
			    <button type="submit" name="btn_log" class="btn btn-success pull-right">Submit</button>
			  </div>
			  <div class="clearfix"></div>
			</form>
		</div>
	</div>
</div>
<?php include 'includes/_footer.html'; ?>