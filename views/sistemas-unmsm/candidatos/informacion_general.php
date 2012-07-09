<?PHP $this->load->view('info');?>
<div class="bloque formulario">
<h2 class="blanco">1. Informacion general</h2>





<?PHP _mensajes();?>

<form method="post">
<div class="formu2">

<div class="fila">
<div class="caption">
Nombre completo
</div>
<?PHP echo form_input('nombres',_e($usuario,'nombres'));?>
<?PHP echo form_error('nombres');?>
</div>

<div class="fila">
<div class="caption">
DNI
</div>
<?PHP echo form_input('dni',_e($usuario,'dni'));?>
<?PHP echo form_error('dni');?>
</div>


<div class="fila">
<div class="caption">Lugar de nacimiento</div>
<table width="200" border="0">
  <tr>
    <td><div class="caption1">Pais</div> <?PHP
	
	 echo  form_dropdown('pais',$pais,_ep($usuario,'pais'),' onChange="jsdep2(this,\'\')" ');?>
<?PHP echo  form_error('pais');?></td>

    <td><div class="caption1">Departamento</div> 
    <?PHP 
	//echo _ep($usuario,'departamento');
	?>
    
	<?PHP echo  form_dropdown('departamento',$departamento,_ep($usuario,'departamento'),' id="departamento" onChange="jsdist2(this,\'\')" ');?>
<?PHP echo  form_error('departamento');?></td>
    <td><div class="caption1">Distrito</div> 

<?PHP 
$js1=$js2='';
$i_dep=explode(':',@$usuario['departamento']);
$i_dep=$i_dep[0];

if( ((int)$i_departamento==15 ) || ((int)$i_dep==15)):
$js1=' style=" display:none" disabled="disabled" ';
?>
<?PHP
else:
$js2=' style=" display:none"  disabled="disabled" ';
?>   
<?PHP endif;?>
 
<?PHP echo  form_dropdown('distrito',$distrito,_ep($usuario,'distrito'),' id="distrito" '.$js2);?>	
 <?PHP echo  form_dropdown('distrito',$distrito_callao,_ep($usuario,'distrito'),' id="distrito_callao" '.$js1);?>
 

<?PHP echo  form_error('distrito');?>
<?PHP echo  form_error('distrito_callao');?>
</td>
  </tr>
</table>


</div>



<div class="fila">
<div class="caption">Lugar de Domicilio</div>
<table width="200" border="0">
  <tr>
    <td><div class="caption1">Pais</div> <?PHP
	
	 echo  form_dropdown('pais2',$pais,_ep($usuario,'pais2'),' onChange="jsdep2(this,2)" ');?>
<?PHP echo  form_error('pais2');?></td>
    <td><div class="caption1">Departamento</div> 
	<?PHP echo  form_dropdown('departamento2',$departamento,_ep($usuario,'departamento2'),' id="departamento2" onChange="jsdist2(this,2)" ');?>
<?PHP echo  form_error('departamento2');?></td>
    <td><div class="caption1">Distrito</div> 

<?PHP 
$js1=$js2='';
$i_dep2=explode(':',@$usuario['departamento2']);
$i_dep2=$i_dep2[0];

if( ((int)$i_departamento2==15 ) || ((int)$i_dep2==15)):
$js1=' style=" display:none"  disabled="disabled" ';
?>


 
<?PHP
else:
$js2=' style=" display:none" disabled="disabled" ';
?> 
<?PHP endif;?>
    
	
<?PHP echo  form_dropdown('distrito2',$distrito,_ep($usuario,'distrito2'),' id="distrito2" '.$js2);?>   
<?PHP echo  form_dropdown('distrito2',$distrito_callao,_ep($usuario,'distrito2'),' id="distrito_callao2" '.$js1);?>
<?PHP echo  form_error('distrito2');?></td>
  </tr>
</table>


</div>

<div class="fila">
<div class="caption">
Direcci&oacute;n de domicilio
</div>
<?PHP echo form_input('direccion',_e($usuario,'direccion'));?>
<?PHP echo form_error('direccion');?>
</div>






<div class="fila">
<div class="caption">
Celular
</div>
<?PHP echo form_input('celular',_e($usuario,'celular'));?>
<?PHP echo form_error('celular');?>
</div>

<div class="fila">
<div class="caption">
Telefono
</div>
<?PHP echo form_input('telefono',_e($usuario,'telefono'));?>
<?PHP echo form_error('telefono');?>
</div>


<div class="fila">
<div class="caption">
Sobre ti: <br />
A continuaci&oacute;n ingresa unas breves, pero concisas palabras que te describan como persona.
</div>
<textarea name="descripcion" id="descripcion">
<?PHP echo _e($usuario,'descripcion');?>
</textarea>

<?PHP echo form_error('descripcion');?>
</div>



<div class="fila">
<button>Actualizar</button>
</div>
</div>
</form></div>