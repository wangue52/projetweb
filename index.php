<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "madb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};
$filieres = "SELECT * FROM filiere " ;
$resultat = $conn->query($filieres);
$sql = "SELECT * FROM evenement";
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- SOURCES CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link rel="stylesheet" href="main_style.css">
</head>
<body>
    <header>
      <nav class="container d-flex" style=" justify-content: space-between; padding: 20px; ">
      <h6 class="text-2xl font-semibold text-gray-700 text-center">
          <div class="logo" style="display: flex; margin-left:20%;">
            <img src="logo.png" alt="" style="width: 50px; higth:70px"><h1 class="md:font-bold" style="font-size: 2em;" ><span class="sport">Sport</span><span class="zone">Zone</span></h1>
          </div>      
      </h6>
                        
        <div class=" align-items-start">
            <div class="nav  nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <button class="nav-link cyan-800 active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="bi bi-house"></i>  Actualites</button>
              <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="bi bi-chat-dots"></i> Forums</button>
              <a style="text-decoration: none;" href="connexion_admin.php"><button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="bi bi-person"></i> Admin</button></a>
              <a style="text-decoration: none;" href="connexion_admin.php"><button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="bi bi-pen"></i> Organisateur</button></a>
              <!--<i class="mobile-nav-toggle mobile-nav-show bi bi-list" style=" width: 50px;margin-top: 20px; margin-left: 20px;"></i>-->
            </div>
        </div>
          
    </nav>
        
    </header>
    <div class="main">
      <div class="tab-content" id="v-pills-tabContent">
        <!--section home-->
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
          <nav style="width: 50%; margin-left: 20%; display: flex; justify-content: space-between;">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true" style="font-size: 0.9em;">Actualites</button>
              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" style="font-size: 0.9em;">Categories</button>
              <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false" style="font-size: 0.9em;">Date</button>
              <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false" style="font-size: 0.9em;"></button>
    
            </div>
            
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            
          </nav>

          <div class="tab-content" id="nav-tabContent">
            <!-- Actualites et toutes categories-->
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
              <!-- Caroussel-->
              <div class="contener" style="height: 90vh;">
                <div id="carouselExampleCaptions" class="carousel slide" style=" padding-left: 5%; padding-right: 5%; padding-top: 30px; border:1px solir #000111">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4" class=""></button>
                    </div>
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-indicators">
                        <?php
                          $sql = "SELECT * FROM evenement";
                          $result = $conn->query($sql);
                          $num_rows = $result->num_rows;
                          for ($i = 0; $i < $num_rows; $i++) {
                            echo '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="'. $i.'" class="'. ($i == 0? 'active' : ''). '" aria-current="true" aria-label="Slide '. ($i + 1).'"></button>';
                          }
                      ?>
                      </div>

                      <!-- Carousel content -->
                      <div class="carousel-inner">
                        <?php
                          $result = $conn->query($sql);
                          $i = 0;
                          while($row = $result->fetch_assoc()) {
                            echo '
                              <div  style="height: 75vh;" class="carousel-item '. ($i == 0? 'active' : ''). '">
                                <img  style="height: 75vh;" src="'. $row["images_evenements"]. '" class="d-block w-100 img-fluid" alt="..." style="max-width: 1270px; height: 300px; object-fit: cover;">
                                <div class="carousel-caption d-none d-md-block" style=" background-color:#00000036">
                                  <h5>'. $row["nom_evenement"]. '</h5>
                                  <p>'. $row["description"]. '</p>
                                  <div class"d-flex">
                                    <p style=" text-decoration:none; font-size:0.9em; background-color: blue; border-radius: 5px; color:#fff;" class="btn btn-link bg-green"> <i class="bi bi-geo-alt"></i> Lieu: '. $row["lieu"]. '</p>
                                    <p style=" text-decoration:none; font-size:0.9em; background-color: green; border-radius: 5px; color:#fff;" class="btn btn-link br-red">Date: '. $row["date_evenement"]. '</p>
                                  </div>
                                </div>
                              </div>
                            ';
                            $i++;
                          }
                      ?>
                      </div>
                    
                      <div class="scrollable-container">
    <div class="container">
        <h2>Tous les Evennements</h2>
        <div class="container-fluid d-flex">
            <div class="">
                <?php
                // Query the database to retrieve the event data
                $sql = "SELECT * FROM evenement";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        // Create a card for each event
                        echo '
                              <div class="tab-pane fade show active d-flex" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                <div class="" style="overflow-x: ;">
                                  <div class="contener text-center d-flex">
                                    <div class="card d-flex" style="width: 18rem;">
                                      <div class="">
                                              <img src="'. $row["images_evenements"]. '" class="card-img-top" style="max-width: auto; height: 10vh; object-fit: cover;" alt="...">
                                              <div class="card-body">
                                                  <h5 class="card-title">'. $row["nom_evenement"]. '</h5>
                                                  <p class="card-text">'. $row["description"]. '</p>
                                                  <div class="d-flex">
                                                    <p class="card-text">Lieu: '. $row["lieu"]. '</p>
                                                    <p class="card-text">Date: '. $row["date_evenement"]. '</p>
                                                  </div>
                                                  <div class="card-actions">
                                                      <a href="event_details.php?id='. $row["id_evenement"]. '" class="btn btn-primary">Details</a>
                                                      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#registerModal-'. $row["id_evenement"]. '">participer</button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <!-- Register Modal -->
                            <div class="modal fade" id="registerModal-'. $row["id_evenement"]. '" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="registerModalLabel">s\'inscrit pour '. $row["nom_evenement"]. '</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <!-- Register form goes here -->
                                    <form  action="participant.php" method="post">
                                    <h2 class="text-2xl font-semibold text-gray-700 text-center">Brand</h2>
                                    <p class="text-xl text-gray-600 text-center">Bienvenue !</p>
                                    <div class="mt-4">
                                
                                    <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" hidden type="text" value='. $row["organisateur"]. ' required name="organisateur"/>
                                </div>
                                    <div class="mt-4">
                                       
                                        <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" hidden type="text" value='. $row["nom_evenement"]. ' required name="noms"/>
                                    </div>
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
                                    <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="text" required name="filiere"/>

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
                                            
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                                        <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="email" required name="email"/>
                                    </div>
                                      <button type="submit" name="participer" class="btn btn-primary">participer</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                        ';
                    }
                } else {
                    echo '<p>No events found.</p>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
            </div>

                <!--conection admin-->
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
              
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">...</div>
            <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">...</div>
          </div>
        </div>


        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0"></div>
        <div class="tab-pane fade" id="v-pills-disabled" role="tabpanel" aria-labelledby="v-pills-disabled-tab" tabindex="0">
          
        </div>
        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">...</div>
        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">...</div>
      </div>
    </div>

    </div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/typed.js/typed.umd.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
</body>
</html>