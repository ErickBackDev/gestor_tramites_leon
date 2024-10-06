<?php

	session_start();
	if (isset($_SESSION['usuario'])) {
		require_once "header.php";
?>

	<div class="tab">
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col">
				<h3>
					<?php 
					echo "Hola: ".$_SESSION['nombre']." ".$_SESSION['apellido']."<br>";
					?>
				</h3>
				<?php
				echo "Nombre de Usuario: <b>".$_SESSION['usuario']."</b><br>";
				echo "Usted tiene permisos de: <b>".$_SESSION['cargo']."</b><br>";
				date_default_timezone_set('America/Caracas');
				echo "Fecha y Hora: ".date('d-m-Y, h:i a');
				?>
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col">
				<h3>Sobre Nosotros:</h3>
			</div>
		</div>
		<button class="tablinks" onclick="mostrarFinalidad()">Finalidad</button>
        <button class="tablinks" onclick="mostrarServicios()">Servicios</button>
        <button class="tablinks" onclick="mostrarApoyanos()">Apoyanos</button>
    </div>

    <div class="container">
    	<div class="row">
    		<div class="col">
    			<h1>
    				<p style="text-align: center;">Sociedad Genealógica</p>
    				<p style="text-align: center;">"El León De La Cordillera".</p>
    			</h1><br>

    			<p>
    				<div id="finalidad">
    					<div class="row">
    						<div class="col-sm-1"></div>
    						<div class="col-sm-11">
    							<p style="text-align: justify;">Ya que gran parte de los países europeos mantienen la tradición de aceptar que descendientes de bisabuelos y tatarabuelos de dicha nacionalidad efectúen los trámites respectivos para obtener la doble nacionalidad, la Sociedad Genealógica de igual forma ofrece como función principal los servicios de manera particular, para ayudar o apoyar a los interesados o interesadas en realizar investigaciones, tramitar certificaciones de documentos, rectificaciones, legalizaciones, apostillas, traducciones al italiano de documentos civiles, eclesiásticos, entre otros, para efectuar las gestiones respectivas directamente en tal país, con el fin de obtener la doble nacionalidad.</p>
    						</div>
    					</div>
    				</div>
    				
    				
    				<div id="servicios" style="display: none;">
    					<div class="row">
    						<div class="col-sm-1"></div>
    						<div class="col-sm-11">
    							<p style="text-align: justify;">También ponen a disposición los mismos servicios a empresas, entidades, familias o personas que descienden por vía materna y desean obtener su derecho a la Nacionalidad Europea.</p>

    							<p style="text-align: justify;">Ofrecen de manera particular los servicios para efectuar investigaciones y construir árboles genealógicos para interesados particulares en conocer sus raíces ancestrales.</p>
    						</div>
    					</div>
    				</div>

    				<div id="apoyanos" style="display: none;">
    					<div class="row">
    						<div class="col-sm-1"></div>
    						<div class="col-sm-11">
    							<p style="text-align: justify;">La Sociedad Genealógica "El León de la Cordillera", expresa que: considerando que las investigaciones genealógicas y tramitaciones de documentos certificados son costosos, invitan a instituciones y a particulares que estén interesados en apoyar con aportes de recursos materiales o financieros para fortalecer y ampliar los esfuerzos y metas que se han trazado en la formación de un árbol multifamiliar que hasta la presente fecha se acerca a las cincuenta mil personas.</p>
    						</div>
    					</div>
    				</div>
    			</p>
    		</div>
    	</div>
    </div>

<?php
	require_once "footer.php";
?>

	<script src="../js/inicio.js"></script>

<?php

	} else {
		header("location:../accesodenegado.php");
	}

?>