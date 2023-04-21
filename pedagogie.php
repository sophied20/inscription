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
      if(true){
        $formated_YEAR = 2022;
        $veri = "OUI";
        $adm= $connexion->prepare("INSERT INTO inscription_peda(idUtilisateur, annee_inscription, cycle, niveau, departement, filiere, etat_inscription) VALUES($id, :annee, :cycle, :niveau, :departement, :filiere, :etat)");
        $adm->execute(array(':annee' => $formated_YEAR, ':cycle' => $_POST['cycle'], ':niveau' => $_POST['niveau'], ':departement' => $_POST['departement'], ':filiere' => $_POST['filiere'], ':etat' => $veri));
        header("location: connexion.html");
      }
    }
?>