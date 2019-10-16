<body>
    <html lang="fr">
        <form action="Connexion.php" method="post" onsubmit="return(validercon())" name="myformcon">
            <div>
                <label for="idcon">Identifiant :</label>
                <input type="text" id="idcon" name="idcon">
            </div>
            <div>
                <label for="mdpcon">Mot de passe :</label>
                <input type="password" id="mdpcon" name="mdpcon">
            </div>
            <div class="button">
                <button type="submit" value="add">Se connecter </button>
            </div>
        </form>

        <script type="text/javascript" src="envoyer.js"></script>
    </html>
</body>



<?php

try{

    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=alltech','root','');
    
    
    if (isset($_POST['idcon']) AND !empty($_POST['idcon']) AND
    isset($_POST['mdpcon']) AND !empty($_POST['mdpcon']))

    {
        $nomconnect=$_POST['idcon'];
    $passwordsconnect=$_POST['mdpcon'];

    $req = "SELECT mdp FROM compte WHERE identifiant='$nomconnect'";
    $reponse= $bdd->query($req);
    $donnees = $reponse->fetch();
    
    
    
    if ($donnees['mdp'] == $passwordsconnect) 
	{ 
    
        echo'vous etes connecte' ; echo$nomconnect;
        session_start();
                $_SESSION['nom'] = $nomconnect;
                header("Location: index.php");
                
    }


    else {
        echo "<p>Mauvais identifiant ou mot de passe.</p>";
    }
    }
}

    catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }


?>
