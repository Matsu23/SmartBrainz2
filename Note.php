

<!DOCTYPE html>
<html>
<head>

<link rel='stylesheet' href='CSS/normalize.css'>
<link rel='stylesheet' href='CSS/main.css'>
<script src='JS/note.js'></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta charset="UTF-8">
</head>
<body>


<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <!-- bootstrap css -->
 <link rel="stylesheet" href="./css/bootstrap.min.css">
 <!-- main css -->
 <link rel="stylesheet" href="./css/main.css">
 <!-- google fonts -->
 <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">

 <!-- font awesome -->
 <link rel="stylesheet" href="./css/all.css">
 <title>Postar FlashCards</title>
 <style>
 </style>
</head>

<body>

 <div class="container">
  <div class="row">
   <div class="col-11 col-lg-6 my-3">
    <h3 class="text-capitalize">flashcards</h3>
    <button class="btn text-capitalize my-2 show-btn" id="show-btn">Publicar FlashCard</button>
    <div class="card card-body my-3 question-card">
     <!-- close btn -->
     <a href="#" class="close-btn mt-0">
      <i class="fas fa-window-close"></i>
     </a>
     <!-- end of close btn -->
     <div class="feedback alert w-75 text-capitalize">
      feedback
     </div>
     <form id="question-form">
      <!-- single input -->
      <h5 class="text-capitalize">Questão</h5>
      <div class="form-group">
       <textarea class="w-100" id="question-input" rows="3"></textarea>
      </div>
      <!-- end of single input -->
      <!-- single input -->
      <h5 class="text-capitalize">Resposta</h5>
      <div class="form-group">
       <textarea class="w-100" id="answer-input" rows="3"></textarea>
      </div>
      <!-- end of single input -->
      <button type="submit" class="btn submitBtn text-capitalize w-50">Salvar</button>
     </form>
    </div>
   </div>
  </div>

  <div class="row px-2" id="questions-list">
   <!-- <div class="col-md-4"> -->
    <!--Template for card data-->
    <!-- <div class="card card-body flashcard my-3">
     <h4 class="text-capitalize">question title?</h4>
     <a href="#" class="text-capitalize my-3 show-answer">show/hide answer</a>
     <h5 class="answer mb-3">question answer</h5>
     <div class="flashcard-btn d-flex justify-content-between">
      <a href="#" id="edit-flashcard" class=" btn my-1 edit-flashcard text-uppercase" data-id="">edit</a>
      <a href="#" id="delete-flashcard" class=" btn my-1 delete-flashcard text-uppercase">delete</a>
     </div> -->
    </div>
   </div>

  </div>
 </div>

<!-- jquery -->
 <script src="/JS/jquery-3.3.1.min.js"></script>
 <!-- bootstrap js -->
 <script src="/js/bootstrap.bundle.min.js"></script>
 <!-- script js -->
 <script src="/JS/note.js"></script>
	
</main>
</body>
</html>
