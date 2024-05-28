<?php
require 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM Museo WHERE IdMuseo = ?');
$stmt->execute([$id]);
$museo = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreMuseo = $_POST['nombreMuseo'];
    $idEstado = $_POST['idEstado'];

    $sql = "UPDATE Museo SET NombreMuseo = ?, IdEstado = ? WHERE IdMuseo = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombreMuseo, $idEstado, $id]);

    header("Location: index_museo.php");
    exit();
}

$estados = $pdo->query('SELECT IdEstado, NombreEstado FROM Estado')->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Museo</title>
</head>
<body>
    <h2>Edit Museo</h2>
    <form method="post">
        <label for="nombreMuseo">Nombre Museo:</label><br>
        <input type="text" id="nombreMuseo" name="nombreMuseo" value="<?php echo $museo['NombreMuseo']; ?>" required><br>
        <label for="idEstado">Estado:</label><br>
        <select id="idEstado" name="idEstado" required>
            <?php foreach ($estados as $estado): ?>
                <option value="<?php echo $estado['IdEstado']; ?>" <?php if ($estado['IdEstado'] == $museo['IdEstado']) echo 'selected'; ?>>
                    <?php echo $estado['NombreEstado']; ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
