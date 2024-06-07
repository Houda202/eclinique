<?php
// Récupérer les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$date_demande = $_POST['date_demande'];
$commentaire = $_POST['commentaire'];

// Connexion à la base de données
$mysqli = new mysqli('localhost', 'root', '', 'clinique');

// Vérifier la connexion
if ($mysqli->connect_error) {
    die('Erreur de connexion à la base de données : ' . $mysqli->connect_error);
}

// Préparer la requête d'insertion
$stmt = $mysqli->prepare("INSERT INTO demande_rendez_vous (nom, prenom, email, telephone, date_demande, commentaire) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $nom, $prenom, $email, $telephone, $date_demande, $commentaire);

// Exécuter la requête
if ($stmt->execute()) {
    echo "Demande de rendez-vous soumise avec succès.";
} else {
    echo "Erreur lors de la soumission de la demande de rendez-vous : " . $mysqli->error;
}

// Fermer la connexion
$stmt->close();
$mysqli->close();
?>
