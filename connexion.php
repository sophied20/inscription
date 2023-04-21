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
    if (!empty($_REQUEST['login']) && !empty($_REQUEST['password'])) {
        $q = $connexion->prepare("SELECT * FROM utilisateur WHERE login = ? AND password = ? limit 1");
        $q->execute(array($_REQUEST['login'],$_REQUEST['password']));
        $userexist = $q->rowCount();
        if($userexist > 0) {
			session_start();
			$_SESSION['id'] = $q->fetch()['idUtilisateur'];
            header('location:welcom.html');
        }else {
            $erreur = "<span class='red'>Mauvais email ou mot de passe !</span>";
        }
    }
?>