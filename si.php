<html> 
    <head>
        <meta charset="utf-8">
       <title>Form</title>
       <link href="css\Stylefor.css" rel="stylesheet" type="text/css"/>
      
       <link rel="shortcut icon" type="image/x-icon" href="images\logo sin fondo.PNG"> 
    </head>
    <?php 
require("Conexion.php");

$Nom_usuario = "";
$pasword = "";

if (isset($_POST["b1"])) {
    $Nom_usuario = $_POST["Nom_usuario"];
    $pasword = $_POST["pasword"];
    
    if (empty($Nom_usuario)) {
        echo "<script>alert('Debes ingresar un nombre de usuario.');</script>";
    } elseif (empty($pasword)) {
        echo "<script>alert('Debes digitar la contraseña.');</script>";
    } else {
        $stmt = $conn->prepare("SELECT Nom_usuario FROM registros WHERE Nom_usuario = ?");
        $stmt->bind_param("s", $Nom_usuario);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows >= 1) {
            echo "<script>alert('El Usuario ya está registrado!')</script>";
            echo "<script>location.href='si.php'</script>";
        } else {
            $hashed_password = password_hash($pasword, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO proyecto.registros (Nom_usuario, pasword) VALUES (?, ?)");
            $stmt->bind_param("ss", $Nom_usuario, $hashed_password);
            if ($stmt->execute()) {
                echo "<script>alert('Datos insertados correctamente!')</script>";
                echo "<script>location.href='si.php'</script>";
            } else {
                echo "Error de ingreso: " . $conn->error;
            }
        }
    }
}

if (isset($_POST["b2"])) {
    if (empty($_POST["Nom_usuario"])) {
        echo "<script>alert('Debe ingresar el código del paciente !!!');</script>";
    } else {
        $Nom_usuario = $_POST["Nom_usuario"];
        $stmt = $conn->prepare("SELECT Nom_usuario, pasword FROM registros WHERE Nom_usuario = ?");
        $stmt->bind_param("s", $Nom_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $Nom_usuario = $row["Nom_usuario"];
            $pasword = $row["pasword"];
        } else {
            echo "<script>alert('Dato no encontrado!')</script>";
            echo "<script>location.href='si.php'</script>";
        }
    }
}

if (isset($_POST["b3"])) {
    if (!empty($_POST["Nom_usuario"])) {
        $Nom_usuario = $_POST["Nom_usuario"];
        $stmt = $conn->prepare("SELECT Nom_usuario, pasword FROM registros WHERE Nom_usuario = ?");
        $stmt->bind_param("s", $Nom_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $Nom_usuario = $row["Nom_usuario"];
            $pasword = $row["pasword"];
        } else {
            echo "<script>alert('Dato no encontrado!')</script>";
            echo "<script>location.href='si.php'</script>";
        }
    }
}

if (isset($_POST["b4"])) {
    if (empty($_POST["Nom_usuario"])) {
        echo "<script>alert('Debe Buscar primero los datos a eliminar!')</script>";
    } else {
        $Nom_usuario = $_POST["Nom_usuario"];
        $stmt = $conn->prepare("SELECT * FROM registros WHERE Nom_usuario = ?");
        $stmt->bind_param("s", $Nom_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $stmt = $conn->prepare("DELETE FROM registros WHERE Nom_usuario = ?");
            $stmt->bind_param("s", $Nom_usuario);
            if ($stmt->execute()) {
                echo "<script>alert('Dato Eliminado con éxito')</script>";
            }
        } else {
            echo "<script>alert('Dato no encontrado!')</script>";
            echo "<script>location.href='si.php'</script>";
        }
    }
}

if (isset($_POST["b5"])) {
    if (empty($_POST["Nom_usuario"])) {
        echo "<script>alert('Debes de primero buscar los datos a modificar.');</script>";
    } else {
        $Nom_usuario = $_POST["Nom_usuario"];
        $pasword = $_POST["pasword"];
        $hashed_password = password_hash($pasword, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("UPDATE proyecto.registros SET pasword = ? WHERE Nom_usuario = ?");
        $stmt->bind_param("ss", $hashed_password, $Nom_usuario);
        
        if ($stmt->execute()) {
            echo "<script>alert('Dato modificado correctamente!')</script>";
            echo "<script>location.href='pagina.php'</script>";
        } else {
            echo "Error en la actualización: " . $conn->error;
        }
    }
}
?>
 <body>
    <header>
        <div class="menu container">
        <a href="pagina.php">
        <img src="Images/Logo sin fondo.png " href="proyectoep\pagina.php" class="logo"> </a>
            <imput type="checkbox" id="menu">  
            <label>
                <img src="" class="menu-icono">
            </label>
            <nav class="navbar">
                <ul>       
                    <font color="red">
                    <li><a href="#">Novedades</a></li> 
                    <li><a href="Informacion.html">Información</a></li>
                    <li><a href="Foro.html">Foro Game TKH</a></li>
                    <li><a href="si.php">Registro</a></li>
                    
                    </font>
                </ul>
            </nav>
        </div>
    </header>
    <section>

    
        <div class="formulario">
            <h1>Registro</h1>
            <form class="si"method="post">
                <div class="Nom_usuario">
                    <input name="Nom_usuario"type="text" value="<?php echo $Nom_usuario; ?>"required>
                    <label> Nombre de Usuario </label>
                </div>
                <div class="pasword">
                <input name="pasword" type="password" value="<?php echo $pasword; ?>"required>
                    <label> Contraseña </label>
                </div>
                <div class="Recordar">¿Olvidó su Contraseña?</div>
                <input class="enviar" name= "b1"type="submit" value="Registrarse">
                <div class="registrarse">
                    Quiero hacer el <a href="#">Registro </a>
                </div>
            </form>
            
        </div>
        <div class="nu">
        <a class="on" href="#">Políticas de tratamiento de datos</a>
</div>
        
        </section>
        

    </body>
        

</html>