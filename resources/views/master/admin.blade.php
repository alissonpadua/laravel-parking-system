<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
        <title>Estacionamento</title>

        <link rel="stylesheet" href="/theme/css/parking-system.css">  

        <link rel="stylesheet" href="/theme/plugin/bootstrap4/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/theme/plugin/funkyradio/funkyradio.min.css">
       
        <script src="/theme/plugin/jquery33/jquery-3.3.1.min.js"></script>
        <script src="/theme/plugin/bootstrap4/dist/js/popper.min.js"></script>
        <script src="/theme/plugin/bootstrap4/dist/js/bootstrap.min.js"></script>
        <script src="/theme/plugin/jquerymask/dist/jquery.mask.min.js"></script>
        <script src="/theme/plugin/toastr/build/toastr.min.js"></script>
        <script src="/theme/plugin/sweetalert2/sweetalert2.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Estacionamento from Hell</a>
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                  <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                      SAIR DO SISTEMA
                  </a>    
                  <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </li>
            </ul>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('admin.home') }}">
                                    <span data-feather="bar-chart"></span>
                                    Dashboard <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.parking.getCheckin') }}">
                                    <span data-feather="plus-square"></span>
                                    Registrar Entrada
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.parking.getCheckout') }}">
                                    <span data-feather="plus-square"></span>
                                    Registrar Saída
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.client.index') }}">
                                    <span data-feather="users"></span>
                                    Clientes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.brand.index') }}">
                                    <span data-feather="bar-chart-2"></span>
                                    Marcas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.vehicle.index') }}">
                                    <span data-feather="truck"></span>
                                    Veículos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.partner.index') }}">
                                    <span data-feather="user-check"></span>
                                    Parceiros
                                </a>
                            </li>
                        </ul>
                     
                        <ul class="nav flex-column mb-2">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.parking.index') }}">
                                    <span data-feather="clipboard"></span>
                                    Estacionamento
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.space.index') }}">
                                    <span data-feather="flag"></span>
                                    Vagas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.pricetable.getindex') }}">
                                <span data-feather="tag"></span>
                                Tabela de Preços
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
               
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">@yield('title')</h1>
                    </div>
                    <nav aria-label="breadcrumb">
                        @yield('breadcrumb')
                    </nav>
                    <div class="container-fluid">
                        @if(session('msg'))
                            <div class="no-gutters">
                                <div class="col-md-12">
                                    <div class="alert alert-{{ session('type') }}">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        {{ session('msg') }}
                                    </div>
                                </div>
                            </div>
                        @endif
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
   </body>
</html>