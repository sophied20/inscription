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
    $peda = $connexion->query("SELECT * FROM inscription_peda");
    $peda->execute();
    $result = $peda->fetchAll(PDO::FETCH_ASSOC);
    if (!$result) {
        echo "un probleme empeche la recuperation des donnees.";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Donnees inscription pedagogique</title>
</head>
<body>
<h2>Donnees Pedagogiques</h2>
    <table>
        <thead>
            <tr>
                <th>Departement</th>
                <th>Cycle</th>
                <th>Niveau</th>
                <th>Filiere</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($result as $valeur);
            ?>
            <tr>
                <td><?php echo $valeur['departement']; ?></td>
                <td><?php echo $valeur['cycle']; ?></td>
                <td><?php echo $valeur['niveau']; ?></td>
                <td><?php echo $valeur['filiere']; ?></td>
            </tr>
        </tbody>
    </table>
    <a href="modification_peda.php?modif=<?= $valeur['idUtilisateur']?>">voulez-vous modifier une donnee?</a>
</body>
</html>