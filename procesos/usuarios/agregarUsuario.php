<?php

	require_once "../conexion.php";
	
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$cargo=$_POST['cargosUser'];
	$correo=$_POST['correo'];
	$usuario=$_POST['usuario'];
	$password=sha1($_POST['password']);

	$query = mysqli_query($conectar, "SELECT * FROM usuarios WHERE usuario = '$usuario'");
	$nr = mysqli_num_rows($query);

	if($nr==1){
		$data = 2;
	}else{
		if ($cargo==1) {
			$query2 = mysqli_query($conectar, "SELECT * FROM usuarios WHERE id_cargo = 1");
			$nr2 = mysqli_num_rows($query2);

			if($nr2==1){
				$data = 3;
			}else{
				$sql="INSERT INTO usuarios VALUES(NULL, '$nombre', '$apellido', '$cargo', '$correo', '$usuario', '$password', NULL)";
				$ejecutar=mysqli_query($conectar,$sql);
				$idUsuario = mysqli_insert_id($conectar);
				
				if($ejecutar){

					if($_FILES['archivo']['size'] > 0){

						$imgPermitidas = array("image/jpg", "image/jpeg", "image/png");
						$limite = 5000;

						if (in_array($_FILES['archivo']['type'], $imgPermitidas)) {

							if ($_FILES['archivo']['size'] <= $limite * 1024) {

								$filename = $_FILES['archivo']['name'];
								$explode = explode('.', $filename);
								$tipo = array_pop($explode);
								$nombre_final = $idUsuario.'.'.$tipo;
								$carpeta = '../../img/' . $idUsuario . '/';
								$ruta = $carpeta . $nombre_final;

								function eliminarDir($carpeta){
									foreach (glob($carpeta."/*") as $elemento) {
										if (is_dir($elemento)) {
											eliminarDir($elemento);
										}else{
											unlink($elemento);
										}
									}
									rmdir($carpeta);
								}

								if (file_exists($carpeta)) {
									eliminarDir($carpeta);		
								}

								if(!file_exists($carpeta)){
									mkdir($carpeta,0777,true);
								}

								if (move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta)) {
									$data = 1;
								}else{
									$data = 7;
								}
							}else{
								$data = 6;
							}
						}else{
							$data = 5;
						}
					}else{

						$carpeta = '../../img/' . $idUsuario . '/';

						function eliminarDir($carpeta){
							foreach (glob($carpeta."/*") as $elemento) {
								if (is_dir($elemento)) {
									eliminarDir($elemento);
								}else{
									unlink($elemento);
								}
							}
							rmdir($carpeta);
						}

						if (file_exists($carpeta)) {
							eliminarDir($carpeta);		
						}
						
						$data = 1;
					}

				}else{
					echo "Hubo Algún Error";
				}
			}
		}else if ($cargo==2) {
			$query3 = mysqli_query($conectar, "SELECT * FROM usuarios WHERE id_cargo = 2");
			$nr3 = mysqli_num_rows($query3);

			if($nr3==1){
				$data = 4;
			}else{
				$sql="INSERT INTO usuarios VALUES(NULL, '$nombre', '$apellido', '$cargo', '$correo', '$usuario', '$password', NULL)";
				$ejecutar=mysqli_query($conectar,$sql);
				$idUsuario = mysqli_insert_id($conectar);
				
				if($ejecutar){

					if($_FILES['archivo']['size'] > 0){

						$imgPermitidas = array("image/jpg", "image/jpeg", "image/png");
						$limite = 5000;

						if (in_array($_FILES['archivo']['type'], $imgPermitidas)) {

							if ($_FILES['archivo']['size'] <= $limite * 1024) {

								$filename = $_FILES['archivo']['name'];
								$explode = explode('.', $filename);
								$tipo = array_pop($explode);
								$nombre_final = $idUsuario.'.'.$tipo;
								$carpeta = '../../img/' . $idUsuario . '/';
								$ruta = $carpeta . $nombre_final;

								function eliminarDir($carpeta){
									foreach (glob($carpeta."/*") as $elemento) {
										if (is_dir($elemento)) {
											eliminarDir($elemento);
										}else{
											unlink($elemento);
										}
									}
									rmdir($carpeta);
								}

								if (file_exists($carpeta)) {
									eliminarDir($carpeta);		
								}

								if(!file_exists($carpeta)){
									mkdir($carpeta,0777,true);
								}

								if (move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta)) {
									$data = 1;
								}else{
									$data = 7;
								}
							}else{
								$data = 6;
							}
						}else{
							$data = 5;
						}
					}else{

						$carpeta = '../../img/' . $idUsuario . '/';

						function eliminarDir($carpeta){
							foreach (glob($carpeta."/*") as $elemento) {
								if (is_dir($elemento)) {
									eliminarDir($elemento);
								}else{
									unlink($elemento);
								}
							}
							rmdir($carpeta);
						}

						if (file_exists($carpeta)) {
							eliminarDir($carpeta);		
						}
						
						$data = 1;
					}

				}else{
					echo "Hubo Algún Error";
				}
			}
		}else{
			$sql="INSERT INTO usuarios VALUES(NULL, '$nombre', '$apellido', '$cargo', '$correo', '$usuario', '$password', NULL)";
			$ejecutar=mysqli_query($conectar,$sql);
			$idUsuario = mysqli_insert_id($conectar);

			if($ejecutar){

				if($_FILES['archivo']['size'] > 0){

					$imgPermitidas = array("image/jpg", "image/jpeg", "image/png");
					$limite = 5000;

					if (in_array($_FILES['archivo']['type'], $imgPermitidas)) {

						if ($_FILES['archivo']['size'] <= $limite * 1024) {

							$filename = $_FILES['archivo']['name'];
							$explode = explode('.', $filename);
							$tipo = array_pop($explode);
							$nombre_final = $idUsuario.'.'.$tipo;
							$carpeta = '../../img/' . $idUsuario . '/';
							$ruta = $carpeta . $nombre_final;

							function eliminarDir($carpeta){
								foreach (glob($carpeta."/*") as $elemento) {
									if (is_dir($elemento)) {
										eliminarDir($elemento);
									}else{
										unlink($elemento);
									}
								}
								rmdir($carpeta);
							}

							if (file_exists($carpeta)) {
								eliminarDir($carpeta);		
							}

							if(!file_exists($carpeta)){
								mkdir($carpeta,0777,true);
							}

							if (move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta)) {
								$data = 1;
							}else{
								$data = 7;
							}
						}else{
							$data = 6;
						}
					}else{
						$data = 5;
					}
				}else{

					$carpeta = '../../img/' . $idUsuario . '/';

					function eliminarDir($carpeta){
						foreach (glob($carpeta."/*") as $elemento) {
							if (is_dir($elemento)) {
								eliminarDir($elemento);
							}else{
								unlink($elemento);
							}
						}
						rmdir($carpeta);
					}

					if (file_exists($carpeta)) {
						eliminarDir($carpeta);		
					}
					
					$data = 1;
				}

			}else{
				echo "Hubo Algún Error";
			}
		}	
	}

	print json_encode($data);
?>