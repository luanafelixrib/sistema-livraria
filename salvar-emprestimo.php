<div class="container mt-3">
<h1>Salvar Empréstimo</h1>
<?php
// O print "<pre>" foi removido, pois é apenas para depuração.

switch ($_REQUEST['acao']) {

    case 'cadastrar':
        // 1. Mudar variáveis de POST e capturar a data de devolução prevista (substituindo valor_venda)
        $data_emprestimo          = $_POST['data_emprestimo'];
        $data_devolucao_prevista  = $_POST['data_devolucao_prevista']; // Novo campo
        $id_usuario               = $_POST['usuario_id_usuario']; 
        $id_livro                 = $_POST['livro_id_livro'];
        $id_bibliotecario         = $_POST['bibliotecario_id_bibliotecario'];

        // 2. Mudar a tabela e os campos no comando INSERT
        $sql = "INSERT INTO emprestimo (
                    data_emprestimo,
                    data_devolucao_prevista,
                    usuario_id_usuario,
                    livro_id_livro,
                    bibliotecario_id_bibliotecario
                ) VALUES (
                    '{$data_emprestimo}',
                    '{$data_devolucao_prevista}',
                    '{$id_usuario}', 
                    '{$id_livro}',
                    '{$id_bibliotecario}'
                )";

        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>
                        alert('Empréstimo registrado com sucesso!');
                        location.href='?page=listar-emprestimo';
                      </script>";
        } else {
            echo "<script>
                        alert('Não foi possível registrar o empréstimo!');
                        location.href='?page=listar-emprestimo';
                      </script>";
        }
        break;

    case 'editar':
        // 1. Mudar variáveis de POST e adicionar data_devolucao_real
        $data_emprestimo          = $_POST['data_emprestimo'];
        $data_devolucao_prevista  = $_POST['data_devolucao_prevista']; 
        // A data real pode vir nula/vazia do formulário de edição
        $data_devolucao_real      = !empty($_POST['data_devolucao_real']) ? "'{$_POST['data_devolucao_real']}'" : 'NULL'; 

        $id_usuario               = $_POST['usuario_id_usuario'];
        $id_livro                 = $_POST['livro_id_livro'];
        $id_bibliotecario         = $_POST['bibliotecario_id_bibliotecario'];
        
        // 2. Mudar a variável ID
        $id_emprestimo = $_POST['id_emprestimo']; 

        // 3. Mudar a tabela, os campos no comando UPDATE e a condição WHERE
        $sql = "UPDATE emprestimo SET 
                    data_emprestimo = '{$data_emprestimo}', 
                    data_devolucao_prevista = '{$data_devolucao_prevista}', 
                    data_devolucao_real = {$data_devolucao_real},
                    usuario_id_usuario = '{$id_usuario}', 
                    livro_id_livro = '{$id_livro}', 
                    bibliotecario_id_bibliotecario = '{$id_bibliotecario}' 
                WHERE 
                    id_emprestimo = {$id_emprestimo}";
        
        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>
                        alert('Empréstimo editado com sucesso!');
                        location.href='?page=listar-emprestimo';
                      </script>";
        } else {
            echo "<script>
                        alert('Não foi possível editar o empréstimo!');
                        location.href='?page=listar-emprestimo';
                      </script>";
        }
        break;

    case 'excluir':
        // 1. Mudar a variável ID
        $id_emprestimo = $_REQUEST['id_emprestimo'];

        // 2. Mudar a tabela e a condição WHERE no comando DELETE
        $sql = "DELETE FROM emprestimo WHERE id_emprestimo = {$id_emprestimo}";

        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>
                        alert('Excluído com sucesso!');
                        location.href='?page=listar-emprestimo';
                      </script>";
        } else {
            echo "<script>
                        alert('Não foi possível concluir a exclusão!');
                        location.href='?page=listar-emprestimo';
                      </script>";
        }
        break;
}
?>
</div>