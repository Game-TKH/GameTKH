<html>
    <head>
         <meta charset="utf-8">
         <title>Principal</title>
         <link href="CSS\miestilo.css" rel="stylesheet" type="text/css"/>
</head>
<?php 
require ("Conexion.php");
           $Nom_usuario="";
           $Password="";

           if(isset($_POST["b1"])){
            
            $idPaciente=$_POST["idPaciente"];
            $pacIdentificacion=$_POST["pacIdentificacion"];
            $pacNombres=$_POST["pacNombres"];
            $pacApellidos=$_POST["pacApellidos"];
            $pacFechaNacimiento=$_POST["pacFechaNacimiento"];
            $pacSexo=$_POST["pacSexo"];
            $insertar= mysql_query("select idPaciente from pacientes where idPaciente='".$idPaciente."'");
            $rows = mysql_num_rows($insertar);
            if ($rows >=1) 
            {
                echo "<script>alert('El codigo del paciente ya existe!!!!')</script>";
            } else {
                if($_POST['idPaciente']=="")
                {
                echo "<script>alert(\"Debes digitar el Codigo del Paciente.\");</script>";
                }
                elseif ($_POST['pacIdentificacion']==""){
                    echo "<script>alert(\"Debes digitar la identificacion del Paciente.\");</script>";
                }
                elseif ($_POST['pacNombres']==""){
                    echo "<script>alert(\"Debes digitar el nombre del Paciente.\");</script>";
                }
                elseif ($_POST['pacApellidos']==""){
                    echo "<script>alert(\"Debes digitar los apellidos del Paciente.\");</script>";
                }
                elseif ($_POST['pacFechaNacimiento']==""){
                    echo "<script>alert(\"Debes digitar la fecha de nacimiento del Paciente.\");</script>";
                }
                elseif ($_POST['pacSexo']==""){
                    echo "<script>alert(\"Debes digitar sexo del Paciente.\");</script>";
                }
                else {
                    $insertar="INSERT INTO bd_clinicadelsur.pacientes
                    (idPaciente, pacIdentificacion, pacNombres, pacApellidos, pacFechaNacimiento, pacSexo )
                    VALUES ('".$idPaciente."','".$pacIdentificacion."','".$pacNombres."','".$pacApellidos."','".$pacFechaNacimiento."','".$pacSexo."')";
                    mysql_query($insertar, $conn) or die("Error de ingreso: ".mysql_error());
                    $f1=mysql_affected_rows($conn);
                    if($f1>0){
                        echo"<script>alert('Datos insertados correctamente!!')</script>";
                    echo"<script>location.href='InsertarPaciente.php'</script>";
                    }
                }

            }
           }
           
        if (isset($_POST["b2"])){
            if(empty($_POST["idPaciente"])){
                echo "<script>alert('Debe ingresar el codigo del paciente !!!');</script>";
            }else{
                $idPaciente=$_POST["idPaciente"];
                $buscar1="select idPaciente, pacIdentificacion, pacNombres, pacApellidos, pacFechaNacimiento, pacSexo from Pacientes where idPaciente='".$idPaciente."'";
                $result4=mysql_query($buscar1, $conn) or die ("Error de consulta".mysql_error());
                $f3=mysql_num_rows($result4);
                if($f3>0){
                    while($row=mysql_fetch_array($result4)){
                        $idPaciente=$_POST["idPaciente"];
                        $pacIdentificacion=$row["pacIdentificacion"];
                        $pacNombres=$row["pacNombres"];
                        $pacApellidos=$row["pacApellidos"];
                        $pacFechaNacimiento=$row["pacFechaNacimiento"];
                        $pacSexo=$row["pacSexo"];
                    }
                }else{ 
                    
                    echo"<script>alert('Dato no encontrado!!')</script>";}
                    echo"<script>location.href='InsertarPaciente.php'</script>";
                    }
                }

                if(isset($_POST["b3"])){

                if(empty($_POST["idPaciente"])){    

                }else{

                    $codigo=$_POST["idPaciente"];
                    $buscar1="idPaciente,pacIdentificacion,pacNombres,pacAPellidos,pacFechaNacimiento,pacSexo  
                    
                              from pacientes where idPaciente='".$idPaciente."'";

                    $result4=mysql_query($buscar1,$conn) or die ("Error de consulta".mysql_error());
                    $f3=mysql_num_rows($result4);
                    if($f3>0){
                        while($row=mysql_fetch_array($result4)){
                            $idPaciente=$_POST["idPaciente"];
                            $pacIdentificacion=$_POST["pacIdentificacion"];
                            $pacNombres=$_POST["pacNombres"];
                            $pacApellidos=$_POST["pacApellidos"];
                            $pacFechaNacimiento=$_POST["pacFechaNacimiento"];
                            $pacSexo=$_POST["pacSexo"];
                        }

                    }else{
                        echo"<script>alert('Dato no encontrado!!')</script>";
                        echo"<script>location.href='InsertarPaciente.php'</script>";
                    }          
            }

            
        }

        if(isset($_POST["b4"])){

            if(empty($_POST["idPaciente"])){
                echo "<script>alert('Debe Buscar primero los datos a eliminar!!')</script>";
            }else{
                $idPaciente=$_POST["idPaciente"];
                $buscar1="select * from Pacientes where idPaciente='$idPaciente'";
                $result4=mysql_query($buscar1, $conn);
                $f3=mysql_num_rows($result4);
                if($f3>0){
                    $eliminar="delete from pacientes where idPaciente='$idPaciente'";
                    mysql_query($eliminar,$conn);
                    $fil=mysql_affected_rows($conn);
                    if($fil>0){
                        echo "<script>alert('Dato Eliminado con exito')</script>";
                    }
                }else{
                    echo "<script>alert('Dato no encontrado!!')</script>";
                    echo"<script>location.href='InsertarPaciente.php'</script>";
        }
    }
}

if(isset($_POST["b5"])){
                        $idPaciente=$_POST["idPaciente"];
                        $pacIdentificacion=$_POST["pacIdentificacion"];
                        $pacNombres=$_POST["pacNombres"];
                        $pacApellidos=$_POST["pacApellidos"];
                        $pacFechaNacimiento=$_POST["pacFechaNacimiento"];
                        $pacSexo=$_POST["pacSexo"];

if($_POST['idPaciente']== "")
{
    echo "<script>alert(\"Debes de primero buscar los datos a modificar.\");</script>";
}

else{

    if($_POST['idPaciente']!=""){
        $modificar="UPDATE centromedico.pacientes set pacIdentificacion='".$pacIdentificacion."', pacNombres='".$pacNombres."', pacApellidos='".$pacApellidos."', pacFechaNacimiento='".$pacFechaNacimiento."',
        pacSexo='".$pacSexo."' where idPaciente='".$idPaciente."'";
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
    <div id="abuelo">
    <div id="padre">
        <div id="enca" class="grupo1"></div>
          <div id="contenido">
            <div id="menu"> </div>
              <div id="contec"> 
                <div id="menuprincipal">
    </div>
    <center>
        <h1> Pacientes </h1>
   </center>

   <form id="pacientes" name="pacientes" method="post" action="Insertarpaciente.php">
    <p> &nbsp; </p>
     <table width="452" border="1">
        <tr>
            <td colspan="3"><div align="center"><strong>Informacion Pacientes </strong></div></td>
</tr>
    <tr>
        <td width="78">idPaciente: </td>
        <td width="2">&nbsp;</td>
        <td width="335"><input name="idPaciente" type="text" value="<?php echo $idPaciente; ?>"/></td>
</tr>
<tr>
        <td>Identificacion: </td>
        <td>&nbsp;</td>
        <td><input name="pacIdentificacion" type="text" size="40"value="<?php echo $pacIdentificacion; ?>"/></td>
</tr>
    <tr>
        <td>Nombres: </td>
        <td> &nbsp; </td>
        <td><input name="pacNombres" type="text" size="40" value="<?php echo $pacNombres; ?>"/></td>
        </tr>
    <tr>
        <td>Apellidos: </td>
        <td> &nbsp; </td>
        <td><input name="pacApellidos" type="text" size="40" value="<?php echo $pacApellidos; ?>"/></td>
        </tr>
    <tr>
        <td> Fecha de Nacimiento </td>
        <td> &nbsp; </td>
        <td><input name="pacFechaNacimiento" type="date" size="40" value="<?php echo $pacFechaNacimiento; ?>"/></td>
</tr>
    <tr>
        <td>Sexo</td>
        <td> &nbsp; </td>
        <td><label for="pacSexo"></label>
       <select name="pacSexo" id="pacSexo" style="width:270px">
       <option value="No">Seleccione</option>
       <option value="Feminista">Feminista</option>
       <option value="walmart bag">Walmart bag</option>
</select></td>
</tr>

     <tr>
        <td colspan="3"><label>
            <div align="center">
</br>
</br>
            <input type="submit" name="b1" value="Insertar"s/>
            <input type="reset" name="b7" value="Limpiar Ingreso"/>
            <input type="submit" name="b2" value="Buscar"/>
            <input type="submit" name="b5" value="Modificar"/>
            <input type="submit" name="b4" value="Eliminar"/>
</br>
</br>
            <input type="submit" name="b3" value="Mostrar Informacion"/>
</div>
</label>
</br>
</td>
</tr>
<?php
if (isset($_POST["b3"])){
    ?>
            <tr>
                <td rowspan="2"><center>Listado Pacientes</center> </td>
                <td rowspan="2"> &nbsp;</td>
</tr>
            <tr>
                <td><a href="reportes.php"><center>Listado Total Pacientes</center></a></td>
                <?php
}
?>
               <td width="9"> </td>
</tr>
</table>
</div>
           <label></label>
</form>
</br>
</br>
</div>
</div>
            <div id="pie" class="grupo1"> </div>
</div>
</div>
</body>
</html>


