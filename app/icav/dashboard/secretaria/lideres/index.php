<?php session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/icav/dashboard/functions.php');
[
  $idUser,
  $nombres,
  $apellidos,
  $ministerio,
  $rol
] = revisarCredenciales(); ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <link rel="shortcut icon" href="http://localhost:3000/app/logos/ICAV-logo-pes.png" type="image/x-icon">
  <meta name="author" content="" />

  <title>ICAV - APP</title>


  <link href="http://localhost:3000/app/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <!-- <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet" /> -->
  <link href="http://localhost:3000/app/css/sb-admin-2.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

  <style>
    .ministerios {
      position: relative;
      width: 100%;
      background-color: white;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
    }

    .ministerio {
      margin: auto 3rem;
      text-align: center;
    }
  </style>
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- SIDE BAR -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
          <img src="http://localhost:3000/app/logos/ICAV-logo-login.png" alt="" width="50px" />
        </div>
        <div class="sidebar-brand-text mx-3">ICAV APP</div>
      </a>
      <hr class="sidebar-divider my-0" />
      <li class="nav-item active">
        <a class="nav-link">
          <span id="ministerio">
            <?php
            echo strtoupper($ministerio);
            ?>
          </span>
        </a>
      </li>
      <hr class="sidebar-divider my-0" />
      <li class="nav-item">
        <a class="nav-link" href="./../?idUser=<?php echo $idUser ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>INICIO</span>
        </a>
      </li>
      <hr class="sidebar-divider" />
      <div class="sidebar-heading">MEMBRESIA</div>
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#miembros" aria-expanded="true"
          aria-controls="miembros">
          <i class="fas fa-fw fa-table"></i>
          <span>Gestion de Miembros</span>
        </a>
        <div id="miembros" class="collapse" aria-labelledby="miembros" data-parent="#accordionSidebar">
          <div class="py-2 collapse-inner rounded">
            <a class="collapse-item"
              href="http://localhost:3000/app/icav/dashboard/secretaria/miembros/?idUser=<?php echo $idUser ?>">Miembros</a>
            <a class="collapse-item"
              href="http://localhost:3000/app/icav/dashboard/secretaria/lideres/?idUser=<?php echo $idUser ?>">Lideres</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider" />
      <div class="sidebar-heading">FUNCIONES</div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-fw fa-table"></i>
          <span>Eventos</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-fw fa-table"></i>
          <span>Estadisticas</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider" />
      <div class="sidebar-heading">CONTABILIDAD</div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-fw fa-table"></i>
          <span>Reportes</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-fw fa-table"></i>
          <span>Estadisticas</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider" />
      <div class="sidebar-heading">Interface</div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider" />
      <div class="sidebar-heading">Addons</div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
          aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>
      <hr class="sidebar-divider d-none d-md-block" />
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- SIDE BAR -->

    <!-- SIDE CONTENT -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- NAV BAR -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2" />
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                      aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">Alerts Center</h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for
                    your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">Message Center</h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="http://localhost:3000/app/img/undraw_profile_1.svg" alt="..." />
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">
                      Hi there! I am wondering if you can help me with a
                      problem I've been having.
                    </div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="http://localhost:3000/app/img/undraw_profile_2.svg" alt="..." />
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">
                      I have the photos that you ordered last month, how would
                      you like them sent to you?
                    </div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="http://localhost:3000/app/img/undraw_profile_3.svg" alt="..." />
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">
                      Last month's report looks great, I am very happy with
                      the progress so far, keep up the good work!
                    </div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="..." />
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">
                      Am I a good boy? The reason I ask is because someone
                      told me that people say this to all dogs, even if they
                      aren't good...
                    </div>
                    <div class="small text-gray-500">
                      Chicken the Dog · 2w
                    </div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <div class="row w-100 mr-2">
                  <div class="col">
                    <b id="nombres">
                      <?php
                      echo strtoupper("$nombres $apellidos")
                        ?>
                    </b>
                    <br>
                    <span id="ministerio">
                      <?php
                      echo strtoupper($ministerio)
                        ?>
                    </span>
                  </div>
                </div>
                <svg width="50" height="50">
                  <circle cx="20" cy="25" r="20" style="margin-right:10px" />
                  <text x="15" y="30" fill="white" style="font-size: 20px">
                    <?php
                    echo strtoupper($nombres[0])
                      ?>
                  </text>
                </svg>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- NAV BAR -->

        <!-- CONTENIDO DE LA PÁGINA -->
        <div class="container-fluid">
          <div class="row">
            <h1 class="h2 mb-0 text-gray-800">
              GESTION DE LIDERES
            </h1>
          </div>
          <div class="row">
            <div class="col-4">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal"
                data-bs-target="#modalAgregarLider" onclick="mostrarMiembrosEnAgregarLider()">
                Agregar Lider
              </button>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col">
              <div class="h2 text-center">
                LIDERES
              </div>
              <table class="table table-bordered table-hover table-striped ">
                <thead class="table-light">
                  <th>
                    #
                  </th>
                  <th>
                    Nombres
                  </th>
                  <th>
                    Apellidos
                  </th>
                  <th>
                    Ministerio
                  </th>
                  <th>
                    Acciones
                  </th>
                </thead>
                <tbody id="lideres">
                </tbody>
              </table>
            </div>
          </div>

          <!-- MODAL EDITAR LIDER -->
          <div class="modal fade" id="editarLider" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Lider</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="formEditarLider">
                    <div class="row mb-2">
                      <div class="col">
                        <input class="form-control" placeholder="Nombres" type="text" name="nombres" readonly>
                      </div>
                      <div class="col">
                        <input class="form-control" placeholder="Apellidos" type="text" name="apellidos" readonly>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col">
                        <label for="ministerios" class="form-label">Seleccione el Ministerio</label>
                        <select class="form-select" name="ministerios" id="ministerios"></select>
                      </div>
                    </div>

                    <input type="hidden" name="idLider" value="">
                    <input type="hidden" name="idRol" value="">

                    <input type="submit" value="" id="buttonEditarLider" style="display: none;">
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    id="cerrarModal">Cancelar</button>
                  <button type="button" class="btn btn-primary"
                    onclick="document.getElementById('buttonEditarLider').click()">Listo</button>
                </div>
              </div>
            </div>
          </div>

          <!-- MODAL AGREGAR LIDER -->
          <div class="modal fade" id="modalAgregarLider" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog  modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Nuevo Lider</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="cerrarModalAgregarLider"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col">
                      <form id="formAgregarLider">
                        <input type="search" class="form-control" placeholder="Buscar Miembro" id="searchInput">
                      </form>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <table class="table table-bordered table-hover table-striped ">
                        <thead class="table-light">
                          <th>
                            #
                          </th>
                          <th>
                            Nombres
                          </th>
                          <th>
                            Apellidos
                          </th>
                          <th>
                            Acciones
                          </th>
                        </thead>
                        <tbody id="tableAgregarLider">
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- MODAL ASIGNAR MINISTERIO -->
          <div class="modal fade" id="modalAsignarMinisterio" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Asignar Ministerio</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="formAsignarMinisterio">
                    <select name="ministerioSeleccionado" class="form-select" id="ministerioSeleccionado"
                      onclick="cargarMinisterios(this.id)"></select>
                    <input type="hidden" name="idMiembro" value="">
                    <input type="hidden" name="idRol" value="3">
                    <input type="submit" value="" id="buttonAsignarMinisterio" style="display: none;">
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    id="cerrarModalAsignarMinisterio">Cancelar</button>
                  <button type="button" class="btn btn-primary"
                    onclick="document.getElementById('buttonAsignarMinisterio').submit()">Asignar Ministerio</button>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="ministerios">
                <div class="ministerio dropend">
                  <a class="card rounded btn border-0 p-2 rounded" style="width: 12rem;" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img src="http://localhost:3000/app/logos/icon-escuela-para-padres.png" />
                    <div class="card-body">
                      <p class="card-text"><b>MINISTERIO DE ESCUELA PARA PADRES</b></p>
                    </div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </div>
                <div class="ministerio" style="margin-left: 10px;">
                  <div class="card rounded border-0 p-2 rounded" style="width: 12rem;">
                    <img src="http://localhost:3000/app/logos/icon-arte-y-musica.png" />
                    <div class="card-body">
                      <p class="card-text"><b>MINISTERIO DE ALABANZA</b></p>
                    </div>
                  </div>
                </div>
                <div class="ministerio">
                  <div class="card rounded border-0 p-2 rounded" style="width: 12rem;">
                    <img src="http://localhost:3000/app/logos/icon-infancia.png" />
                    <div class="card-body">
                      <p class="card-text"><b>MINISTERIO DE INFANCIA</b></p>
                    </div>
                  </div>
                </div>
                <div class="ministerio">
                  <div class="card rounded border-0 p-2 rounded" style="width: 12rem;">
                    <img src="http://localhost:3000/app/logos/icon-jovenes.png" />
                    <div class="card-body">
                      <p class="card-text"><b>MINISTERIO DE JOVENES</b></p>
                    </div>
                  </div>
                </div>
                <div class="ministerio">
                  <div class="card rounded border-0 p-2 rounded" style="width: 12rem;">
                    <img src="http://localhost:3000/app/logos/icon-damas.png" />
                    <div class="card-body">
                      <p class="card-text"><b>MINISTERIO DE DAMAS</b></p>
                    </div>
                  </div>
                </div>
                <div class="ministerio">
                  <div class="card rounded border-0 p-2 rounded" style="width: 12rem;">
                    <img src="http://localhost:3000/app/logos/icon-audiovisuales.png" />
                    <div class="card-body">
                      <p class="card-text"><b>MINISTERIO DE AUDIOVISUALES</b></p>
                    </div>
                  </div>
                </div>
                <div class="ministerio">
                  <div class="card rounded border-0 p-2 rounded" style="width: 12rem;">
                    <img src="http://localhost:3000/app/logos/icon-caballeros.png" />
                    <div class="card-body">
                      <p class="card-text"><b>MINISTERIO DE CABALLEROS</b></p>
                    </div>
                  </div>
                </div>
                <div class="ministerio">
                  <div class="card rounded border-0 p-2 rounded" style="width: 12rem;">
                    <img src="http://localhost:3000/app/logos/icon-ujieres.png" />
                    <div class="card-body">
                      <p class="card-text"><b>MINISTERIO DE UJIERES</b></p>
                    </div>
                  </div>
                </div>
                <div class="ministerio">
                  <div class="card rounded border-0 p-2 rounded" style="width: 12rem;">
                    <img src="http://localhost:3000/app/logos/icon-desarrollo-social.png" />
                    <div class="card-body">
                      <p class="card-text"><b>MINISTERIO DE DESARROLLO SOCIAL</b></p>
                    </div>
                  </div>
                </div>
                <div class="ministerio">
                  <div class="card rounded border-0 p-2 rounded" style="width: 12rem;">
                    <img src="http://localhost:3000/app/logos/icon-evangelismo.png" />
                    <div class="card-body">
                      <p class="card-text"><b>MINISTERIO DE DESARROLLO SOCIAL</b></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <spa class="h6">IGLESIA CRISTIANA ÁGUILAS DE VICTORIA 2025</span>
      </div>
    </div>
  </footer>
  </div>
  <!-- CONTENIDO DE LA PÁGINA -->
  </div>
  <!-- BOTON PARA IR AL PRINCIPIO DE LA PÁGINA -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- MODAL PARA CERRAR SESIÓN -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          Select "Logout" below if you are ready to end your current session.
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">
            Cancel
          </button>
          <a class="btn btn-primary" href="http://localhost:3000/app/icav/">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <script src="http://localhost:3000/app/vendor/jquery/jquery.min.js"></script>
  <script src="http://localhost:3000/app/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="./../../../vendor/jquery-easing/jquery.easing.min.js"></script> -->
  <script src="http://localhost:3000/app/js/sb-admin-2.min.js"></script>
  <!-- <script src="./../../../vendor/chart.js/Chart.min.js"></script> -->
  <!-- <script src="./../../../js/demo/chart-area-demo.js"></script> -->
  <!-- <script src="./../../../js/demo/chart-pie-demo.js"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
  <script src="ministerios.js"></script>
  <script src="lideres.js"></script>
  <script src="./../miembros/miembros.js"></script>
  <script src="index.js"></script>
</body>

</html>