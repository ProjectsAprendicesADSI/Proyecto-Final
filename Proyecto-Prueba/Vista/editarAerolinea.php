<?php
session_start();
if (empty($_SESSION['idUsuario'])){
    header("Location: login.php");
}else
    require_once (__DIR__.'/../Modelo/aerolinea.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="NiceAdmin/img/avion42.ico">

    <title>Aero-Linea/Avion </title>

    <!-- Bootstrap CSS -->
    <link href="NiceAdmin/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="NiceAdmin/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="NiceAdmin/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="NiceAdmin/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="NiceAdmin/css/style.css" rel="stylesheet">
    <link href="NiceAdmin/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <script src="js/lte-ie7.js"></script>
    <![endif]-->
    <link href="NiceAdmin/css/estilos.css" rel="stylesheet" />
</head>

<body>
<!-- container section start -->
<section id="container" class="">
    <!--header start-->
    <?php require("snippers/menusuperior.php");?>
    <!--header end-->

    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <?php require("snippers/menuizquierdo.php");?>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wr">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: black; "><i class="fa fa-files-o"></i> Agregar AeroLinea</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Inicio</a></li>
                        <li><i class="icon_document_alt"></i>AeroLinea</li>
                        <li><i class="fa fa-files-o"></i>Agregar AeroLinea</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->
            <header class="panel-heading">
                Ingrese los campo requeridos para agregar una AeroLinea
            </header>
            <?php if(!empty($_GET['respuesta'])){ ?>
                <?php if ($_GET['respuesta'] == "correcto"){ ?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>La AeroLinea!</strong> se ha creado correctamente.
                    </div>
                <?php }else {?>
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>Error!</strong> No se pudo ingresar la AeroLinea intentalo nuevamente!!
                    </div>
                <?php } ?>
            <?php } ?>






            <div class="panel-body">
                <div class="form">
                    <form class="form-horizontal form-label-left" method="post" action="../Controlador/AerolineaController.php?action=editar" >
                        <div class="form-group ">

                            <?php if(!empty($_GET["idAerolinea"]) && isset($_GET["idAerolinea"])) { ?>
                                <?php $ObjAerolinea = aerolinea::buscarForId($_GET["idAerolinea"]);
                                //var_dump($ObjAerolinea);
                                echo "entro";
                            }else{
                                //echo "no".$_GET["idAerolinea"];
                            }
                            ?>

                            <input class="" hidden value="<?php echo $ObjAerolinea->getIdAerolinea(); ?>" id="idAerolinea" name="idAerolinea" type="number" required />

                            <label for="cname" class="control-label col-lg-2">Razon Social <span class="required">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control" value="<?php echo $ObjAerolinea->getRazonSocial(); ?>" id="Razon_Social" name="Razon_Social"  type="text" required onkeypress="return soloLetras(event)" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="cemail" class="control-label col-lg-2">Nit <span class="required">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control " value="<?php echo $ObjAerolinea->getNit(); ?>" id="Nit" type="text" name="Nit" required />
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-2">Direccion</label>
                            <div class="col-lg-10">
                                <input class="form-control " value="<?php echo $ObjAerolinea->getDireccion(); ?>" id="Direccion" type="text" name="Direccion" required/>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Correo <span class="required">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control" value="<?php echo $ObjAerolinea->getCorreo(); ?>" id="Correo" name="Correo"  type="email" required />
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Telefono <span class="required">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control" value="<?php echo $ObjAerolinea->getTelefono(); ?>" id="Telefono" name="Telefono"  type="number" required />
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-2">Estado<i class="icon_"><img src="NiceAdmin/img/i.from/rh.png"></i></label>
                            <div class="col-lg-10">
                                <select id="Estado" name="Estado" class="form-control">
                                    <option>Activa</option>
                                    <option>Inactiva</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary" type="submit">Actualizar</button>
                                <button class="btn btn-default" type="button"><a href="gestionarAerolineas.php">Cancelar</a></button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <div class="text-right">
        <div class="credits">
            <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
            -->
            <script>
                function soloLetras(e){
                    key = e.keyCode || e.which;
                    tecla = String.fromCharCode(key).toLowerCase();
                    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
                    especiales = "8-37-39-46";

                    tecla_especial = false
                    for(var i in especiales){
                        if(key == especiales[i]){
                            tecla_especial = true;
                            break;
                        }
                    }

                    if(letras.indexOf(tecla)==-1 && !tecla_especial){
                        return false;
                    }
                }
            </script>


            <script>
                function solonumeros(e){
                    key = e.keyCode || e.which;
                    tecla = String.fromCharCode(key).toLowerCase();
                    letras = " 1234567890";
                    especiales = "8-37-39-46";

                    tecla_especial = false
                    for(var i in especiales){
                        if(key == especiales[i]){
                            tecla_especial = true;
                            break;
                        }
                    }

                    if(letras.indexOf(tecla)==-1 && !tecla_especial){
                        return false;
                    }
                }
            </script>

            <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</section>
<!-- container section end -->

<!-- javascripts -->
<script src="NiceAdmin/js/jquery.js"></script>
<script src="NiceAdmin/js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="NiceAdmin/js/jquery.scrollTo.min.js"></script>
<script src="NiceAdmin/js/jquery.nicescroll.js" type="text/javascript"></script>
<!-- jquery validate js -->
<script type="text/javascript" src="NiceAdmin/js/jquery.validate.min.js"></script>

<!-- custom form validation script for this page-->
<script src="NiceAdmin/js/form-validation-script.js"></script>
<!--custome script for all page-->
<script src="NiceAdmin/js/scripts.js"></script>


</body>
</html>
