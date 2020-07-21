<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <main>

    <h1>S'inscrire</h1>

    <form class="form-group">
  <div class="row">
    <div class="col">
      <input type="text" class="form-control " placeholder="Prénom">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Nom">
    </div>
    
  </div>
  <div class="row">
  <div class="col">
      <input type="text" class="form-control" placeholder="Login">
    </div>
    <div class="col">
      <input type="email" class="form-control" placeholder="Email">
    </div>
    </div>
    
  </div>
  <div class="row">
  <div class="col">
      <input type="password" class="form-control" placeholder="Mot de passe">
    </div>
    <div class="col">
      <input type="password" class="form-control" placeholder="Confirmation Mot de passe">
    </div>
    </div>
    
  </div>
  <button type="button" class="btn btn-success btn-lg btn-block font-weight-bold">Valider</button>
</form>


    </main>
        
</body>
</html>