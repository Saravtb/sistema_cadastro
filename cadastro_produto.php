<?php include('valida_sessao.php'); ?>
<?php include('conexao.php'); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fornecedor_id = $_POST['fornecedor_id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $sql = "INSERT INTO produtos (fornecedor_id, nome, descricao, preco) VALUES ('$fornecedor_id', '$nome', '$descricao', '$preco')";
    if ($conn->query($sql) === TRUE) {
        $mensagem = "Produto cadastrado com sucesso!";
    } else {
        $mensagem = "Erro ao cadastrar produto: " . $conn->error;
    }
}

$fornecedores = $conn->query("SELECT id, nome FROM fornecedores");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produto</title>
</head>
<body>
    <h2>Cadastro de Produto</h2>
    <form method="post" action="">
        <label for="fornecedor_id">Fornecedor:</label>
        <select name="fornecedor_id" required>
            <?php while ($row = $fornecedores->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['nome']; ?></option>
            <?php endwhile; ?>
        </select>
        <br>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <br>
        <label for="descricao">Descrição:</label>
        <textarea name="descricao"></textarea>
        <br>
        <label for="preco">Preço:</label>
        <input type="text" name="preco" required>
        <br>
        <button type="submit">Cadastrar</button>
    </form>
    <?php if (isset($mensagem)) echo "<p>$mensagem</p>"; ?>
    <a href="index.php">Voltar</a>
</body>
</html>
