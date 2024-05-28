<?php
require 'db.php';

$stmt = $pdo->query('SELECT Museo.IdMuseo, Museo.NombreMuseo, Estado.NombreEstado 
                     FROM Museo 
                     JOIN Estado ON Museo.IdEstado = Estado.IdEstado');
$museos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Museos</title>
</head>
<body>
    <h2>Museos</h2>
    <a href="create_museo.php">Create New Museo</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre Museo</th>
            <th>Estado</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($museos as $museo): ?>
            <tr>
                <td><?php echo $museo['IdMuseo']; ?></td>
                <td><?php echo $museo['NombreMuseo']; ?></td>
                <td><?php echo $museo['NombreEstado']; ?></td>
                <td>
                    <a href="update_museo.php?id=<?php echo $museo['IdMuseo']; ?>">Edit</a>
                    <a href="delete_museo.php?id=<?php echo $museo['IdMuseo']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>


