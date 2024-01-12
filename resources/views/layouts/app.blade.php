<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Adicione aqui seus links para estilos CSS -->
    <link href="{{ asset('css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- Adicione aqui outros estilos CSS -->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}"> Cadastro de Jogos - @yield('title')</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Início</a>
                            
                            <!-- Adicione aqui seus links de navegação -->
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>

    <footer class="bg-primary text-white text-center py-3">
        <div align="center" class="credit">
            <a href="https://grupo.jm7087.com" class="cor-link-rodape">Grupo JM7087</a>
            © Copyright 2010-<script type="text/javascript">document.write(new Date().getFullYear());</script>
            . Todos os direitos reservados. Desenvolvido <span class="cor-nome-dev-rodape"> João Marcos</span><span class="texto-rodape">.
        </div>
    </footer>

    <!-- Adicione aqui seus scripts JavaScript -->
    <script src="{{ asset('js/esconderMesagem.js') }}" defer></script>
    <!-- Adicione aqui outros scripts JavaScript -->
</body>
</html>
