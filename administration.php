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
    //!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['civilite']) && !empty($_POST['date']) && !empty($_POST['lieu']) && !empty($_POST['cni']) && !empty($_POST['ine']) && !empty($_POST['pays']) && !empty($_POST['numeroCarte']) && !empty($_POST['nationalite']) && !empty($_POST['mainadress']) && !empty($_POST['adress']) && !empty($_POST['telport']) && !empty($_POST['telfix']) && !empty($_POST['emIns']) && !empty($_POST['emPersonal']) && !empty($_POST['Smatrimoniale']) && !empty($_POST['nbre_enf']) && !empty($_POST['nompers']) && !empty($_POST['prenompers']) && !empty($_POST['resAdress']) && !empty($_POST['resville'])&& !empty($_POST['resTel']) && !empty($_POST['resFix']) && !empty($_POST['resMail'])
    if (isset($_POST['valider'])) {
      if(true){
        $ident = $connexion->prepare("INSERT INTO identification(idUtilisateur, Nom, Prenom, Civilite, Date_de_naissance, Lieu_de_naissance, CNI, INE, Numero_de_carte, Pays_de_naissance, Nationalite) VALUES($id,:nom, :prenom, :civilite, :date, :lieu, :cni, :ine, :numeroCarte, :pays, :nationalite)");
        $ident->execute(array(':nom' => $_POST['nom'],':prenom' => $_POST['prenom'], ':civilite' => $_POST['civilite'], ':date' => $_POST['date'],':lieu' => $_POST['lieu'], ':cni' => $_POST['cni'], ':ine' => $_POST['ine'], ':numeroCarte' => $_POST['numeroCarte'], ':pays' => $_POST['pays'], ':nationalite' => $_POST['nationalite']));
        $addr = $connexion->prepare("INSERT INTO adresse(idUtilisateur, adresse_principale, adresse_secondaire, mail_pers, mail_ins, tel_fixe, tel_port, BP ) VALUES($id,:mainadress, :adress, :emPersonal,:emIns,:telfix, :telport, :boitePostale)");
        $addr->execute(array(':mainadress' => $_POST['mainadress'], ':adress' => $_POST['adress'], ':emPersonal' => $_POST['emPersonal'],':emIns' => $_POST['emIns'], ':telfix' => $_POST['telfix'], ':telport' => $_POST['telport'],':boitePostale' => $_POST['boitePostale']));
        $sit = $connexion->prepare("INSERT INTO situation_familiale(idUtilisateur, situation_matrimoniale, nbre_enfant) VALUES($id,:Smatrimoniale,:nbre_enf)");
        $sit->execute(array(':Smatrimoniale' => $_POST['Smatrimoniale'],':nbre_enf' => $_POST['nbre_enf']));
        $bour = $connexion->prepare("INSERT INTO bourse(idUtilisateur, nature, montant, bourse) VALUES($id, :nature, :montant, :bourse)");
        $bour->execute(array(':nature' => $_POST['nature'],':montant' => $_POST['montant'], ':bourse' => $_POST['bourse']));
        $em = $connexion->prepare("INSERT INTO emploi(idUtilisateur, activ_sal) VALUES($id, :salar)");
        $em->execute(array(':salar' => $_POST['salar']));
        $con = $connexion->prepare("INSERT INTO contact(idUtilisateur, nom, prenom, adresse, ville, tel_port, tel_fixe, mail_pers, BP) VALUES($id,:nompers, :prenompers, :resAdress, :resville, :resTel, :resFix, :resMail, :resBP)");
        $con->execute(array(':nompers' => $_POST['nompers'],':prenompers' => $_POST['prenompers'], ':resAdress' => $_POST['resAdress'], ':resville' => $_POST['resville'],':resTel' => $_POST['resTel'], ':resFix' => $_POST['resFix'], ':resMail' => $_POST['resMail'],':resBP' => $_POST['resBP']));
        $formated_YEAR = 2022;
        $veri = "OUI";
        $adm= $connexion->prepare("INSERT INTO inscription_adm(idUtilisateur, annee_inscription, etat_inscription) VALUES($id,:annee, :etat)");
        $adm->execute(array(':annee' => $formated_YEAR, ':etat' => $veri));
        header("location: pedagogie.html");
      }
    if (isset($_POST['Annuler'])) {
      header("location:connexion.html");
    }
    }
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
      <label for="nom">Nom: <input id="nom" name="nom" type="text" required /></label>
      <label for="prenom">Prenom: <input id="prenom" name="prenom" type="text" required /></label>
      <label for="civilte" required>Civilite
        <select name="civilite">
          <option value="">Selectionner une civilite</option>
          <option value="M">M</option>
          <option value="Mme">Mme</option>
          <option value="Mlle">Mlle</option>
        </select>
      </label>
      <label for="dateDeNaissance">Date de naissance <input id="date" type="date" name = "date" required></label>
      <label for="lieudenaissane">Lieu de naissance <input type="text" name="lieu" id="lieu" required></label>
      <label for="cni">CNI: <input id="cni" name="cni" type="number" required /></label>
      <label for="ine">INE: <input id="ine" name="ine" type="number" required /></label>
      <label for="numeroCarte">Numero Carte: <input id="numeroCarte" name="numeroCarte" type="text" required /></label>
      <label for="paysDeNaissance" required>Pays De Naissance:
        <select name="pays">
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
      <label for="nationalite">Nationalite: <input id="nationalite" name="nationalite" type="text" required /></label>
    </fieldset>
    <fieldset>
      <h3>Adresse</h3>
      <label for="mainadress">Adresse principale <input type="text" id="mainadress" name = 'mainadress' required /></label>
      <label for="adress">Adresse secondaire <input type="text" id="adress" name= 'adress'/></label>
      <label for="telephone">Telephone portable <input type="number" name = "telport"required></label>
      <label for="telephone">Telephone fixe <input type="number" name = "telfix" required></label>
      <label for="emIns">Email institutionnel <input id="emIns" name="emIns" type="email" required
          placeholder="Exemple : dijabella04@esp.sn" /></label>
      <label for="emPersonal">Email personnel <input id="emPersonal" name="emPersonal" type="email" required
          placeholder="Exemple : dijabella04@gmail.com" /></label>
      <label for="boitePostale">Boite postale <input type="number" name="boitePostale" id="boitePostale"></label>
    </fieldset>
    <fieldset>
      <h3>Situation familiale</h3>
      <label for="Smatrimoniale">Situation matrimoniale
        <select name="Smatrimoniale" id="">
          <option value="">Selectionner</option>
          <option value="Marié">Marié</option>
          <option value="Célibaire">Célibaire</option>
          <option value="Veuf">Veuf</option>
        </select>
      </label>
      <label for="nbre_enfants">Nombre d'enfants</label>
      <input type="number" name="nbre_enf" id="nbre_enf">
    </fieldset>
    <fieldset id="bourse">
      <h3>Bourse</h3>
      <label for="bourse"><input id="boursier" type="radio" name="bourse"  value="boursier" /> Boursier</label>
      <label for="bourse"><input id="nonboursier" type="radio" name="bourse" value="Non boursier"  /> Non Boursier</label>
      <br>
      <h2>Nature</h2>
      <label for="nature"><input type="radio" name="nature" value="Nationale"/>Nationale </label>
      <label for="nature"><input type="radio" name="nature" value="Etrangere"/>Etrangere </label>
      <label for="nature"><input type="radio" name="nature" value="De l'etablissement"/> De l'etablissement</label>
      <br>
      <label for="montant"><input type="number" name="montant" id="montant"> Montant</label>
    </fieldset>
    <fieldset id="emploi">
      <h3>Emploi</h3>
      <label for="salar"><input id="salar" type="radio" name="salar" value="OUI"/> OUI </label>
      <label for="salar"><input id="salar" type="radio" name="salar" value="NON"/> NON </label>
    </fieldset>
    <fieldset>
      <h3>Contact (Persone à contacter/Responsable)</h3>
      <label for="nom">Nom: <input id="nom" name="nompers" type="text" required /></label>
      <label for="prenom">Prenom: <input id="prenom" name="prenompers" type="text" required /></label>
      <label for="resAdress">Adresse: <input type="text" id="resAdress" name = "resAdress" required /></label>
      <label for="ville">Ville: <input type="text" name="resville" id="resville" required></label>
      <label for="resTelephone">Telephone portable <input type="number" name = "resTel" required></label>
      <label for="resfixe">Telephone fixe <input type="number" name = "resFix"required></label>
      <label for="resMail">Email personnel <input id="resMail" name="resMail" type="text" required
          placeholder="Exemple : dijabella04@gmail.com" /></label>
      <label for="resBP">Boite postale <input type="number" name="resBP" id="resBP"></label>
    </fieldset>
    <fieldset>
    <input type="submit" value="valider" name = "valider" />
    </fieldset>
    </form>
    <button><a href="connexion.html">ANNULER</a></button>
</body>
</html>