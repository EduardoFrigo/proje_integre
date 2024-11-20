<?php
include("../control/conexao.php");

$sql = "SELECT * FROM ag_prod_cliente";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID_PROD</th>
                <th>DATAHORA</th>
                <th>EDITAR</th>
                <th>EXCLUIR</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id_agprodcliente']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['id_produto']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['datahora']) . "</td>";
                    echo "<td><a href='editarAgProd.php?id=" . $row['id_agprodcliente'] . "'>Editar</a></td>";
                    echo "<td><a href='excluirCliente.php?id=" . $row['id_agprodcliente'] . "'>Excluir</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum usuário encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
