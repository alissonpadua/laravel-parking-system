<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="/theme/plugin/bootstrap4/dist/css/bootstrap.min.css">
      <title>Estacionamento</title>
   </head>
   <body>
      <nav class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow">
         <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
         <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
               <a class="nav-link" href="#">Sign out</a>
            </li>
         </ul>
      </nav>
      <div class="container-fluid">
            <div class="row">
               <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                  <div class="sidebar-sticky">
                     <ul class="nav flex-column">
                        <li class="nav-item">
                           <a class="nav-link active" href="index.html#">
                           <span data-feather="bar-chart"></span>
                           Dashboard <span class="sr-only">(current)</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="entrada.html">
                           <span data-feather="plus-square"></span>
                           Registrar Entrada
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="saida.html">
                           <span data-feather="plus-square"></span>
                           Registrar Saída
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="cliente.html">
                           <span data-feather="users"></span>
                           Clientes
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="brands.html">
                           <span data-feather="bar-chart-2"></span>
                           Marcas
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="vehicles.html">
                           <span data-feather="truck"></span>
                           Veículos
                           </a>
                        </li>
                        <li class="nav-item">
                       <a class="nav-link" href="parceiros.html">
                           <span data-feather="user-check"></span>
                           Parceiros
                       </a>
                       </li>
                     </ul>
                     
                     <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                           <a class="nav-link" href="estacionamento.html">
                           <span data-feather="clipboard"></span>
                           Estacionamento
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="spaces.html">
                           <span data-feather="flag"></span>
                           Vagas
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">
                           <span data-feather="tag"></span>
                           Tabela de Preços
                           </a>
                        </li>
                       </ul>
                  </div>
               </nav>
               <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                  <div class="container-fluid">
                    @yield('content')
                  </div>
               </main>
            </div>
         </div>
            </nav>
         </div>
      </div>
      <script src="/theme/plugin/jquery33/jquery-3.3.1.min.js"></script>
      <script src="/theme/plugin/bootstrap4/dist/js/popper.min.js"></script>
      <script src="/theme/plugin/bootstrap4/dist/js/bootstrap.min.js"></script>
      <!-- Icons -->
      <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
      <script>
         feather.replace()
      </script>
      <!-- Graphs -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
      <script>
         var ctx = document.getElementById("myChart");
         var myChart = new Chart(ctx, {
             type: 'line',
             data: {
                 labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                 datasets: [{
                     data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
                     lineTension: 0,
                     backgroundColor: 'transparent',
                     borderColor: '#007bff',
                     borderWidth: 4,
                     pointBackgroundColor: '#007bff'
                 }]
             },
             options: {
                 scales: {
                     yAxes: [{
                         ticks: {
                             beginAtZero: false
                         }
                     }]
                 },
                 legend: {
                     display: false,
                 }
             }
         });
      </script>
   </body>
</html>