<!DOCTYPE html>
<html>

<head>

	<?php


include_once('API/perfil.php');




logIn();

include_once('API/sessionManeger.php');
if((testLogin())){
	echo "<script>window.location.href = 'home.php';</script>";
};

?>

	<link rel='stylesheet' href='CSS/normalize.css'>
	<link rel='stylesheet' href='CSS/bootstrap4.min.css'>
	<title>Smartbrainz</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta charset="UTF-8">
	
	<script defer src="JS/bootstrap.bundle.min.js"></script>
	<script defer src="JS/bootstrap.min.js"></script>
	<script defer src="JS/jquery.slim.min.js"></script>
	<script defer src="JS/popper.min.js"></script>
	<link rel='stylesheet' href='CSS/bootstrap4.min.css'>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
		integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
		integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
		integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
		crossorigin="anonymous"></script>

	
	
</head>

<body>
	<header class=" container-fluid row " style='background-color:#FF6900;color:#2222DA;font-family:sans-serif'>
		<h1 class='col-4' style='font-size:5em;'><img src='Media/Img/brainZtorm1.png' class='img-fluid'
				style='max-width:20%' />SmartBrainz</h1>
		<div class='col-3 m-auto ms-0'>
			<label style='font-size:3em;'>Email</label>
			<input form='formHidden' type='email'
				style='width:40%;height:50px;border-radius:15px;border-style:solid;font-size:2em;' id='mail' name='mail'
				placeholder='usuario@email.com' required></input>
		</div>
		<div class='col-3 m-auto  ms-0'>
			<label style='font-size:3em;'>Senha</label>
			<input form='formHidden' type='password'
				style='width:40%;height:50px;border-radius:15px;border-style:solid;font-size:2em;' id='pass'
				name='pass'></input>
		</div>
		<div class='col m-auto  ms-0'>
			<form class='' id='formHidden' name='formHidden' action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'
				style=''><input form='formHidden' class='btn-block ' type='submit' value='ENTRAR'
					style='background-color:#2222DA;border-style:none;border-radius:10px;padding:10px;width:75%;height:75px;font-size:2em;color:#FF6900;'></input>
			</form>
		</div>
	</header>
	<main class='container-fluid row'
		style='background-image:url(Media/Img/student_bg.png);padding:100px;height:700px;border-style:solid;border-color:blue;height:100%;background-size:cover;padding-bottom:0'>
		<div class='col d-flex flex-column justify-content-center'>
			<h1 style='font-size:5em;color:#9082E1;' class='text-center'>SmartBrainz</h1>
			<p class='text-white text-center' style='font-size:2em;'>Suba de nivel enquanto aprende</p>

			<div class="container">
				<button type="button"
					style='background-color:#2222DA;border-style:none;border-radius:10px;padding:10px;width:75%;height:75px;font-size:2em;color:#FF6900;'
					class="" data-toggle="modal" data-target="#form">
					CRIE SUA CONTA JÁ!

				</button>
			</div>


			<div class="modal fade" id="form" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered"  role="document">
					<div class="modal-content">
						<div class="modal-header border-bottom-0" style="background-color:#0b023a;color:#fff">
							<h5 class="modal-title" id="exampleModalLabel">Crie sua conta</h5>
							<button type="button" class="close" data-dismiss="modal" style="color:#ff0000" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'>
							<div class="modal-body" style="background-color:#0b023a;color:#fff">
								<div class="form-group">
									<label for="email1">Email</label>
									<input type="email" class="form-control" required id="email1" name="mailCadastro"
										aria-describedby="emailHelp">
								</div>
								<div class="form-group">
									<label for="userCadastro">Usuario</label>
									<input type="text" class="form-control" required id="userCadastro" name="userCadastro" placeholder="">
								</div>
								<div class="form-group">
									<label for="password1">Senha</label>
									<input type="password" class="form-control" required name="passCadastro" id="password2"
										placeholder="Confirm Password">
								</div>
							</div>
							<div class="modal-footer border-top-0 d-flex justify-content-center" style="background-color:#0b023a;color:#fff">
								<button type="submit" class="btn btn-success"
									style='background-color:#2222DA;border-style:none;border-radius:10px;width:50%;height:75px;font-size:2em;color:#FF6900;'>CADASTRAR</button>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
		<div class='col d-flex flex-column  justify-content-center align-items-center'>
			<p style='font-size:2em;color:#9082E1;' class='text-start'>Por que SmartBrainz?</p>
			<div class='container row  mb-5'
				style='width:60%;border-color:#2222DA;border-radius:10px;border-width:5px;border-style:solid;'>
				<img class='img-fluid col-4' src='Media/Img/flashcardcolor.png'></img>
				<p class='col text-white' style='font-size:1.5em;text-align:justify'>Metodologias inteligentes para seus
					estudos</p>
			</div>

			<div class='container row  mb-5'
				style='width:60%;border-color:#2222DA;border-radius:10px;border-width:5px;border-style:solid;'>
				<img class='img-fluid col-4' src='Media/Img/studentsicon.png'></img>
				<p class='col text-white' style='font-size:1.5em;text-align:justify'>Se conecte a uma rede com diversos
					alunos e professores</p>
			</div>

			<div class='container row  mb-5'
				style='width:60%;border-color:#2222DA;border-radius:10px;border-width:5px;border-style:solid;'>
				<img class='img-fluid col-4' src='Media/Img/GameIcon2.png'></img>
				<p class='col text-white' style='font-size:1.5em;text-align:left'>Estude de maneira gamificada e ganhe
					recompensas!</p>
			</div>
		</div>
		<div class='container row' style='border-top-style:solid;border-color:#FF6900;'>
			<p class='col text-white' style='font-size:2em;text-align:center'>Visite nossas redes sociais:</p>
			<figure class='col'><img src='Media/Img/twitterIcon.webp' style='width:40%;'></img></figure>
			<figure class='col'><img src='Media/Img/youtubeIcon.webp' style='width:40%;'></img></figure>
			<figure class='col'><img src='Media/Img/tiktokIcon.png' style='width:40%;'></img></figure>
			<figure class='col'><img src='Media/Img/facebookicon.png' style='width:40%;'></img></figure>
			<figure class='col'><img src='Media/Img/Instagram_icon.png.webp' style='width:40%;'></img></figure>

		</div>
	</main>

</body>

</html>