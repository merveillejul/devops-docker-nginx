<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Projet DevOps</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; padding: 20px; }
        h1 { color: #1A3A5C; }
        .status { padding: 10px; border-radius: 5px; margin: 10px 0; }
        .ok { background: #E8F5E9; border-left: 4px solid #2E7D32; }
        .error { background: #FFEBEE; border-left: 4px solid #C62828; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background: #1A3A5C; color: white; padding: 10px; }
        td { padding: 8px; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>
    <h1>Merveille Juliana — Projet DevOps</h1>
    <h2>BTS SIO SLAM · Future Cloud & DevOps Engineer</h2>
    <hr>

    <h3>Stack technique</h3>
    <ul>
        <li>Nginx (reverse proxy)</li>
        <li>PHP <?php echo phpversion(); ?> (FPM)</li>
        <li>MySQL 8 (base de données)</li>
        <li>Docker & Docker Compose</li>
    </ul>

    <h3>Connexion MySQL</h3>
    <?php
    $host = 'db';
    $dbname = 'devopsdb';
    $user = 'root';
    $pass = 'root';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo '<div class="status ok">✅ Connexion MySQL réussie !</div>';

        // Créer une table de test si elle n'existe pas
        $pdo->exec("CREATE TABLE IF NOT EXISTS visites (
            id INT AUTO_INCREMENT PRIMARY KEY,
            message VARCHAR(255),
            date_visite DATETIME DEFAULT CURRENT_TIMESTAMP
        )");

        // Insérer une visite
        $pdo->exec("INSERT INTO visites (message) VALUES ('Visite depuis le navigateur')");

        // Afficher les visites
        $stmt = $pdo->query("SELECT * FROM visites ORDER BY date_visite DESC LIMIT 5");
        $visites = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo '<h3>Dernières visites enregistrées</h3>';
        echo '<table><tr><th>ID</th><th>Message</th><th>Date</th></tr>';
        foreach ($visites as $v) {
            echo "<tr><td>{$v['id']}</td><td>{$v['message']}</td><td>{$v['date_visite']}</td></tr>";
        }
        echo '</table>';

    } catch (PDOException $e) {
        echo '<div class="status error">❌ Erreur MySQL : ' . $e->getMessage() . '</div>';
    }
    ?>
</body>
</html>
