<div class="container mt-4">
<h1 class="text-center">Listar Bibliotecários</h1>
<?php
    // 1. Mudar a consulta SQL para a tabela 'bibliotecario'
    $sql = "SELECT * FROM bibliotecario";

    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if($qtd > 0){
        print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>ID</th>";
        print "<th>Nome</th>";
        print "<th>Email</th>";
        print "<th>CPF</th>";
        print "<th>Telefone</th>"; 
        print "<th>Ações</th>"; 
        print "</tr>";
        
        while($row = $res->fetch_object()){
            print "<tr>";
            // 2. Mudar os nomes das colunas (atributos)
            print "<td>".$row->id_bibliotecario."</td>"; 
            print "<td>".$row->nome_bibliotecario."</td>"; 
            print "<td>".$row->email_bibliotecario."</td>"; 
            print "<td>".$row->cpf_bibliotecario."</td>"; 
            print "<td>".$row->fone_bibliotecario."</td>";
            
            // 3. Mudar os links e IDs nas ações (Editar e Excluir)
            print "<td>
                        <button class='btn btn-success' onclick=\"location.href='?page=editar-bibliotecario&id_bibliotecario={$row->id_bibliotecario}';\">Editar</button>
                        <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-bibliotecario&acao=excluir&id_bibliotecario={$row->id_bibliotecario}';}\">Excluir</button>
                    </td>";
            print "</tr>";

        }
        
        print "</table>";
        
    } else {
        print "<p class='alert alert-danger'>Não encontrou nenhum resultado!</p>";
    }
    
    ?>
</div>