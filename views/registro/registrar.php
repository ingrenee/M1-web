<div class="formulario">
  <h2>Registro de empresa</h2>
   <?PHP  echo form_open();?>
    

  <div class="fila negro">
    Datos de la empresa
</div>

<div class="fila">
<div class="caption">Nombre de la empresa </div>
<?PHP  echo form_input('nombre',set_value('nombre'),' class="caja largo"');?> <?PHP echo  form_error('nombre');?>
</div>

<div class="fila">
<div class="caption">R.U.C</div> <?PHP  echo form_input('ruc',set_value('ruc'),' class="caja largo"');?> <?PHP echo  form_error('ruc');?>
</div>

<div class="fila">
<div class="caption">Rubro</div> <?PHP echo  form_dropdown('rubro',$rubros);?> <?PHP echo  form_error('rubros');?>
</div>





<div class="fila"><table width="200" border="0">
  <tr>
    <td><div class="caption1">Pais</div> <?PHP
	
	 echo  form_dropdown('pais',$pais,array(),' onChange="jsdep(this)" ');?>
<?PHP echo  form_error('pais');?></td>
    <td><div class="caption1">Departamento</div> 
	<?PHP echo  form_dropdown('departamento',$departamento,array(),' id="departamento" onChange="jsdist(this)" ');?>
<?PHP echo  form_error('departamento');?></td>
    <td><div class="caption1">Distrito</div> 

<?PHP 

$js1=$js2='';
if(isset($_POST['departamento']) && $_POST['departamento']==15):
$js1=' style=" display:none" disabled="disabled"';
else:
$js2=' style=" display:none" disabled="disabled"';
?>
<?PHP endif;?>
    
	<?PHP echo  form_dropdown('distrito',$distrito,set_value('distrito'),' id="distrito" '.$js2);?>
 
    <?PHP echo  form_dropdown('distrito',$distrito_callao,set_value('distrito'),' id="distrito_callao" '.$js1);?>

<?PHP echo  form_error('distrito');?></td>
  </tr>
</table>


</div>

<div class="fila">
<div class="caption">Direcci&oacute;n</div> <?PHP  echo form_input('direccion',set_value('direccion'),' class="caja largo"');?>
<?PHP echo  form_error('direccion');?>
</div>
<div class="fila negro">
Datos del contacto
</div>
<div class="fila">
<div class="caption">Nombres del contacto</div> <?PHP 
 echo form_input('encargado',set_value('encargado'),' class="caja largo"');?>
<?PHP echo  form_error('encargado');?>
</div>


<div class="fila">
<div class="caption">Cargo</div> <?PHP  echo form_input('cargo',set_value('cargo'),' class="caja largo"');?>
<?PHP echo  form_error('cargo');?>
</div>


<div class="fila negro">
Datos de acceso
</div>
<div class="fila">
<div class="caption">E-mail</div> <?PHP  echo form_input('email_contacto',set_value('email_contacto'),' class="caja largo"');?>
<?PHP echo  form_error('email_contacto');?>
</div>
<div class="fila">
<div class="caption">Password</div> <?PHP  echo form_password('pass',set_value('pass'));?>
<?PHP echo  form_error('pass');?>
</div>

<div class="fila">
<div class="caption">Re-Password</div> <?PHP  echo form_password('re',set_value('re'));?>
<?PHP echo  form_error('re');?>
</div>



<div class="fila2"><input type="submit"  class="button large orange"value="Registrarse">
</div>
<?PHP echo form_close();?>
</div>