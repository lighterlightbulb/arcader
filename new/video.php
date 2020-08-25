<!DOCTYPE html>
<?php 
require($_SERVER['DOCUMENT_ROOT'] . "/cfg/config.inc.php"); 
require($_SERVER['DOCUMENT_ROOT'] . "/lib/conn.php");
?>
<html>
	<head>
		<title><?php echo $config['project_name']; ?> - new game</title>
		<link rel="stylesheet" href="/static/css/main.css">
		<link rel="stylesheet" href="/static/css/profile.css">
	</head>
	<body>
		<div class="container">
			<?php
				require($_SERVER['DOCUMENT_ROOT'] . "/lib/misc/header.php");
				
				if(!isset($_SESSION['user'])) {
					die("You aren't logged in.");
				}
				
				if(@$_POST['submit']) {
					$register = require($_SERVER['DOCUMENT_ROOT'] . "/lib/upload.php");
					$register("video", ["mp4"], $conn);
				}
			?><br>
			<h1>new video</h1><br>
			<form method="post" enctype="multipart/form-data">
				<fieldset>
					<small>Select a video file:</small>
					<input type="file" name="fileToUpload" id="fileToUpload"><br>
					<input required type="checkbox" name="remember"><small>This video will not infringe any copyright laws AND is not NSFW</small><br>
					<input required type="checkbox" name="remember"><small>This video will <b>NOT</b> break the Terms Of Service.</small>
					<hr>
					<input size="69" type="text" placeholder="Video Title" name="title"><br><br>
					<textarea required cols="81" placeholder="Information about your video" name="description"></textarea><br><br>
					<input type="submit" value="Upload Video" name="submit">  <small>Note: Videos are manually approved.</small>
				</fieldset>
            </form>
		</div>
		<?php
		require($_SERVER['DOCUMENT_ROOT'] . "/lib/misc/footer.php");
		?>
	</body>
</html>