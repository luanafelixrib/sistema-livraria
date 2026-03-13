<h1>Editar Venda</h1>
<?php
    // Busca os dados da venda atual
    $sql = "SELECT * FROM venda WHERE id_venda = " . $_REQUEST['id_venda'];
    $res = $conn->query($sql);
    $row = $res->fetch_object();

    // Busca as listas para os menus (dropdowns)
    $res_clientes = $conn->query("SELECT * FROM cliente ORDER BY nome_cliente ASC"); //Realiza uma consulta separada para obter todos os clientes cadastrados. O resultado é armazenado em $res_clientes
    $res_modelos  = $conn->query("SELECT * FROM modelo ORDER BY nome_modelo ASC"); //Realiza uma consulta separada para obter todos os modelos cadastrados. O resultado é armazenado em $res_modelos
    $res_funcionarios = $conn->query("SELECT * FROM funcionario ORDER BY nome_funcionario ASC"); //Realiza uma consulta separada para obter todos os funcionarios cadastrados. O resultado é armazenado em $res_clientes
?>

<form action="?page=salvar-venda" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_venda" value="<?php print $row->id_venda; ?>">

    <div class="mb-3">
        <label>Data da Venda</label>
        <input type="date" name="data_venda" value="<?php print $row->data_venda; ?>" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label>Valor da Venda</label>
        <input type="text" name="valor_venda" value="<?php print $row->valor_venda; ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Cliente</label>
        <select name="cliente_id_cliente" class="form-control" required>
            <option value="">-- Selecione --</option>
            <?php
                while($row_c = $res_clientes->fetch_object()){ 
                    if($row_c->id_cliente == $row->cliente_id_cliente){ //Compara se o ID atual é igaul ao ID salvo
                        print "<option value='{$row_c->id_cliente}' selected>{$row_c->nome_cliente}</option>";
                    } else { // Se sim,o nome do cliente já é impresso
                        print "<option value='{$row_c->id_cliente}'>{$row_c->nome_cliente}</option>";// Caso não,o usuário escolhe qual 
                    }
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Modelo</label>
        <select name="modelo_id_modelo" class="form-control" required>
            <option value="">-- Selecione --</option>
            <?php
                while($row_m = $res_modelos->fetch_object()){
                    if($row_m->id_modelo == $row->modelo_id_modelo){ //Compara se o ID atual é igaul ao ID salvo
                        print "<option value='{$row_m->id_modelo}' selected>{$row_m->nome_modelo}</option>"; // Se sim,o nome do modelo já é impresso
                    } else {
                        print "<option value='{$row_m->id_modelo}'>{$row_m->nome_modelo}</option>"; // Caso não,o usuário escolhe qual 
                    }
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Funcionário</label>
        <select name="funcionario_id_funcionario" class="form-control" required>
            <option value="">-- Selecione --</option>
            <?php
                while($row_f = $res_funcionarios->fetch_object()){
                    if($row_f->id_funcionario == $row->funcionario_id_funcionario){ //Compara se o ID atual é igaul ao ID salvo
                        print "<option value='{$row_f->id_funcionario}' selected>{$row_f->nome_funcionario}</option>"; // Se sim,o nome do funcionario já é impresso
                    } else {
                        print "<option value='{$row_f->id_funcionario}'>{$row_f->nome_funcionario}</option>"; // Caso não,o usuário escolhe qual 
                    }
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">Salvar Alterações</button>
    </div>
</form>