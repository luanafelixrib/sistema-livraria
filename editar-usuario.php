<div class="container mt-3">
<h1>Editar Usuário</h1>
<?php
    // 1. Mudar a tabela e a coluna na consulta SQL
    $sql = "SELECT * FROM usuario WHERE id_usuario=".$_REQUEST['id_usuario']; // Seleciona dados do usuário pelo ID recebido
    
    $res = $conn->query($sql); // constante que armazena o resultado da conexão com o banco de dados
    $row = $res->fetch_object(); // Pega o resultado e transforma em objeto
?>
<form action="?page=salvar-usuario" method="POST">
    <input type="hidden" name="acao" value="editar">
    
    <input type="hidden" name="id_usuario" value="<?php print $row->id_usuario;?>">
    
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome_usuario" id="nome" class="form-control" value="<?php print $row->nome_usuario;?>">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email_usuario" id="email" class="form-control" value="<?php print $row->email_usuario;?>">
    </div>
    <div class="mb-3">
        <label for="cpf" class="form-label">CPF</label>
        <input type="text" name="cpf_usuario" id="cpf" class="form-control" value="<?php print $row->cpf_usuario;?>">
    </div>
    <div class="mb-3">
        <label for="data" class="form-label">Data de Nascimento</label>
        <input type="date" name="dt_nasc_usuario" id="data" class="form-control" value="<?php print $row->dt_nasc_usuario;?>">
    </div>
    <div class="mb-3">
        <label for="fone" class="form-label">Telefone</label>
        <input type="text" name="fone_usuario" id="fone" class="form-control" value="<?php print $row->fone_usuario;?>">
    </div>
    <div class="mb-3">
        <label for="endereco" class="form-label">Endereço</label>
        <input type="text" name="endereco_usuario" id="endereco" class="form-control" value="<?php print $row->endereco_usuario;?>">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </div>
</form>
</div>