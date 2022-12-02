<!DOCTYPE html>
<html>

<head>



	<link rel='stylesheet' href='CSS/normalize.css'></link>
	
	<title>Smartbrainz</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta charset="UTF-8"></meta>
	<script>
		function showHiddenForm(id) {
			let form = document.getElementById(id);
			if(form.style.display=="none"){
				document.getElementById(id).style.display = "block";
			}else if(form.style.display=="block"){
				document.getElementById(id).style.display = "none";
			}
  			
		}
	</script>
<?php


include_once('API/timeline.php');
include_once('API/content.php');
getPost();
createComment();
createSubcomment();
?>
</head>
<body>
	

</body>

</html>