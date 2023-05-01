<?php 
$conn = mysqli_connect('localhost', 'root', '', 'teste_php');

function inserir($conn){
    
if(!empty($_POST['nome']) and !empty($_POST['idade'])){
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];

    $query = "INSERT INTO usuario (nome, idade) VALUES ('$nome', $idade)";
    mysqli_query($conn, $query);
}
}

inserir($conn);
?>



<?php
function buscar($conn, $tabela){
    $query = "SELECT * FROM $tabela";
    $execute = mysqli_query($conn, $query); 
    $result = mysqli_fetch_all($execute, MYSQLI_ASSOC);
    return $result;
}

$tabela = "usuario";
$usuario  = buscar($conn, $tabela);
?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        
                <!-- <?php print_r($usuario); ?> -->
                
                <?php foreach ($usuario as $user) : ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['nome']; ?></td>
                        <td><?php echo $user['idade']; ?></td>
                        <td><a href="/teste_php/teste.php?id=<?php echo $user['id']; ?>">Excluir</a></td>
                        <td><a href="/teste_php/index.php?id=<?php echo $user['id']; ?>">Atualizar</a></td>
                    </tr>
                <?php endforeach; ?>
    </tbody>
</table>

<?php 

function excluir($conn, $tabela){
    $tabela = 'usuario';
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM $tabela WHERE id = $id";
        mysqli_query($conn, $query); 
    }    
}

excluir($conn, $tabela);

?>