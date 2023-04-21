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
    if (isset($_REQUEST["inscrire"])) {
        if (!empty($_REQUEST['login']) && !empty($_REQUEST['new-password']) && !empty($_REQUEST['password'])) {
            if(filter_var($_REQUEST['login'], FILTER_VALIDATE_EMAIL)) {
               $reqmail = $connexion->prepare("SELECT * FROM utilisateur WHERE login = ? limit 1");
               $reqmail->execute(array($_REQUEST['login']));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
                    if ($_REQUEST['new-password']==$_REQUEST['password']) {
                            $q = $connexion->prepare("INSERT INTO utilisateur(login, password, password2) VALUES(:login,:password,:password2)");
                            $q->execute(array(':login' => $_REQUEST['login'],':password' => $_REQUEST['new-password'], ':password2' => $_REQUEST['password']));
                    } else {
                            echo "<span class='red'>Vos mots de passes ne correspondent pas !</span>";
                            exit();
                    }
                } else {
                   $erreur = "<span class='red'>Adresse e-mail déjà utilisée !</span>";
                   echo $erreur;
                   exit();
                }
            }else {
                $erreur = "<span class='red'>Oups votre adresse mail n'est pas valide !</span>";
                exit();
            }    
            header("location:administration.php");
        }
    }
?>