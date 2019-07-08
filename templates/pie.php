<?php
    require_once ("../nomina_besport/config/db.php");
    require_once ("../nomina_besport/config/conexion.php");
    $query_empresa=mysqli_query($con,"select * from perfil where id_perfil=1");
    $row=mysqli_fetch_array($query_empresa);
?>
 <footer class="footer mt-auto py-3">
  <div class="container" align="center">
            <strong><?php echo $row['nombre_empresa']?></strong>
            <i><br><?php echo $row['direccion']?></i>
            <i><br><?php echo $row['ciudad']?>,&nbsp; <?php echo $row['estado']?> CP:<?php echo $row['codigo_postal']?></i>
            <i><br><?php echo $row['telefono']?></i>
            <i><br><?php echo $row['email']?></i>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="bootstrap/js/tether.min.js"></script>
        <script src="bootstrap/js/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
