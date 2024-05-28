<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreMuseo = $_POST['nombreMuseo'];
    $idEstado = $_POST['idEstado'];
    $idUsuarioCrea = 1; // Assuming this is the admin user ID

    $sql = "INSERT INTO Museo (NombreMuseo, IdEstado, IdUsuarioCrea) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombreMuseo, $idEstado, $idUsuarioCrea]);

    header("Location: index_museo.php");
    exit();
}

$estados = $pdo->query('SELECT IdEstado, NombreEstado FROM Estado')->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Museo</title>
</head>
<body>
    <h2>Create Museo</h2>
    <form method="post">
        <label for="nombreMuseo">Nombre Museo:</label><br>
        <input type="text" id="nombreMuseo" name="nombreMuseo" required><br>
        <label for="idEstado">Estado:</label><br>
        <select id="idEstado" name="idEstado" required>
            <?php foreach ($estados as $estado): ?>
                <option value="<?php echo $estado['IdEstado']; ?>"><?php echo $estado['NombreEstado']; ?></option>
            <?php endforeach; ?>
        </select><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
