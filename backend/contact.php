<?php
// variable qui contient l'adresse mail a utiliser
$to = "louiszaccomer@gmail.com";

// pour utiliser le serveur php avec vite (CORS)
header("Access-Control-Allow-Origin: http://localhost:5178");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recuperer les entrées du formulaire
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Validation des champs
    if (empty($name) || empty($email) || empty($message)) {
        echo json_encode(["status" => "error", "message" => "Tous les champs sont requis."]);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["status" => "error", "message" => "Adresse e-mail invalide."]);
        exit;
    }

    // Contenu de le mail
    $subject = "Nouveau message de $name";
    $body = "Nom: $name\nEmail: $email\nMessage:\n$message";
    $headers = "From: $email";

    // Essayer d'envoyer le mail 
    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(["status" => "success", "message" => "Message envoyé avec succès !"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Erreur lors de l'envoi du message."]);
    }
} else {
    // echec mail
    echo json_encode(["status" => "error", "message" => "Méthode non autorisée."]);
}
