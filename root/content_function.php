<?php
	function display_topics()
	{
		include ('includes/dbh.inc.php');
		
		$select = mysqli_query($db_connection, "SELECT topic_id, author, title, date_posted, views, replies FROM topics ORDER BY topic_id DESC");
		
		if(mysqli_num_rows($select) != 0)
		{
			echo "<table class = 'forumTable'>";
			echo "<tr><th>Title</th><th>Posted By</th><th>Date Posted</th><th>Views</th><th>Replies</th></tr>";
			
			while ($row = mysqli_fetch_assoc($select)){
				echo "<tr><td><a href='./readtopic.php?&tid=".$row['topic_id']."'>
					".$row['title']."</a></td><td><a href='viewprofile.php?&username=".$row['author']."'>".$row['author']."</td><td>".$row['date_posted']."</td><td>".$row['views']."</td>
					<td>".$row['replies']."</td></tr>";
			}
			echo "</table>";
		}
		else 
		{
			echo "<p>There are no posts yet!! </p>";
		}
	
	}

		
	function displaytopic($tid)
	{
		include('includes/dbh.inc.php');
		$select = mysqli_query($db_connection, "SELECT topic_id, author, title, content, date_posted FROM 
											topics WHERE ($tid = topics.topic_id)");
		$row = mysqli_fetch_assoc($select);
		echo "<table class = 'replyTable'>";
		echo "<tr><th>Title</th><th>Posted By</th><th>Date Posted</th></tr>";
		echo "<tr><td>".$row['title']."</td><td><a href='viewprofile.php?&username=".$row['author']."'>".$row['author']."</td><td>".$row['date_posted']."</td></tr>";
		echo "</table>";
		
		echo "<table class = 'contentTable'>";
		echo "<tr><th>Content</th></tr>";
		echo "<tr><td>".$row['content']."</td></tr>";
		echo "</table>";
		
	}
	
	function addview($tid)
	{
		include('includes/dbh.inc.php');
		$update = mysqli_query($db_connection, "UPDATE topics SET views = views + 1 WHERE topic_id = ".$tid."");
	}
	
	function replylink($tid)
	{
		echo "<h3><a href='./replyto.php?tid=".$tid."'>Reply to this Post</a></h3>";
	}
	
	function replytopost($tid)
	{
		echo "<div><form action='./addreply.php?tid=".$tid."' method='POST'>
				<table class = 'commentTable'>
					<tr>
						<th>Comment: </th>
					</tr>
					<tr>
						<td> <textarea cols='80' rows='5' id='comment' name='comment' required></textarea></td>					
					</tr>
					<tr>
						<td> <input type='submit' value='Add Comment' /> </td>
					</tr>
				</table>
				</form></div>";
	}
	
	function dispreplies($tid)
	{
		include('includes/dbh.inc.php');
		$select = mysqli_query($db_connection, "SELECT replies.author, comment, replies.date_posted FROM topics, replies WHERE ($tid = replies.topic_id) AND ($tid = topics.topic_id) ORDER BY reply_id DESC");
		
		if (mysqli_num_rows($select) != 0)
		{
			echo "<div><table class = 'repliesTable'>";
			while($row = mysqli_fetch_assoc($select))
			{
				echo nl2br("<tr><th><a href=viewprofile.php?username=".$row['author'].">".$row['author']."</a></th><td>".$row['date_posted']."\n".$row['comment']."\n\n</td></tr>");
			}
			echo "</table></div>";
		}
		
	}
	function countReplies($tid)
	{
		include('includes/dbh.inc.php');
		$select = mysqli_query($db_connection, "SELECT topic_id FROM replies WHERE ".$tid." = topic_id");
		
		return mysqli_num_rows($select);
		
	}
		
?>
