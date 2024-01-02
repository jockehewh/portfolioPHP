<?php

$bdd = new PDO(
    'mysql:host=localhost;dbname=portfolio','root','',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]
);
  if(!isset($_SESSION)){
    session_start();
  }
/* $result = $bdd->exec('INSERT INTO projets (titre, description, img, url) VALUES ("pays voisins", "Ce projet permet de récuperer des informations sur les voisins du pays sélectionné.", "https://raw.githubusercontent.com/jockehewh/jockehewh.github.io/main/projects/imgs/2023141143.png", "https://jockehewh.github.io/projects/country-data"),("guess my number", "Un mini jeu où il faut deviner un nombre en 1 et 20.", "https://raw.githubusercontent.com/jockehewh/jockehewh.github.io/main/projects/imgs/2023141235.png", "https://jockehewh.github.io/projects/guess-my-number"),("pig game", "Un mini jeu où il faut atteindre le score limite sans perdre ses points.", "https://raw.githubusercontent.com/jockehewh/jockehewh.github.io/main/projects/imgs/2023141317.png", "https://jockehewh.github.io/projects/pig-game-xavier"),("pokedex", "Une application qui intéroge une API Pokemon.", "https://raw.githubusercontent.com/jockehewh/jockehewh.github.io/main/projects/imgs/2023141336.png", "https://jockehewh.github.io/projects/pokedex"), ("recettes", "Une application qui retrouve une recette aléatoirement.", "https://raw.githubusercontent.com/jockehewh/jockehewh.github.io/main/projects/imgs/2023141354.png", "https://jockehewh.github.io/projects/recettes"), ("encrypt", "Une application qui permet de crypter et de décrypter un message texte.", "https://raw.githubusercontent.com/jockehewh/jockehewh.github.io/main/projects/imgs/2023141422.png", "https://jockehewh.github.io/projects/secret-maker")');
echo "Nombre d'enregistrements affectés par l'INSERT : $result <br>"; 
$password = 123456789;
$password = password_hash($password, PASSWORD_DEFAULT);
$result = $bdd->exec("INSERT INTO admin (name, password) VALUES ('xavier', '$password')");*/
?>