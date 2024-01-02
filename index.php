<?php 
 require('myglobals.php');
/*$projets = $bdd->query('SELECT * FROM projets');
$projets = $projets->fetchAll(PDO::FETCH_ASSOC); */
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  foreach ($_POST as $key => $value) {
        $_POST[$key] = htmlspecialchars(addslashes($value));
    }
    if(empty($_POST['titre'])){
      $titre = "Titre test";
    }else{
      $titre = $_POST['titre'];
    }
    if(empty($_POST['url'])){
      $url = "example.org";
    }else{
      $url = $_POST['url'];
    }
    if(empty($_POST['img'])){
      $img = "https://raw.githubusercontent.com/jockehewh/jockehewh.github.io/main/projects/imgs/20233228157.webp";
    }else{
      $img = $_POST['img'];
    }
    if(empty($_POST['desc'])){
      $description = "Description test";
    }else{
      $description = $_POST['desc'];
    }
    $sql = "INSERT INTO projets (titre, description, img, url) VALUES (:titre, :description, :img, :url)";
    $result = $bdd->prepare($sql);
    $result->bindParam(':titre', $titre);
    $result->bindParam(':description', $description);
    $result->bindParam(':img', $img);
    $result->bindParam(':url', $url);
    $result->execute();
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <style>
    *{margin: 0; padding: 0; box-sizing: border-box;}
    a{
      text-decoration: none;
      color: black;
      justify-self: center;
    }
    h1, h2, h3{
      text-align: center;
    }
    nav, nav form{
      display: flex;
      flex-direction: row;
    }
    .projet{
      display: flex;
      flex-direction: column;
      max-width: 25vw;
    }
    .projets{
      display: grid;
      grid-template-columns: repeat(2,1fr);
      align-items: center;
      gap: 20px;
    }
    .sidemenu{
      position: absolute;
      top: 0;
      right: 0;
      width: 30vw;
      height: 100vh;
      background-color: #fff;
      text-align: right;
    }
    .sidemenu form{
      text-align: left;
    }
    .noshow{
      display: none;
    }
  </style>
  <nav>
    <?php if(!isset($_SESSION['admin'])):?>
    <form action="login.php" method="post">
      <label for="name">user:
        <input type="text" name="name">
      </label>
      <label for="password">password:
        <input type="password" name="password">
      </label>
      <input type="submit" value="connect">
    </form>
    <?php else: ?>
    <a href="#" class="ajout">ajouter un projet -></a>
    <?php endif ?>
  </nav>
  <main>
  <h1>Xavier Bélénus</h1>
  <h2>Développeur web fullStack</h2>
    <div class="projets">
      <?php require('projet.php') ?>
    </div>
  </main>
  <div class="sidemenu noshow">
    <a href="logout.php" >Déconnexion</a>
    <form id="pr" action="" method="post">
      <label for="titre">titre: </br>
        <input type="text" name="titre" required>
      </label> </br>
      <label for="url">URL vers le projet: </br>
        <input type="text" name="url" required>
      </label> </br>
      <label for="img">image URL(Optionnel): </br>
        <input type="text" name="img">
      </label> </br>
      <label for="desc">Description: </br>
        <input type="text" name="desc" required>
      </label> </br>
      <input type="submit" value="Enregistrer">
    </form>
  </div>
  <?php if(isset($_SESSION['admin'])): ?>
    <script>
      document.querySelector('.ajout').addEventListener('click', ()=>{
        document.querySelector('.sidemenu').classList.toggle('noshow');
      })
      document.querySelector('#pr').addEventListener('submit', ()=>{
        document.querySelector('.sidemenu').classList.toggle('noshow');
      })
      document.querySelector(".projets").addEventListener('click', ()=>{
        document.querySelector('.sidemenu').classList.add('noshow');
      })
    </script>
  <?php endif ?>
</body>
</html>