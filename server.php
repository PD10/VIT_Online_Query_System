<?php
	//log user in and redirect them to home page
	session_start();

	//connect to the database
	$db = mysqli_connect('localhost','root','','onlinequery');

	//if the register button is clicked then these events will take place
	if(isset($_POST['signup'])){
		$firstname = mysqli_real_escape_string($db,$_POST['firstname']);
		$lastname = mysqli_real_escape_string($db,$_POST['lastname']);
		$regno = mysqli_real_escape_string($db,$_POST['regnumber']);
		$hostelblock = mysqli_real_escape_string($db,$_POST['block']);
		$gender = mysqli_real_escape_string($db,$_POST['gender']);
		$mobile = mysqli_real_escape_string($db,$_POST['phno']);
		$email = mysqli_real_escape_string($db,$_POST['emailid']);
		$password = md5(mysqli_real_escape_string($db,$_POST['password']));
		$room = mysqli_real_escape_string($db,$_POST['room']);

		$sql = "INSERT INTO student_info(student_id, first_name, last_name, password, mobile, email, hostel_room, gender, hostel_block)
		 VALUES('$regno', '$firstname', '$lastname', '$password', '$mobile', '$email', '$room', '$gender', '$hostelblock')";
		if (mysqli_query($db, $sql)) {
			$_SESSION['student_id'] = $regno;
    		header('location: student_homepage.php');//go to home page
		}
	}

	//log student in from login page
	if(isset($_POST['login'])){
		$regno = mysqli_real_escape_string($db,$_POST['regno']);
		$password = mysqli_real_escape_string($db,$_POST['password']);

			$password = md5($password);
			$query = "SELECT * FROM student_info WHERE student_id = '$regno' AND password = '$password'";
			$result = mysqli_query($db,$query);
			if(mysqli_num_rows($result) == 1){
				//log user in
				$_SESSION['student_id'] = $regno;
						header('location: student_homepage.php');//go to home page
			}
			else{
				echo "<script type= 'text/javascript'>alert('Incorrect Registration Number/Password Combination');</script>";
			}
	}
		//log manager in from login page
		if(isset($_POST['mlogin'])){
		$manager_id = mysqli_real_escape_string($db,$_POST['managerid']);
		$mpassword = mysqli_real_escape_string($db,$_POST['mpassword']);

			$query = "SELECT * FROM manager_info WHERE manager_id = '$manager_id' AND password = '$mpassword'";
			$result = mysqli_query($db,$query);
			if(mysqli_num_rows($result) == 1){
				//log user in
				$_SESSION['manager_id'] = $manager_id;
						header('location: manager_homepage.php');//go to home page
			}
			else{
				echo "<script type= 'text/javascript'>alert('Incorrect Registration Number/Password Combination');</script>";
			}
	}

	//logout(logout button click hone baad wala event)
	if(isset($_POST['logout'])){
		session_destroy();
		unset($_SESSION['student_id']);
		header('location: student_login.php');
	}

	if(isset($_POST['admin'])){
		$aid = $_POST['admin_id'];
		$apwd = $_POST['admin_password'];
		if ($aid=="ADMIN" && $apwd=="ADMIN"){
			header('location: admin_homepage.php');
	}
	}

	if(isset($_POST['solved'])){
		$type = mysqli_real_escape_string($db,$_POST['type']);
		$statement = mysqli_real_escape_string($db,$_POST['statement']);
		$date = date('m/d/Y h:i:s', time());
		$free_hrs=mysqli_real_escape_string($db,$_POST['free_hrs']);
		if ($free_hrs=="")
		{
			$free_hrs="NOT REQUIRED";
		}
		$query = "SELECT manager_id FROM manager_info WHERE manager_dept = '$type'";
		$result = mysqli_query($db,$query);
		$row = mysqli_fetch_array($result);
		$solved_by_manager = $row[0];
		$sql = "INSERT INTO queries(student_id, query_type, query_statement, query_date, solved_by, query_reply, query_solved, free_hrs)
		VALUES('{$_SESSION['student_id']}','$type', '$statement', '$date', '$solved_by_manager', 'NULL', 'NO','$free_hrs')";
		if (mysqli_query($db, $sql)) {
    		echo "<script type= 'text/javascript'>alert('Data Inserted');</script>";
		}
		else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($db);
		}
	}

	if (isset($_POST['download'])) {
			$dept=$_POST['dept_dload'];
			$query = "SELECT * FROM queries where query_type='$dept'";
			$result = mysqli_query($db,$query);
			while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
				echo $row['query_id'] . " " . $row['query_statement'] . " " .$row['student_id'] . " " .
				$row['hostel_block'] . " " .$row['hostel_room'] . " " .$row['query_solved'] . " " .
				'<a href="download.php?file='.$row['query_type']. '\>'." cv </a><br/>";
	}
	}

	if(isset($_POST['msolve'])){
		$queryid = mysqli_real_escape_string($db,$_POST['query']);
		$reply = mysqli_real_escape_string($db,$_POST['reply']);

		$sql = "UPDATE queries SET query_reply = '$reply', query_solved = 'YES' WHERE query_id = '$queryid'";
		if (mysqli_query($db, $sql)) {
    		echo "<script type= 'text/javascript'>alert('Data Inserted');</script>";
		}
		else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($db);
		}
	}

	if(isset($_GET['nm1'])){
    $nm1 = $_GET['nm1'];
		$query_select_data_from_queries = "SELECT queries.query_id, queries.query_statement, queries.free_hrs,
		student_info.student_id, student_info.hostel_block, student_info.hostel_room
	FROM queries
	INNER JOIN student_info ON queries.student_id = student_info.student_id
	WHERE queries.solved_by =  '{$_SESSION['manager_id']}'
	AND queries.query_solved =  'NO' AND queries.query_id LIKE ('%$nm1%') AND queries.query_statement LIKE ('%$nm1%') AND queries.free_hrs LIKE ('%$nm1%') AND student_info.student_id LIKE ('%$nm1%') AND student_info.hostel_block LIKE ('%$nm1%') AND student_info.hostel_room LIKE ('%$nm1%')";
	  $result_select_data_from_queries = mysqli_query($db,$query_select_data_from_queries);
		if($result_select_data_from_queries){
		 echo'<style>
			.t1
			{
			position:absolute;
			top:500px;
			left:10px;
			}
			th
			{
			height:100px;
			width:275px;
			background-color:white;
			border:2px solid black;
			color:black;
			padding:10px;
			background-color:#C4FDC0;
			}
			.responses
			{
				height:20px;
				width:370px;
				background-color:white;
				border:2px solid red;
				color:red;
				padding:10px;
			}
			</style>
					<div>
				 <table class="t1">
					<tr><th align = "center">QUERY ID</th>
						 <th align = "center">QUERY STATEMENT</th>
						 <th align = "center">STUDENT FREE HOURS</th>
						 <th align = "center">STUDENT ID</th>
				 <th align = "center">STUDENT BLOCK</th>
					<th align = "center">STUDENT ROOM NUMBER</th></tr>';

				 while($row_select_data_from_queries = mysqli_fetch_array($result_select_data_from_queries)){
					 echo '<tr>';
					 echo '<td class="responses">'.
					 $row_select_data_from_queries['query_id'].'</td>';
					 echo '<td class="responses">'.
					 $row_select_data_from_queries['query_statement'].'</td>';
					 echo '<td class="responses">'.
					 $row_select_data_from_queries['free_hrs'].'</td>';
					 echo '<td class="responses">'.
					 $row_select_data_from_queries['student_id'].'</td>';
					 echo '<td class="responses">'.
					 $row_select_data_from_queries['hostel_block'].'</td>';
						echo '<td class="responses">'.
						$row_select_data_from_queries['hostel_room'].'</td>';
					 echo '</tr>';
		 }
				 echo '</table>';
		 echo '</div>';
	 }
	 else{
		 echo "Couldn't issue database query";
	 }
 }
?>
