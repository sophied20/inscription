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
    $ident = $connexion->query("SELECT * FROM identification");
    $ident->execute();
    $result1 = $ident->fetchAll(PDO::FETCH_ASSOC);
    $addr = $connexion->query("SELECT * FROM adresse");
    $addr->execute();
    $result2 = $addr->fetchAll(PDO::FETCH_ASSOC);
    $sit = $connexion->query("SELECT * FROM situation_familiale");
    $sit->execute();
    $result3 = $sit->fetchAll(PDO::FETCH_ASSOC);
    $bour = $connexion->query("SELECT * FROM bourse");
    $bour->execute();
    $result4 = $bour->fetchAll(PDO::FETCH_ASSOC);
    $em = $connexion->query("SELECT * FROM emploi");
    $em->execute();
    $result5 = $em->fetchAll(PDO::FETCH_ASSOC);
    $con = $connexion->query("SELECT * FROM contact");
    $con->execute();
    $result6 = $con->fetchAll(PDO::FETCH_ASSOC);
    if (!$result1 || !$result2 || !$result3 || !$result4 || !$result5 || !$result6) {
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
    <title>Donnees Inscriptions Administratives</title>
</head>
<body>
    <h2>Identification</h2>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Civilite</th>
                <th>Date de naissance</th>
                <th>Lieu de naissance</th>
                <th>CNI</th>
                <th>INE</th>
                <th>Numero de Carte</th>
                <th>Pays de naissance</th>
                <th>Nationalite</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($result1 as $valeur);
            ?>
            <tr>
                <td><?php echo $valeur['Nom']; ?></td>
                <td><?php echo $valeur['Prenom']; ?></td>
                <td><?php echo $valeur['Civilite']; ?></td>
                <td><?php echo $valeur['Date_de_naissance']; ?></td>
                <td><?php echo $valeur['Lieu_de_naissance']; ?></td>
                <td><?php echo $valeur['CNI']; ?></td>
                <td><?php echo $valeur['INE']; ?></td>
                <td><?php echo $valeur['Numero_de_carte']; ?></td>
                <td><?php echo $valeur['Pays_de_naissance']; ?></td>
                <td><?php echo $valeur['Nationalite']; ?></td>
            </tr>
        </tbody>
    </table>

    <h2>Adresse</h2>
    <table>
        <thead>
            <tr>
                <th>Adresse Principale</th>
                <th>Adresse Secondaire</th>
                <th>Mail personnel</th>
                <th>Mail institutionnel</th>
                <th>Telephone fixe</th>
                <th>Telephone Portable</th>
                <th>Boite Postale</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($result2 as $valeur1);
            ?>
            <tr>
                <td><?php echo $valeur1['adresse_principale']; ?></td>
                <td><?php echo $valeur1['adresse_secondaire']; ?></td>
                <td><?php echo $valeur1['mail_pers']; ?></td>
                <td><?php echo $valeur1['mail_ins']; ?></td>
                <td><?php echo $valeur1['tel_fixe']; ?></td>
                <td><?php echo $valeur1['tel_port']; ?></td>
                <td><?php echo $valeur1['BP']; ?></td>
            </tr>
        </tbody>
    </table>

    <h2>Situation familiale</h2>
    <table>
        <thead>
            <tr>
                <th>Situation matrimoniale</th>
                <th>Nombre d'enfants</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($result3 as $valeur2);
            ?>
            <tr>
                <td><?php echo $valeur2['situation_matrimoniale']; ?></td>
                <td><?php echo $valeur2['nbre_enfant']; ?></td>
            </tr>
        </tbody>
    </table>

    <h2>Bourse</h2>
    <table>
        <thead>
            <tr>
                <th>bourse</th>
                <th>nature</th>
                <th>montant</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($result4 as $valeur3);
            ?>
            <tr>
                <td><?php echo $valeur3['bourse']; ?></td>
                <td><?php echo $valeur3['nature']; ?></td>
                <td><?php echo $valeur3['montant']; ?></td>
            </tr>
        </tbody>
    </table>

    <h2>Emploie</h2>
    <table>
        <thead>
            <tr>
                <th>activite salarie</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($result5 as $valeur4);
            ?>
            <tr>
                <td><?php echo $valeur4['activ_sal']; ?></td>
            </tr>
        </tbody>
    </table>
       
    <h2>Personne a contacter</h2>
    <table>
        <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th>Telephone fixe</th>
                    <th>Telephone Portable</th>
                    <th>Mail personnel</th>
                    <th>Boite Postale</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($result6 as $valeur5);
                ?>
                <tr>
                    <td><?php echo $valeur5['nom']; ?></td>
                    <td><?php echo $valeur5['prenom']; ?></td>
                    <td><?php echo $valeur5['adresse']; ?></td>
                    <td><?php echo $valeur5['ville']; ?></td>
                    <td><?php echo $valeur5['tel_port']; ?></td>
                    <td><?php echo $valeur5['tel_fixe']; ?></td>
                    <td><?php echo $valeur5['mail_pers']; ?></td>
                    <td><?php echo $valeur5['BP']; ?></td>
                </tr>
            </tbody>
    </table>
    <a href="pedagogique.php"><h2>Consulter les donnees pedagogiques</h2></a>
    <a href="modification_adm.php?modif=<?= $valeur['idUtilisateur']?>">voulez-vous modifier une donnee?</a>
</body>
</html>