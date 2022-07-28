
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	
</head>

	<body>
	
	

	<div class="wrapper">
	<div class="container">
			
		<div class="col-lg-12">
			<center>
				<h2>
				<?php
				
				require_once 'connection.php';
				
				session_start();

				if(!isset($_SESSION['user_login']))	//check unauthorize user not access in "welcome.php" page
				{
					header("location: index.php");
				}
				
				$id = $_SESSION['user_login'];
				
				$select_stmt = $db->prepare("SELECT * FROM users WHERE id=:uid");
				$select_stmt->execute(array(":uid"=>$id));
	
				$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
				
				if(isset($_SESSION['user_login']))
				{
				?>
					Welcome,
				<?php
						echo $row['firstname'];
				}
				?>
				</h2>
					<a href="logout.php">Logout</a>
			</center>
			
		</div>
		
	</div>	
	</div>
										
	</body>
</html>
