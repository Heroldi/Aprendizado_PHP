<?php 
$conn = mysqli_connect('localhost', 'root', '', 'teste_php');
$id = $_GET['id'];
function buscarUm($conn, $tabela, $id){  

    $query = "SELECT * FROM $tabela WHERE id = $id";
    $execute = mysqli_query($conn, $query); 
    $result = mysqli_fetch_all($execute, MYSQLI_ASSOC);

    return $result;
}

$tabela = 'usuario';
$usuario = buscarUm($conn, $tabela, $id);
?>

<?php foreach ($usuario as $user) : ?>
<form action="" method="post">
    <label for="nome">Nome:</label>
    <input type="text" name="nomeEdit" id="nomeEdit" value="<?php echo $user['nome'] ?>">
    <br>
    <label for="idade">Idade:</label>
    <input type="number" name="idadeEdit" id="idadeEdit" value="<?php echo $user['idade'] ?>">
    <br>
    <input type="submit" name="atualizar" value="Atualizar">
</form>
<?php endforeach; ?>

<?php 

function atualizar($conn, $tabela, $id){
    if(!empty($_POST['nomeEdit']) and !empty($_POST['idadeEdit'])){
        $nome = $_POST['nomeEdit'];
        $idade = $_POST['idadeEdit'];
    }
    

    if(isset($_POST['atualizar'])) {
        print_r($id);
        print_r($nome);
        print_r($idade);

        $query = "UPDATE $tabela SET nome = '$nome', idade = '$idade' WHERE id = $id";
        mysqli_query($conn, $query); 
        header('Location: /teste_php/teste.php');
    }  
}

atualizar($conn, $tabela, $id);
?>