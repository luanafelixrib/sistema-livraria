<div class="container mt-3">
<h1 class="text-center">Cadastrar Empréstimo</h1>

<?php
// O $conn DEVE estar disponível neste escopo para as consultas funcionarem.

    // 1. USUÁRIOS (Antes Clientes)
    $sql_usuarios = "SELECT id_usuario, nome_usuario FROM usuario ORDER BY nome_usuario ASC"; 
    $res_usuarios = $conn->query($sql_usuarios); 

    // 2. LIVROS (Antes Modelos)
    $sql_livros = "SELECT id_livro, titulo_livro, autor_livro FROM livro ORDER BY titulo_livro ASC"; 
    $res_livros = $conn->query($sql_livros); 

    // 3. BIBLIOTECÁRIOS (Antes Funcionários)
    $sql_bibliotecarios = "SELECT id_bibliotecario, nome_bibliotecario FROM bibliotecario ORDER BY nome_bibliotecario ASC"; 
    $res_bibliotecarios = $conn->query($sql_bibliotecarios); 
?>

<form action="?page=salvar-emprestimo" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    
    <div class="mb-3">
        <label>Data do Empréstimo</label>
        <input type="date" name="data_emprestimo" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label>Devolução Prevista</label>
        <input type="date" name="data_devolucao_prevista" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Usuário (Leitor)</label>
        <select name="usuario_id_usuario" class="form-select" required>
            <option value=""> Selecione um Usuário </option>
            <?php
                while( $row_usuario = $res_usuarios->fetch_object() ){
                    print "<option value='{$row_usuario->id_usuario}'>";
                    print $row_usuario->nome_usuario;
                    print "</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Livro</label>
        <select name="livro_id_livro" class="form-select" required>
            <option value=""> Selecione um Livro </option>
            <?php
                while( $row_livro = $res_livros->fetch_object() ){
                    print "<option value='{$row_livro->id_livro}'>";
                    // Exibe o título e o autor para facilitar a identificação
                    print $row_livro->titulo_livro . " (" . $row_livro->autor_livro . ")"; 
                    print "</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Bibliotecário</label>
        <select name="bibliotecario_id_bibliotecario" class="form-select" required>
            <option value=""> Selecione um Bibliotecário </option>
            <?php
                while( $row_bibliotecario = $res_bibliotecarios->fetch_object() ){
                    print "<option value='{$row_bibliotecario->id_bibliotecario}'>";
                    print $row_bibliotecario->nome_bibliotecario;
                    print "</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Registrar Empréstimo</button>
    </div>
</form>
</div>