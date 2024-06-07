<?php include 'include/header.php'; ?>
  <div>

<div class="container-fluid">
  <h2 class="text-2xl font-bold mb-4">Liste des participants</h2>
  <div class="bg-white shadow-md rounded-md" style="padding: 20px;">
  <table id="participantTable" class="w-full border-collapse" >
    <thead>
      <tr>
        <th class="px-4 py-2">id</th>
        <th class="px-4 py-2">Nom evenement</th>
        <th class="px-4 py-2">nom organisateur</th>
        <th class="px-4 py-2">nom utilisateur</th>
        <th class="px-4 py-2">prenom_utilisateur</th>
        <th class="px-4 py-2">matricule</th>
        <th class="px-4 py-2">tel</th>
        <th class="px-4 py-2">email</th>
        <th class="px-4 py-2">filiere</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "madb";
      
      $conn = new mysqli($servername, $username, $password, $dbname);
      
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      };
      $sql = "SELECT * from participant";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td class='border px-4 py-2'>{$row['id']}</td>";
          echo "<td class='border px-4 py-2'>{$row['noms']}</td>";
          echo "<td class='border px-4 py-2'>{$row['organisateur']}</td>";
          echo "<td class='border px-4 py-2'>{$row['nom_utilisateur']}</td>";
          echo "<td class='border px-4 py-2'>{$row['prenom_utilisateur']}</td>";
          echo "<td class='border px-4 py-2'>{$row['matricule']}</td>";
          echo "<td class='border px-4 py-2'>{$row['tel']}</td>";
          echo "<td class='border px-4 py-2'>{$row['email']}</td>";
          echo "<td class='border px-4 py-2'>{$row['filiere']}</td>";
          echo "</tr>";
        }
      }
      ?>
    </tbody>
  </table>
  </div>
</div>
<?php include 'include/main.php'; ?>

<!-- Include DataTables CSS and JS -->
