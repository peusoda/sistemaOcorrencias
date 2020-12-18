<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{  asset('img/if-icon.png')  }}">

    <title>SIGO - Sistema de Ocorrências</title>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    @stack('style')
    <style>
      th {  
          border-right: 1px solid #ddd;
        }
      .active:hover {
        background-color: rgb(194, 218, 189);
        font-weight: 800;
      }
      #sidebarToggle{
        position: absolute;
        float: left;
        z-index:2;
      }

      .required:after {
        content:" *"; 
        color: red;
      }
      label, .card-header{
        font-weight: bold;
      }

      .dataTables_wrapper {
        min-width: 500px;
      }
    </style>
</head>
<body id="page-top">


  
  <!-- Page Wrapper -->

  <button class="btn22" data-toggle="collapse" id="sidebarToggle"><i class="fas fa-bars"></i></button>        

  <div id="wrapper">
            <!-- Sidebar -->
    <div class=" navbar-nav bg-gradient-green sidebar sidebar-dark " id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ asset('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="img1"><img src="{{ asset('/img/logoif.png')  }}" width="75%"></div>
        <div class="img2"><img src="{{ asset('/img/if-icon2.png')  }}" width="40%"></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        @if(Auth::user()->tipo != 'responsavel')

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
        <a class="nav-link" href="{{ route('ocorrencia.show') }}">
            <i class="fas fa-fw fa-pen-alt"></i>
            <span>Minhas Ocorrências</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('elogio.show') }}">
            <i class="fas fa-fw fa-heart"></i>
            <span>Meus elogios</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
        <a class="nav-link" href="{{ route('servidor.show') }}">
            <i class="fas fa-fw fa-chalkboard-teacher"></i>
            <span>Servidores</span></a>
        </li>


        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
        <a class="nav-link" href="{{ route('turmas.index') }}">
            <i class="fas fa-fw fa-chalkboard"></i>
            <span>Turmas</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
        <a class="nav-link" href="{{ route('responsavel.show') }}">
            <i class="fas fa-fw fa-user-shield"></i>
            <span>Responsáveis</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
        <a class="nav-link" href="{{ route('aluno.show') }}">
            <i class="fas fa-fw fa-book-reader"></i>
            <span>Alunos</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-users"></i>
            <span>Usuários</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div><br>

        <hr class="sidebar-divider my-0">
        
        @endif
        @if(Auth::user()->tipo == 'responsavel')
        <li class="nav-item active">
        <a class="nav-link" href="{{ route('aluno.show') }}">
            <i class="fas fa-fw fa-book-reader"></i>
            <span>Aluno</span></a>
        </li>
        @endif
        <li class="nav-item dropdown no-arrow active">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-user"></i>
          <span class="mr-2 d-none d-lg-inline small">Alfredo</span>
        </a>

        <hr class="sidebar-divider my-0">



        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Minha Conta
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            Configurações
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
            Minhas Ocorrências
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
                {{ __('Sair') }}
          </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

      </li>


    </div>
        
      
 
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        
      


  <!-- End of Topbar -->

  <!-- Begin Page Content -->
  

  <main class="py-0">
    @yield('content')
  </main>
 
  <!-- /.container-fluid -->

<!-- End of Main Content -->

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; Your Website 2020</span>
      </div>
    </div>
  </footer>
<!-- End of Footer -->

<!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

    @stack('js')
    <!-- Bootstrap core JavaScript-->
    
    
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/js/select2/select2.min.js')  }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/js/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('/js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('/js/chart-area-demo.js') }}"></script>
    <script src="{{ asset('/js/chart-pie-demo.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script type="text/javascript">
        $(document).ready(function ($) {
            var $cpf = $(".cpf");
            $cpf.mask('000.000.000-00', {
                reverse: true
            });
        });
    </script>
    {{-- Máscara para número de telefone--}}
    <script>
      function mask(o, f) {
        setTimeout(function() {
          var v = mphone(o.value);
          if (v != o.value) {
            o.value = v;
          }
        }, 1);
      }

      function mphone(v) {
        var r = v.replace(/\D/g, "");
        r = r.replace(/^0/, "");
        if (r.length > 10) {
          r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
        } else if (r.length > 5) {
          r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
        } else if (r.length > 2) {
          r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
        } else {
          r = r.replace(/^(\d*)/, "($1");
        }
        return r;
      }
    </script>
</body>
           
</html>    
