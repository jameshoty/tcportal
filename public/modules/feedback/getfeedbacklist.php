<?php
session_start();
require_once '../../includes/autoload.php';

use classes\business\FeedbackManager;
use classes\entity\Feedback;

// Turn on output buffering
ob_start();
include '../../includes/security.php';
include '../../includes/header.php';
?>

<!--  code removed to temp.php -->

<?php

$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "phpcrudsample";
$email =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = cleanup_input($_POST["email"]);
}

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error)
{
	echo ($conn->connect_error);
	die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM tb_feedback where email='$email' ";

$result = $conn->query($sql);
if  ($result->num_rows> 0) {
?>
	<link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
	<form method="post" action="deleteFeedback.php">
	<br/><br/>Search Results<br/><br/>
	<table class="pure-table pure-table-bordered" width="800">
		<tr>
			<thead>
				<th>Del?</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Feedback</th>
			</thead>
		</tr>
<?php
    while($row = $result->fetch_assoc()) {
?>
		<tr>
			<td><input type="checkbox" name="id[]" value="<?php echo $row['id']; ?>"></td>
			<td><?php echo $row['firstname']; ?></td>
			<td><?php echo $row['lastname']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['comments']; ?></td>
		</tr>
<?php 
    }
?>
	</table>
<?php 

?>
	<br/><br/>
	<input type="submit" value="Remove Feedback(s)">
	</form>
<?php
}

else
{
	echo "0 results";
	$selected = 0;
	
}
mysqli_close($conn);

function cleanup_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>

<?php
include '../../includes/footer.php';
?>
