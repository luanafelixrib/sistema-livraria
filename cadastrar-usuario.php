<div class="container mt-3">
<h1 class="text-center">Cadastrar Usuário</h1>
<form action="?page=salvar-usuario" method="POST">  <input type="hidden" name="acao" value="cadastrar">
 
 <div class="mb-3">
  <label for="nome" class="form-label">Nome</label>
    <input type="text" name="nome_usuario" id="nome" class="form-control">
 </div>
 
 <div class="mb-3">
  <label for="email" class="form-label">Email</label>
    <input type="email" name="email_usuario" id="email" class="form-control">
 </div>
 
 <div class="mb-3">
  <label for="cpf" class="form-label">CPF</label>
    <input type="text" name="cpf_usuario" id="cpf" class="form-control">
 </div>
 
 <div class="mb-3">
  <label for="data" class="form-label">Data de Nascimento</label>
    <input type="date" name="dt_nasc_usuario" id="data" class="form-control">
 </div>
 
 <div class="mb-3">
  <label for="fone" class="form-label">Telefone</label>
    <input type="text" name="fone_usuario" id="fone" class="form-control">
 </div>
 
 <div class="mb-3">
  <label for="endereco" class="form-label">Endereço</label>
    <input type="text" name="endereco_usuario" id="endereco" class="form-control">
 </div>
 
 <div class="mb-3">
  <button type="submit" class="btn btn-primary">Enviar</button>
 </div>
</form>
</div>