<?php
	include "conexion.php";
    session_start();
    $tipo = $_POST['Tipo'];
    if (isset($_SESSION['Nick'])){
        $miNick= $_SESSION['Nick'];
        $query= "SELECT * FROM producto WHERE tipo= '$tipo' and nick='$miNick'";
    }
    else {
        $query= "SELECT * FROM producto WHERE tipo= '$tipo'";
    }
	
	$resultado=mysqli_query($con,$query);
	if (!$resultado) {
        die("Error");
    }
    else {
        $existe= mysqli_num_rows($resultado);
	    if ($existe != 0) {
    	    $reg = mysqli_fetch_array($resultado);
    	    $resultado=mysqli_query($con,$query);
    	    while ($rec = mysqli_fetch_array($resultado)) {
    	        $idProducto = $rec['id'];
    	        $nombreProducto = $rec['nombreProducto'];
        	    echo "<a href=mostrarProducto.php?id=$idProducto>$nombreProducto</a>";
        	    echo "<br>";
    	    }
   	    }
   	    else {
   	        echo "No hemos encontrado ningún producto de tipo "." '$tipo' ";
   	    }
    }
    mysqli_close($con);

?>