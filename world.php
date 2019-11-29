<?php
$host = getenv('IP');
$username = 'lab7_user';
$password = 'Jason123';
$dbname = 'world';

$country = $_GET["country"]; 
$test = array_key_exists("context",$_GET);


$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if(!$test){
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<table id = "table">
    <tr>
        <th>Country Name</th><th>Continent</th><th>Independence Year</th><th>Head of State</th>
    </tr>
    <?php foreach ($results as $row): ?>
      <tr><td><?= $row['name'] ?></td><td><?=$row['continent']?></td><td><?= $row['independence_year']?></td><td><?= $row['head_of_state'] ?></td></tr>
    <?php endforeach; ?>
</table>
<?php
}else{
    $stmt = $conn->query("SELECT * FROM countries INNER JOIN cities ON countries.code = cities.country_code WHERE countries.name LIKE '%$country%';");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <table id = "table">
    <tr>
        <th>Name</th><th>District</th><th>Population</th>
    </tr>
    <?php foreach ($results as $row): ?>
      <tr><td><?= $row['name'] ?></td><td><?=$row['district']?></td><td><?= $row['population']?></td></tr>
    <?php endforeach; ?>
    <?php
}
