<?php 

$ajax = $_GET['txtQr'];

if (isset($ajax) && !empty($ajax)) {

	echo '
	<label>&nbsp</label>
	<input type="text" class="form-control" name="txtAnoUno" placeholder="Año" maxlength="4" pattern="[0-9]{4}" value="'.$ajax.'" required onkeypress="return valida(event)"/>';
}else{

echo '
<label>&nbsp</label>
<input type="text" class="form-control" name="txtAnoUno" placeholder="Año" maxlength="4" pattern="[0-9]{4}" required/>';

}

 ?>