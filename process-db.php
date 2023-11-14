<?php
// Connexion à la base de données (à adapter selon votre configuration)
$nomserveur = "localhost";
$utilisateurnom = "root";
$psswrd = "";
$database = "tp_2";

$conn = new mysqli($nomserveur, $utilisateurnom, $psswrd, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les données du formulaire
$num_addresses = $_POST['num_addresses'];

// Insérer les données dans la base de données (à adapter selon votre structure de base de données)
for ($i = 1; $i <= $num_addresses; $i++) {
    $street = $_POST["street$i"];
    $street_nb = $_POST["street_nb$i"];
    $type = $_POST["type$i"];
    $city = $_POST["city$i"];
    $zipcode = $_POST["zipcode$i"];

    // Utilisation de requêtes préparées pour éviter les attaques par injection SQL
    $stmt = $conn->prepare("INSERT INTO addresses (street, street_nb, type, city, zipcode) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $street, $street_nb, $type, $city, $zipcode);
    $stmt->execute();
    $stmt->close();
}

// Fermer la connexion à la base de données
$conn->close();

// Rediriger l'utilisateur vers une page de confirmation
header("Location: confirmation-success.php");
exit();
?>
