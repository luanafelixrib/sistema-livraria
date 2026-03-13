<div class="container mt-3">
    <h1>Editar Bibliotecário</h1>
    
    <?php
        // 1. Mudar a tabela e a coluna na consulta SQL
        $sql = "SELECT * FROM bibliotecario WHERE id_bibliotecario=".$_REQUEST['id_bibliotecario']; // Seleciona os dados do bibliotecário pelo ID recebido
        
        $res = $conn->query($sql);
        $row = $res->fetch_object(); // Transforma o resultado da busca em um objeto
    ?>
    
    <form action="?page=salvar-bibliotecario" method="POST">
        <input type="hidden" name="acao" value="editar">
        
        <input type="hidden" name="id_bibliotecario" value="<?php print $row->id_bibliotecario;?>">
        
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome_bibliotecario" id="nome" class="form-control" value="<?php print $row->nome_bibliotecario;?>">
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email_bibliotecario" id="email" class="form-control" value="<?php print $row->email_bibliotecario;?>">
        </div>
        
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf_bibliotecario" id="cpf" class="form-control" value="<?php print $row->cpf_bibliotecario;?>">
        </div>
        
        <div class="mb-3">
            <label for="fone" class="form-label">Telefone</label>
            <input type="text" name="fone_bibliotecario" id="fone" class="form-control" value="<?php print $row->fone_bibliotecario;?>">
        </div>
        
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>