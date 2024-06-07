<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    try {
      $pdo = new PDO("mysql:host=$servername;dbname=madb", $username, $password);
      // set the PDO error mode to exception
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //   echo "Connected successfully";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }

    //Inscription
    if(isset($_POST['participer'])){
        try {
            $sql = "INSERT INTO participant (`noms`,`organisateur`, `nom_utilisateur`, `prenom_utilisateur`, `matricule`, `niveau`, `email`, `tel`, `filiere`)
            VALUES (:organisateur,:noms,:nom, :prenom, :matricule, :niveau, :email, :tel, :filiere)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                'organisateur'=> $_POST['organisateur'],
                'noms'=> $_POST['noms'],
                'nom'=> $_POST['nom'],
                'prenom'=> $_POST['prenom'],
                'matricule'=> $_POST['matricule'],
                'niveau'=> $_POST['niveau'],
                'email'=> $_POST['email'],
                'tel'=> $_POST['tel'],
                'filiere' => $_POST['filiere'],
            ));
            header('Location: http://localhost/g_sport_zone/acceuil.php');
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
    ?>