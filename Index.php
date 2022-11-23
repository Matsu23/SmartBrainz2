<!DOCTYPE html>
<html>
<head>

<?php

include('API/login.php');




logIn();


?>

<link rel='stylesheet' href='CSS/normalize.css'>
<link rel='stylesheet' href='CSS/bootstrap.min.css'>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta charset="UTF-8">
</head>
<body>
	<header class=" container-fluid row " style='background-color:#FF6900;color:#2222DA;font-family:sans-serif'>
		<h1 class='col-4' style='font-size:5em;'><img src='Media/Img/brainZtorm1.png' class='img-fluid' style='max-width:20%'/>SmartBrainz</h1>
		<div class='col-3 m-auto ms-0'>
			<label style='font-size:3em;'>Email</label>
			<input form='formHidden' type='email'style='width:40%;height:50px;border-radius:15px;border-style:solid;font-size:2em;' id='mail' name='mail' placeholder='usuario@email.com' required></input>
		</div>
		<div class='col-3 m-auto  ms-0'>
			<label style='font-size:3em;'>Senha</label>
			<input form='formHidden' type='password' style='width:40%;height:50px;border-radius:15px;border-style:solid;font-size:2em;'  id='pass' name='pass'></input>
		</div>
		<div class='col m-auto  ms-0'>
			<form class='' id='formHidden' name='formHidden' action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post' style=''><input form='formHidden' class='btn-block ' type='submit' value='ENTRAR' style='background-color:#2222DA;border-style:none;border-radius:10px;padding:10px;width:75%;height:75px;font-size:2em;color:#FF6900;'></input></form>
		</div>	
	</header>
	<main class='container-fluid row' style='background-image:url(Media/Img/student_bg.png);padding:100px;height:700px;border-style:solid;border-color:blue;height:100%;background-size:cover;padding-bottom:0'>
		<div class='col d-flex flex-column justify-content-center'>
			<h1  style='font-size:5em;color:#9082E1;' class='text-center'>SmartBrainz</h1>
			<p class='text-white text-center' style='font-size:2em;'>Suba de nivel enquanto aprende</p>
			<a class='text-center'><input class='btn-block ' type='submit' value='CRIE SUA CONTA JÁ!' style='background-color:#2222DA;border-style:none;border-radius:10px;padding:10px;width:75%;height:75px;font-size:2em;color:#FF6900;'></input></a>
		</div>
		<div class='col d-flex flex-column  justify-content-center align-items-center'>
		<p style='font-size:2em;color:#9082E1;' class='text-start'>Por que SmartBrainz?</p>
			<div class='container row  mb-5' style='width:60%;border-color:#2222DA;border-radius:10px;border-width:5px;border-style:solid;'>
				<img class='img-fluid col-4' src='Media/Img/flashcardcolor.png'></img>
				<p class='col text-white' style='font-size:1.5em;text-align:justify'>Metodologias inteligentes para seus estudos</p>
			</div>
			
			<div class='container row  mb-5' style='width:60%;border-color:#2222DA;border-radius:10px;border-width:5px;border-style:solid;'>
				<img class='img-fluid col-4' src='Media/Img/studentsicon.png'></img>
				<p class='col text-white' style='font-size:1.5em;text-align:justify'>Se conecte a uma rede com diversos alunos e professores</p>
			</div>
			
			<div class='container row  mb-5' style='width:60%;border-color:#2222DA;border-radius:10px;border-width:5px;border-style:solid;'>
				<img class='img-fluid col-4' src='Media/Img/GameIcon2.png'></img>
				<p class='col text-white' style='font-size:1.5em;text-align:left'>Estude de maneira gamificada e ganhe recompensas!</p>
			</div>
			
			
			
		</div>
		<div class='container row' style='border-top-style:solid;border-color:#FF6900;'>
			<p class='col text-white' style='font-size:2em;text-align:center'>Visite nossas redes sociais:</p>
			<figure class='col'><img src='Media/Img/twitterIcon.webp'  style='width:40%;'></img></figure>
			<figure class='col'><img src='Media/Img/youtubeIcon.webp'  style='width:40%;'></img></figure>
			<figure class='col'><img src='Media/Img/tiktokIcon.png'  style='width:40%;'></img></figure>
			<figure class='col'><img src='Media/Img/facebookicon.png'  style='width:40%;'></img></figure>
			<figure class='col'><img src='Media/Img/Instagram_icon.png.webp'  style='width:40%;'></img></figure>
			
		</div>
	</main>
	
	
	
</body>
</html>