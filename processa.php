<?php
// Recebendo dados do formulário
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$mensagem = $_POST['mensagem'] ?? '';

// Verifica se os campos foram preenchidos
if(empty($nome) || empty($email) || empty($mensagem)){
    echo "⚠️ Todos os campos são obrigatórios!";
    exit;
}

// Monta o texto a ser salvo
date_default_timezone_set('America/Sao_Paulo');
$data = date("Y-m-d H:i:s");
$texto = "[$data] \nNome: $nome\nE-mail: $email\nMensagem: $mensagem\n---------------------------\n";

// Abre o arquivo (modo append = acrescentar no final)
$arquivo = fopen("mensagens.txt", "a");

// Escreve no arquivo
fwrite($arquivo, $texto);

// Fecha o arquivo
fclose($arquivo);

// Simulação de processamento (aqui seria o lugar para salvar no banco de dados)
echo "✅ Obrigado, <strong>$nome</strong>!<br>";
echo "🤣 Recebemos sua mensagem:<br>";
echo "<em>\"$mensagem\"</em><br><br>";
echo "Entraremos em contato no e-mail: <strong>$email</strong>";

// Fim do script
?>
