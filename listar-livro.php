<div class="container mt-4">
<h1 class="text-center">Listar Livros</h1>
<?php // Pede ao banco de dados para selecionar todas as colunas da tabela livro (l.*)
    $sql = "SELECT l.*, g.nome_genero, l.autor_livro
            FROM livro AS l
            JOIN genero_literario AS g ON l.genero_id_genero = g.id_genero"; // Une a tabela genero_literario à tabela livro

    $res = $conn->query($sql);  // Executa a consulta SQL no banco de dados

    $qtd = $res->num_rows; // Obtém a quantidade de resultados

    if ($qtd > 0) {
        print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Título</th>"; // Nome do Modelo vira Título
        print "<th>Autor</th>"; // Nova coluna (Antes Placa)
        print "<th>Gênero</th>"; // Marca vira Gênero
        print "<th>ISBN</th>"; // Cor vira ISBN
        print "<th>Ano Pub.</th>"; // Ano vira Ano de Publicação
        print "<th>Ações</th>";
        print "</tr>";

        while ($row = $res->fetch_object()) { // Loop para cada livro
            print "<tr>";
            // 1. Mudar os nomes das colunas (atributos) e o ID
            print "<td>{$row->id_livro}</td>";
            print "<td>{$row->titulo_livro}</td>"; // Nome
            print "<td>{$row->autor_livro}</td>"; // Placa
            print "<td>{$row->nome_genero}</td>"; // Marca
            print "<td>{$row->isbn_livro}</td>"; // Cor
            print "<td>{$row->ano_publicacao}</td>"; // Ano

            // 2. Mudar os links e IDs nas ações (Editar e Excluir)
            print "<td>
                        <button class='btn btn-success' onclick=\"location.href='?page=editar-livro&id_livro={$row->id_livro}';\">Editar</button>
                        <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-livro&acao=excluir&id_livro={$row->id_livro}';}else{false;}\">Excluir</button>
                    </td>";
            
            print "</tr>";
        }
        print "</table>";
    } else {
        print "<p class='alert alert-info'>Não encontrei resultados.</p>";
    }
?>
</div>