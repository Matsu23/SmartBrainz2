<!DOCTYPE html>
<html>

<head>
	<?php 
	include_once('API/timeline.php');
	include_once('API/content.php');
	include_once('API/sessionManeger.php');
	?>
<style>
        body {
  background: #e6ecf0;
  font-family: 'Asap', sans-serif;
  font-family: 'Roboto', sans-serif;

}
img {
  max-width:100%;
}
.avator {
  border-radius:100px;
  width:48px;
  margin-right: 15px;
}


.tweet-wrap {
  max-width:490px;
  background: #fff;
  margin: 0 auto;
  margin-top: 50px;
  border-radius:3px;
  padding: 30px;
  border-bottom: 1px solid #e6ecf0;
  border-top: 1px solid #e6ecf0;
}

.tweet-header {
  display: flex;
  align-items:flex-start;
  font-size:14px;
}
.tweet-header-info {
  font-weight:bold;
}
.tweet-header-info span {
  color:#657786;
  font-weight:normal;
  margin-left: 5px;
}
.tweet-header-info p {
  font-weight:normal;
  margin-top: 5px;
  
}
.tweet-img-wrap {
  padding-left: 60px;
}

.tweet-info-counts {
  display: flex;
  margin-left: 60px;
  margin-top: 10px;
}
.tweet-info-counts div {
  display: flex;
  margin-right: 20px;
}
.tweet-info-counts div svg {
  color:#657786;
  margin-right: 10px;
}
@media screen and (max-width:430px){
  body {
    padding-left: 20px;
    padding-right: 20px;
  }
  .tweet-header {
    flex-direction:column;
  }
  .tweet-header img {
    margin-bottom: 20px;
  }
  .tweet-header-info p {
    margin-bottom: 30px;
  }
  .tweet-img-wrap {
    padding-left: 0;
  }
  .tweet-info-counts {
  display: flex;
  margin-left: 0;
}
.tweet-info-counts div {
  margin-right: 10px;
}
}
    </style>
    <script src='JS/Like.js'></script>



	<link rel='stylesheet' href='CSS/normalize.css'></link>
	<link rel='stylesheet' href='CSS/bootstrap.min.css'>
	
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

</head>
<body style='background-color:#A59BE2;overflow-x:hidden'>
	<div class="row">
        <div class="col" >
            <div style="position:fixed">
                <div class="m-5  rounded input-group rounded row w-75" style="height:50px;">
                    <img src="Media/Img/SearchIcon.png" class="input-group-text col-2" style="height:50px">
                    <input type="search" style="height:100%;font-size: 1.5em;;" class="rounded col-10 rounded" placeholder="Buscar" ></input>
    
                </div>
                
                <div class="m-5 " style="font-size:14px;font-weight:bold;">
                    
                    <div  style=" border-radius:100px;margin-right: 15px;font-size:1.5em;"> 
                        <img src="<?php echo $_SESSION['avatar']; ?>" style="width:100px;border-radius:100px;" class=" pe-5 "/></img><b><?php echo $_SESSION["User"] ?></b><span style="font-size:2em;color:#617881;">LV 25</span>
                        <div id="progressbar" style="background-color: black;border-radius: 13px;padding: 3px;">
                            <div style="background-color: orange;width: 40%;height: 20px;border-radius: 10px;"></div>
                        </div>
                        <div class="row  text-white" >
                            <div class="col text-center">
                                 <span>0</span><br>
                                <span>Seguindo</span>
    
    
                            </div>
                            <div class="col text-center">
                                 <span>0</span><br>
                                <span>Seguidores</span>
    
    
                            </div>
    
                        </div>
                    </div>
                    <form class="d-block  mt-5" method="POST">
                        <div class="">
                        
                            <textarea class="w-100" name='post' id='post' style="height:200px;resize:none;font-size:2em;" placeholder="No que você esta pensando?"></textarea>
                            <div style="background-color:rgb(204, 206, 203);font-size:1.5em;color:rgb(142, 146, 140)">
                           <label>Categoria</labe> 
                           <select name='topico'>
			  <option value="port">Portugues</option>
			<option value="mat">Matematica</option>
			<option value="hist">Historia</option>
			<option value="geo">Geografia</option>
			<option value="bio">Biologia</option>
			<option value="fis">Fisica</option>
			<option value="qui">Quimica</option>
			<option value="ingl">Inglês</option>	  
		</select><span style='float:right'>500</span>
                                
                            </div>
    
                        </div>
    
                        <div class="  m-5">
                            <input type="submit" value="PUBLICAR!" style="background-color:#2222DA;color:#FF6900;border-radius:100px;font-size:3em;" class="w-100">
                        </div>
    
                    </form>

            </div>
            


        </div>

            
            
            


            

        </div>
        <div class="col" id='result' style="height:100vh;">
		<?php 
		include_once('API/perfil.php');
		

		$perfil=getProfile();
		?>
		<div class="m-5 " style="font-size:14px;font-weight:bold;">
                    
                    <div  style=" border-radius:100px;margin-right: 15px;font-size:1.5em;"> 
					<img class='d-block m-auto' src="<?php echo $perfil[0]['userImg']; ?>" style="width:200px;border-radius:100px;" class=" pe-5 "/></img>
                        <b><?php echo $perfil[0]['userName'] ?></b><span style="font-size:2em;color:#617881;">LV 25</span>
                        <div id="progressbar" style="background-color: black;border-radius: 13px;padding: 3px;">
                            <div style="background-color: orange;width: 40%;height: 20px;border-radius: 10px;"></div>
                        </div>
                        <div class="row  text-white" >
                            <div class="col text-center">
                                 <span>0</span><br>
                                <span>Seguindo</span>
    
    
                            </div>
                            <div class="col text-center">
                                 <span>0</span><br>
                                <span>Seguidores</span>
    
    
                            </div>
    
                        </div>
                    </div>

		</div>
		<?php
		$perfil=getProfile();
		getProfileActivity($perfil[0]['idUser']);




?>
        
            
           
    </div>

    <div class="col">
        <div style="position:fixed;">
            <ul>
			<li style="font-size:3em;list-style-type: none;"><img src='Media/Img/homeIcon.png' width="90px"><a href='home.php' style='color:inherit;text-decoration:none;'>Home</a></li>
                <li style="font-size:3em;list-style-type: none;"><img src='Media/Img/profile.png' width="90px">Perfil</li>
                <li style="font-size:3em;list-style-type: none;"><img src='Media/Img/group.png' width="90px">Grupos</li>
                <li style="font-size:3em;list-style-type: none;"><img src='Media/Img/bookIcon.png' width="90px">Anotações</li>
                <li style="font-size:3em;list-style-type: none;"><img src='Media/Img/flashcar.png' width="90px">FlashCards</li>
                <li style="font-size:3em;list-style-type: none;"><img src='Media/Img/saveIcon.webp' width="90px">Itens Salvos</li>
                <li style="font-size:3em;list-style-type: none;"><img src='Media/Img/rewardIcon.png' width="90px">Recompensas</li>
                <li style="font-size:3em;list-style-type: none;"><img src='Media/Img/notifyIcon.png' width="90px">Notificações</li>
                <li style="font-size:3em;list-style-type: none;"><img src='Media/Img/config.png' width="90px">Configurações</li>
                <li style="font-size:3em;list-style-type: none;"><img src='Media/Img/exit.png' width="90px"><a href='API/sair.php' style='color:inherit;text-decoration:none;'>Sair</li>
                
            </ul>
        </div>
        

    </div>
</div>

   

</body>

</html>