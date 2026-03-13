<div class="container mt-3">
<h1 class="text-center">Cadastrar Bibliotecário</h1>
<form action="?page=salvar-bibliotecario" method="POST">
    <input type="hidden" name="acao" value="cadastrar">  <!--Hidden faz com que o campo fique oculto-->
    
    <div class="mb-3">   <!--Cria o rotulo e o campo para adicionar as informações do bibliotecario-->
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome_bibliotecario" id="nome" class="form-control">
    </div>
    
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email_bibliotecario" id="email" class="form-control">
    </div>
    
    <div class="mb-3">
        <label for="cpf" class="form-label">CPF</label>
        <input type="text" name="cpf_bibliotecario" id="cpf" class="form-control">
    </div>
    
    <div class="mb-3">
        <label for="fone" class="form-label">Telefone</label>
        <input type="text" name="fone_bibliotecario" id="fone" class="form-control">
    </div>
    
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>
</div>