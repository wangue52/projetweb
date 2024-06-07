<html>
    <?php require_once('./pdo.php'); ?>
    <?php
    //Liste des filieres
    $filieres = $pdo->query("SELECT * FROM filiere");

    //Inscription
    if(isset($_POST['inscrire'])){
        try {
            $sql = "INSERT INTO utilisateur (`nom_utilisateur`, `prenom_utilisateur`, `matricule`, `password`, `niveau`, `e-mail`, `tel`, `id_filiere`)
            VALUES (:nom, :prenom, :matricule, :mdp, :niveau, :email, :tel, :filiere)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                'nom'=> $_POST['nom'],
                'prenom'=> $_POST['prenom'],
                'matricule'=> $_POST['matricule'],
                'mdp'=> $_POST['password'],
                'niveau'=> $_POST['niveau'],
                'email'=> $_POST['email'],
                'tel'=> $_POST['tel'],
                'filiere' => $_POST['filiere'],
            ));
            header('Location: http://localhost/g_sport_zone/user/index.php');
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
    ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>S'inscrire</title>
        <link href="assets/css/tailwind.css" rel="stylesheet">
    </head>
    <body class="content-center" style="background: black;">
        <div>
            <div class="flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl" style="width: 45%;">
                <div class="w-full p-8 " >
                    <form action="traitement/login_control.php" method="POST">
                        <h2 class="text-2xl font-semibold text-gray-700 text-center">
                            <div class="logo" style="display: flex; margin-left:20%;">
                                <img src="logo.png" alt="" style="width: 50px; higth:70px"><h1 class="md:font-bold" style="font-size: 2em;" ><span class="sport">Sport</span><span class="zone">Zone</span></h1>
                            </div>      
                        </h2>
                        <br>
                        <p class="text-xl text-gray-600 text-center"><strong>Bienvenue</strong> ! inscrivez vous pour recevoir les notifications <br> <a href="" class="gray-700" style="font-style:italic; color:blue; font-size:0.9em;">Ou passez incognito</a></p>
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Matricule</label>
                            <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="text" required name="matricule"/>
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
                            <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="text" required name="nom"/>
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Prenom</label>
                            <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="text" name="prenom"/>
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Telephone</label>
                            <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="number" required name="tel"/>
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Filiere</label>
                            <div class="relative">
                                <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" required name="filiere">
                                    <option value="" selected disabled hidden>Selectionnez une filiere !</option>
                                    <?php
                                        while($filiere = $filieres->fetch(PDO::FETCH_ASSOC)){
                                            echo '<option value="'.$filiere['id_filiere'].'">'.$filiere['nom_filiere'].'</option>';
                                        }
                                    ?>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>
                        </div><div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Niveau</label>
                            <div class="relative">
                                <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" required name="niveau">
                                    <option value="" selected hidden disabled>Selectionnez un niveau !</option>
                                    <option value="Licence 1">Licence 1</option>
                                    <option value="Licence 2">Licence 2</option>
                                    <option value="Licence 3">Licence 3</option>
                                    <option value="Master 1">Master 1</option>
                                    <option value="Master 2">Master 2</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                            <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="email" required name="email"/>
                        </div>
                        <div class="mt-4">
                            <div class="flex justify-between">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Mot de passe</label>
                            </div>
                            <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="password" required name="password"/>
                        </div>
                        <div class="mt-8">
                            <input type="submit" name="inscrire" class="bg-gray-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600" placeholdere="S'inscrire">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>