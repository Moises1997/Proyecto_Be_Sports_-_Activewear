<?php
    session_start();
if (isset($_SESSION["logged_in"])) {
    if ($_SESSION["Privilegio"] == 2) {
        header("location: ../menu_corte.php");
    }else{
        if($_SESSION["Privilegio"] == 3){
            header("location: ../menu_confeccion.php");
        }else{
            if ($_SESSION["Privilegio"] == 4){
                header("location: ../menu_terminado.php");
            }else{
                if ($_SESSION["Privilegio"] == 5){
                    header("location: ../menu_almacen.php");
                }else{
                    if ($_SESSION["Privilegio"] == 6){
                        header("location: ../menu_empleados.php");
                    }else{
                        if ($_SESSION["Privilegio"] == 7){
                            header("location: ../menu_empleados.php");
                        }else{
                            if ($_SESSION["Privilegio"] == 8){
                                header("location: ../menu_empleados.php");
                            }else{
                                if ($_SESSION["Privilegio"] == 9){
                                    header("location: ../menu_empleados.php");
                                }else{
                                    if ($_SESSION["Privilegio"] == 10){
                                    header("location: ../menu_vendedor.php");
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
} else {
    header("location:login.php");
}
    require_once ("config/db.php");
    require_once ("config/conexion.php");
    $active_facturas="";
    $active_productos="";
    $active_clientes="";
    $active_usuarios="";
    $active_perfil="active";
    $title="Datos de la Empresa";
    $query_empresa=mysqli_query($con,"select * from perfil where id_perfil=1");
    $row=mysqli_fetch_array($query_empresa);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include("head.php");
    ?>
</head>
<body>
    <?php
        include("navbar.php");
    ?>
    <div class="container">
        <div class="row">
            <form method="post" id="perfil">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad" >


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <center>
                            <h3><strong>Datos de la Empresa</strong></h3>
                        </center>
                    </div>
                    <div class="panel-body">
                       <a href="../index.php" class="btn btn-success" title="menú principal"><i class="glyphicon glyphicon-home"></i><br>Menú Principal</a>
                       <hr>
                        <div class="row">
                            <div class="col-md-3 col-lg-3" align="center">
                                <div id="load_img">
                                    <img class="img-responsive" width="200px" src="<?php echo $row['logo_url'];?>" alt="Logo">
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class='filestyle' data-buttonText="Logo" type="file" name="imagefile" id="imagefile" onchange="upload_image();">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-1 col-lg-1"></div>
                            <div class=" col-md-7 col-lg-7">
                                <table class="table table-responsive">
                                    <tbody>
                                        <tr>
                                            <td class='col-md-4'>Nombre de la empresa:</td>
                                            <td><input type="text" class="form-control input-sm" name="nombre_empresa" value="<?php echo $row['nombre_empresa']?>" required></td>
                                        </tr>
                                        <tr>
                                            <td>Teléfono:</td>
                                            <td><input type="text" class="form-control input-sm" name="telefono" value="<?php echo $row['telefono']?>" required></td>
                                        </tr>
                                        <tr>
                                            <td>Correo electrónico:</td>
                                            <td><input type="email" class="form-control input-sm" name="email" value="<?php echo $row['email']?>" ></td>
                                        </tr>
                                        <tr hidden>
                                            <td>Simbolo de moneda:</td>
                                            <td>
                                                <select class='form-control input-sm' name="moneda" required>
                                                    <?php
                                                        $sql="select name, symbol from  currencies group by symbol order by name ";
                                                        $query=mysqli_query($con,$sql);
                                                        while($rw=mysqli_fetch_array($query)){
                                                            $simbolo=$rw['symbol'];
                                                            $moneda=$rw['name'];
                                                            if ($row['moneda']==$simbolo){
                                                                $selected="selected";
                                                            } else {
                                                                $selected="";
                                                            }
                                                    ?>
                                                    <option value="<?php echo $simbolo;?>" <?php echo $selected;?>><?php echo ($simbolo);?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dirección:</td>
                                            <td><input type="text" class="form-control input-sm" name="direccion" value="<?php echo $row["direccion"];?>" required></td>
                                        </tr>
                                        <tr>
                                            <td>Ciudad:</td>
                                            <td><input type="text" class="form-control input-sm" name="ciudad" value="<?php echo $row["ciudad"];?>" required></td>
                                        </tr>
                                        <tr>
                                            <td>Región/Provincia:</td>
                                            <td><input type="text" class="form-control input-sm" name="estado" value="<?php echo $row["estado"];?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Código postal:</td>
                                            <td><input type="text" class="form-control input-sm" name="codigo_postal" value="<?php echo $row["codigo_postal"];?>"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class='col-md-12' id="resultados_ajax"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-refresh"></i> Actualizar datos</button>
                    </div>
                    <br>
                </div>
            </div>
            </form>
        </div>
    </div>
        <?php
            include("footer.php");
        ?>
</body>
</html>
<script type="text/javascript" src="js/bootstrap-filestyle.js"> </script>
<script>
    $( "#perfil" ).submit(function( event ) {
        $('.guardar_datos').attr("disabled", true);

        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "ajax/editar_perfil.php",
            data: parametros,
            beforeSend: function(objeto){
                $("#resultados_ajax").html("Mensaje: Cargando...");
            },
            success: function(datos){
                $("#resultados_ajax").html(datos);
                $('.guardar_datos').attr("disabled", false);

            }
        });
        event.preventDefault();
    })
</script>
<script>
    function upload_image(){

        var inputFileImage = document.getElementById("imagefile");
        var file = inputFileImage.files[0];
        if( (typeof file === "object") && (file !== null)){
            $("#load_img").text('Cargando...');
            var data = new FormData();
            data.append('imagefile',file);
            $.ajax({
                url: "ajax/imagen_ajax.php",
                type: "POST",
                data: data,
                contentType: false,
                cache: false,
                processData:false,
                success: function(data){
                    $("#load_img").html(data);

                }
            });
        }
    }
</script>
