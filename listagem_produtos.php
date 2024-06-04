<?php include('valida_sessao.php'); ?>
<?php include('conexao.php'); ?>

<?php
$produtos = $conn->query("SELECT p.id, p.nome, p.descricao, p.preco, f.nome AS fornecedor_nome FROM produtos p JOIN fornecedores f ON p.fornecedor_id = f.id");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Produtos</title>
</head>
<body>
    <h2>Listagem de Produtos</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Fornecedor</th>
        </tr>
        <?php while ($row = $produtos->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['descricao']; ?></td>
            <td><?php echo $row['preco']; ?></td>
            <td><?php echo $row['fornecedor_nome']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="index.php">Voltar</a>
</body>
</html>
