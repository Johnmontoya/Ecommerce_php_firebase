<?php require_once '../database/conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="../assets/css/material-dashboard.css"> 
    
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/plugins/sweetalert2.js"></script>
</head>
<body>
<div class="wrapper ">
    <div class="content">
        <div class="container-fluid">
            <h2>Bienvenido - <span id="usuarioNombre"></span></h2>
            <button id="cerrarSession" class="btn btn-danger">Cerrar Sesión</button>
    
