<!DOCTYPE HTML>

<html>
	<head>
		<title>Vide Dressing</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/button_css.css" />
		<link rel="icon" type="image/ico" href="images/favicon.ico" />

	</head>




<body class="landing is-preload">
	 <input type="text" name="rechercher">

            <?php
                session_start();
                include 'header.php';


            ?>

                           
             </br>
              <table>
              <thead> 
              	<tr> 
              		<th>

             <form> Entrez le code Article :

             	 <input type="text" name="idArticle" required>

             	</br>

             	Entrez le nom de l'acheteur


             	  <input type="text" name="nomacheteur">



             	 <input type="submit" name="Recherche" value="Rechercher">

             </form>



             <?php


             include 'connectBD.php';



             if(isset($_GET['idArticle'])){

             	$codeArticle=$_GET['idArticle'];

             	$req = $pdo->prepare("SELECT * FROM article WHERE codeArticle=(?) AND statut='en vente'");
				$req -> bindParam(1,$codeArticle);
				$req->execute();

				echo '<table>';


				while ($row = $req->fetch(PDO::FETCH_ASSOC)){

					echo '<tr><th>'.$row['codeArticle'].'<th>'.$row['prix'].'</th><th>'.'</th><th>'.$row['statut'].'</th><th>'.$row['commentaire'].'</th>';

					echo '<th> <form> <input type="submit" name="vendreArticle" value="Vendre"> </form></th>';
					

					$req = $pdo->prepare("UPDATE `article` SET `statut` = 'vendu' WHERE `article`.`codeArticle` = (?) ");
					$req -> bindParam(1,$codeArticle);
					$req->execute();

				

					echo '</tr>';


				}


				echo '</table>';


             }


            


				





             ?>

         	</th><th><form>

             	Entrez le code Article :

             	 <input type="text" name="idArticle2" required>

             	</br>




             	 <input type="submit" name="Retirer" value="Retirer">

             </form>


              <?php




             if(isset($_GET['idArticle2'])){

             	$codeArticle=$_GET['idArticle2'];

             	$req = $pdo->prepare("SELECT * FROM article WHERE codeArticle=(?) AND statut='en vente'");
				$req -> bindParam(1,$codeArticle);
				$req->execute();

				echo '<table>';


				while ($row = $req->fetch(PDO::FETCH_ASSOC)){

					echo '<tr><th>'.$row['codeArticle'].'<th>'.$row['prix'].'</th><th>'.'</th><th>'.$row['statut'].'</th><th>'.$row['commentaire'].'</th>';

				

					echo '</tr>';


				}


				echo '</table>';


             }


             ?>







         </th></tr>></thead></table>

            

        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrolly.min.js"></script>
            <script src="assets/js/breakpoints.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>
            <script src="assets/js/validation.js"></script>





</body></html>
