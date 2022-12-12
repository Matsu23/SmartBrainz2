<!DOCTYPE html>
<html>

<head>



	<link rel='stylesheet' href='CSS/normalize.css'>
	<link rel='stylesheet' href='CSS/bootstrap4.min.css'>
    <script src='JS/jquery.slim.min.js'></script>
    <script src="JS/bootstrap.min.js"></script>
	<title>Smartbrainz</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta charset="UTF-8">
	
   <?php 
   include_once('API/perfil.php');
   include_once('API/sessionManeger.php');
   setTopicos();
   alterImg();
   finishCadastro();
   alterDescription();

   if((testLogin())=="finished"){
	echo "<script>window.location.href = 'home.php';</script>";
	
}else if(testLogin()==false){
	echo "<script>window.location.href = 'index.php';</script>";

}

   ?>
	
	
</head>

<body style='background-color:#A59BE2;'>
	<div class='container ' >
        <form id='form' class="m-auto " method="POST" action= "<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
            <h1 class="text-center">Crie sua conta:</h1>
            <div style="background-color:#FF6900" class="container " style="position:absolute;" id="form1">
			
			
			<img src="UserData/Default/avatar.png" id="imgPreview" class="rounded-circle mx-auto d-block " style='width:50%;'>
                <label for="imgUp" style="width:10%;position:relative;bottom:120px;right:0px;" class=" d-block mx-auto"><img src="Media/img/fotoUp.png" class="w-100"></label>
                <div class="mx-auto d-block w-75 rounded h-auto" style="background-color:white">
                    <label class="d-block w-100" style="background-color:rgb(204, 206, 203);font-size:1.5rem;">Descrição:</label>
                    <textarea name='desc' class="mx-auto d-block w-100 rounded h-auto descriptiontext" style="font-size:2rem;border-style:none;resize: none;" >Olá,essa é minha conta smartbrainZ.</textarea>
                    <div class="w-100 text-right"  style="background-color:rgb(204, 206, 203);font-size:1.5rem;">200</div>
                    <input type="file" class="d-none" id="imgUp" name="imgUp" accept="image/*"></input>
					<input type='hidden' name='upload'></input>
                </div>
               
                


            </div>
           
            <div style="background-color:#FF6900" class="container  d-none flex-row flex-wrap  p-3 align-content-around" style="position:absolute;" id="form2">
			

                <label for="port" class="d-block w-25 border " style="height:auto;background-color:gray">
                    
                        <img src="Media/Img/Subjects/port.png" style="width:50%;" class="m-auto d-block">
                        <p class="text-center text-white" style="font-size:1.5rem;">Portugues</p>
                    
                </label>

                <label for="mat" class="d-block w-25 border" style="height:auto;background-color:gray">
                    
                    <img src="Media/Img/Subjects/math.png" style="width:50%;" class="m-auto d-block">
                    <p class="text-center text-white" style="font-size:1.5rem;">Matematica</p>
                
                </label>

                <label for="hist" class="d-block w-25 border" style="height:auto;background-color:gray">
                    
                    <img src="Media/Img/Subjects/historia.png" style="width:50%;" class="m-auto d-block">
                    <p class="text-center text-white" style="font-size:1.5rem;">História</p>
                
                </label>

                <label for="geo" class="d-block w-25 border" style="height:auto;background-color:gray">
                    
                    <img src="Media/Img/Subjects/geo.png" style="width:50%;" class="m-auto d-block">
                    <p class="text-center text-white" style="font-size:1.5rem;">Geografia</p>
                
                </label>

                <label for="bio" class="d-block w-25 border" style="height:auto;background-color:gray">
                    
                    <img src="Media/Img/Subjects/bio.png" style="width:50%;" class="m-auto d-block">
                    <p class="text-center text-white" style="font-size:1.5rem;">Biologia</p>
                
                </label>

                <label for="fis" class="d-block w-25 border" style="height:auto;background-color:gray">
                    
                    <img src="Media/Img/Subjects/fis.png" style="width:50%;" class="m-auto d-block">
                    <p class="text-center text-white" style="font-size:1.5rem;">Fisica</p>
                
                </label>

                <label for="qui" class="d-block w-25 border" style="height:auto;background-color:gray">
                    
                    <img src="Media/Img/Subjects/quim.png" style="width:50%;" class="m-auto d-block">
                    <p class="text-center text-white" style="font-size:1.5rem;">Quimica</p>
                
                </label>

                <label for="ingl" class="d-block w-25 border" style="height:auto;background-color:gray">
                    
                    <img src="Media/Img/Subjects/ingl.png" style="width:50%;" class="m-auto d-block">
                    <p class="text-center text-white" style="font-size:1.5rem;">Inglês</p>
                
                </label>



                

                <input type="checkbox" id="port" class='d-none'  value="port" name="topicos[]">
                <input type="checkbox" id="mat"  class='d-none'  value="mat" name="topicos[]">
                <input type="checkbox"  id="hist"   class='d-none' value="hist" name="topicos[]">
                <input type="checkbox"  id="geo" class='d-none'  value="geo" name="topicos[]">
                <input type="checkbox" id="bio"  class='d-none'  value="bio" name="topicos[]">
                <input type="checkbox" id="fis"  class='d-none' value="fis" name="topicos[]">
                <input type="checkbox" id="qui"  class='d-none' value="qui" name="topicos[]">
                <input type="checkbox" id="ingl" class='d-none'  value="ingl" name="topicos[]">
                <input type='hidden' name='finalizar' value='finalizar'/>

            </div>

            <span  style="background-color:rgb(43, 255, 0);position:relative;left:0px; top:0px" class="disabled text-left btn  " id="backBtn" onclick="backForm()">
                Anterior
            </span>
            <span  style="background-color:rgb(43, 255, 0);position:relative;float:right; top:0px" class="text-right btn"  id="nextBtn" onclick="nextform()">
                Proximo
            </span>

        </form>
    </div>

    <script>
        let formAtual=0;
        let backbtn= document.getElementById("backBtn");
        let nextBtn= document.getElementById("nextBtn");
        let check=document.querySelectorAll('input[type="checkbox"]');
        const form1=document.getElementById("form1");
        const form2=document.getElementById("form2");
        const form = document.getElementById("form");
		const imginput = document.getElementById("imgUp");
		const preview=document.getElementById("imgPreview");


        for (let i = 0; i < check.length; i++) {
            check[i].addEventListener('change', (event)=> {


			if(!event.currentTarget.checked){
				document.querySelector('[for="'+check[i]['id']+'"]').style.backgroundColor ="gray";
			}

            if (event.currentTarget.checked){
                nextBtn.classList.remove('disabled');
				document.querySelector('[for="'+check[i]['id']+'"]').style.backgroundColor="green";
            }else if(document.querySelectorAll('input[type="checkbox"]:checked').length == 0){
                    nextBtn.classList.add('disabled');
					
            }
        });
            
        }

        



        let preferencias=document.querySelectorAll('input[type="checkbox"]:checked').length > 0;

        window.document.onload = function(){
            if(formAtual==0){
                if ((backbtn.classList.contains('disabled'))){
                    backBtn.classList.add('disabled');
                }
            }
        }

        function nextform(){
            if(formAtual==0){
                formAtual=1;
               

                if((backbtn.classList.contains('disabled'))){
                    backBtn.classList.remove('disabled');
                }

                if ((form2.classList.contains('d-none'))){
                    form2.classList.remove('d-none');
                    form2.style.display="flex";
                    form1.style.display='none';
                    nextBtn.innerHTML='Finalizar';
                    nextBtn.classList.add('disabled');
                }
               

                

                
                }else if(formAtual==1){
                    if(document.querySelectorAll('input[type="checkbox"]:checked').length > 0){
                        form.submit(); 
                        
                    }else{
                       
						
                    }
                }

                return formAtual;

               

            }
        

        function backForm(){
            if(formAtual==0){
                
            }else if(formAtual==1){
                formAtual=0;
                
                if(!(backbtn.classList.contains('disabled'))){
                    backBtn.classList.add('disabled');
                }

                form1.style.display="block";
                if (!(form2.classList.contains('d-none'))){
                    form2.classList.remove('d-flex');
                    form2.classList.add('d-none');
                    nextBtn.classList.remove('disabled');
                    nextBtn.innerHTML='Proximo';
                }

                for (let i = 0; i < check.length; i++){
                    check[i].checked= false;
                }
                return formAtual;

                

            }
        }


		imginput.onchange = evt => {
 		 const [file] = imginput.files
  		if (file) {
			preview.src = URL.createObjectURL(file)
		}
	}



        


    </script>

</body>

</html>