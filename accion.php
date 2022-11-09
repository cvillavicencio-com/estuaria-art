<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('dbconfig.php');
include('loadconf.php');
include('funciones.php');


echo 'accion: ';
$f = cleanget('f');

if ($f == 'no'){

    echo 'nueva obra<hr>';


    // subida de archivo


    //Recogemos el archivo enviado por el formulario
    $archivo = $_FILES['imagenObr']['name'];
    //Si el archivo contiene algo y es diferente de vacio
    if (isset($archivo) && $archivo != "") {
        //Obtenemos algunos datos necesarios sobre el archivo
        $tipo = $_FILES['imagenObr']['type'];
        $tamano = $_FILES['imagenObr']['size'];
        $temp = $_FILES['imagenObr']['tmp_name'];
        //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
        if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
            echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
        } else {
            //Si la imagen es correcta en tamaño y tipo
            //Se intenta subir al servidor
            if (move_uploaded_file($temp, 'gallery/'.$archivo)) {
                //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                chmod('gallery/'.$archivo, 0777);
                $com = 'convert gallery/'.$archivo.' -resize 25% -quality 92 gallery/'.substr($archivo,0,-4).'_thumb.jpg';
                exec($com);
                //Mostramos el mensaje de que se ha subido co éxito
                echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                //Mostramos la imagen subida
                echo '<p><img src="gallery/'.$archivo.'"></p>';
                $autorId    = cleanpost('autorId');
                $nombreObr    = cleanpost('nombreObr');
                $infoObr      = cleanpost('infoObr');
                $tecnicaObr   = cleanpost('tecnicaObr');
                $coleccionId   = cleanpost('coleccionId');
                $precioObr    = cleanpost('precioObr');
                $linkventaObr = cleanpost('linkventaObr');


                $cvprec = !empty($precioObr) ? array(", precioObr",", '$precioObr'") : array('','');
                $cvlink = !empty($linkventaObr) ? array(", linkventaObr",", '$linkventaObr'") : array('','');

                $query = "INSERT INTO obras (autorId, nombreObr, infoObr, tecnicaObr, imagenObr, coleccionId{$cvprec[0]}{$cvlink[1]}) VALUES ('$autorId','$nombreObr','$infoObr','$tecnicaObr','gallery/$archivo','$coleccionId'{$cvprec[1]}{$cvlink[1]})";
                echo $query;
                $exec = $conn->query($query)or die(mysqli_error());



            }
            else {
                //Si no se ha podido subir la imagen, mostramos un mensaje de error
                echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
            }
        }
    }

    // finsubidaarchivo!


}
elseif ($f == 'nc'){ // nueva colección
    $nombreCol    = cleanpost('nombreCol');
    $infoCol      = cleanpost('infoCol');

    $query = "INSERT INTO colecciones (nombreCol, infoCol) VALUES ('$nombreCol','$infoCol')";
    $exec = $conn->query($query) or die(mysqli_error());
    echo 'colección creada exitosamente :-) <a href="subir.php">subir obra</a> - <a href=".">volver al inicio</a>';
}
elseif ($f == 'ao'){
    echo 'actualizar obra<hr>';
    $nombreObr    = cleanpost('nombreObr');
    $infoObr      = cleanpost('infoObr');
    $tecnicaObr   = cleanpost('tecnicaObr');
    $precioObr    = cleanpost('precioObr');
    $linkventaObr = cleanpost('linkventaObr');
    $idObr       = cleanpost('idObr');

    $oS="SELECT * FROM infoObras WHERE idObr = '$idObr'";

    $oQ=$conn->query($oS);
    $oL = $oQ->fetch_row();
    
    $set = '';
    $set .= ($nombreObr != $oL[1]) ? "nombreObr = '$nombreObr'," : '';
    $set .= ($infoObr != $oL[2]) ? "infoObr = '$infoObr'," : '';
    $set .= ($tecnicaObr != $oL[4]) ? "tecnicaObr = '$tecnicaObr'," : '';
    $set .= ($precioObr != $oL[6]) ? "precioObr = '$precioObr'," : '';
    $set .= ($linkventaObr != $oL[7]) ? "linkventaObr = '$linkventaObr'," : '';
    $set = substr($set,0,-1);

    if ($set != ''){
        echo 'se recibieron cambios:<br>';
        $showset = explode("',",$set);
        echo '<table border="1"><tr><td><b>Columna</b></td><td><b>Valor</b></td></tr>';
        foreach ($showset as &$show){
            $cvshow = explode(" = '",$show);
            $col = $cvshow[0];
            $val = $cvshow[1];
            $val = substr($val,0,-1);
            echo '<tr><td>'.$col.'</td><td>'.$val.'</td></tr>'; 
        }
        echo '</table><br>';

        
        $query = "UPDATE obras SET $set WHERE idObr ='$idObr';";
        echo $query;
        $exec = $conn->query($query)or die(mysqli_error());
        echo '<a href="obra.php?id='.$idObr.'">volver</a>';
    } else {
        echo 'nada que actualizar';
    }

    /*
      nombreObr <input name="nombreObr" value="<?php echo $oL[1]; ?>"><br>
      infoObr <input name="infoObr" value="<?php echo $oL[2]; ?>"><br>
      tecnicaObr <input name="tecnicaObr" value="<?php echo $oL[4]; ?>"><br>
      precioObr <input name="precioObr" value="<?php echo $oL[6]; ?>"><br>
      linkventaObr <input name="linkventaObr" value="<?php echo $oL[7]; ?>"><br>
    */



}


?>
