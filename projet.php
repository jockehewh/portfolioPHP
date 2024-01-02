<?php 
require('myglobals.php');
$projets = $bdd->query('SELECT * FROM projets');
$projets = $projets->fetchAll(PDO::FETCH_ASSOC);
foreach($projets as $indice => $valeur){
  echo "<a target='_blank' href=$valeur[url]>";
  echo "<div class='projet'>";
  echo "<h3>$valeur[titre]</h3>";
  echo "<p>$valeur[description]</p>";
  echo "<img src='$valeur[img]' />";
  echo "</div>";
  echo "</a>";
}
?>
