<!DOCTYPE html>
<html>
<head>
	<title>Tyler's Crazy Hire Me Form</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style/style.css">
<body>

<div class="container container-amp">
	<div class="row">
		<div class="col-md-offset-3 col-sm-offset-3 col-md-6 col-sm-6">
			<div class="form-wrapper">
			<div class="form-header"><h3 class="text-center">Tyler's Crazy Hire Me Form</h3></div>
			<form class="hire_me" action="resources/process.php" method="post" novalidate="novalidate">
				<div class="form-group">
					<label for="name">Name</label>
					<label class="error-text"><?php if($_GET["name"]) echo ' - What, you don\'t have a name?'; ?></label>
					<input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
				</div>

				<div class="form-group">
					<label for="name">E-Mail</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="E-Mail Address">
				</div>

				<div class="form-group">
					<label for="name">Subject</label>
					<label class="error-text"><?php if($_GET["message"]) echo ' - Pick a subject please!'; ?></label>
					<select class="form-control" id="subject" name="subject">
					  <option value="" selected disabled>Subject</option>
					  <option value="fruits">Fruits</option>
					  <option value="cars">Cars</option>
					  <option value="pirates">Pirates</option>
					</select>
				</div>

				<div class="form-group">
					<label for="name">Message</label>
					<label class="error-text"><?php if($_GET["subject"]) echo ' - Don\'t be shy!'; ?></label>
					<textarea class="form-control" rows="3" id="message" name="message" placeholder="Message"></textarea>
				</div>

				<input type="submit" class="btn btn-primary btn-block btn-hire" value="Submit"><br>
			</form>
			</div><!-- .form-wrapper -->
		</div>
	</div><!-- .row -->
</div><!-- .container -->

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
<!-- Custom Stuff -->
<script src="js/script.js" type="text/javascript"></script>
<!-- Pirate Stuff -->
<script src="vendor/talk-like-a-pirate.js"></script>

</body>


</html>