<html>
    <?php require_once('./pdo.php'); ?>
    <?php
    //Inscription
    if(isset($_POST['inscrire'])){
        try {
            $sql = "INSERT INTO personnel (`nom_personnel`, `prenom_personnel`, `e-mail_personnel`, `password`, `tel_personnel`)
            VALUES (:nom, :prenom, :email, :mdp, :tel)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                'nom'=> $_POST['nom'],
                'prenom'=> $_POST['prenom'],
                'mdp'=> $_POST['password'],
                'email'=> $_POST['email'],
                'tel'=> $_POST['tel'],
            ));
            header('Location: http://localhost/g_sport_zone/index.php');
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
                        <p class="text-xl text-gray-600 text-center"><strong>Bienvenue</strong> ! Inscrivez vous pour recevoir les notifications <br> <a href="" class="gray-700" style="font-style:italic; color:blue; font-size:0.9em;">Ou passez incognito</a></p>
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
                            <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                            <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="email" required name="email"/>
                        </div>
                        <div class="mt-4">
                            <div class="flex justify-between">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Mot de passe</label>
                            </div>
                            <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" required type="password" name="password"/>
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