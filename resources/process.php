<?php 
require_once("connect.php");
if(isset($_POST)){
	$errors = array();
	//Check for missing fields
  	if (empty($_POST['name'])) {
		$errors['errors']['name'] = 'What, you don\'t have a name?';
    }
    if (empty($_POST['subject'])) {
		$errors['errors']['subject'] = 'Pick a subject please!';
    }
    if (empty($_POST['message'])) {
		$errors['errors']['message'] = 'Don\'t be shy!';
    }

    if(count($errors['errors']) > 0){


    	//Ajax
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            echo json_encode($errors);
            exit;
         }


	    //No JS solution
        $params = ''; $i = 0;
       	foreach($errors['errors'] as $key => $value){
          $i++;
        	$params .= $key .'=error';
          //Hacky way to make url vars
          if ($i != sizeof($errors['errors'])){ $params .= '&'; }
       	}

        //throw errors in url for user convenience
        header('Location: ../index.php?'.$params);
        exit;

    }else{


    //Let ajax know we are good
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        echo json_encode(true);
        exit;
     }  

    
    //Insert into DB
	  $name 	=  $_POST['name'];
		$email 	=  $_POST['email'];
		$subject 	=  $_POST['subject'];
		$message 	=  $_POST['message'];
	 
		$sql="INSERT INTO amp_form (name, email, subject, message) VALUES ('".$name."','".$email."', '".$subject."', '".$message."')";
	 
		if(!$result = $conn->query($sql)){
			die('There was an error running the query [' . $conn->error . ']');
		}

    //Grab row id
    $id = mysqli_insert_id($conn);

  
    //Redirect if all goes well
		header('Location: ../thanks.php?t='.$id);
    }
 }
	







	
	


?>