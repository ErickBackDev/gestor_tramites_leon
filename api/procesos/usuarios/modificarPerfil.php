<?php 

	require_once "../conexion.php";

	$idUsuario = (isset($_POST['idUsuario'])) ? $_POST['idUsuario'] : "";
	$nombre = (isset($_POST['nombreEdit'])) ? $_POST['nombreEdit'] : "";
	$apellido = (isset($_POST['apellidoEdit'])) ? $_POST['apellidoEdit'] : "";
	$cargoOld = (isset($_POST['cargoOld'])) ? $_POST['cargoOld'] : "";
	$cargo = (isset($_POST['cargoUserEdit'])) ? $_POST['cargoUserEdit'] : "";
	$correo = (isset($_POST['correoEdit'])) ? $_POST['correoEdit'] : "";
	$usuarioOld = (isset($_POST['usuarioOld'])) ? $_POST['usuarioOld'] : "";
	$usuario = (isset($_POST['usuarioEdit'])) ? $_POST['usuarioEdit'] : "";
	$password = sha1((isset($_POST['passwordEdit'])) ? $_POST['passwordEdit'] : "");

	if ($usuario == "" or $usuario == null) {
		$usuario = $usuarioOld;
	}

	if ($usuario != $usuarioOld) {
		
		$query = mysqli_query($conectar, "SELECT * FROM usuarios WHERE usuario = '$usuario'");
		$nr = mysqli_num_rows($query);

		if($nr==1){
			$data = 2;
		}else{

			if ($cargo != $cargoOld) {
				
				if ($cargo==1) {
					$query2 = mysqli_query($conectar, "SELECT * FROM usuarios WHERE id_cargo = 1");
					$nr2 = mysqli_num_rows($query2);

					if($nr2==1){
						$data = 3;
					}else{
						$sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', id_cargo='$cargo', correo='$correo', usuario='$usuario', password='$password' WHERE id_usuario = '$idUsuario'";
						$resultado = $conectar->query($sql);

						if($resultado){

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
						$sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', id_cargo='$cargo', correo='$correo', usuario='$usuario', password='$password' WHERE id_usuario = '$idUsuario'";
						$resultado = $conectar->query($sql);

						if($resultado){

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
								$data = 1;
							}

						}else{
							echo "Hubo Algún Error";
						}
					}
				}else{
					$sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', id_cargo='$cargo', correo='$correo', usuario='$usuario', password='$password' WHERE id_usuario = '$idUsuario'";
					$resultado = $conectar->query($sql);

					if($resultado){

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
							$data = 1;
						}

					}else{
						echo "Hubo Algún Error";
					}
				}

			}else{
				$sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', id_cargo='$cargo', correo='$correo', usuario='$usuario', password='$password' WHERE id_usuario = '$idUsuario'";
				$resultado = $conectar->query($sql);

				if($resultado){

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
						$data = 1;
					}

				}else{
					echo "Hubo Algún Error";
				}
			}
	
		}

	}else{

		if ($cargo != $cargoOld) {

			if ($cargo==1) {
				$query2 = mysqli_query($conectar, "SELECT * FROM usuarios WHERE id_cargo = 1");
				$nr2 = mysqli_num_rows($query2);

				if($nr2==1){
					$data = 3;
				}else{
					$sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', id_cargo='$cargo', correo='$correo', usuario='$usuario', password='$password' WHERE id_usuario = '$idUsuario'";
					$resultado = $conectar->query($sql);

					if($resultado){

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
					$sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', id_cargo='$cargo', correo='$correo', usuario='$usuario', password='$password' WHERE id_usuario = '$idUsuario'";
					$resultado = $conectar->query($sql);

					if($resultado){

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
							$data = 1;
						}

					}else{
						echo "Hubo Algún Error";
					}
				}
			}else{
				$sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', id_cargo='$cargo', correo='$correo', usuario='$usuario', password='$password' WHERE id_usuario = '$idUsuario'";
				$resultado = $conectar->query($sql);

				if($resultado){

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
						$data = 1;
					}

				}else{
					echo "Hubo Algún Error";
				}
			}

		}else{
			$sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', id_cargo='$cargo', correo='$correo', usuario='$usuario', password='$password' WHERE id_usuario = '$idUsuario'";
			$resultado = $conectar->query($sql);

			if($resultado){

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
					$data = 1;
				}

			}else{
				echo "Hubo Algún Error";
			}
		}

	}

	print json_encode($data);

 ?>