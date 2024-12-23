<?php
// Connexion à la base de données
$host = 'localhost';
$user = 'root';
$password = ''; 
$dbname = 'contactdb';

// Connexion à MySQL
$conn = new mysqli($host, $user, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
  die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

$fullname = $conn->real_escape_string($_POST['fullname']);
$email = $conn->real_escape_string($_POST['email']);
$message = $conn->real_escape_string($_POST['message']);

// Préparer et exécuter la requête d'insertion
$query = "INSERT INTO contact (fullname, email, message) VALUES ('$fullname', '$email', '$message')";
if ($conn->query($query) === TRUE) {
  header("Location: /salma_portfolio/ "); 
} else {
  echo "Erreur lors de l'envoi du message : " . $conn->error;
}

$conn->close();

