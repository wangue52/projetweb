<?php
// Connexion à la base de données
$servername = "localhost";
$username = "votre_utilisateur";
$password = "votre_mot_de_passe";
$dbname = "votre_base_de_donnees";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$nomEvenement = $_POST['nom_evenement'];
$lieu = $_POST['lieu'];
$dateEvenement = $_POST['date_evenement'];
$typeEvenement = $_POST['id_type'];

// Préparer et exécuter la requête SQL
$stmt = $conn->prepare("INSERT INTO evenement (nom_evenement, lieu, date_evenement, id_type) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $nomEvenement, $lieu, $dateEvenement, $typeEvenement);

if ($stmt->execute()) {
    echo "Événement créé avec succès !";
} else {
    echo "Erreur lors de la création de l'événement : " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Création d'un événement sportif</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
  <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6 mt-12">
    <h2 class="text-2xl font-bold mb-4">Créer un événement sportif</h2>
    <form>
      <div class="mb-4">
        <label for="nom-evenement" class="block font-medium mb-2">Nom de l'événement :</label>
        <input type="text" id="nom-evenement" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
      </div>
      <div class="mb-4">
        <label for="lieu" class="block font-medium mb-2">Lieu :</label>
        <input type="text" id="lieu" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
      </div>
      <div class="mb-4">
        <label for="date-evenement" class="block font-medium mb-2">Date de l'événement :</label>
        <input type="date" id="date-evenement" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
      </div>
      <div class="mb-4">
        <label for="type-evenement" class="block font-medium mb-2">Type d'événement :</label>
        <select id="type-evenement" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
          <option value="">Sélectionnez un type d'événement</option>
          <?php
            $sql = "SELECT * FROM type_evenement";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id_type"] . "'>" . $row["nom_type"] . "</option>";
                }
            } else {
                echo "<option value=''>Aucun type d'événement disponible</option>";
            }
          ?>
        </select>
      </div>
      <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-2 px-4 rounded-md">
        Créer l'événement
      </button>
    </form>
  </div>
</body>
</html>
<!-- Button to open the modal -->
<button
  type="button"
  class="bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-2 px-4 rounded-md"
  data-bs-toggle="modal"
  data-bs-target="#modalEvenement"
>
  Créer un événement
</button>

<!-- Modal -->
<div
  class="modal fade"
  id="modalEvenement"
  tabindex="-1"
  aria-labelledby="modalEvenementLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEvenementLabel">Créer un événement sportif</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-4">
            <label for="nom-evenement" class="block font-medium mb-2">Nom de l'événement :</label>
            <input type="text" id="nom-evenement" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
          </div>
          <div class="mb-4">
            <label for="lieu" class="block font-medium mb-2">Lieu :</label>
            <input type="text" id="lieu" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
          </div>
          <div class="mb-4">
            <label for="date-evenement" class="block font-medium mb-2">Date de l'événement :</label>
            <input type="date" id="date-evenement" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
          </div>
          <div class="mb-4">
            <label for="type-evenement" class="block font-medium mb-2">Type d'événement :</label>
            <select id="type-evenement" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
              <option value="">Sélectionnez un type d'événement</option>
              <?php
                $sql = "SELECT * FROM type_evenement";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='". $row["id_type"]. "'>". $row["nom_type"]. "</option>";
                    }
                } else {
                    echo "<option value=''>Aucun type d'événement disponible</option>";
                }
             ?>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Créer l'événement</button>
      </div>
    </div>
  </div>
</div>