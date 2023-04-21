<?php
    session_start();

    define('HOST','127.0.0.1');
    define('DB_NAME','etudiant');
    define('USER','root');
    define('PASS','');
    $id;
    try{
        $connexion=new PDO("mysql:host=" .HOST. ";dbname=" . DB_NAME .";charset=UTF8",USER,PASS);
        $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $rec = $connexion->prepare("SELECT idUtilisateur FROM utilisateur");
        $rec->execute();
        $id = $rec->fetch()['idUtilisateur'];
    }
    catch(PDOException $e){
        echo 'Erreur la connexion echoue !'.$e->getMessage();
        exit();
    }
    
    if (isset($_POST['valider'])) {
        extract($_POST);
		if(isset($_POST['nom']) AND !empty($_POST['nom']) AND $_POST['nom'] != $affiche['Nom']){
			$modifier = $connexion->prepare("UPDATE identification SET Nom = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['nom'],$_GET['modif']));
			header('location:administrative.php');
		}
		if(isset($_POST['prenom']) AND !empty($_POST['prenom']) AND $_POST['prenom'] != $affiche['Prenom']){
			$modifier = $connexion->prepare("UPDATE identification SET Prenom = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['prenom'],$_GET['modif']));
			header('location:administrative.php');
	    }
	   if(isset($_POST['civilite']) AND !empty($_POST['civilite']) AND $_POST['civilite'] != $affiche['Civilite']){
			$modifier = $connexion->prepare("UPDATE identification SET Civilite = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['civilite'],$_GET['modif']));
			header('location:administrative.php');
	    }
	   if(isset($_POST['date']) AND !empty($_POST['date']) AND $_POST['date'] != $affiche['Date_de_naissance']){
			$modifier = $connexion->prepare("UPDATE identification set Date_de_naissance = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['date'],$_GET['modif']));
			header('location:administrative.php');
	    }
		if(isset($_POST['lieu']) AND !empty($_POST['lieu']) AND $_POST['lieu'] != $affiche['Lieu_de_naissance']){
			$modifier = $connexion->prepare("UPDATE identification SET Lieu_de_naissance = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['lieu'],$_GET['modif']));
			header('location:administrative.php');
	    }
	   if(isset($_POST['cni']) AND !empty($_POST['cni']) AND $_POST['cni'] != $affiche['CNI']){
		   $modifier = $connexion->prepare("UPDATE identification SET CNI = ? WHERE idUtilisateur = ? ");
		   $modifier ->execute(array($_POST['cni'],$_GET['modif']));
		   header('location:administrative.php');
	  	}
		if(isset($_POST['ine']) AND !empty($_POST['ine']) AND $_POST['ine'] != $affiche['INE']){
		   $modifier = $connexion->prepare("UPDATE identification SET INE = ? WHERE idUtilisateur = ? ");
		   $modifier ->execute(array($_POST['ine'],$_GET['modif']));
		   header('location:administrative.php');
		}
        if(isset($_POST['numero_Carte']) AND !empty($_POST['numero_Carte']) AND $_POST['numero_Carte'] != $affiche['Numero_de_carte']){
			$modifier = $connexion->prepare("UPDATE identification SET Numero_de_carte = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['numero_Carte'],$_GET['modif']));
			header('location:administrative.php');
		}
		if(isset($_POST['pays']) AND !empty($_POST['pays']) AND $_POST['pays'] != $affiche['Pays_de_naissance']){
			$modifier = $connexion->prepare("UPDATE identification SET Pays_de_naissance = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['pays'],$_GET['modif']));
			header('location:administrative.php');
	    }
	   if(isset($_POST['nationalite']) AND !empty($_POST['nationalite']) AND $_POST['nationalite'] != $affiche['Nationalite']){
			$modifier = $connexion->prepare("UPDATE identification SET Nationalite = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['nationalite'],$_GET['modif']));
			header('location:administrative.php');
	    }
	   if(isset($_POST['mainadress']) AND !empty($_POST['mainadress']) AND $_POST['mainadress'] != $affiche['adresse_principale']){
			$modifier = $connexion->prepare("UPDATE adresse set adresse_principale = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['mainadress'],$_GET['modif']));
			header('location:administrative.php');
	    }
		if(isset($_POST['adress']) AND !empty($_POST['adress']) AND $_POST['adress'] != $affiche['adresse_secondaire']){
			$modifier = $connexion->prepare("UPDATE adresse SET adresse_secondaire = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['adress'],$_GET['modif']));
			header('location:administrative.php');
	    }
	   if(isset($_POST['mail_pers']) AND !empty($_POST['mail_pers']) AND $_POST['mail_pers'] != $affiche['mail_pers']){
		   $modifier = $connexion->prepare("UPDATE adresse SET mail_pers = ? WHERE idUtilisateur = ? ");
		   $modifier ->execute(array($_POST['mail_pers'],$_GET['modif']));
		   header('location:administrative.php');
	  	}
		if(isset($_POST['mail_ins']) AND !empty($_POST['mail_ins']) AND $_POST['mail_ins'] != $affiche['mail_ins']){
		   $modifier = $connexion->prepare("UPDATE adresse SET mail_ins = ? WHERE idUtilisateur = ? ");
		   $modifier ->execute(array($_POST['mail_ins'],$_GET['modif']));
		   header('location:administrative.php');
		}if(isset($_POST['tel_fixe']) AND !empty($_POST['tel_fixe']) AND $_POST['tel_fixe'] != $affiche['tel_fixe']){
			$modifier = $connexion->prepare("UPDATE adresse SET tel_fixe = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['tel_fixe'],$_GET['modif']));
			header('location:administrative.php');
		}
		if(isset($_POST['tel_port']) AND !empty($_POST['tel_port']) AND $_POST['tel_port'] != $affiche['tel_port']){
			$modifier = $connexion->prepare("UPDATE adresse SET tel_port = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['tel_port'],$_GET['modif']));
			header('location:administrative.php');
	    }
	   if(isset($_POST['BP']) AND !empty($_POST['BP']) AND $_POST['BP'] != $affiche['BP']){
			$modifier = $connexion->prepare("UPDATE adresse SET BP = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['BP'],$_GET['modif']));
			header('location:administrative.php');
	    }
	   if(isset($_POST['Smatrimoniale']) AND !empty($_POST['Smatrimoniale']) AND $_POST['Smatrimoniale'] != $affiche['situation_matrimoniale']){
			$modifier = $connexion->prepare("UPDATE situation_familiale set situation_matrimoniale = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['Smatrimoniale'],$_GET['modif']));
			header('location:administrative.php');
	    }
		if(isset($_POST['nbre_enf']) AND !empty($_POST['nbre_enf']) AND $_POST['nbre_enf'] != $affiche['nbre_enfant']){
			$modifier = $connexion->prepare("UPDATE situation_familiale SET nbre_enfant = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['nbre_enf'],$_GET['modif']));
			header('location:administrative.php');
	    }
	   if(isset($_POST['bourse']) AND !empty($_POST['bourse']) AND $_POST['bourse'] != $affiche['bourse']){
		   $modifier = $connexion->prepare("UPDATE bourse SET bourse = ? WHERE idUtilisateur = ? ");
		   $modifier ->execute(array($_POST['bourse'],$_GET['modif']));
		   header('location:administrative.php');
	  	}
		if(isset($_POST['nature']) AND !empty($_POST['nature']) AND $_POST['nature'] != $affiche['nature']){
		   $modifier = $connexion->prepare("UPDATE bourse SET nature = ? WHERE idUtilisateur = ? ");
		   $modifier ->execute(array($_POST['nature'],$_GET['modif']));
		   header('location:administrative.php');
		}if(isset($_POST['montant']) AND !empty($_POST['montant']) AND $_POST['montant'] != $affiche['montant']){
			$modifier = $connexion->prepare("UPDATE bourse SET montant = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['montant'],$_GET['modif']));
			header('location:administrative.php');
		}
		if(isset($_POST['salar']) AND !empty($_POST['salar']) AND $_POST['salar'] != $affiche['activ_sal']){
			$modifier = $connexion->prepare("UPDATE emploi SET activ_sal = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['salar'],$_GET['modif']));
			header('location:administrative.php');
	    }
	   if(isset($_POST['nompers']) AND !empty($_POST['nompers']) AND $_POST['nompers'] != $affiche['nom']){
			$modifier = $connexion->prepare("UPDATE contact SET nom = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['nompers'],$_GET['modif']));
			header('location:administrative.php');
	    }
	   if(isset($_POST['prenompers']) AND !empty($_POST['prenompers']) AND $_POST['prenompers'] != $affiche['prenom']){
			$modifier = $connexion->prepare("UPDATE contact set prenom = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['prenompers'],$_GET['modif']));
			header('location:administrative.php');
	    }
		if(isset($_POST['adresse']) AND !empty($_POST['adresse']) AND $_POST['adresse'] != $affiche['adresse']){
			$modifier = $connexion->prepare("UPDATE contact SET adresse = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['adresse'],$_GET['modif']));
			header('location:administrative.php');
	    }
	   if(isset($_POST['ville']) AND !empty($_POST['ville']) AND $_POST['ville'] != $affiche['ville']){
		   $modifier = $connexion->prepare("UPDATE contact SET ville = ? WHERE idUtilisateur = ? ");
		   $modifier ->execute(array($_POST['ville'],$_GET['modif']));
		   header('location:administrative.php');
	  	}
		if(isset($_POST['tel_fixe']) AND !empty($_POST['tel_fixe']) AND $_POST['tel_fixe'] != $affiche['tel_fixe']){
		   $modifier = $connexion->prepare("UPDATE contact SET tel_fixe = ? WHERE idUtilisateur = ? ");
		   $modifier ->execute(array($_POST['tel_fixe'],$_GET['modif']));
		   header('location:administrative.php');
		}if(isset($_POST['tel_port']) AND !empty($_POST['tel_port']) AND $_POST['tel_port'] != $affiche['tel_port']){
			$modifier = $connexion->prepare("UPDATE contact SET tel_port = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['tel_port'],$_GET['modif']));
			header('location:administrative.php');
		}
		if(isset($_POST['mail_pers']) AND !empty($_POST['mail_pers']) AND $_POST['mail_pers'] != $affiche['mail_pers']){
			$modifier = $connexion->prepare("UPDATE contact SET mail_pers = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['mail_pers'],$_GET['modif']));
			header('location:administrative.php');
	    }
	   if(isset($_POST['BP']) AND !empty($_POST['BP']) AND $_POST['BP'] != $affiche['BP']){
			$modifier = $connexion->prepare("UPDATE contact SET BP = ? WHERE idUtilisateur = ? ");
			$modifier ->execute(array($_POST['BP'],$_GET['modif']));
			header('location:administrative.php');
	    }
	}
	$code = $_GET['modif'];   
    $modificationi = $connexion->prepare('SELECT * FROM identification WHERE idUtilisateur = ? limit 1');
	$modificationi->execute(array($_GET['modif']));
	$affiche = $modificationi->fetch(PDO::FETCH_ASSOC);
    $modificationa = $connexion->prepare('SELECT * FROM adresse WHERE idUtilisateur = ? limit 1');
	$modificationa->execute(array($_GET['modif']));
	$affiche = $modificationa->fetch(PDO::FETCH_ASSOC);      
    $modifications = $connexion->prepare('SELECT * FROM situation_familiale WHERE idUtilisateur = ? limit 1');
	$modifications->execute(array($_GET['modif']));
	$affiche = $modifications->fetch(PDO::FETCH_ASSOC);      
    $modificationb = $connexion->prepare('SELECT * FROM bourse WHERE idUtilisateur = ? limit 1');
	$modificationb->execute(array($_GET['modif']));
	$affiche = $modificationb->fetch(PDO::FETCH_ASSOC);      
    $modificatione = $connexion->prepare('SELECT * FROM emploi WHERE idUtilisateur = ? limit 1');
	$modificatione->execute(array($_GET['modif']));
	$affiche = $modificatione->fetch(PDO::FETCH_ASSOC);      
    $modificationc = $connexion->prepare('SELECT * FROM contact WHERE idUtilisateur = ? limit 1');
	$modificationc->execute(array($_GET['modif']));
	$affiche = $modificationc->fetch(PDO::FETCH_ASSOC);
?> 




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Inscription Administrative</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
<div id="dlogo">
    <img src="esp.png" alt="logo" id="logo">
  </div>
  <p>Ecole Superieure Polytechnique</p>
  <h1>Inscription Administrative</h1>
  <form action='' method="post">
    <fieldset>
      <h3>Identification</h3>
      <label for="nom">Nom: <input id="nom" name="nom" type="text"   value= " <?php echo $affiche['nom']; ?>"/></label>
      <label for="prenom">Prenom: <input id="prenom" name="prenom" type="text"  value= " <?php echo $affiche['prenom']; ?>" /></label>
      <label for="civilte" >Civilite
        <select name="civilite" value= " <?php echo $affiche['Civilite']; ?>">
          <option value="">Selectionner une civilite</option>
          <option value="M">M</option>
          <option value="Mme">Mme</option>
          <option value="Mlle">Mlle</option>
        </select>
      </label>
      <label for="dateDeNaissance">Date de naissance <input id="date" type="date" name = "date"  value= " <?php echo $affiche['date']; ?>"></label>
      <label for="lieudenaissane">Lieu de naissance <input type="text" name="lieu" id="lieu"  value= " <?php echo $affiche['lieu']; ?>"></label>
      <label for="cni">CNI: <input id="cni" name="cni" type="number"  value= " <?php echo $affiche['CNI']; ?>" /></label>
      <label for="ine">INE: <input id="ine" name="ine" type="number"  value= " <?php echo $affiche['INE']; ?>" /></label>
      <label for="numeroCarte">Numero Carte: <input id="numeroCarte" name="numeroCarte" type="text"  value= "<?php echo $affiche['numeroCarte']; ?>"/></label>
      <label for="paysDeNaissance" >Pays De Naissance:
        <select name="pays" value= " <?php echo $affiche['pays']; ?>">
          <option value="">Sélectionner un pays</option>
          <!-- Récupère la liste des pays depuis l'API -->
          <?php
            $url = 'https://restcountries.com/v3.1/all';
            $data = file_get_contents($url);
            $countries = json_decode($data, true);
          
            // Boucle à travers tous les pays et crée une option pour chacun
            foreach ($countries as $country) {
                $name = $country['name']['common'];
                $code = $country['cca2'];
                echo '<option value="' . $code . '">' . $name . '</option>';
            }
            ?>
        </select>

      </label>
      <label for="nationalite">Nationalite: <input id="nationalite" name="nationalite" type="text"  value="<?php echo $affiche['nationalite'];?>"/></label>
    </fieldset>
    <fieldset>
      <h3>Adresse</h3>
      <label for="mainadress">Adresse principale <input type="text" id="mainadress" name = 'mainadress'  value="<?php echo $affiche['mainadress'];?>"/></label>
      <label for="adress">Adresse secondaire <input type="text" id="adress" name= 'adress' value="<?php echo $affiche['adress']; ?>" /></label>
      <label for="telephone">Telephone portable <input type="number" name = "telport" value="<?php echo $affiche['tel_port']; ?>"></label>
      <label for="telephone">Telephone fixe <input type="number" name = "telfix"  value="<?php echo $affiche['tel_fixe']; ?>"></label>
      <label for="emIns">Email institutionnel <input id="emIns" name="emIns" type="email"  value="<?php echo $affiche['emIns']; ?>"
          placeholder="Exemple : dijabella04@esp.sn" /></label>
      <label for="emPersonal">Email personnel <input id="emPersonal" name="emPersonal" type="email"  value="<?php echo $affiche['emPersonal']; ?>"
          placeholder="Exemple : dijabella04@gmail.com" /></label>
      <label for="boitePostale">Boite postale <input type="number" name="boitePostale" id="boitePostale" value="<?php echo $affiche['boitePostale']; ?>"></label>
    </fieldset>
    <fieldset>
      <h3>Situation familiale</h3>
      <label for="Smatrimoniale">Situation matrimoniale
        <select name="Smatrimoniale" id="" value = "<?php echo $affiche['Smatrimoniale']; ?>">
          <option value="">Selectionner</option>
          <option value="Marié">Marié</option>
          <option value="Célibaire">Célibaire</option>
          <option value="Veuf">Veuf</option>
        </select>
      </label>
      <label for="nbre_enfants">Nombre d'enfants</label>
      <input type="number" name="nbre_enf" id="nbre_enf" value = "<?php echo $affiche['nbre_enf']; ?>">
    </fieldset>
    <fieldset id="bourse">
      <h3>Bourse</h3>
      <label for="bourse"><input id="boursier" type="radio" name="bourse" value = "<?php echo $affiche['bourse']; ?>"/> Boursier</label>
      <label for="bourse"><input id="nonboursier" type="radio" name="bourse"  value="<?php echo $affiche['bourse']; ?>" /> Non Boursier</label>
      <br>
      <h2>Nature</h2>
      <label for="nature"><input type="radio" name="nature" value="Nationale" value = "<?php echo $affiche['nature']; ?>"/>Nationale </label>
      <label for="nature"><input type="radio" name="nature" value="Etrangere" value="<?php echo $affiche['nature']; ?>"/>Etrangere </label>
      <label for="nature"><input type="radio" name="nature" value="De l'etablissement" value = "<?php echo $affiche['nature']; ?>"/> De l'etablissement</label>
      <br>
      <label for="montant"><input type="number" name="montant" id="montant"> Montant value="<?php echo $affiche['montant']; ?>"</label>
    </fieldset>
    <fieldset id="emploi">
      <h3>Emploi</h3>
      <label for="salar"><input id="salar" type="radio" name="salar" value="<?php echo $affiche['salar']; ?>"/> OUI </label>
      <label for="salar"><input id="salar" type="radio" name="salar" value = " <?php echo $affiche['salar']; ?>"/> NON </label>
    </fieldset>
    <fieldset>
      <h3>Contact (Persone à contacter/Responsable)</h3>
      <label for="nom">Nom: <input id="nom" name="nompers" type="text"  value = "<?php echo $affiche['nom']; ?>" /></label>
      <label for="prenom">Prenom: <input id="prenom" name="prenompers" type="text"  value ="<?php echo $affiche['prenom']; ?>" /></label>
      <label for="resAdress">Adresse: <input type="text" id="resAdress" name = "resAdress"   value ="<?php echo $affiche['adresse']; ?>" /></label>
      <label for="ville">Ville: <input type="text" name="resville" id="resville"  value="<?php echo $affiche['ville']; ?>"></label>
      <label for="resTelephone">Telephone portable <input type="number" name = "resTel"  value =  "<?php echo $affiche['tel_port']; ?>"></label>
      <label for="resfixe">Telephone fixe <input type="number" name = "resFix" value ="<?php echo $affiche['tel_fixe']; ?>"></label>
      <label for="resMail">Email personnel <input id="resMail" name="resMail" type="text"   value="<?php echo $affiche['mail_pers']; ?>"
          placeholder="Exemple : dijabella04@gmail.com" /></label>
      <label for="resBP">Boite postale <input type="number" name="resBP" id="resBP" value="<?php echo $affiche['BP']; ?>"></label>
    </fieldset>
    </form>
</body>
</html>