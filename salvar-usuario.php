<div class="container mt-3">
<h1>Salvar Usuário</h1>
<?php
switch ($_REQUEST['acao']) {

    case 'cadastrar':
        // 1. Mudar variáveis de POST para 'usuario'
        $nome     = $_POST['nome_usuario'];
        $cpf      = $_POST['cpf_usuario'];
        $data     = $_POST['dt_nasc_usuario'];
        $email    = $_POST['email_usuario'];
        $fone     = $_POST['fone_usuario'];
        $endereco = $_POST['endereco_usuario'];

        // 2. Mudar a tabela e os campos no comando INSERT
        $sql = "INSERT INTO usuario (
                    nome_usuario,
                    cpf_usuario,
                    dt_nasc_usuario,
                    email_usuario,
                    fone_usuario,
                    endereco_usuario
                ) VALUES (
                    '{$nome}',
                    '{$cpf}',
                    '{$data}',
                    '{$email}',
                    '{$fone}',
                    '{$endereco}'
                )";

        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>
                        alert('Usuário cadastrado com sucesso!');
                        location.href='?page=listar-usuario';
                      </script>";
        } else {
            echo "<script>
                        alert('Não foi possível cadastrar o usuário. Verifique se o CPF já está cadastrado.');
                        location.href='?page=listar-usuario';
                      </script>";
        }
        break;

    case 'editar':
        // 1. Mudar variáveis de POST e a variável ID
        $nome     = $_POST['nome_usuario'];
        $cpf      = $_POST['cpf_usuario'];
        $data     = $_POST['dt_nasc_usuario'];
        $email    = $_POST['email_usuario'];
        $fone     = $_POST['fone_usuario'];
        $endereco = $_POST['endereco_usuario'];
        $id_usuario = $_POST['id_usuario']; 

        // 2. Mudar a tabela, os campos no comando UPDATE e a condição WHERE
        $sql = "UPDATE usuario SET 
                    nome_usuario = '{$nome}', 
                    cpf_usuario = '{$cpf}', 
                    dt_nasc_usuario = '{$data}',
                    email_usuario = '{$email}', 
                    fone_usuario = '{$fone}',
                    endereco_usuario= '{$endereco}' 
                WHERE 
                    id_usuario = {$id_usuario}";
        
        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>
                        alert('Usuário editado com sucesso!');
                        location.href='?page=listar-usuario';
                      </script>";
        } else {
            echo "<script>
                        alert('Não foi possível editar o usuário. Verifique se o novo CPF já está cadastrado.');
                        location.href='?page=listar-usuario';
                      </script>";
        }
        
        break;

    case 'excluir':
        // 1. Mudar a variável ID
        $id_usuario = $_REQUEST['id_usuario'];

        // 2. Mudar a tabela e a condição WHERE no comando DELETE
        $sql = "DELETE FROM usuario WHERE id_usuario = {$id_usuario}";

        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>
                        alert('Excluído com sucesso!');
                        location.href='?page=listar-usuario';
                      </script>";
        } else {
            // Se o usuário tiver empréstimos ativos, o banco de dados pode impedir a exclusão.
            echo "<script>
                        alert('Não foi possível excluir o usuário. Verifique se ele possui empréstimos registrados.');
                        location.href='?page=listar-usuario';
                      </script>";
        }
        break;
}
?>
</div>