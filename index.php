<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylephp.css">
    
    <title>Sistema Web para Loja de Motos</title>
</head>
<body>
    
<div class="container">
        <div class="logo-container">
            <img src="imagens/logo.jpg" alt="Logo da Loja" class="logo">
            <h1>FATEC MOTORS</h1>
            <!-- Resto do seu código HTML -->
        </div>
    <form action="motos.php" method="post">
        <table>
            <tr>
                <td>Modelo:</td>
                <td><input type="text" name="modelo" required></td>
            </tr>
            <tr>
                <td>Marca:</td>
                <td><input type="text" name="marca" required></td>
            </tr>
            <tr>
                <td>Cilindrada:</td>
                <td><input type="number" name="cilindrada" required></td>
            </tr>
            <tr>
                <td>Ano:</td>
                <td><input type="number" name="ano" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="inserir" value="Inserir"></td>
            </tr>
        </table>
    </form>

    <form action="motos.php" method="post">
        <table>
            <tr>
                <td>ID:</td>
                <td><input type="number" name="id" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="editar" value="Editar"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="excluir" value="Excluir"></td>
            </tr>
        </table>
    </form>

    <form action="motos.php" method="post">
        <table>
            <tr>
                <td colspan="2"><input type="submit" name="verificar" value="Verificar"></td>
            </tr>
        </table>
    </form>

</body>
</html>