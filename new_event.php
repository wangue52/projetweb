<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "madb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

if (isset($_POST["submit"])) {
    $stmt = $conn->prepare("INSERT INTO evenement (organisateur , nom_evenement, lieu, date_evenement, id_type, images_evenements, description) VALUES (?, ?,?,?,?,?,?)");
    $stmt->bind_param("ssssiss",$organisateur , $nom_evenement, $lieu, $date_evenement, $id_type , $imagePath, $textData);
    $nom_evenement = $_POST["nom_evenement"];
    $lieu = $_POST["lieu"];
    $date_evenement = $_POST["date_evenement"];
    $id_type = $_POST["id_type"];
    $uploadedImages= $_FILES['images'];
    $textData = $_POST['text_data'];
    $organisateur = $_POST['nom'];
    foreach ($uploadedImages['name'] as $key => $value) {
        $targetDir = "images/";
        $fileName = basename($uploadedImages['name'][$key]);
        $targetFilePath = $targetDir . $fileName;
        if (file_exists($targetFilePath)) {
            echo "Sorry, file already exists.<br>";
        } else {
            if (move_uploaded_file($uploadedImages["tmp_name"][$key], $targetFilePath)) {
                $imagePath = $targetFilePath;
                $stmt->execute();
                
                ?>
                  <script>
                    alert("Votre Evennement a ete cree avec Succes!!!");
                  </script>
                <?php
            } else {
                echo "Sorry, there was an error uploading your file.<br>";
            }
        }
    }
    $stmt->close();
    $conn->close();
}
?>

 <?php include 'include/header.php'; ?>
 <div>
 </div>
 <div class="flex justify-center items-center h-screen bg-gray-100">
  <div class="bg-white shadow-md rounded-lg w-full max-w-md p-6">
    <br>
    <br>
    <form method="post"  enctype="multipart/form-data" class="space-y-4">
    <div>
        <label for="organisateur" class="block font-medium mb-2">Nom de l'organisateur :</label>
        <input type="text" id="nom" name="nom" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2" required>
      </div>
      <div>
        <label for="nom-evenement" class="block font-medium mb-2">Nom de l'événement :</label>
        <input type="text" id="nom-evenement" name="nom_evenement" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2" required>
      </div>
      <div>
        <label for="lieu" class="block font-medium mb-2">Lieu :</label>
        <input type="text" id="lieu" name="lieu" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2" required>
      </div>
      <div>
        <label for="date-evenement" class="block font-medium mb-2">Date de l'événement :</label>
        <input type="date" id="date-evenement" name="date_evenement" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2" required>
      </div>
      <div>
        <label for="type-evenement" class="block font-medium mb-2">Type d'événement :</label>
        <select id="type-evenement" name="id_type" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2" required>
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
       <div class="mb-4">
    <label for="media" class="block font-medium mb-2">Média :</label>
    <input type="file" id="media" name="images[]" multiple  class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2" required>
  </div>

  <div class="mb-4">
    <label for="description" class="block font-medium mb-2">Description :</label>
    <textarea id="description" name="text_data" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2" required></textarea>
  </div>
      <div>
        <button type="submit" name="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-2 px-4 rounded-md w-full">Créer l'événement</button>
      </div>
     
    </form>
  </div>
</div>
</div>
<?php include 'include/main.php'; ?>
