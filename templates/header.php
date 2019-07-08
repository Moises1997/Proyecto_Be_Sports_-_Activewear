<?php
    error_reporting(0);
    ob_start();
    session_start();
    require_once 'config.php';
    if(!isset($_SESSION['logged_in'])){
        header('Location: login.php');
    }
?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Be Sports & Activewear</title>

    <link rel="icon" href="img/Logo_Be_Sports_Vector.png">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link href="https://file.myfontastic.com/rrXBL8HCrLkEjnWZdjPgCV/icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">


    <script language="JavaScript">
              function pregunta(e){
                  if (confirm('¿Estas seguro de que deseas eliminar este usuario?.')){
                      document.borraregistros.submit()
                  }else{
                      e.preventDefault();
                  }
              }
        </script>

  </head><br>
  <body class="d-flex flex-column h-100">
