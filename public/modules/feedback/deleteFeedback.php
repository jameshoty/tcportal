<?php 
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "phpcrudsample";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $ids=$_POST["id"];
    $ids=implode(",",$ids);
    $sql = "DELETE FROM tb_feedback WHERE id in ($ids)";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;}
        
}
?>

