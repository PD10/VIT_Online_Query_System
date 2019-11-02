<?php
include('server.php');
$output="";
	if (isset($_POST['export_excel'])) {
			$dept=$_POST['dept_dload'];
			$query = "SELECT * FROM queries where query_type='$dept'";
			$result = mysqli_query($db,$query);
			$output .='
				<table bordered="1">
					<tr>
						<th>Query ID</th>
						<th>Student Id</th>
						<th>Query Statement</th>
						<th>Query Manager</th>
						<th>Query Reply</th>
						<th>Query Solved</th>
					</tr>';
			while ($row = mysqli_fetch_array($result)){
				$output .='
					<tr>
						<td>'.$row["query_id"].'</td>
						<td>'.$row["student_id"].'</td>
						<td>'.$row["query_statement"].'</td>
						<td>'.$row["solved_by"].'</td>
						<td>'.$row["query_reply"].'</td>
						<td>'.$row["query_solved"].'</td>
					</tr>
				';
			}
				$output .='</table>';
				header ("Content-Type: application/xlsx");
				header ("Content-Disposition: attachment; filename=download.xls");
				echo $output;
	}
?>
