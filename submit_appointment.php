<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['name'];
    $email = $_POST['email'];
    $telephone = $_POST['phone'];
    $date = $_POST['date'];
    $service = $_POST['department'];
    $message = $_POST['message'];

    $sql = "INSERT INTO rendezvous (nom, email, telephone, date, service, message) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $nom, $email, $telephone, $date, $service, $message);

    if ($stmt->execute()) {
        echo "Rendez-vous pris avec succès!";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<?php
$servername = "localhost:8090";
$username = "root";
$password = "";
$dbname = "eclinique";

// Crée une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifie la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full-name'];
    $dob = $_POST['dob'];
    $sex = $_POST['sex'];
    $appointment_date = $_POST['appointment-date'];
    $appointment_time = $_POST['appointment-time'];
    $speciality = $_POST['speciality'];
    $message = $_POST['message'];

    $sql = "INSERT INTO appointments (full_name, dob, sex, appointment_date, appointment_time, speciality, message)
    VALUES ('$full_name', '$dob', '$sex', '$appointment_date', '$appointment_time', '$speciality', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Nouveau rendez-vous enregistré avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
