<?php require_once("resources/connect.php"); 
$result = mysqli_query($conn, "SELECT * FROM amp_form WHERE ID=".$_GET["t"]);
$row = mysqli_fetch_array($result);
if(is_null($row)){
	//redirect home if null
	header('Location: index.php'); exit();
}

echo '<style type="text/css">
        body {
            background-image: url(images/'. $row['subject'] .'.png);
        }
        </style>';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thanks, <?php echo $row['name']; ?>!</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style/style.css">
<body>

<div class="container container-amp">
	<div class="row">
		<div class="col-md-offset-3 col-sm-offset-3 col-md-6 col-sm-6">
			<div class="form-wrapper">
			<div class="form-header">
				<h3 class="text-center"><span class="glyphicon glyphicon glyphicon-ok-circle" aria-hidden="true"></span> 
				<?php echo 'Thanks, ' . $row['name'] . '!'; ?>
				</h3>
				</div>
			<div class="hire_me text-center">
				<?php 
				echo '<p class="lead">You submitted the following content at ' . date("h:i a", strtotime($row['timestamp'])) . ': </br>', 
				'<ul class="list-unstyled"><li><b>Name</b>: ' . $row['name'] . '</li>',
				($row['email']) ? '<li><b>E-mail</b>: ' . $row['email'] . '</li>' : '',
				'<li><b>Subject</b>: ' . $row['subject'] . '</li>',
				'<li><b>Message</b>: ' . $row['message'] . '</li></ul></p>';				
				?>
				<a href="index.php" class="btn btn-primary btn-block" role="button">
					<span class="glyphicon glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Alright, take me back
				</a>
			</div>
			</div><!-- .form-wrapper -->
		</div>
	</div><!-- .row -->
</div><!-- .container -->
</body>
</html>