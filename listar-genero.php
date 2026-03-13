<div class="container mt-4">
<h1 class="text-center">Listar Gêneros Literários</h1>
<?php
    // 1. Mudar a consulta SQL para a tabela 'genero_literario'
    $sql = "SELECT * FROM genero_literario ORDER BY nome_genero ASC";
    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if ($qtd > 0) {
        print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";

        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Gênero</th>"; // Mudar o cabeçalho da coluna
        print "<th>Ações</th>";
        print "</tr>"; 

        while ($row = $res->fetch_object()) {
            print "<tr>";
            // 2. Mudar os nomes das colunas (atributos)
            print "<td>{$row->id_genero}</td>";
            print "<td>{$row->nome_genero}</td>"; // Mudar o nome da coluna
            
            // 3. Mudar os links e IDs nas ações (Editar e Excluir)
            print "<td>
                        <button class='btn btn-success' onclick=\"location.href='?page=editar-genero&id_genero={$row->id_genero}';\">Editar</button>
                        <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-genero&acao=excluir&id_genero={$row->id_genero}';}else{false;}\">Excluir</button>
                    </td>";
            
            print "</tr>"; 
        }
        print "</table>";
    } else {
        print "<p class='alert alert-info'>Não encontrei resultados.</p>";
    }
?>
</div>