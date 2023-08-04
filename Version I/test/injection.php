<?php
// Démarrer la session
session_start();

// Fonction d'échappement pour les données affichées dans la page
function escape($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

// Valider et enregistrer les données soumises par l'utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Valider les données

    // Échapper les données avant de les afficher
    $escapedUsername = escape($username);
    $escapedEmail = escape($email);

    // Enregistrer les données dans la base de données ou effectuer toute autre action requise
    // Assurez-vous d'utiliser des requêtes préparées ou des mécanismes de protection contre les injections SQL

    // Redirection après le traitement des données
    header('Location: page_de_succes.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- ... Balises meta, titre, liens CSS ... -->
</head>
<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <input type="text" id="username" name="username" placeholder="Username" required> <br>
        <input type="text" id="email" name="email" placeholder="E-mail" required> <br>
        <input type="password" id="password" name="password" placeholder="Password" required> <br>

        <input type="submit" id="signUp" name="signup_submit" value="Sign Up">

        <!-- ... Autres éléments HTML ... -->
    </form>
</body>
</html>