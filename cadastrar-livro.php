<div class="container mt-3">
    <h1 class="text-center">Cadastrar Livro</h1>
    
    <form action="?page=salvar-livro" method="POST">
        <input type="hidden" name="acao" value="cadastrar">
        
        <div class="mb-3">
            <label>Título do Livro</label>
            <input type="text" name="titulo_livro" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label>Autor</label>
            <input type="text" name="autor_livro" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label>ISBN</label>
            <input type="text" name="isbn_livro" class="form-control">
        </div>
        
        <div class="mb-3">
            <label>Ano de Publicação</label>
            <input type="number" name="ano_publicacao" class="form-control">
        </div>
        
        <div class="mb-3">
            <label>Gênero Literário</label>
            <select name="genero_id_genero" class="form-control" required>
                <option value="">Selecione um Gênero</option>
                <?php
                    // 1. Mudar a consulta para buscar GÊNEROS (tabela genero_literario)
                    $sql = "SELECT * FROM genero_literario ORDER BY nome_genero ASC";
                    $res = $conn->query($sql);
                    $qtd = $res->num_rows;
                    
                    if ($qtd > 0) {
                        while ($row = $res->fetch_object()) {
                            // 2. Mudar os nomes das colunas: id_marca para id_genero, nome_marca para nome_genero
                            print "<option value='{$row->id_genero}'>{$row->nome_genero}</option>";
                        }
                    } else {
                        print "<option disabled>Cadastre um gênero primeiro</option>";
                    }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Salvar Livro</button>
        </div>
    </form>
</div>