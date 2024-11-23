<?php
// Incluir o arquivo onde a função de cadastro está definida (se necessário)
include_once 'funcoes.php';  // Ajuste o caminho conforme necessário

// Verificar se os dados do formulário foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário usando $_POST
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senhaForm = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $endereco =$_POST['endereco'];
    $cpf=$_POST['cpf'];

    criarLogin($nome, $email, $senhaForm,$telefone,$endereco, $cpf);
    
}
?>
