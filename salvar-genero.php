<div class="container mt-3">
<h1>Salvar Gênero Literário</h1>
<?php
switch ($_REQUEST['acao']) {

    case 'cadastrar':
        // 1. Mudar variável de POST para 'genero'
        $nome = $_POST['nome_genero'];
        
        // 2. Mudar a tabela e o campo no comando INSERT
        $sql = "INSERT INTO genero_literario (
                    nome_genero
                ) VALUES (
                    '{$nome}'
                )";

        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>alert('Gênero cadastrado com sucesso!')</script>";
        } else {
            echo "<script>alert('Não foi possível cadastrar o gênero.')</script>";
        }
        // 3. Mudar o link de redirecionamento
        echo "<script>location.href='?page=listar-genero'</script>";
        break;

    case 'editar':
        // 1. Mudar variável de POST
        $nome = $_POST['nome_genero'];
        // 2. Mudar variável ID
        $id_genero = $_POST['id_genero']; 

        // 3. Mudar a tabela, o campo no comando UPDATE e a condição WHERE
        $sql = "UPDATE genero_literario SET 
                    nome_genero = '{$nome}'
                WHERE 
                    id_genero = {$id_genero}";

        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>alert('Gênero editado com sucesso!')</script>";
        } else {
            echo "<script>alert('Não foi possível editar o gênero.')</script>";
        }
        // 4. Mudar o link de redirecionamento
        echo "<script>location.href='?page=listar-genero'</script>";
        break;

    case 'excluir':
        // 1. Mudar variável ID
        $id_genero = $_REQUEST['id_genero'];

        // 2. Mudar a tabela e a condição WHERE no comando DELETE
        $sql = "DELETE FROM genero_literario WHERE id_genero = {$id_genero}";

        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>alert('Excluído com sucesso!')</script>";
        } else {
            // Em caso de erro, pode ser uma chave estrangeira (se houver livros associados a este gênero)
            echo "<script>alert('Não foi possível excluir o gênero. Verifique se existem livros associados a ele.')</script>";
        }
        // 3. Mudar o link de redirecionamento
        echo "<script>location.href='?page=listar-genero'</script>";
        break;
}
?>
</div>