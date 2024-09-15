<?php

	require_once "../conexion.php";

	$codConfirm = "gecorleon_07_02_2000";
	$codigo = $_POST['codigo'];

	if ($codigo == $codConfirm) {
		$sql = "DELETE FROM cargos WHERE id_cargo != 1 AND id_cargo != 2 AND id_cargo != 3";
		$resultado = $conectar->query($sql);

		if($resultado){
			$sql2 = "DELETE FROM empleados";
			$resultado2 = $conectar->query($sql2);

			if($resultado2){
				$sql3 = "DELETE FROM actas";
				$resultado3 = $conectar->query($sql3);

				if($resultado3){

					$sql4 = "DELETE FROM gastos WHERE id_gasto != 1";
					$resultado4 = $conectar->query($sql4);

					if($resultado4){

						$sql5 = "DELETE FROM clientes_gastos";
						$resultado5 = $conectar->query($sql5);

						if($resultado5){

							$sql6 = "DELETE FROM clientes";
							$resultado6 = $conectar->query($sql6);

							if($resultado6){

								$sql7 = "DELETE FROM clientes_actas";
								$resultado7 = $conectar->query($sql7);

								if($resultado7){

									$sql8 = "DELETE FROM carpetas";
									$resultado8 = $conectar->query($sql8);

									if($resultado8){

										$sql9 = "DELETE FROM usuarios";
										$resultado9 = $conectar->query($sql9);
										$data = 1;
									}else{
										$data = 3;
									}

								}else{
									$data = 3;
								}

							}else{
								$data = 3;
							}
						}else{
							$data = 3;
						}

					}else{
						$data = 3;
					}

				}else{
					$data = 3;
				}

			}else{
				$data = 3;
			}

		}else{
			$data = 3;
		}
	}else{
		$data = 2;
	}

	sleep(1);
	print json_encode($data);
?>