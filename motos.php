<link rel="stylesheet" href="css/motos.css">

<?php

// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loja_de_motos";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Inserir uma moto
if (isset($_POST['inserir'])) {
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $cilindrada = $_POST['cilindrada'];
    $ano = $_POST['ano'];

    $sql = "INSERT INTO motos (modelo, marca, cilindrada, ano) VALUES ('$modelo', '$marca', '$cilindrada', '$ano')";

    if (mysqli_query($conn, $sql)) {
        header("Location: inserida.html");
    } else {
        echo "Erro ao inserir moto: " . mysqli_error($conn);
    }
    
    echo "<br><a href='index.php'>Voltar</a>";
}


// Editar uma moto
if (isset($_POST['editar'])||isset($_GET['editar'])) {
    if (isset($_POST['editar'])) {
         $id = $_POST['id'];
    } else {
         $id = $_GET['id'];
    }

    $sql = "SELECT * FROM motos WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        // Mostrar os dados da moto em um formulário
        echo "<form action='motos.php' method='post'>";
        echo "<table>";
        echo "<tr>";
        echo "<td>Modelo:</td>";
        echo "<td><input type='text' name='modelo' value='" . $row['modelo'] . "' required></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Marca:</td>";
        echo "<td><input type='text' name='marca' value='" . $row['marca'] . "' required></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Cilindrada:</td>";
        echo "<td><input type='number' name='cilindrada' value='" . $row['cilindrada'] . "' required></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Ano:</td>";
        echo "<td><input type='number' name='ano' value='" . $row['ano'] . "' required></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><input type='hidden' name='id' value='" . $row['id'] . "'></td>";
        echo "<td><input type='submit' name='atualizar' value='Atualizar'></td>";
        echo "</tr>";
        echo "</table>";
        echo "</form>";
    } else {
        echo "Moto não encontrada!";
    }
    echo "<br><a href='index.php'>Voltar</a>";
}

// Atualizar uma moto
if (isset($_POST['atualizar'])) {
    $id = $_POST['id'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $cilindrada = $_POST['cilindrada'];
    $ano = $_POST['ano'];

    $sql = "UPDATE motos SET modelo = '$modelo', marca = '$marca', cilindrada = '$cilindrada', ano = '$ano' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: atualizado.html");
    } else {
        echo "Erro ao atualizar moto: " . mysqli_error($conn);
    }
    
}

// Excluir uma moto
if (isset($_POST['excluir']) || (isset($_GET['excluir']))) {
    if (isset($_GET['excluir'])) {
        $id=$_GET['id'];
    
    }else{
        $id = $_POST['id'];
    }
 

    $sql = "DELETE FROM motos WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: excluido.html");
    } else {
        echo "Erro ao excluir moto: " . mysqli_error($conn);
    }
    echo "<br><a href='index.php'>Voltar</a>";
}

// Verificar as motos em estoque
if (isset($_POST['verificar'])) {

    $sql = "SELECT * FROM motos";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        // Mostrar as motos em uma tabela
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Modelo</th>";
        echo "<th>Marca</th>";
        echo "<th>Cilindrada</th>";
        echo "<th>Ano</th>";
        echo "<th>Ações</th>";        
        echo "</tr>";

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['modelo'] . "</td>";
            echo "<td>" . $row['marca'] . "</td>";
            echo "<td>" . $row['cilindrada'] . "</td>";
            echo "<td>" . $row['ano'] . "</td>";
            echo "<td><a href='motos.php?id=" . $row["id"]."&editar=1'>Editar</a> | <a href='motos.php?id=" . $row["id"] . "&excluir'>Excluir</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Nenhuma moto em estoque!";
    }
    echo "<br><a href='index.php'>Voltar</a>";
}

// Fechar a conexão
mysqli_close($conn);

?>