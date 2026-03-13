<div class="container mt-3">
    <h1 class="text-center">Cadastrar Gênero Literário</h1>
    
    <div class="container mt-4">
        <h1>Cadastro de Gênero</h1>
        
        <form action="?page=salvar-genero" method="POST">
            <input type="hidden" name="acao" value="cadastrar">
            
            <div class="mb-3">
                <label>Nome do Gênero</label>
                <input type="text" name="nome_genero" class="form-control">
            </div>
            
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
</div>