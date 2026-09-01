<?php
$conn = new mysqli('localhost', 'root', '', 'locacao_db');
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
$conn->set_charset("utf8");
?>