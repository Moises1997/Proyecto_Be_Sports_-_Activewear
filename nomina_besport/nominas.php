<?php
$active_facturas="active";
$active_productos="";
$active_clientes="";
$active_usuarios="";
$title="Nóminas";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php
        include("head.php");
    ?>

    <script>
        function doSearch(){
            var tableReg = document.getElementById('datos');
            var searchText = document.getElementById("q").value.toLowerCase();
            var cellsOfRow="";
            var found = false;
            var compareWith="";

            for(var i = 1; i < tableReg.rows.length; i++){
                cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                found = false;

                for(var j = 0; j < cellsOfRow.length && !found; j++){
                    compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                    if(searchText.length == 0 || (compareWith.indexOf(searchText) > -1)){
                        found = true;
                    }
                }
                if(found){
                    tableReg.rows[i].style.display= '';
                }else{
                    tableReg.rows[i].style.display='none';
                }
            }
        }
    </script>

</head>
<body>
    <?php
        include "navbar.php"
    ?>
<br>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <center>
                <h3><strong>Nóminas</strong></h3>
                </center>
            </div>
            <div class="panel-body">
                <div class="pull-left">
                    <a href="../index.php" class="btn btn-success"><i class="glyphicon glyphicon-home"></i><br>Menú Principal</a>
                </div>
                <div class="btn-group pull-right">
                    <a  href="nueva_nomina.php" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span> Nueva Nómina</a>
                </div>
                <br>
                <br>
                <hr>

                <form class="form-horizontal" role="form" id="datos_cotizacion">

                <div class="form-group row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="q" placeholder="Buscar" onkeyup='doSearch()' title="buscar">
                    </div>
                    <div class="col-md-4"></div>
                </div>
                </form>
                <div id="resultados"></div>
                <div class='outer_div'></div>
            </div>
        </div>
    </div>
    <hr>
<?php
    include("footer.php");
?>
<script type="text/javascript" src="js/VentanaCentrada.js"></script>
<script type="text/javascript" src="js/nominas.js"></script>
</body>
</html>
