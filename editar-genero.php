<div class="container mt-3">
<h1>Editar Gênero Literário</h1>
<?php
    // 1. Mudar a tabela e a coluna na consulta SQL
    $sql = "SELECT * FROM genero_literario WHERE id_genero=".$_REQUEST['id_genero']; // Seleciona dados do gênero pelo ID recebido
    
    $res = $conn->query($sql); // constante que armazena o resultado da conexão com o banco de dados
    $row = $res->fetch_object(); // Pega o resultado e transforma em objeto
?>
<form action="?page=salvar-genero" method="POST">
    <input type="hidden" name="acao" value="editar">
    
    <input type="hidden" name="id_genero" value="<?php print $row->id_genero;?>">
    
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Gênero</label>
        <input type="text" name="nome_genero" id="nome" class="form-control" value="<?php print $row->nome_genero;?>">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </div>
</form>
</div>