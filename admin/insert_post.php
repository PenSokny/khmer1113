<!DOCTYPE html>
<html>
<head>
	<title>Insert new posts</title>
</head>
<body>

	<form  method="post" action="insert_post.php" enctype="multipart/form-data">
		
		<table width="800" align="center" border="10">
			<tr>
				<td align="center" bgcolor="yellow" colspan="6"><h1>Insert New Post Here</h1></td>
			</tr>

			<tr>
				<td align="right"><b>Post Title:</b></td>
				<td><input type="text" name="title" size="30"></td>
			</tr>

			<tr>
				<td align="right"><b>Post Author:</b></td>
				<td><input type="text" name="author" size="30"></td>
			</tr>

			<tr>
				<td align="right"><b>Post Image:</b></td>
				<td><input type="file" name="image" value="Upload Image" size="30"></td>


			<tr>
				<td align="right"><b>Post Keywords:</b></td>
				<td><input type="text" name="keyword" size="30"></td>
			</tr>

			<tr>
				<td align="right"><b>Post Content:</b></td>
				<td><textarea name="content" cols="20" rows="10"></textarea></td>
				<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  				<script>tinymce.init({ selector:'textarea' });</script>
			</tr>

			<tr>
				<td align="center" colspan="6" ><input type="submit" name="submit" value="Publish Now" size="30"></td>
			</tr>
		</table>
	</form>

</body>
</html>

<?php 
	include("includes/connect.php");

	if(isset($_POST['submit'])){
		 $post_title=$_POST['title'];
		 $post_date=date('y-m-d');
		 $post_author=$_POST['author'];
		 $post_image=$_FILES['image']['name'];
		 $image_tmp=$_FILES['image']['tmp_name'];
		 $post_keywords=$_POST['keyword'];
		 $post_content=$_POST['content'];

		 if ($post_title=='' or $post_author=='' or $post_keywords==''
		 	or $post_content=='') {
		 	echo "<script>alert('Any of the field are empty!!')</script>";

		 	exit();
		 }
		 else {

		 	move_uploaded_file($image_tmp, "../images/$post_image");

		 	$insert_query="insert into posts(post_title,post_date,post_author,post_image,post_keywords,post_content) 
		 	value('$post_title','$post_date','$post_author','$post_image','$post_keywords','$post_content')";

		 	$run=mysql_query($insert_query);
		 	if ($run) {
		 		echo "<center><h1>Post Published Successfull</h1></center>";
		 	}
		 }
	}
?>