<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GsportZone</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
</head>
<body class="bg-gray-100">
  <div class="flex h-screen">
    <!-- Barre de navigation verticale -->
    <div class="bg-gray-800 text-white p-4 flex flex-col justify-between">
      <div>
        <h2 class="text-xl font-bold mb-4"> <i class="mobile-nav-toggle mobile-nav-show bi bi-list" style=" width: 50px;margin-top: 20px; margin-left: 20px;">Tableau de Bord</i></h2>
        <br style="border-bottom: 1.5px solid #fff;">
        <ul class="space-y-2"style="border-bottom: 1.5px solid #ccf;">
          <br>
          <li><a href="new_event.php" class="hover:bg-gray-70 rounded-md px-2 py-1 block">Nouveau</a></li>
          <li><a href="ajoutparticipant.php" class="hover:bg-gray-700 rounded-md px-2 py-1 block"></a></li>
          <li><a href="ajoutimage.php" class="hover:bg-gray-700 rounded-md px-2 py-1 block">liste evennements</a></li>
          <li><a href="listeparticipant.php" class="hover:bg-gray-700 rounded-md px-2 py-1 block">liste des participant</a></li>
          <li><a href="#" class="hover:bg-gray-700 rounded-md px-2 py-1 block">commentaire</a></li>
        </ul>
      </div>
      <div>
        <a href="#" class="hover:bg-gray-700 rounded-md px-2 py-1 block">Déconnexion</a>
      </div>
    </div>

    <!-- Contenu principal -->
    <div class="flex-1 p-6">
      <!-- Barre de navigation horizontale -->
      <div class="bg-white shadow-md rounded-md px-4 py-2 mb-6 flex justify-between items-center">
      <div class="logo" style="display: flex;">
            <a href="index.php"><img src="logo.png" alt="" style="width: 50px; higth:70px"><h1 class="md:font-bold" style="font-size: 2em;" ><span class="sport">Sport</span><span class="zone">Zone</span></h1></a>
        </div>
        <div>
          <a href="#" class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-md">Organisateurs</a>
        </div>
      </div>
  
  
  