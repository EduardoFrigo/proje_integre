<?php
include_once 'funcoes.php';
include_once 'conexao.php';

$data = isset($_POST['data']) ? $_POST['data'] : '';
$horaInicio = isset($_POST['hora_inicio']) ? $_POST['hora_inicio'] : '';
$horaFim = isset($_POST['hora_fim']) ? $_POST['hora_fim'] : '';
$idProduto = isset($_POST['id_produto']) ? $_POST['id_produto'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['botao']) && $data && $horaInicio && $horaFim && $idProduto) 
{
    cadastraAg($idProduto, $data, $horaInicio, $horaFim);
}
$sql="SELECT nome FROM produto WHERE id_produto = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $idProduto);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) 
{
    $row = $result->fetch_assoc();
     $produtoNome = $row['nome'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Agendamento</title>
    <script>
        function confirmarAgendamento() {
            var data = "<?php echo $data; ?>";
            var horaInicio = "<?php echo $horaInicio; ?>";
            var horaFim = "<?php echo $horaFim; ?>";
            var idProduto = "<?php echo $produtoNome; ?>";
            var mensagem = "Você deseja realmente fazer o agendamento?\n\n" +
                "Produto ID: " + idProduto + "\n" +
                "Data: " + data + "\n" +
                "Hora Início: " + horaInicio + "\n" +
                "Hora Fim: " + horaFim;
            var confirmar = confirm(mensagem);
            return confirmar; 
        }
    </script>
</head>
<style>
    body {
        background-image: url("sim.png");
        color: red;
        font-family: Arial, sans-serif;
        padding: 20px;
        text-align: center;
    }
    h3 {
        font-size: 24px;
        color: green;
        margin-bottom: 10px;
    }
    p {
        font-size: 18px;
        margin: 5px 0;
    }
    strong {
        color: #333;
    }
</style>
<body>
    <h2>Detalhes do Agendamento</h2>
    <p><strong>Produto:</strong> <?php echo htmlspecialchars($produtoNome); ?></p>
    <p><strong>Data:</strong> <?php echo htmlspecialchars($data); ?></p>
    <p><strong>Hora Início:</strong> <?php echo htmlspecialchars($horaInicio); ?></p>
    <p><strong>Hora Fim:</strong> <?php echo htmlspecialchars($horaFim); ?></p>
    <form method="post" onsubmit="return confirmarAgendamento()">
        <input type="hidden" name="data" value="<?php echo $data; ?>">
        <input type="hidden" name="hora_inicio" value="<?php echo $horaInicio; ?>">
        <input type="hidden" name="hora_fim" value="<?php echo $horaFim; ?>">
        <input type="hidden" name="id_produto" value="<?php echo $idProduto; ?>">
        <input type="submit" name="botao" value="Confirmar Agendamento">
    </form>

</body>

</html>