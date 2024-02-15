<?php
$servername = "localhost";
$username = "root";
$password = "";

if(isset($_POST['id'])) {
    $id = $_POST['id'];

try {
    $bdd = new PDO("mysql:host=$servername;dbname=hackers-poulette", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Connexion réussie
$requete = $bdd->prepare("DELETE from contact_support WHERE id = :id");
$requete->bindParam(':id', $id, PDO::PARAM_INT);
$requete->execute();
header('Location: dashboard.php');
}

catch (PDOException $e) {
    die ("Erreur: " . $e->getMessage());
}
} else {
    header('Location: dashboard.php');
}
?>
