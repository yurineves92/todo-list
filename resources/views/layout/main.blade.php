  <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de Tarefas</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins-->
  <link rel="stylesheet" href="/css/_all-skins.min.css">
  
  <link href="/css/chosen.css" rel="stylesheet">
  
  <link href="/css/bootstrap-chosen.css" rel="stylesheet">
  
  <link href="/css/dataTables.bootstrap.min.css" rel="stylesheet">

  <!-- jQuery 3 -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="/js/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="/js/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="/js/demo.js"></script>

  <script src="/js/jquery.maskedinput.js"></script>

  <script src="/js/chosen.jquery.js"></script>

  <script src="/js/jquery.dataTables.min.js"></script>

  <script src="/js/dataTables.bootstrap.min.js"></script>
  
  <script type="text/javascript">
  $(function () {
      $('#data_table').DataTable({
          "order": [[ 0, "desc" ]],
          responsive: true,
          "lengthChange": false,
          'iDisplayLength': 10,
          "language": {
          "sProcessing": "Processando...",
               "sLengthMenu": "Mostrando _MENU_ registros por página",
               "sZeroRecords": "Nenhum registro encontrado...",
               "sInfo": "Mostrando _START_ de _END_ de _TOTAL_ registros",
               "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
               "sInfoFiltered": "(Filtrados de _MAX_ registros)",
               "sSearch": "Pesquisar:",
               "sUrl": "", 
               "oPaginate": {
                  "sPrevious": "Anterior",
                  "sNext": "Próximo",
                }
            }
        });
  });
  jQuery(function($){
    $(".data_filter").mask("99-99-9999");
  });
   $(function(){
      $(".chosen").chosen({no_results_text: "Nenhuma informação encontrada!"});
   });
</script>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href="/" class="navbar-brand"><b>Tarefas</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="/"><i class="fa fa-home"></i> Visão Geral</a></li>
            @if(Auth::guest())
            <li><a href="/tasks"><i class="fa fa-send"></i> Tarefas</a></li>
            @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-plus"></i> Tarefas <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="/tasks/create">Novas Tarefas</a></li>
                  <li><a href="/tasks">Tarefas</a></li>
                </ul>
            </li>
            <li><a href="/categories"><i class="fa fa-paper-plane"></i> Categorias</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Usuários <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                  <li><a href="/users/create">Novo Usuário</a></li>
                  <li><a href="/users">Listar Usuário</a></li>
              </ul>
            </li>
            @endif
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
           <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Acesso <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                @if(Auth::guest())
                <li><a href="/user/login">Login</a></li>
                @else
                <li><a href="/user/logout">Sair</a></li>
                @endif
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container-fluid">
      <?php date_default_timezone_set('America/Sao_Paulo'); ?>
      @yield('content')
  </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 0.0.1
      </div>
      <strong>Copyright &copy; 2018 <a href="yurineves92@gmail.com">Yuri Neves</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>

</body>
</html>
