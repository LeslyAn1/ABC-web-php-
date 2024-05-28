<?php
require 'db.php';

$id = $_GET['id'];

$sql = 'DELETE FROM Museo WHERE IdMuseo = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header("Location: index_museo.php");
exit();
?>
