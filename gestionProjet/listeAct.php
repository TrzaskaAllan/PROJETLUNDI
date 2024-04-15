<html>
    <head><title></title><link href="style.css" rel="stylesheet" /></head>
    <body>
        <?php
            $connexion = mysqli_connect("localhost","root","","pourlesjeunes2");
            if($connexion)
            {
                mysqli_set_charset($connexion,"utf8");
                $req = "select * from bonplan,lieu where lieu.id=bonplan.id and lieu.idcat='".$_GET["categ"]."';";
                echo "<h1> Liste des bons plans</h1>";
                echo '<p /><table border="2" width="75%">';
                $res = mysqli_query($connexion,$req);
                $ligne=mysqli_fetch_assoc($res);
                while($ligne)
                {
                    echo"<tr><td>".$ligne["intitule"]."</td><td>".$ligne["prix"].'€'."</td>
                    <td><img width='350' height='250' src=".$ligne["photos"]."></td><td>".$ligne["description"]."</td>
                    </tr>";
                    $ligne=mysqli_fetch_assoc($res);
                }
                echo "</table><p />";
            }
            else
            {
                echo "probleme de co";
            }
            mysqli_close($connexion);
        ?>
    </body>
</html>

