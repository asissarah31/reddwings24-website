
<?php include "./db_connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Gallery</title>
    <style type="text/css">
        tr {
            font-size: 1.2em;
        }

        .del {
            color: red;
            text-decoration: none;
        }

        .del:hover {
            color: blue;
            text-decoration: none;
            text-shadow: 2px 3px 2px #FFFFFF;
        }

        .btn {
            color: white;
            background-color: black;
            padding: 10px;
        }

        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: 20px 0;
        }

        .gallery-item {
            border: 1px solid #ccc;
            box-shadow: 5px 4px 10px 2px;
            margin: 10px;
            padding: 10px;
            text-align: center;
            width: 250px;
        }

        .gallery-item img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .gallery-item button {
            margin-top: 10px;
        }

        .success-message {
            padding: 15px;
            color: red;
            background-color: black;
            font-size: 1.2em;
            border-radius: 10px;
        }
    </style>
</head>
<body>


	<div class="content">
	
	<form action="" method="post" enctype="multipart/form-data">
	<table border=0 width="100%" cellspacing="5" cellpadding="5" style="box-shadow: 5px 4px 10px 2px;">

		<tr>
			<th colspan="2">Upload Your Image Here &nbsp;&nbsp;&nbsp;&nbsp; <a href="vgallery.php">View Gallery</a></th>
		</tr>
		<tr>
			<th>&nbsp;</th>
		</tr>
		<tr>
			<td align="right" width="50%">Choose Image Here</td><td><input type="file" name="img" value=""></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" class="btn" name="sb" value="    Upload Now    "></td>
		</td>
		<tr>
			<th>&nbsp;</th>
		</tr>

	

	</table>
	</form>
        <?php
	if(isset($_POST['sb']))
	{
		
		$i = "img/".$_FILES['img']['name'];
		move_uploaded_file($_FILES['img']['tmp_name'], $i);//move file inside folder

		
		include "./db_connect.php";  
		mysqli_query($conn,"insert into gallery(image)values('$i')") or die(mysqli_error($con));
		echo "<div style='padding:15px; color:red; background-color:skyblue; font-size:1.2em; border-radius:10px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbs&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;p;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data Uploaded SuccessFully....</div>";
	}
	?>
	<br><br>	
</div>



</body>
</html>
