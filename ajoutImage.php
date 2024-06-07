<?php include 'include/header.php'; ?>
  <div>
  <div class="container-fluid">
  <h2 class="text-2xl font-bold mb-4">Liste des événements</h2>
  <div class="bg-white shadow-md rounded-md">
    <table id="evenementTable" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th class="px-4 py-2">ID Evénement</th>
          <th class="px-4 py-2">Nom Evénement</th>
          <th class="px-4 py-2">Lieu</th>
          <th class="px-4 py-2">Date Evénement</th>
          <th class="px-4 py-2">Type</th>
          <th class="px-4 py-2">Images</th>
          <th class="px-4 py-2">Description</th>
          <th class="px-4 py-2">Organisateur</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Your PHP code to fetch data from the `evenement` table
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "madb";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        };

        $sql = "SELECT * from evenement";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td class='border px-4 py-2'>{$row['id_evenement']}</td>";
            echo "<td class='border px-4 py-2'>{$row['nom_evenement']}</td>";
            echo "<td class='border px-4 py-2'>{$row['lieu']}</td>";
            echo "<td class='border px-4 py-2'>{$row['date_evenement']}</td>";
            echo "<td class='border px-4 py-2'>{$row['id_type']}</td>";
            echo "<td class='border px-4 py-2'> <img src=". $row["images_evenements"]. "  style='max-width: 50px; height: 50px; object-fit: cover;'></td>";
            echo "<td class='border px-4 py-2'>{$row['description']}</td>";
            echo "<td class='border px-4 py-2'>{$row['organisateur']}</td>";
            echo "</tr>";
          }
        }
       ?>
      </tbody>
    </table>
  </div>
</div>
  </div>
  <?php include 'include/main.php'; ?>