<?php
// Conexão com o banco
$servidor = "localhost";
$usuario = "root"; // padrão do XAMPP
$senha = "";       // deixe vazio no XAMPP
$banco = "aula_backend";

// Criando conexão
$conn = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica se deu erro
if($conn->connect_error){
    die("❌ Falha na conexão: " . $conn->connect_error);
}

// Recebe dados do formulário
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$mensagem = $_POST['mensagem'] ?? '';

// Validação simples
if(empty($nome) || empty($email) || empty($mensagem)){
    echo "⚠️ Todos os campos são obrigatórios!";
    exit;
}

// Prepara o comando SQL
$sql = "INSERT INTO mensagens (nome, email, mensagem) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nome, $email, $mensagem);

// Executa o comando
if($stmt->execute()){
    echo "✅ Obrigado, <strong>$nome</strong>! Sua mensagem foi salva no banco de dados.";
} else {
    echo "❌ Erro ao salvar: " . $stmt->error;
}

// Fecha tudo
$stmt->close();
$conn->close();
?>
