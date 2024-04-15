<!DOCTYPE html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" xmlns:mso="urn:schemas-microsoft-com:office:office" xmlns:msdt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882">
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
  integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14="
  crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
  integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg="
  crossorigin=""></script>
  <title>SUPER PROJET DU LUNDI</title>
</head>
<body onload="initialize()">
  <h1> BON PLAN ETUDIANT SUR AMIENS </h1>
  <img src="images/amiens.jpg" alt="amiens" width="800"/>
  <p><b>Tu es étudiant sur Amiens et tu recherches un bon plan dans la région ? <br/>
       Notre site propose en propose dans de nombreuses catégories telle que le sport, la culture ou la restauration</b>
  </p>
  <?php
  $connexion = mysqli_connect("localhost","root","","pourlesjeunes3");
  mysqli_set_charset($connexion,"utf8");
  $req = "select * from categorie";
  $res = mysqli_query($connexion,$req);
  $ligne = mysqli_fetch_assoc($res);
  while($ligne)
  {
    echo '<a href="listeAct.php?categ='.$ligne["idcat"].'">'.$ligne["descCat"].'</a><br/>';
    $ligne = mysqli_fetch_assoc($res);
  }
  $req2 = "select * from bonplan";
  $res2 = mysqli_query($connexion,$req2);
  $ligne2= mysqli_fetch_assoc($res2);
  if (mysqli_num_rows($res2) > 0) {
    $donnees = array();
    while($ligne2){
        $donnees[] = $ligne2;
        $ligne2= mysqli_fetch_assoc($res2);
    }
  }
  else
  {
    echo "Aucun résultat trouvé dans la base de données.";
  }
  ?>
  <h2> LA CARTE DES BONS PLANS</h2>
  <?php

  ?>
  <div id="container">
    <div id="map" style="width:50%; height:50%"></div>
  </div>
    

</body>
</html>
<script>
  var map = L.map('map').setView([49.900002, 2.3], 14);
  var osmLayer = L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors',
    maxZoom: 18});
  map.addLayer(osmLayer);
  var dataFromPhp = <?php echo json_encode($donnees);?>
  dataFromPhp.foreach(function(item))
  {
    L.marker([item.latitude, item.longitude]).addTo(map).binPopup(item.nom)
  });
</script> 