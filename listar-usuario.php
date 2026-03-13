<div class="container mt-4">
<h1 class="text-center">Listar Usuários</h1>
<?php
    // 1. Mudar a consulta SQL para a tabela 'usuario'
    $sql = "SELECT * FROM usuario"; 

    $res = $conn->query($sql); // Executa a consulta SQL no banco de dados

    $qtd = $res->num_rows; // Obtém a quantidade de resultados

    if($qtd > 0){
        print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>ID</th>";
        print "<th>Nome</th>";
        print "<th>Email</th>";
        print "<th>Data de Nascimento</th>";
        print "<th>CPF</th>"; // Ordem ajustada para CPF e Telefone (como na sua tabela SQL)
        print "<th>Telefone</th>"; 
        print "<th>Endereço</th>"; 
        print "<th>Ações</th>"; 
        print "</tr>";
        
        while($row = $res->fetch_object()){ // Loop para cada usuário
            print "<tr>";
            // 2. Mudar os nomes das colunas (atributos) e o ID
            print "<td>".$row->id_usuario."</td>"; 
            print "<td>".$row->nome_usuario."</td>"; 
            print "<td>".$row->email_usuario."</td>"; 
            print "<td>".$row->dt_nasc_usuario."</td>"; 
            print "<td>".$row->cpf_usuario."</td>"; // Mudar o nome da coluna
            print "<td>".$row->fone_usuario."</td>"; // Mudar o nome da coluna
            print "<td>".$row->endereco_usuario."</td>"; // Mudar o nome da coluna
            
            // 3. Mudar os links e IDs nas ações (Editar e Excluir)
            print "<td>
                        <button class='btn btn-success' onclick=\"location.href='?page=editar-usuario&id_usuario={$row->id_usuario}';\">Editar</button>
                        <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-usuario&acao=excluir&id_usuario={$row->id_usuario}';}\">Excluir</button>
                    </td>";
            print "</tr>";
        }
        
        print "</table>";
        
    } else {
        print "<p class='alert alert-danger'>Não encontrou nenhum resultado!</p>";
    }
    
    ?>
</div>