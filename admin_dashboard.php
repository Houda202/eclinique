<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}

echo 'Bienvenue, ' . $_SESSION['user_name'];
echo '<br>Rôle : ' . $_SESSION['user_role'];

// Afficher des sections basées sur le rôle de l'utilisateur
if ($_SESSION['user_role'] == 'medecin') {
    echo '<a href="medecin_dashboard.php">Accéder au tableau de bord Médecin</a>';
} elseif ($_SESSION['user_role'] == 'assistante') {
    echo '<a href="assistante_dashboard.php">Accéder au tableau de bord Assistante</a>';
} elseif ($_SESSION['user_role'] == 'facturation') {
    echo '<a href="facturation_dashboard.php">Accéder au tableau de bord Facturation</a>';
} elseif ($_SESSION['user_role'] == 'patient') {
    echo '<a href="patient_dashboard.php">Accéder à l\'espace Patient</a>';
}
?>
