<!DOCTYPE html>
<html>
<head>
<title>SmartBrainZ</title>
<?php
include_once('API\sessionManeger.php');
if((testLogin())=="creating"){
	echo "<script>window.location.href = 'creatingAccount.php';</script>";
}
if((testLogin())==false){
	echo "<script>window.location.href = 'index.php';</script>";
}


 echo "<script>alert('".$_SESSION["User"]."')</script>";
 echo "<script>alert('".$_SESSION["topics"]."')</script>";
 echo "<script>alert('".$_SESSION["creationComplete"]."')</script>";
 print_r($_SESSION["creationComplete"]);
?>


<link rel='stylesheet' href='CSS/normalize.css'>
<link rel='stylesheet' href='CSS/bootstrap.min.css'>
<script defer src="JS/jquery.slim.min.js"></script>
<script src='JS/contentLoad.js'></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta charset="UTF-8">
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
                        <img src="UserData/Default/avatar.png" style="width:100px;" class="pe-5"/><b>Usuario</b><span style="font-size:2em;color:#617881;">LV 25</span>
                        <div id="progressbar" style="background-color: black;border-radius: 13px;padding: 3px;">
                            <div style="background-color: orange;width: 40%;height: 20px;border-radius: 10px;"></div>
                        </div>
                        <div class="row  text-white" >
                            <div class="col text-center">
                                <span>500</span><br>
                                <span>Seguindo</span>
    
    
                            </div>
                            <div class="col text-center">
                                <span>500</span><br>
                                <span>Seguidores</span>
    
    
                            </div>
    
                        </div>
                    </div>
                    <form class="d-block  mt-5">
                        <div class="">
                            <textarea class="w-100" style="height:200px;resize:none;font-size:2em;" placeholder="No que você esta pensando?"></textarea>
                            <div style="background-color:rgb(204, 206, 203);font-size:1.5em;color:rgb(142, 146, 140)" class="text-right">
                                500
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
        <?php include_once('API/timeline.php');?>
        
            
            <!--<div class="tweet-wrap">
                <div class="tweet-header">
                  <img src="UserData/Default/avatar.png" alt="" class="avator">
                  <div class="tweet-header-info">
                   Aluno de matematica <span>Publicou um pensamento</span>. <br>Jun 27</span>
                    <p>Aula de matematica hoje foi muito cansativa...
                        Os professores poderiam tentar abordar certos assuntos de maneira mais
                        didatica!
                    </p>
                    
                  </div>
                  
                </div>
                
                <div class="tweet-info-counts">
                  
                  <div class="comments">
                    
                    <svg class="feather feather-message-circle sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                    <div class="comment-count">33</div>
                  </div>
                  
                  <div class="retweets">
                    <svg class="feather feather-repeat sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg>
                    <div class="retweet-count">397</div>
                  </div>
                  
                  <div class="likes">
                    <svg class="feather feather-heart sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                    <div class="likes-count">
                      2.6k
                    </div>
                  </div>
                  
                  
                </div>
              </div>

              <div class="tweet-wrap">
                <div class="tweet-header">
                  <img src="UserData/Default/avatar.png" alt="" class="avator">
                  <div class="tweet-header-info">
                   Aluno Teste <span>Publicou uma questão</span>.<br> Jun 27</span>
                    <p>Quando o Brasil foi descoberto?</p>
                    
                  </div>
                  
                </div>
                
                <div class="tweet-info-counts">
                  
                  <div class="comments">
                    
                    <svg class="feather feather-message-circle sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                    <div class="comment-count">33</div>
                  </div>
                  
                  <div class="retweets">
                    <svg class="feather feather-repeat sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg>
                    <div class="retweet-count">397</div>
                  </div>
                  
                  <div class="likes">
                    <svg class="feather feather-heart sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                    <div class="likes-count">
                      2.6k
                    </div>
                  </div>
                  
                  
                </div>

                <div class="tweet-wrap" style="border-color:#FF6900;border-style:solid;">
                    <div class="tweet-header">
                      <img src="UserData/Default/avatar.png" alt="" class="avator">
                      <div class="tweet-header-info">
                       Professor de matematica . <br>Jun 27</span>
                        <p>A chegada dos portugueses ao Brasil foi parte do processo das grandes navegações. Pedro Álvares Cabral foi o líder de uma expedição composta por 13 embarcações e cerca de 1200 homens. O primeiro ponto do Brasil avistado pelos portugueses foi a região do Monte Pascoal, na Bahia, no dia 22 de abril de 1500.</p>
                        
                      </div>
                      
                    </div>
                    
                    <div class="tweet-info-counts">
                      
                      <div class="comments">
                        
                        <svg class="feather feather-message-circle sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                        <div class="comment-count">33</div>
                      </div>
                      
                      <div class="retweets">
                        <svg class="feather feather-repeat sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="17 1 21 5 17 9"></polyline> <path d="M1 21h4V9H1v12zm22-11c0-1.1-.9-2-2-2h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 1 7.59 7.59C7.22 7.95 7 8.45 7 9v10c0 1.1.9 2 2 2h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73v-1.91l-.01-.01L23 10z"></path></svg>
                        <div class="retweet-count">500</div>
                      </div>
                      
                      <div class="likes">
                        <svg class="feather feather-heart sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"> <path d="M15 3H6c-.83 0-1.54.5-1.84 1.22l-3.02 7.05c-.09.23-.14.47-.14.73v1.91l.01.01L1 14c0 1.1.9 2 2 2h6.31l-.95 4.57-.03.32c0 .41.17.79.44 1.06L9.83 23l6.59-6.59c.36-.36.58-.86.58-1.41V5c0-1.1-.9-2-2-2zm4 0v12h4V3h-4z" class="style-scope yt-icon"></path></svg>
                        <div class="likes-count">
                          200
                        </div>
                      </div>
                      
                      
                    </div>

              </div>
            </div>
        </div>

        <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">



<div class="tweet-wrap">
  <div class="tweet-header">
    <img src="Media/Img/Avatar.png" alt="" class="avator">
    <div class="tweet-header-info">
      Aluno <span>criou um baralho de flash card</span><br>Jun 27

     <h3 >BARALHO DE MATEMATICA</h1>
      
    </div>
    
  </div>
  <div class="tweet-img-wrap">
    <img src="Media/Img/Subjects/mathheader.jpg"" alt="" class="tweet-img">
  </div>

  <div class="">
    <input type="submit" value="TESTAR!" style="background-color:#2222DA;color:#FF6900;border-radius:100px;font-size:3em;" class="w-100">
  </div>  

  <div class="tweet-info-counts">
                  
    <div class="comments">
      
      <svg class="feather feather-message-circle sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
      <div class="comment-count">33</div>
    </div>
    
    <div class="retweets">
      <svg class="feather feather-repeat sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg>
      <div class="retweet-count">397</div>
    </div>
    
    <div class="likes">
      <svg class="feather feather-heart sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
      <div class="likes-count">
        2.6k
      </div>
    </div>
    
    
  </div>
</div>
       
        
-->
    </div>

    <div class="col">
        <div style="position:fixed;">
            <ul>
                <li style="font-size:3em;list-style-type: none;"><img src='Media/Img/homeIcon.png' width="90px">Home</li>
                <li style="font-size:3em;list-style-type: none;"><img src='Media/Img/profile.png' width="90px">Perfil</li>
                <li style="font-size:3em;list-style-type: none;"><img src='Media/Img/group.png' width="90px">Grupos</li>
                <li style="font-size:3em;list-style-type: none;"><img src='Media/Img/bookIcon.png' width="90px">Anotações</li>
                <li style="font-size:3em;list-style-type: none;"><img src='Media/Img/flashcar.png' width="90px">FlashCards</li>
                <li style="font-size:3em;list-style-type: none;"><img src='Media/Img/saveIcon.webp' width="90px">Itens Salvos</li>
                <li style="font-size:3em;list-style-type: none;"><img src='Media/Img/rewardIcon.png' width="90px">Recompensas</li>
                <li style="font-size:3em;list-style-type: none;"><img src='Media/Img/notifyIcon.png' width="90px">Notificações</li>
                <li style="font-size:3em;list-style-type: none;"><img src='Media/Img/config.png' width="90px">Configurações</li>
                <li style="font-size:3em;list-style-type: none;"><img src='Media/Img/exit.png' width="90px">Sair</li>
                
            </ul>
        </div>
        

    </div>
</div>

   

</body>

</html>