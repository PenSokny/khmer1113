<div id="content">
	<?php 
		include("connect.php");

		$select_post="select * from posts";

		$run_post=mysql_query($select_post);

		while ($row=mysql_fetch_array($run_post)) {
			$post_id=$row['post_id'];
			$post_title=$row['post_title'];
			$post_date=$row['post_date'];
			$post_author=$row['post_author'];
			$post_image=$row['post_image'];
			$post_keywords=$row['post_keywords'];
			$post_content=substr($row['post_content'],0,200);


	?>

	<h2 align="left"><?php echo $post_title; ?></h2>
	<p align="left">Published on:<b><?php echo $post_date;?></b></p>
	<p align="right">Posted by:<b><?php echo $post_author;?></b></p>
	<center><img src="images/<?php echo $post_image;?>" width="600" height="400"/></center>
	<p align="center"><i><?php echo $post_keywords; ?></i></p>

	<p align="justify"><?php echo $post_content;?></p>
	<p align="right"><a href="pages.php">Read more<a/></p>

	<?php } ?>
</div>