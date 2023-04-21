<?php
	define('HOST','127.0.0.1');
	define('DB_NAME','etudiant');
	define('USER','root');
	define('PASS','');
	try{
		$connexion=new PDO("mysql:host=" .HOST. ";dbname=" . DB_NAME .";charset=UTF8",USER,PASS);
		$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo 'Erreur la connexion echoue !'.$e->getMessage();
		exit();
	}
	if(isset($_POST['valider'])){
		extract($_POST);
		if(isset($_POST['departement']) AND !empty($_POST['departement']) AND $_POST['departement'] != $affiche['departement']){
			$modifier = $connexion->prepare("UPDATE inscription_peda SET departement = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['departement'],$_GET['modif']));
			header('location:pedagogique.php');
		}
		if(isset($_POST['cycle']) AND !empty($_POST['cycle']) AND $_POST['cycle'] != $affiche['cycle']){
			$modifier = $connexion->prepare("UPDATE inscription_peda SET cycle = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['cycle'],$_GET['modif']));
			header('location:pedagogique.php');
	    }
	   if(isset($_POST['niveau']) AND !empty($_POST['niveau']) AND $_POST['niveau'] != $affiche['niveau']){
			$modifier = $connexion->prepare("UPDATE inscription_peda SET niveau = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['niveau'],$_GET['modif']));
			header('location:pedagogique.php');
	    }
	   if(isset($_POST['filiere']) AND !empty($_POST['filiere']) AND $_POST['filiere'] != $affiche['filiere']){
			$modifier = $connexion->prepare("UPDATE inscription_peda set filiere = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['filiere'],$_GET['modif']));
			header('location:pedagogique.php');
	}
	$code =$_GET['modif'];      
    $modification = $connexion->prepare('SELECT * FROM inscription_peda WHERE idUtilisateur = ? limit 1');
	$modification->execute(array($_GET['modif']));
	$affiche = $modification->fetch(PDO::FETCH_ASSOC);
    }
?>














<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription pedagogique</title>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <div id="dlogo">
        <img src="esp.png" alt="logo" id="logo">
    </div>
    <p>Ecole Superieure Polytechnique</p>
    <h1>Inscription Pédagogique</h1>
    <form action='pedagogie.php' method="post">
        <fieldset>
            <label for="departement" >Departement
                <select name="departement" id="departement"  value="<?php echo $affiche['departement']; ?>">
                    <option value="">Selectionner un departement</option>
                    <option value="Informatique et Telecoms Reseaux">Informatique et Telecoms Reseaux</option>
                    <option value="Gestion">Gestion</option>
                    <option value="Genie Chimique et Biologie Appliqué">Genie Chimique et Biologie Appliqué</option>
                    <option value="Genie Civil">Genie Civil</option>
                    <option value="Genie Mécanique">Genie Mécanique</option>
                    <option value="Genie Electrique">Genie Electrique</option>
                </select>
            </label>
            <label for="cycle" >Cycle
                <select name="cycle"  value="<?php echo $affiche['cycle']; ?>">
                    <option value="">Selectionner un cycle</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </label>
            <label for="niveau" >Niveau
                <select name="niveau"  value="<?php echo $affiche['niveau']; ?>">
                    <option value="">Selectionner un niveau</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </label>
            <label for="filiere" >Filiere
                <select name="filiere" id="filiere"  value="<?php echo $affiche['filiere']; ?>">
                    <option value="">Selectionner une filiere</option>
                </select>
            </label>
        </fieldset>
        <input type="submit" value="Valider" name="valider"/>
    </form>

    <script>
        let departement = document.getElementById("departement");
        departement.addEventListener("change", filiere);
      
        function filiere() {
          let filiereSelect = document.getElementById("filiere");
          let filiere = [];
      
          switch (departement.value) {
            case "Informatique et Telecoms Reseaux":
              filiere = ["Informatique", "Telecoms Reseaux"];
              break;
            case "Gestion":
              filiere = ["Comptabilite", "Technique Comptable et Financieres", "Marketing", "Ressources Humaines"];
              break;
            case "Genie Chimique et Biologie Appliqué":
              filiere = ["Genie Chimique", "Genie Biologique", "Industrie Alimentaire"];
              break;
            case "Genie Civil":
              filiere = ["Genie Civil"];
              break;
            case "Genie Mecanique":
              filiere = ["Genie Mecanique"];
              break;
            case "Genie Electrique":
              filiere = ["Genie Electrique"];
              break;
            default:
              filiere = ["Informatique", "Telecoms Reseaux","Comptabilite","Technique Comptable et Financieres","Marketing","Ressources Humaines","Genie Chimique", "Genie Biologique", "Industrie Alimentaire","Genie Mecanique","Genie Electrique","Genie Civil"];
          }
      
          // Vider les options précédentes
          filiereSelect.innerHTML = "";
      
          // Ajouter les nouvelles options
          filiere.forEach((element) => {
            let option = document.createElement("option");
            option.text = element;
            option.value = element.toLowerCase();
            filiereSelect.add(option);
          });
          return filiereSelect;
        }
      </script>
    

</body>

</html>