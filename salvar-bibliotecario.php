<div class="container mt-3">
<?php
switch ($_REQUEST['acao']) {

    case 'cadastrar':
        // 1. Mudar as variáveis de POST para 'bibliotecario'
        $nome  = $_POST['nome_bibliotecario'];
        $cpf   = $_POST['cpf_bibliotecario'];
        $email = $_POST['email_bibliotecario'];
        $fone  = $_POST['fone_bibliotecario'];

        // 2. Mudar a tabela e os campos no comando INSERT
        $sql = "INSERT INTO bibliotecario (
                    nome_bibliotecario,
                    cpf_bibliotecario,
                    email_bibliotecario,
                    fone_bibliotecario
                ) VALUES (
                    '{$nome}',
                    '{$cpf}',
                    '{$email}',
                    '{$fone}'
                )";

        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>alert('Bibliotecário cadastrado com sucesso!')</script>";
        } else {
            echo "<script>alert('Bibliotecário não cadastrado! Verifique o CPF, pois deve ser único.')</script>"; // Adicionado alerta de CPF único
        }
        // 3. Mudar o link de redirecionamento
        echo "<script>location.href='?page=listar-bibliotecario'</script>";
    break;

    case 'editar':
        // 1. Mudar as variáveis de POST
        $nome   = $_POST['nome_bibliotecario'];
        $cpf    = $_POST['cpf_bibliotecario'];
        $email  = $_POST['email_bibliotecario'];
        $fone   = $_POST['fone_bibliotecario'];
        
        // 2. Mudar a variável ID
        $id_bibliotecario = $_POST['id_bibliotecario']; 

        // 3. Mudar a tabela, os campos no comando UPDATE e a condição WHERE
        $sql = "UPDATE bibliotecario SET 
                    nome_bibliotecario = '{$nome}', 
                    cpf_bibliotecario = '{$cpf}', 
                    email_bibliotecario = '{$email}', 
                    fone_bibliotecario = '{$fone}' 
                WHERE 
                    id_bibliotecario = {$id_bibliotecario}";
        
        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>alert('Bibliotecário editado com sucesso!')</script>";
        } else {
            echo "<script>alert('Não foi possível editar o Bibliotecário! Verifique o CPF, pois deve ser único.')</script>";
        }
        // 4. Mudar o link de redirecionamento
        echo "<script>location.href='?page=listar-bibliotecario'</script>"; 
        
        break;

    case 'excluir':
        // 1. Mudar a variável ID
        $id_bibliotecario = $_REQUEST['id_bibliotecario'];

        // 2. Mudar a tabela e a condição WHERE no comando DELETE
        $sql = "DELETE FROM bibliotecario WHERE id_bibliotecario = {$id_bibliotecario}";

        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>alert('Excluído com sucesso!')</script>";
        } else {
            // Em caso de erro, pode ser uma chave estrangeira (se o bibliotecário tiver empréstimos)
            echo "<script>alert('Não foi possível excluir o bibliotecário. Verifique se ele está associado a algum empréstimo.')</script>";
        }
        // 3. Mudar o link de redirecionamento
        echo "<script>location.href='?page=listar-bibliotecario'</script>";
        break;
}
?>
</div>