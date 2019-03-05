<br>
<form action="getfeedbacklist.php" method="post">
  Email: <input type="text" name="email">
  <input type="submit" name="search" value="Submit">
</form>

<?php


if(isset($_POST["search"])) {
	?>
	<link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
	<br/><br/>Search Results<br/><br/>
	<table class="pure-table pure-table-bordered" width="800">
		<tr>
		<thead>
			<th><b>Feedback ID</b></th>
			<th><b>First Name</b></th>
			<th><b>Last Name</b></th>
			<th><b>Email</b></th>
            <th><b>Comments</b></th>
        </thead>
		</tr>

<?php
	$FM=new FeedbackManager();
	$feedbacks=$FM->getFeedbackByEmail($_POST["email"]);
    //$feedbacks = $FM->getAllFeedback();
    foreach ($feedbacks as $feedback)
	{
		if($feedback != NULL) {
			?>
			<tr>
				<td><input type="checkbox" name="id[]" value="<?$feedback->id;?>"></td>
				<td><?=$feedback->firstName?></td>
				<td><?=$feedback->lastName?></td>
				<td><?=$feedback->email?></td>
				<td><?=$feedback->comments?></td>
			</tr>
				
			<?php
		}
	}
	?>
	<form action="deletefeedback.php" method="post">
  <input type="submit" name="delete" value="Delete Feedbacks">
</form>

	
	</table><br/><br/>
	<?php
}
?>
