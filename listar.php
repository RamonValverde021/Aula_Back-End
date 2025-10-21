<?php
// Conexão com o banco
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "aula_backend";

$conn = new mysqli($servidor, $usuario, $senha, $banco);

if($conn->connect_error){
    die("❌ Falha na conexão: " . $conn->connect_error);
}

// Busca todas as mensagens
$sql = "SELECT * FROM mensagens ORDER BY data_envio DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mensagens Recebidas</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <h1>📩 Mensagens Recebidas</h1>
</header>

<main>
<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='mensagem'>";
        echo "<strong>Nome:</strong> " . htmlspecialchars($row["nome"]) . "<br>";
        echo "<strong>E-mail:</strong> " . htmlspecialchars($row["email"]) . "<br>";
        echo "<strong>Mensagem:</strong> " . nl2br(htmlspecialchars($row["mensagem"])) . "<br>";
        echo "<em>Enviado em: " . $row["data_envio"] . "</em>";
        echo "</div><hr>";
    }
} else {
    echo "<p>📭 Nenhuma mensagem ainda.</p>";
}
$conn->close();
?>
</main>

</body>
</html>