<?php
session_start();

// Récupérer les données du formulaire
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];

// Connexion à la base de données
$mysqli = new mysqli('localhost', 'root', '', 'clinique');

// Vérifier la connexion
if ($mysqli->connect_error) {
    die('Erreur de connexion à la base de données : ' . $mysqli->connect_error);
}

// Préparer la requête de sélection de l'utilisateur par email
$stmt = $mysqli->prepare("SELECT id, email, mot_de_passe FROM utilisateurs WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$utilisateur = $result->fetch_assoc();

// Vérifier si un utilisateur avec cet email existe
if ($stmt->num_rows > 0) {
    $stmt->fetch();
    // Vérifier le mot de passe
    if (password_verify($mot_de_passe, $hashed_password)) {
        // Stocker les informations de l'utilisateur dans la session
        $_SESSION['utilisateur_id'] = $id;
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['role'] = $role;

        // Rediriger vers une page spécifique selon le rôle
        if ($role == 'medecin') {
            header('Location: medecin_dashboard.php');
        } elseif ($role == 'assistante') {
            header('Location: assistante_dashboard.php');
        } elseif ($role == 'facturation') {
            header('Location: facturation_dashboard.php');
        } else {
            header('Location: patient_dashboard.php');
        }
    } else {
        echo 'Mot de passe incorrect.';
    }
} else {
    echo 'Aucun utilisateur trouvé avec cet email.';
}

// Fermer la connexion
$stmt->close();
$mysqli->close();
?>
