<div class="container mt-4">
<h1 class="text-center">Listar Empréstimos</h1>
<?php // Seleciona todas as colunas da tabela emprestimo (e.*) e une com as tabelas de referência
    $sql = "SELECT e.*, 
                    u.nome_usuario, 
                    l.titulo_livro, 
                    b.nome_bibliotecario 
            FROM emprestimo AS e
            JOIN usuario AS u ON e.usuario_id_usuario = u.id_usuario
            JOIN livro AS l ON e.livro_id_livro = l.id_livro
            JOIN bibliotecario AS b ON e.bibliotecario_id_bibliotecario = b.id_bibliotecario"; // Faz com que ao inves de aparecer os ID's, apareça o nome para o usuário

    $res = $conn->query($sql); // Executa a consulta SQL no banco de dados

    $qtd = $res->num_rows; // Obtém a quantidade de resultados
    
    if ($qtd > 0) {
        print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>ID</th>";
        print "<th>Data Empréstimo</th>";
        print "<th>Devolução Prevista</th>"; // Substitui Valor
        print "<th>Devolução Real</th>"; // Novo campo importante
        print "<th>Usuário</th>"; // Substitui Cliente
        print "<th>Livro</th>"; // Substitui Modelo
        print "<th>Bibliotecário</th>"; // Substitui Funcionário
        print "<th>Ações</th>";
        print "</tr>";

        while ($row = $res->fetch_object()) { // Loop para cada empréstimo
            print "<tr>";
            print "<td>{$row->id_emprestimo}</td>"; 
            print "<td>{$row->data_emprestimo}</td>"; 
            print "<td>{$row->data_devolucao_prevista}</td>"; // Coluna adaptada
            print "<td>". ($row->data_devolucao_real ?? 'Pendente') ."</td>"; // Exibe "Pendente" se for nulo
            print "<td>{$row->nome_usuario}</td>"; // Coluna adaptada
            print "<td>{$row->titulo_livro}</td>"; // Coluna adaptada
            print "<td>{$row->nome_bibliotecario}</td>"; // Coluna adaptada

            // Mudar os IDs e links nas ações (Editar e Excluir)
            print "<td>
                        <button class='btn btn-success' onclick=\"location.href='?page=editar-emprestimo&id_emprestimo={$row->id_emprestimo}';\">Editar</button>
                        <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-emprestimo&acao=excluir&id_emprestimo={$row->id_emprestimo}';}else{false;}\">Excluir</button>
                    </td>";
            
            print "</tr>";
        }
        print "</table>";
    } else {
        print "<p class='alert alert-info'>Não encontrei resultados.</p>";
    }
?>
</div>