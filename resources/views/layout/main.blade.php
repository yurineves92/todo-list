<!DOCTYPE html>
<html>
<head>
	<title>To Do</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/font-awesome.min.css">
</head>
<body>
	<div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item" href="/"><i class="fa fa-home"> Home</i></a>
          @if(Auth::guest())
          <a class="blog-nav-item" href="/about">Contato</a>
          <div class="nav navbar-nav navbar-right">
            <a class="blog-nav-item" href="/user/login">Acesso</a>
          </div>
          @else
          <a class="blog-nav-item" href="/tasks/create"><i class="fa fa-send"></i> Novas tarefas</a>
          <a class="blog-nav-item" href="/tasks"><i class="fa fa-clone"></i> Tarefas</a>
          <a class="blog-nav-item" href="/categories"><i class="fa fa-plus-circle"></i> Categorias</a>
          <a class="blog-nav-item" href="/users"><i class="fa fa-user"></i> Usuários</a>
          <div class="nav navbar-nav navbar-right">
            <a class="blog-nav-item" href="/user/logout">Sair</a>
          </div>
          @endif
        </nav>
      </div>
  </div>
  <div class="row">
    <div class="container">
      @yield('content')
    </div>
  </div>
</body>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
</html>