<?php include('valida_sessao.php'); ?>
<?php include('conexao.php'); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "INSERT INTO fornecedores (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')";
    if ($conn->query($sql) === TRUE) {
        $mensagem = "Fornecedor cadastrado com sucesso!";
    } else {
        $mensagem = "Erro ao cadastrar fornecedor: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Fornecedor</title>
</head>
<body>
    <h2>Cadastro de Fornecedor</h2>
    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email">
        <br>
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone">
        <br>
        <button type="submit">Cadastrar</button>
    </form>
    <?php if (isset($mensagem)) echo "<p>$mensagem</p>"; ?>
    <a href="index.php">Voltar</a>
</body>
</html>
