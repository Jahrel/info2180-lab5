<?php header("Access-Control-Allow-Origin: *");
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';



$country = filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country = $_GET["country"];
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);




?>
<ul>
<table>
  <tr>
    <th>Name</th>
    <th>Continent</th>
    <th>Independence</th>
    <th>Head of State</th>
  </tr>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
  <tr>
    <td><?= $row["name"]; ?></td>
    <td><?= $row["continent"]; ?></td> 
    <td><?= $row["independence_year"]; ?></td>
    <td><?= $row["head_of_state"]; ?></td>
  </tr>
<?php endforeach; ?>
</ul>
</table>

                  
