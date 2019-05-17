<?php 
session_start(); $_SESSION['isLogged'] = FALSE; 
session_destroy(); 
header("Location: /GestionDeUsuarios/public/vista/login.html"); ?>