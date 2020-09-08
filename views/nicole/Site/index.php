<!doctype html>
<html lang="en">

<head>
  <title><?=$model->title?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Limpeza de cache, substituir por http headers -->
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
  <meta http-equiv="pragma" content="no-cache" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.3" rel="stylesheet" />
  <link href="assets/css/nicole.css" rel="stylesheet" />
</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="blue" data-background-color="white">
      <div class="logo">
        <a href="" class="simple-text logo-normal">Nicole Explore</a>
      </div>
      <!-- Espaço Menu Lateral -->
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item" data-toggle="collapse" data-target="#registos" aria-expanded="false">
              <a class="nav-link" href="#">
                <i class="material-icons">article</i>
                <p>Registos</p>
              </a>
              <ul class="nav-item collapse" id="registos">
                <li class="submenu"><p><a href="#">Biblioteca</a></p></li>
                <li class="submenu"><p><a href="#">Férias</a></p></li>
                <li class="submenu"><p><a href="#">Imobilizado</a></p></li>
                <li class="submenu"><p><a href="#">Reclamações</a></p></li>
                <li class="submenu"><p><a href="#">Registo Correio</a></p></li>
                <li class="submenu"><p><a href="#">Telefónicos</a></p></li>
                <li class="submenu"><p><a href="#">Viaturas</a></p></li>
                <li class="submenu"><p><a href="#">Visitas</a></p></li>
              </ul>
          </li>
          <li class="nav-item" data-toggle="collapse" data-target="#phc" aria-expanded="false">
            <a class="nav-link" href="#0">
              <i class="material-icons">store</i>
              <p>Phc</p>
            </a>
            <ul class="nav-item collapse" id="phc">
                <li class="submenu"><p><a href="#">Clientes PHC</a></p></li>
                <li class="submenu"><p><a href="#">Encomendas</a></p></li>
                <li class="submenu"><p><a href="#">Encomendas a Fornecedor</a></p></li>
                <li class="submenu"><p><a href="#">Faturas</a></p></li>
                <li class="submenu"><p><a href="#">InformaDB</a></p></li>
                <li class="submenu"><p><a href="#">Logística</a></p></li>
                <li class="submenu"><p><a href="#">Notas Crédito</a></p></li>
                <li class="submenu"><p><a href="#">PHC Dossiers</a></p></li>
                <li class="submenu"><p><a href="#">Remarketing</a></p></li>
                <li class="submenu"><p><a href="#">Top Clientes</a></p></li>
                <li class="submenu"><p><a href="#">Stocks</a></p></li>
            </ul>
          </li>
          <li class="nav-item" data-toggle="collapse" data-target="#intranet" aria-expanded="false">
            <a class="nav-link" href="#0">
              <i class="material-icons">help</i>
              <p>Intranet</p>
            </a>
            <ul class="nav-item collapse" id="intranet">
                <li class="submenu"><p><a href="#">Auto Avaliação</a></p></li>
                <li class="submenu"><p><a href="#">Concorrência</a></p></li>
                <li class="submenu"><p><a href="#">KB Comercial</a></p></li>
                <li class="submenu"><p><a href="#">KB Técnico</a></p></li>
                <li class="submenu"><p><a href="#">Regras</a></p></li>
                <li class="submenu"><p><a href="#">Sugestões</a></p></li>
            </ul>
          </li>
          <li class="nav-item" data-toggle="collapse" data-target="#gestao" aria-expanded="false">
            <a class="nav-link" href="#0">
              <i class="material-icons">shopping_cart</i>
              <p>Gestão</p>
            </a>
            <!-- 
                  Tabelas de Preços
                -->
            <ul class="nav-item collapse" id="gestao">
                <li class="submenu"><p><a href="#">Artigos Nicole</a></p></li>
                <li class="submenu"><p><a href="#">Artigos Promoção</a></p></li>
                <li class="submenu"><p><a href="#">Carrinho</a></p></li>
                <li class="submenu"><p><a href="#">Contratos</a></p></li>
                <li class="submenu"><p><a href="#">Fornecedores</a></p></li>
                <li class="submenu"><p><a href="#">Gestão de Produtos</a></p></li>
                <li class="submenu"><p><a href="#">Gestor de Preços</a></p></li>
                <li class="submenu"><p><a href="#">Leads</a></p></li>
                <li class="submenu"><p><a href="#">Objetivos</a></p></li>
                <li class="submenu"><p><a href="#">Orçamentos</a></p></li>
                <li class="submenu"><p><a href="#">Price Exceptions</a></p></li>
                <li class="submenu"><p><a href="#">Prospeção</a></p></li>
                <li class="submenu"><p><a href="#">Tabela de Preços</a></p></li>
            </ul>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#0">
              <i class="material-icons">print</i>
              <p>Produção</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#0">
              <i class="material-icons">construction</i>
              <p>Técnico</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#0">
              <i class="material-icons">face</i>
              <p>Utilizadores</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#0">
              <i class="material-icons">lock</i>
              <p>Área Reservada</p>
            </a>
          </li>
        </ul>
      </div>
      <!-- Fim Menu Lateral -->
    </div>
    <div class="main-panel">
      <!-- Section do Menu Superior -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <!-- Titulo do Módulo -->
            <a class="navbar-brand" href="javascript:;"><?=$model->moduleName?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">notifications</i> Follow-Ups
                </a>
              </li>
              <li class="nav-item">
              <div class="dropdown">
                <a class="nav-link" 
                   href="javascript:;" id="dropdownMenuButton" 
                   data-toggle="dropdown" 
                   aria-haspopup="true" 
                   aria-expanded="false">
                  <img src="http://altserver:890/_novanicole/img/head.jpg" 
                       class="img-fluid rounded-circle"
                       style="max-width:40px">
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" >
                  <a class="dropdown-item" href="#">Perfil</a>
                  <a class="dropdown-item" href="#">Sair</a>
                </div>
              </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Fim do Menu Superior -->
      <div class="content">
        <div class="container-fluid">
          
          <?=render_content($content)?>

        </div>
      </div>
      <!-- Rodapé -->
      <footer class="footer">
            <?=include('footer.php')?>
      </footer>
      <!-- Fim do rodapé -->
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <script src="assets/js/nicole.js" type="text/javascript"></script>
</body>
</html>