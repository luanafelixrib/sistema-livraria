<div class="container mt-3">
<?php

switch ($_REQUEST['acao']) {

    case 'cadastrar':
        // 1. Mudar variáveis de POST para 'livro' e 'gênero'
        $titulo           = $_POST['titulo_livro'];
        $autor            = $_POST['autor_livro'];
        $isbn             = $_POST['isbn_livro'];
        $ano_publicacao   = $_POST['ano_publicacao'];
        $id_genero        = $_POST['genero_id_genero']; // FK para Gênero

        // 2. Mudar a tabela e os campos no comando INSERT
        $sql = "INSERT INTO livro (
                    titulo_livro,
                    autor_livro,
                    isbn_livro,
                    ano_publicacao,
                    genero_id_genero
                ) VALUES (
                    '{$titulo}',
                    '{$autor}',
                    '{$isbn}',
                    '{$ano_publicacao}',
                    {$id_genero}
                )";

        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>alert('Livro cadastrado com sucesso!')</script>";
        } else {
            // Pode falhar se o ISBN for duplicado ou o gênero_id não existir
            echo "<script>alert('Livro não cadastrado! Verifique o ISBN ou se o Gênero foi selecionado.')</script>"; 
        }
        // 3. Mudar o link de redirecionamento
        echo "<script>location.href='?page=listar-livro'</script>";
        break;

    case 'editar':
        // 1. Mudar variáveis de POST para 'livro' e 'gênero'
        $titulo           = $_POST['titulo_livro'];
        $autor            = $_POST['autor_livro'];
        $isbn             = $_POST['isbn_livro'];
        $ano_publicacao   = $_POST['ano_publicacao'];
        $id_genero        = $_POST['genero_id_genero']; 
        
        // 2. Mudar a variável ID
        $id_livro = $_POST['id_livro'];

        // 3. Mudar a tabela, os campos no comando UPDATE e a condição WHERE
        $sql = "UPDATE livro SET 
                    titulo_livro = '{$titulo}',
                    autor_livro = '{$autor}',
                    isbn_livro = '{$isbn}',
                    ano_publicacao = '{$ano_publicacao}',
                    genero_id_genero = {$id_genero}
                WHERE 
                    id_livro = {$id_livro}";

        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>alert('Livro editado com sucesso!')</script>";
        } else {
            echo "<script>alert('Não foi possível editar o Livro! Verifique o ISBN ou o Gênero.')</script>";
        }
        // 4. Mudar o link de redirecionamento
        echo "<script>location.href='?page=listar-livro'</script>";
        break;

    case 'excluir':
        // 1. Mudar a variável ID
        $id_livro = $_REQUEST['id_livro'];

        // 2. Mudar a tabela e a condição WHERE no comando DELETE
        $sql = "DELETE FROM livro WHERE id_livro = {$id_livro}";

        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>alert('Excluído com sucesso!')</script>";
        } else {
            // Em caso de erro, pode ser uma chave estrangeira (se o livro estiver em um empréstimo ativo)
            echo "<script>alert('Não foi possível excluir o livro! Verifique se ele está em algum empréstimo.')</script>";
        }
        // 3. Mudar o link de redirecionamento
        echo "<script>location.href='?page=listar-livro'</script>";
        break;
}
?>
</div>