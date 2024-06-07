
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
    <title>Social Media Layout</title>
    <link href="assets/css/tailwind.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 1140px;
        }
        .header {
            background-color: #3498db;
            color: white;
            padding: 20px;
        }
        .header h1 {
            margin: 0;
        }
        .header a {
            color: white;
            text-decoration: none;
        }
        .header a:hover {
            color: #ddd;
        }
        .content {
            padding: 20px;
        }
        .content h2 {
            margin-top: 0;
        }
        .content p {
            margin-top: 10px;
        }
        .footer {
            background-color: #3498db;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .footer p {
            margin-top: 0;
        }
        .scrollable-container {
    height: 350px; /* Adjust this value to control the height of the scrollable container */
    overflow-y: scroll; /* This style makes the container scrollable vertically */
    overflow-x: hidden; /* This style prevents horizontal scrolling */
}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-primary text-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler bg-gray-800" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#" style="baground-color: charcoal;">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<div class="row">
<div class="col-md-12">
<div class="container-fluid">
 <!-- Create a carousel to display the events -->
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
          <div class="carousel-item '. ($i == 0? 'active' : ''). '">
            <img src="'. $row["images_evenements"]. '" class="d-block w-100" alt="..." style="max-width: 1270px; height: 300px; object-fit: cover;">
            <div class="carousel-caption d-none d-md-block">
              <h5>'. $row["nom_evenement"]. '</h5>
              <p>'. $row["description"]. '</p>
              <p>Lieu: '. $row["lieu"]. '</p>
              <p>Date: '. $row["date_evenement"]. '</p>
            </div>
          </div>
        ';
        $i++;
      }
   ?>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="scrollable-container">
    <div class="container">
        <h2>liste des evenements</h2>
        <div class="container-fluid">
            <div class="row">
                <?php
                // Query the database to retrieve the event data
                $sql = "SELECT * FROM evenement";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        // Create a card for each event
                        echo '
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="'. $row["images_evenements"]. '" class="card-img-top" style="max-width: 500px; height: 300px; object-fit: cover;" alt="...">
                                    <div class="card-body bg-primary text-white" >
                                        <h5 class="card-title">'. $row["nom_evenement"]. '</h5>
                                        <p class="card-text">'. $row["description"]. '</p>
                                        <p class="card-text">Lieu: '. $row["lieu"]. '</p>
                                        <p class="card-text">Date: '. $row["date_evenement"]. '</p>
                                        <div class="card-actions">
                                            <a href="event_details.php?id='. $row["id_evenement"]. '" class="btn btn-primary">Details</a>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#registerModal-'. $row["id_evenement"]. '">participer</button>
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
    <div class="container">
    <form>
    <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter your name">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Enter your email">
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="message">Message</label>
    <textarea class="form-control" id="message" placeholder="Enter your message"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Send</button>
</form>
    </div>
  
<!-- About Us Page -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>A propose de nous</h1>
      <p>Bienvenue.</p>
    </div>
  </div>

  <!-- Team Members -->
  <div class="row">
    <div class="col-md-4">
      <div class="team-member">
        <img src="image1.jpg" alt="Team Member 1">
        <h2>John Doe</h2>
        <p>Founder & CEO</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla auctor, vestibulum magna sed, convallis ex.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="team-member">
        <img src="image2.jpg" alt="Team Member 2">
        <h2>Jane Doe</h2>
        <p>Co-Founder & CTO</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla auctor, vestibulum magna sed, convallis ex.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="team-member">
        <img src="image3.jpg" alt="Team Member 3">
        <h2>Bob Smith</h2>
        <p>Marketing Manager</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla auctor, vestibulum magna sed, convallis ex.</p>
      </div>
    </div>
  </div>

  <!-- Our Mission -->
  <div class="row">
    <div class="col-md-12">
      <h2>Our Mission</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla auctor, vestibulum magna sed, convallis ex. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
    </div>
  </div>

  <!-- Our Values -->
  <div class="row">
    <div class="col-md-12">
      <h2>Our Values</h2>
      <ul>
        <li>Integrity</li>
        <li>Teamwork</li>
        <li>Innovation</li>
        <li>Customer Satisfaction</li>
      </ul>
    </div>
  </div>
</div>
    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <p>&copy; 2022 Social Media Layout. All rights reserved.</p>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>