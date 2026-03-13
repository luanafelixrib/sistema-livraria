<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliotech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Beau+Rivage&family=Luxurious+Roman&family=Quantico:ital,wght@0,400;0,700;1,400;1,700&family=Sail&display=swap" rel="stylesheet">
    
    <style>
        /* --- ESTILOS DE FONTE --- */
        .logo-text { font-family: "Quantico", sans-serif; font-weight: 400; }
        .quantico-bold { font-family: "Quantico", sans-serif; font-weight: 700; }
        
        /* --- ESTILOS NAV AZUL MARINHO E DOURADO --- */
        .bg-navy { background-color: #001f3f !important; }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #FFD700 !important; /* Dourado */
            transition: color 0.3s ease;
        }

        .navbar-custom .nav-link:hover,
        .navbar-custom .nav-link:focus {
            color: #fff4b3 !important;
        }

        .navbar-custom .navbar-toggler { border-color: #FFD700; }
        .navbar-custom .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 215, 0, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        
        .dropdown-menu { border: 1px solid #FFD700; }
        
        /* Ajuste para o carrossel e cards */
        .carousel-item img { 
            object-fit: cover; 
            height: 999px !important; /* O !important obriga a diminuir */
            object-position: top; /* Mantém o foco no topo da imagem */
            width: 100%;
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg bg-navy navbar-custom" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
          <i class="fa-solid fa-book"></i> <span class="logo-text">Bibliotech</span> 
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Bibliotecários</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="?page=cadastrar-bibliotecario">Cadastrar</a></li>
                <li><a class="dropdown-item" href="?page=listar-bibliotecario">Listar</a></li>
              </ul>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Usuário</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="?page=cadastrar-usuario">Cadastrar</a></li>
                <li><a class="dropdown-item" href="?page=listar-usuario">Listar</a></li>
              </ul>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Gênero</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="?page=cadastrar-genero">Cadastrar</a></li>
                <li><a class="dropdown-item" href="?page=listar-genero">Listar</a></li>
              </ul>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Livro</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="?page=cadastrar-livro">Cadastrar</a></li>
                <li><a class="dropdown-item" href="?page=listar-livro">Listar</a></li>
              </ul>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Empréstimo</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="?page=cadastrar-emprestimo">Cadastrar</a></li>
                <li><a class="dropdown-item" href="?page=listar-emprestimo">Listar</a></li>
              </ul>
            </li>
          </ul>
          
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search"/>
            <button class="btn btn-outline-warning" style="color: #FFD700; border-color: #FFD700;" type="submit">Buscar</button>
          </form>
        </div>
      </div>
    </nav>

    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <?php
                // Conexão com o banco
                include('config.php'); 
                
                // Lógica de Navegação (Switch)
                switch (@$_REQUEST["page"]) {
                    
                    // --- BIBLIOTECÁRIOS ---
                    case 'cadastrar-bibliotecario':
                        include("cadastrar-bibliotecario.php");
                        break;
                    case 'listar-bibliotecario':
                        include("listar-bibliotecario.php");
                        break;
                    case 'editar-bibliotecario':
                        include("editar-bibliotecario.php");
                        break;
                    case 'salvar-bibliotecario':
                        include("salvar-bibliotecario.php");
                        break;

                    // --- USUÁRIOS ---
                    case 'cadastrar-usuario':
                        include("cadastrar-usuario.php");
                        break;
                    case 'listar-usuario':
                        include("listar-usuario.php");
                        break;
                    case 'editar-usuario':
                        include("editar-usuario.php");
                        break;
                    case 'salvar-usuario':
                        include("salvar-usuario.php");
                        break;

                    // --- GÊNEROS ---
                    case 'cadastrar-genero':
                        include("cadastrar-genero.php");
                        break;
                    case 'listar-genero':
                        include("listar-genero.php");
                        break;
                    case 'editar-genero':
                        include("editar-genero.php");
                        break;
                    case 'salvar-genero':
                        include("salvar-genero.php");
                        break;

                    // --- LIVROS ---
                    case 'cadastrar-livro':
                        include("cadastrar-livro.php");
                        break;
                    case 'listar-livro':
                        include("listar-livro.php");
                        break;
                    case 'editar-livro':
                        include("editar-livro.php");
                        break;
                    case 'salvar-livro':
                        include("salvar-livro.php");
                        break;
                    
                    // --- EMPRÉSTIMOS ---
                    case 'cadastrar-emprestimo':
                        include("cadastrar-emprestimo.php");
                        break;
                    case 'listar-emprestimo':
                        include("listar-emprestimo.php");
                        break;
                    case 'salvar-emprestimo':
                        include("salvar-emprestimo.php");
                        break;

                    default:
                ?>
                    <div class="container mt-4">
                        <div class="text-center mb-5">
                            <h1 class="display-4 quantico-bold" style="color: #001f3f;">Bem-Vindo à Bibliotech</h1>
                            <p class="lead text-secondary">Gerencie livros, usuários e empréstimos de forma eficiente.</p>
                        </div>

                        <div class="row">
                            <div class="col-lg-8 mb-4">
                                <h3 class="mb-3 border-bottom border-warning pb-2" style="color: #001f3f;">Destaques do Acervo</h3>
                                <div id="carouselLivros" class="carousel slide shadow-sm rounded overflow-hidden" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselLivros" data-bs-slide-to="0" class="active"></button>
                                        <button type="button" data-bs-target="#carouselLivros" data-bs-slide-to="1"></button>
                                        <button type="button" data-bs-target="#carouselLivros" data-bs-slide-to="2"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="imagens/MA.jpg" class="d-block w-100" alt="Livro 1">
                                            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                                                <h5>Clássicos Imperdíveis</h5>
                                                <p>Redescubra as obras que marcaram gerações.</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="imagens/AV.jpg" class="d-block w-100" alt="Livro 2">
                                            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                                                <h5>Novas Aquisições</h5>
                                                <p>Confira os livros que acabaram de chegar.</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="imagens/MD.jpg" class="d-block w-100" alt="Livro 3">
                                            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                                                <h5>Universo Sci-Fi</h5>
                                                <p>Viaje para outros mundos com nossa coleção.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselLivros" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Anterior</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselLivros" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Próximo</span>
                                    </button>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <h3 class="mb-3 border-bottom border-warning pb-2" style="color: #001f3f;">Livro do Mês</h3>
                                
                                <div class="card h-100 border-0 shadow bg-navy text-white">
                                    <div class="card-body text-center">
                                        <h5 class="card-title text-warning mb-3 quantico-bold">O Pequeno Príncipe</h5>
                                        
                                        <img src="imagens/PP.jpg" class="img-fluid rounded mb-3 border border-warning" alt="Capa do Livro">
                                        
                                        <p class="card-text">"O essencial é invisível aos olhos. Só se vê bem com o coração."</p>
                                        
                                        <ul class="list-group list-group-flush rounded text-start mb-3">
                                            <li class="list-group-item bg-transparent text-white border-secondary"><strong class="text-warning">Autor:</strong> Antoine de Saint-Exupéry</li>
                                            <li class="list-group-item bg-transparent text-white border-secondary"><strong class="text-warning">Gênero:</strong> Infanto-Juvenil</li>
                                            <li class="list-group-item bg-transparent text-white border-secondary"><strong class="text-warning">Disponíveis:</strong> 95 unidades</li>
                                        </ul>

                                        <a href="#" class="btn btn-outline-warning w-100">Ver Detalhes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                        break;
                } // Fecha switch
                ?>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>