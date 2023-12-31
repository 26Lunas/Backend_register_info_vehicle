<?php

session_start();
$usuario = $_SESSION['user'];
$rol = $_SESSION['rol'];
$id_usuario = $_SESSION['id'];
if (!isset($usuario)) {
    header("location: ../");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>List-Register</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="img/icono-estrella.ico">

    <!-- CSS style -->
    <link rel="stylesheet" href="css/style-system.css">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div> -->
                <div class="sidebar-brand-text mx-3 cont-text-logo"> <img src="img/img-placas/img-icono-estrella.png"
                        class="logo" alt="">DMV</div>
            </a>

            <div class="rol_usuario text-center" hidden id="rol_usuario"><?php echo $rol;?></div>
            <div class="id_usuario text-center" hidden id="id_usuario"><?php echo $id_usuario;?></div>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>texasdmv</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Charts -->
            <li class="nav-item option_admin">
                <a class="nav-link" href="list-register-placas.php">
                    <i class="fa-solid fa-address-card"></i>
                    <span>Registros</span></a>
            </li>

            <li class="nav-item option_admin">
                <a class="nav-link" href="list_register_inspect.php">
                    <i class="fa-solid fa-address-card"></i>
                    <span>Registros Inspects</span></a>
            </li>

            <li class="nav-item option_admin">
                <a class="nav-link" href="list-register-state.php">
                    <i class="fa-solid fa-flag-usa"></i>
                    <span>lista de estados</span></a>
            </li>
            <li class="nav-item option_admin">
                <a class="nav-link" href="list-register-users.php">
                    <i class="fa-solid fa-users"></i>
                    <span>Usuarios</span></a>
            </li>


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                    <span>Activity History</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small" id="nombre_user"><?php echo $usuario; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="#">
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
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-main">
                    <div class="container">
                        <section class="section-history">
                            <section class="section-title">
                                <h6>Historial placas realizadas</h6>
                            </section>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group"><label class="form-label">Fecha Inicial</label><input
                                            name="fechaInicio" placeholder="dd/mm/yyyy" type="date" id="fechaInicio"
                                            class="form-control"></div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group"><label class="form-label">Fecha Final</label><input
                                            name="fechaFin" placeholder="dd/mm/yyyy" type="date" id="fechaFin"
                                            class="form-control"></div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group"><label class="form-label">Usuario</label>
                                        <select name="idUser" placeholder="Seleccione" type="select"
                                            class="form-select form-control" id="idUser">
                                            <option value="">Seleccione</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="align-self-end col-sm-3">
                                    <div class="form-group actions-search"><button id="btnBuscar"
                                            class="btn btn-principal">Buscar</button></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="div-tabla">
                                        <table class="table-data-seccion">
                                            <thead>
                                                <tr>
                                                    <th>Usuario</th>
                                                    <th>Placas generadas</th>
                                                </tr>
                                            </thead>
                                            <tbody id="body_table_UA">
                                                <!-- <tr>
                                                    <td>Angelica</td>
                                                    <td>20</td>
                                                </tr> -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Todos los derechos reservados &copy; Yamir Serret</span>
                    </div>
                </div>
            </footer> -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Logout" a continuación si está listo para finalizar su sesión
                    actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="backend/Login/salir.php">Logout</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/34c89acf97.js" crossorigin="anonymous"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- JS -->
    <script src="js/backend.js"></script>
    <script src="js/appMain.js"></script>
    <script src="js/window.resize.js"></script>



</body>

</html>