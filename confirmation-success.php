<?php
$num_addresses = isset($_POST['num_addresses']) ? (int)$_POST['num_addresses'] : 0;

// Initialiser des tableaux pour stocker les informations saisies
$streets = $street_nbs = $types = $cities = $zipcodes = [];

// Récupérer les informations saisies et les stocker dans les tableaux
for ($i = 1; $i <= $num_addresses; $i++) {
    $streets[] = htmlspecialchars($_POST["street$i"]);
    $street_nbs[] = htmlspecialchars($_POST["street_nb$i"]);
    $types[] = htmlspecialchars($_POST["type$i"]);
    $cities[] = htmlspecialchars($_POST["city$i"]);
    $zipcodes[] = htmlspecialchars($_POST["zipcode$i"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Confirmation success</title>
</head>
<body>
    <div class="container">
        <h2>Confirmation</h2>
        <p>Vérifiez les informations suivantes :</p>
        <?php
        // Afficher les informations saisies
        for ($i = 1; $i <= $num_addresses; $i++) {
            echo "<div class='confirmation-address'>";
            echo "<h3>Adresse $i</h3>";
            echo "<p><strong>Street:</strong> " . $streets[$i-1] . "</p>";
            echo "<p><strong>Street Number:</strong> " . $street_nbs[$i-1] . "</p>";
            echo "<p><strong>Type:</strong> " . $types[$i-1] . "</p>";
            echo "<p><strong>City:</strong> " . $cities[$i-1] . "</p>";
            echo "<p><strong>Zipcode:</strong> " . $zipcodes[$i-1] . "</p>";
            echo "</div>";
        }
        ?>
        <form action="index.html" method="post">
            <button type="submit">Retourner pour changer les informations</button>
        </form>
    </div>
</body>
</html>



