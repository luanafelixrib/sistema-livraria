<div class="container mt-3">
    <h1>Editar Empréstimo</h1>
    <?php
        // 1. Busca os dados do empréstimo atual (tabela 'emprestimo')
        $sql = "SELECT * FROM emprestimo WHERE id_emprestimo = " . $_REQUEST['id_emprestimo'];
        $res = $conn->query($sql);
        $row = $res->fetch_object();

        // 2. Busca as listas para os menus (dropdowns)
        $res_usuarios = $conn->query("SELECT id_usuario, nome_usuario FROM usuario ORDER BY nome_usuario ASC"); 
        $res_livros = $conn->query("SELECT id_livro, titulo_livro, autor_livro FROM livro ORDER BY titulo_livro ASC");
        $res_bibliotecarios = $conn->query("SELECT id_bibliotecario, nome_bibliotecario FROM bibliotecario ORDER BY nome_bibliotecario ASC");
    ?>

    <form action="?page=salvar-emprestimo" method="POST">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id_emprestimo" value="<?php print $row->id_emprestimo; ?>">

        <div class="mb-3">
            <label>Data do Empréstimo</label>
            <input type="date" name="data_emprestimo" value="<?php print $row->data_emprestimo; ?>" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label>Devolução Prevista</label>
            <input type="date" name="data_devolucao_prevista" value="<?php print $row->data_devolucao_prevista; ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Data da Devolução Real</label>
            <input type="date" name="data_devolucao_real" value="<?php print $row->data_devolucao_real; ?>" class="form-control">
            <small class="form-text text-muted">Deixe em branco se o livro ainda não foi devolvido.</small>
        </div>

        <div class="mb-3">
            <label>Usuário (Leitor)</label>
            <select name="usuario_id_usuario" class="form-control" required>
                <option value="">-- Selecione --</option>
                <?php
                    while($row_u = $res_usuarios->fetch_object()){ 
                        // Mudar nomes de colunas: id_cliente para id_usuario, nome_cliente para nome_usuario
                        // e cliente_id_cliente para usuario_id_usuario
                        $selected = ($row_u->id_usuario == $row->usuario_id_usuario) ? 'selected' : '';
                        print "<option value='{$row_u->id_usuario}' {$selected}>{$row_u->nome_usuario}</option>";
                    }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Livro</label>
            <select name="livro_id_livro" class="form-control" required>
                <option value="">-- Selecione --</option>
                <?php
                    while($row_l = $res_livros->fetch_object()){
                        // Mudar nomes de colunas: id_modelo para id_livro, nome_modelo para titulo_livro
                        // e modelo_id_modelo para livro_id_livro
                        $selected = ($row_l->id_livro == $row->livro_id_livro) ? 'selected' : '';
                        $livro_info = $row_l->titulo_livro . " (" . $row_l->autor_livro . ")";
                        print "<option value='{$row_l->id_livro}' {$selected}>{$livro_info}</option>";
                    }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Bibliotecário</label>
            <select name="bibliotecario_id_bibliotecario" class="form-control" required>
                <option value="">-- Selecione --</option>
                <?php
                    while($row_b = $res_bibliotecarios->fetch_object()){
                        // Mudar nomes de colunas: id_funcionario para id_bibliotecario, nome_funcionario para nome_bibliotecario
                        // e funcionario_id_funcionario para bibliotecario_id_bibliotecario
                        $selected = ($row_b->id_bibliotecario == $row->bibliotecario_id_bibliotecario) ? 'selected' : '';
                        print "<option value='{$row_b->id_bibliotecario}' {$selected}>{$row_b->nome_bibliotecario}</option>";
                    }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Salvar Alterações</button>
        </div>
    </form>
</div>