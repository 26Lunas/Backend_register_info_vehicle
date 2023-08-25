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
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Form-Register</title>

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
                <a class="nav-link" href="historial-actividades.php">
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $usuario;?></span>
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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center mb-4">
                        <div class="cont-logo">
                            <img src="img/img-placas/img-icono-estrella.png" alt="">
                        </div>
                        <h1 class="mb-0 title-texas">Texas Department of Motor Vehicles</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <div class="cont-form-register">
                        <h2>Generate Plate</h2>
                        <form class="form-register" id="form-register">
                            <div class="form-vehicle">
                                <h6>Vehicle information *</h6>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Vin <span class="requerido">*</span>:</label>
                                        <input type="text" disabled class="form-control required" id="campoVehicle-vin"
                                            placeholder="Vin">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Sale date <span class="requerido">*</span>:</label>
                                        <input type="date" class="form-control required" id="campoVehicle-saleDate">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Days <span class="requerido">*</span>:</label>
                                        <select name="" id="campoVehicle-days" class="form-control required">
                                            <option value="">--</option>
                                            <option value="90">90</option>
                                            <option value="60">60</option>
                                            <option value="30">30</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-6">
                                        <label>Seller <span class="requerido">*</span>:</label>
                                        <input type="text" class="form-control required" id="campoVehicle-seller"
                                            placeholder="Seller" value="HOUSTION AUTO MOTION">
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <label>Deler number <span class="requerido">*</span>:</label>
                                        <input type="text" class="form-control required" id="campoVehicle-delerNumber"
                                            placeholder="Daler number" value="P162053">
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <label>Make <span class="requerido">*</span>:</label>
                                        <input type="text" class="form-control required" id="campoVehicle-Make"
                                            placeholder="Make">
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <label>Body Style <span class="requerido">*</span>:</label>
                                        <select name="" id="campoVehicle-bodyStyle" class="form-control required">
                                            <option value="">--</option>
                                            <option value="LL">LL</option>
                                            <option value="PK">PK</option>
                                            <option value="2D">2D</option>
                                            <option value="3D">3D</option>
                                            <option value="4D">4D</option>
                                            <option value="2H">2H</option>
                                            <option value="4H">4H</option>
                                            <option value="SUV">SUV</option>
                                            <option value="MC">MC</option>
                                            <option value="VN">VN</option>
                                            <option value="TRL">TRL</option>
                                            <option value="UT">UT</option>
                                            <option value="TR">TR</option>
                                            <option value="CG">CG</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <label>Year <span class="requerido">*</span>:</label>
                                        <input type="text" class="form-control required" id="campoVehicle-year"
                                            placeholder="Year">
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <label>Model <span class="requerido">*</span>:</label>
                                        <input type="text" class="form-control required" id="campoVehicle-Model"
                                            placeholder="Model">
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <label>Major color <span class="requerido">*</span>:</label>
                                        <select name="" id="campoVehicle-majorColor" class="form-control required">
                                            <option value="">--</option>
                                            <option value="BEIGE">BEIGE</option>
                                            <option value="BLACK">BLACK</option>
                                            <option value="BLUE">BLUE</option>
                                            <option value="BROWN">BROWN</option>
                                            <option value="GOLD">GOLD</option>
                                            <option value="GRAY">GRAY</option>
                                            <option value="GREEN">GREEN</option>
                                            <option value="MAROON">MAROON</option>
                                            <option value="ORANGE">ORANGE</option>
                                            <option value="PURPLE">PURPLE</option>
                                            <option value="RED">RED</option>
                                            <option value="SILVER">SILVER</option>
                                            <option value="TAN">TAN</option>
                                            <option value="WHITE">WHITE</option>
                                            <option value="YELLOW">YELLOW</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <label>Minor color:</label>
                                        <select name="" id="campoVehicle-minorColor" class="form-control">
                                            <option value="">--</option>
                                            <option value="BEIGE">BEIGE</option>
                                            <option value="BLACK">BLACK</option>
                                            <option value="BLUE">BLUE</option>
                                            <option value="BROWN">BROWN</option>
                                            <option value="GOLD">GOLD</option>
                                            <option value="GRAY">GRAY</option>
                                            <option value="GREEN">GREEN</option>
                                            <option value="MAROON">MAROON</option>
                                            <option value="ORANGE">ORANGE</option>
                                            <option value="PURPLE">PURPLE</option>
                                            <option value="RED">RED</option>
                                            <option value="SILVER">SILVER</option>
                                            <option value="TAN">TAN</option>
                                            <option value="WHITE">WHITE</option>
                                            <option value="YELLOW">YELLOW</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <label>Miles:</label>
                                        <input type="text" class="form-control" id="campoVehicle-Miles"
                                            placeholder="Miles">
                                    </div>
                                    <div class="mt-3 col-sm-12">
                                        <h6 class="title-group">Buyer information *</h6>
                                    </div>

                                    <div class="col-sm-4 col-6">
                                        <label>Name 1 <span class="requerido">*</span>:</label>
                                        <input type="text" class="form-control required" id="campoBuyer-name1"
                                            placeholder="Name 1">
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <label>Name 2:</label>
                                        <input type="text" class="form-control" id="campoBuyer-name2"
                                            placeholder="Name 2">
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <label>Adress <span class="requerido">*</span>:</label>
                                        <input type="text" class="form-control required" id="campoBuyer-adress"
                                            placeholder="Adress">
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <label>City <span class="requerido">*</span>:</label>
                                        <input type="text" class="form-control required" id="campoBuyer-city" placeholder="City">

                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <label>State <span class="requerido">*</span>:</label>
                                        <select name="" id="campoBuyer-state" class="form-control required">
                                            <option value="">--</option>
                                            <option value="AL">AL:Alabama</option>
                                            <option value="Ak">Ak:Alaska</option>
                                            <option value="AZ">AZ:Arizona</option>
                                            <option value="AR">AR:Arkansas</option>
                                            <option value="CA">CA:California</option>
                                            <option value="CO">CO:Colorado</option>
                                            <option value="CT">CT:Connecticut</option>
                                            <option value="DE">DE:Delaware</option>
                                            <option value="DC">DC:Distrito de Columbia</option>
                                            <option value="FL">FL:Florida</option>
                                            <option value="GA">GA:Georgia</option>
                                            <option value="HI">HI:Hawái</option>
                                            <option value="ID">ID:Idaho</option>
                                            <option value="IL">IL:Illinois</option>
                                            <option value="IN">IN:Indiana</option>
                                            <option value="IA">IA:Lowa</option>
                                            <option value="KS">KS:Kansas</option>
                                            <option value="KY">KY:Kentucky</option>
                                            <option value="LA">LA:Luisiana</option>
                                            <option value="ME">ME:Maine</option>
                                            <option value="MD">MD:Maryland</option>
                                            <option value="MA">MA:Massachusetts</option>
                                            <option value="MI">MI:Míchigan</option>
                                            <option value="MN">MN:Minnesota</option>
                                            <option value="MS">MS:Mississippi</option>
                                            <option value="MO">MO:Misuri</option>
                                            <option value="MT">MT:Montana</option>
                                            <option value="NE">NE:Nebraska</option>
                                            <option value="NV">NV:Nevada</option>
                                            <option value="NH">NH:New Hampshire</option>
                                            <option value="NJ">NJ:New Jersey</option>
                                            <option value="NM">NM:New Mexico</option>
                                            <option value="NY">NY:New York</option>
                                            <option value="NC">NC:North Carolina</option>
                                            <option value="ND">ND:North Dacota</option>
                                            <option value="OH">OH:Ohio</option>
                                            <option value="OK">OK:Oklahoma</option>
                                            <option value="OR">OR:Oregón</option>
                                            <option value="PA">PA:Pensilvania</option>
                                            <option value="RI">RI:Rhode Island</option>
                                            <option value="SC">SC:South Carolina</option>
                                            <option value="SD">SD:South Dakota</option>
                                            <option value="TN">TN:Tennessee</option>
                                            <option value="TX">TX:Texas</option>
                                            <!-- <option value="TXV">TXV:Texas</option> -->
                                            <option value="UT">UT:Utah</option>
                                            <option value="VT">VT:Vermont</option>
                                            <option value="VA">VA:Virginia</option>
                                            <option value="WA">WA:Washington</option>
                                            <option value="WV">WV:Virginia Occidental</option>
                                            <option value="WI">WI:Wisconsin</option>
                                            <option value="WY">WY:Wyoming</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <label>Zip <span class="requerido">*</span>:</label>
                                        <input type="text" class="form-control required" id="campoBuyer-zip" placeholder="Zip">

                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <label>Email:</label>
                                        <input type="text" class="form-control" id="campoBuyer-email"
                                            placeholder="Email">
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <label>Phone:</label>
                                        <input type="number" class="form-control" id="campoBuyer-phone"
                                            placeholder="Phone">
                                    </div>
                                    <div class="col-sm-4 col-6" hidden>
                                        <label>ID:</label>
                                        <input type="number" class="form-control" id="campoBuyer-id"
                                           placeholder="Id">
                                    </div>

                                    <div class="col-sm-4 col-6" hidden>
                                        <label>PDF:</label>
                                        <select name="" id="campoBuyer-pdf" class="form-control required">
                                            <option value="">--</option>
                                            <option value="CA">CA:California</option>
                                            <option value="CO">CO:Colorado</option>
                                            <option value="FL">FL:Florida</option>
                                            <option value="GA">GA:Georgia</option>
                                            <option value="IL">IL:Illinois</option>
                                            <option value="LA">LA:Luisiana</option>
                                            <option value="MD">MD:Maryland</option>
                                            <option value="NV">NV:Nevada</option>
                                            <option value="NJ">NJ:New Jersey</option>
                                            <option value="NM">NM:New Mexico</option>
                                            <option value="NY">NY:New York</option>
                                            <option value="NC">NC:North Carolina</option>
                                            <option value="TN">TN:Tennessee</option>
                                            <option value="TX">TX:Texas</option>
                                            <option value="Insurance">Insurance</option>
                                            <option value="OH">OH:Ohio</option>
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="section-btn-plates col-sm-12">
                                        <button type="button" class="btn btn-cancel">Cancel</button>
                                        <button type="button" class="btn btn-save btn-save-vehicle">Generar</button>
                                    </div>
                                </div>
                            </div>

                        </form>
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
                <div class="modal-body">Seleccione "Logout" a continuación si está listo para finalizar su sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="backend/Login/salir.php">Logout</a>
                </div>
            </div>
        </div>
    </div>



    <div class="cont-loader ocultar_loader" id="cont_loader">
        <div class="loader"></div>
    </div>
    

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/34c89acf97.js" crossorigin="anonymous"></script>
    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- JS -->
    <script src="js/apiVin.js"></script>
    <script src="js/backend.js"></script>
    <script src="js/window.resize.js"></script>



    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>