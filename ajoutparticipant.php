<?php 
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "madb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id_evenement= $_POST["id_evenement"];
    $id_participants[]= $_POST["id_participants[]"];

    // Validate form data
    if (empty($id_evenement)  || empty($id_participants) ) {
        echo "All fields are required.";
        exit;
    }

    // Insert new event into the database
    $sql = "INSERT INTO evenement (id_evenement,id_participants) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $id_evenement, $id_participants);

    if ($stmt->execute()) {
        echo "New event created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $stmt->close();
    $conn->close();
}
?>
<?php include 'include/header.php'; ?>
  <div>

  <div class="container mx-auto my-8">
    <h2 class="text-2xl font-bold mb-4">Attribuer des participants à un événement</h2>

    <div class="bg-white shadow-md rounded-md p-6">
      <form method="post" class="space-y-4">
        <div>
          <label for="evenement" class="block font-medium mb-2">Événement :</label>
          <select id="evenement" name="id_evenement" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2" required>
            <option value="">Sélectionnez un événement</option>
            <?
              // Récupérer la liste des événements depuis la base de données
              $sql = "SELECT * FROM evenement";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                      echo "<option value='". $row["id_evenement"]. "'>". $row["nom_evenement"]. "</option>";
                  }
              } else {
                  echo "<option value=''>Aucun événement disponible</option>";
              }
            ?>
          </select>
        </div>

        <div>
          <label for="participants" class="block font-medium mb-2">Participants :</label>
          <select id="participants" name="id_participants[]" multiple class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2" required>
            <option value="">Sélectionnez les participants</option>
            <?php
              // Récupérer la liste des participants depuis la base de données
              $sql = "SELECT * FROM utilisateur";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                      echo "<option value='". $row["id_utilisateur"]. "'>". $row["nom_utilisateur"]. " ". $row["prenom_utilisateur"]. "</option>";
                  }
              } else {
                  echo "<option value=''>Aucun participant disponible</option>";
              }
            ?>
          </select>
        </div>

        <div>
          <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-2 px-4 rounded-md w-full">Attribuer les participants</button>
        </div>
      </form>
    </div>
  </div>
  </div>
  <?php include 'include/main.php'; ?>

