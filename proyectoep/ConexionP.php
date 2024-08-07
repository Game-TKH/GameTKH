<html> 
    <head>
        <meta charset="utf-8">
       <title>Form</title>
       <link rel="stylesheet" href="Stylefor.css">
    </head>
<?php 
require ("ConexionP.php");
           $Nom_usuario="";
           $Pasword="";

           if(isset($_POST["b1"])){
            
            $Nom_usuario=$_POST["username"];
            $Pasword=$_POST["pasword"];
            $insertar= mysql_query("select Nom_usuario from registros where Nom_usuario='".$Nom_usuario."'");
            $rows = mysql_num_rows($insertar);
            if ($rows >=1) 
            {
                echo "<script>alert('El Usuario ya esta registrado!!!!')</script>";
            } else {
                if($_POST['Nom_usuario']=="")
                {
                echo "<script>alert(\"Debes ingresar un nombre de usuario.\");</script>";
                }
                elseif ($_POST['pasword']==""){
                    echo "<script>alert(\"Debes digitar la contraseña.\");</script>";
                }
                
                else {
                    $insertar="INSERT INTO proyecto.registros
                    (Nom_usuario, pasword )
                    VALUES ('".$Nom_usuario."','".$pasword."')";
                    mysql_query($insertar, $conn) or die("Error de ingreso: ".mysql_error());
                    $f1=mysql_affected_rows($conn);
                    if($f1>0){
                        echo"<script>alert('Datos insertados correctamente!!')</script>";
                    echo"<script>location.href='ConexionP.php'</script>";
                    }
                }

            }
           }
           
           if (isset($_POST["b2"])){
            if(empty($_POST["Nom_usuario"])){
                echo "<script>alert('Debe ingresar el codigo del paciente !!!');</script>";
            }else{
                $Nom_usuario=$_POST["Nom_usuario"];
                $buscar1="select Nom_usuario, pasword='".$Nom_usuario."'";
                $result4=mysql_query($buscar1, $conn) or die ("Error de consulta".mysql_error());
                $f3=mysql_num_rows($result4);
                if($f3>0){
                    while($row=mysql_fetch_array($result4)){
                        $Nom_usuario=$_POST["Nom_usuario"];         
                        $pasword=$row["pasword"];
                    }
                }else{ 
                    
                    echo"<script>alert('Dato no encontrado!!')</script>";}
                    echo"<script>location.href='ConexionP.php'</script>";
                    }
                }


                if(isset($_POST["b3"])){

                if(empty($_POST["Nom_usuario"])){    

                }else{

                    $codigo=$_POST["Nom_usuario"];
                    $buscar1="Nom_usuario,pasword  
                    
                              from registros where Nom_usuario='".$Nom_usuario."'";

                    $result4=mysql_query($buscar1,$conn) or die ("Error de consulta".mysql_error());
                    $f3=mysql_num_rows($result4);
                    if($f3>0){
                        while($row=mysql_fetch_array($result4)){
                            $Nom_usuario=$_POST["Nom_usuario"];
                            $pasword=$_POST["pasword"];

                        }

                    }else{
                        echo"<script>alert('Dato no encontrado!!')</script>";
                        echo"<script>location.href='ConexionP.php'</script>";
                    }          
            }

            
        }

        if(isset($_POST["b4"])){

            if(empty($_POST["Nom_usuario"])){
                echo "<script>alert('Debe Buscar primero los datos a eliminar!!')</script>";
            }else{
                $Nom_usuario=$_POST["Nom_usuario"];
                $buscar1="select * from registros where Nom_usuario='$Nom_usuario'";
                $result4=mysql_query($buscar1, $conn);
                $f3=mysql_num_rows($result4);
                if($f3>0){
                    $eliminar="delete from registros where Nom_usuario='$Nom_usuario'";
                    mysql_query($eliminar,$conn);
                    $fil=mysql_affected_rows($conn);
                    if($fil>0){
                        echo "<script>alert('Dato Eliminado con exito')</script>";
                    }
                }else{
                    echo "<script>alert('Dato no encontrado!!')</script>";
                    echo"<script>location.href='ConexionP.php'</script>";
        }
    }
}

if(isset($_POST["b5"])){
                        $Nom_usuario=$_POST["Nom_usuario"];
                        $pasword=$_POST["pasword"];


if($_POST['Nom_usuario']== "")   
{
    echo "<script>alert(\"Debes de primero buscar los datos a modificar.\");</script>";
}

else{

    if($_POST['Nom_usuario']!=""){
        $modificar="UPDATE proyecto.registros set pasword='".$pasword."' where Nom_usuario='".$Nom_usuario."'";
        mysql_query($modificar,$conn)or die("Error en la actualizacion: ".mysql_error());
        $f1=mysql_affected_rows($conn);
        if($f1>0){
            echo "<script>alert('Dato modificado correctamente!!')</script>";
            echo "<script>location.href='InsertarPaciente.php'</script>";
      }
    }
  }
}
 ?>

<body>
        <header> 
            <img CLASS="pp" src="C:\Users\ALUMNO09\Desktop\pagina\logoxd.PNG" width="250" alt="logotipo">
            <div>
        <nav>
            <ul class="menu">
            
                <li><a href="C:\Users\ALUMNO09\Desktop\pagina\html taller\Untitled-1.HTML" style="color:aliceblue">Inicio</a></li>
                <li><a href="#"style="color:aliceblue">Productos</a></li>
                <li><a target="blank" href="https://www.youtube.com/watch?v=zUF0hfFWsYM" style="color:aliceblue">Historia</a></li>
                <li><a target="blank" href="https://www.youtube.com/watch?v=F67dPCQfr84" style="color:aliceblue">Carta</a></li>
                <li><a  href="C:\Users\ALUMNO09\Desktop\pagina\html taller\Formulario.HTML" style="color:aliceblue">Iniciar Sesión</a></li>
            </ul>
        </nav>
    </div>
    </header>
        <div class="formulario">
            <h1>Inicio de Sesión</h1>
            <form class="si"method="post">
                <div class="Nom_usuario">
                    <input name="Nom_usuario"type="text" value="<?php echo $Nom_usuario; ?>"required>
                    <label> Nombre de Usuario </label>
                </div>
                <div class="pasword">
                <input name="pasword" type="password" value="<?php echo $pasword; ?>"required>
                    <label> Contraseña </label>
                </div>
                <div class="Recordar">¿Olvido su Contraseña?</div>
                <input class="enviar" type="submit" value="Iniciar">
                <div class="registrarse">
                    Quiero hacer el <a href="#">Registro </a>
                </div>
            </form>
        </div>


    </body>
</html>