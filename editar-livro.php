<div class="container mt-3">
<h1>Editar Livro</h1>
<?php
    // 1. Mudar o ID para buscar o LIVRO
    $id_livro = (int) $_REQUEST['id_livro']; 

    // 2. Mudar a tabela na consulta SQL para 'livro'
    $sql = "SELECT * FROM livro WHERE id_livro = ?"; 
    $stmt = $conn->prepare($sql); 
    
    // 3. Mudar o parâmetro de ligação (bind)
    $stmt->bind_param("i", $id_livro); 
    
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->fetch_object(); 
?>
<form action="?page=salvar-livro" method="POST">
    <input type="hidden" name="acao" value="editar">
    
    <input type="hidden" name="id_livro" value="<?php print $row->id_livro;?>">
    
    <div class="mb-3">
        <label for="nome" class="form-label">Título do Livro</label>
        <input type="text" name="titulo_livro" id="nome" class="form-control" value="<?php print $row->titulo_livro;?>">
    </div>

    <div class="mb-3">
        <label for="autor" class="form-label">Autor</label>
        <input type="text" name="autor_livro" id="autor" class="form-control" value="<?php print $row->autor_livro;?>">
    </div>

    <div class="mb-3">
        <label for="isbn" class="form-label">ISBN</label>
        <input type="text" name="isbn_livro" id="isbn" class="form-control" value="<?php print $row->isbn_livro;?>">
    </div>

    <div class="mb-3">
        <label for="ano_pub" class="form-label">Ano de Publicação</label>
        <input type="text" name="ano_publicacao" id="ano_pub" class="form-control" value="<?php print $row->ano_publicacao;?>">
    </div>

    <div class="mb-3">
        <label for="genero_id_genero" class="form-label">Gênero Literário</label>
        <select name="genero_id_genero" id="genero_id_genero" class="form-control">
            <option>SELECIONE</option>
            <?php
            // 6. Mudar a consulta para buscar GÊNEROS (tabela genero_literario)
            $sql_1 = "SELECT * FROM genero_literario ORDER BY nome_genero ASC"; 
            $res_1 = $conn->query($sql_1);
            $qtd_1 = $res_1->num_rows;

            if ($qtd_1 > 0) {
                while ($row_1 = $res_1->fetch_object()) {
                    // 7. Mudar as colunas e a comparação de ID
                    if ($row->genero_id_genero == $row_1->id_genero) { 
                        print "<option value='{$row_1->id_genero}' selected>{$row_1->nome_genero}</option>";
                    } else {
                        print "<option value='{$row_1->id_genero}'>{$row_1->nome_genero}</option>";
                    }
                }
            } else {
                print "<option disabled>Não há gêneros cadastrados</option>";
            }
            ?>
        </select>
        </div>
    
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>
</div>