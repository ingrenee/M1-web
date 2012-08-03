<?PHP
$info=$this->native_session->userdata('login_data_candidatos');
?>
<div class="bloque">
<div class="fila">
<a href="<?PHP echo site_url('candidatos/index');?>">Ir al Panel</a>
</div>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17%"><a href="<?PHP echo site_url('imagen');?>">
    <img src="<?PHP _imagen($info['ID']);?>"></a></td>
    <td width="108" valign="top">
    <div class="fila"><b>Nombres:</b>
<?PHP echo $info['nombres'];?>,<?PHP echo $info['apellidos'];?>
</div>
<div class="fila">
<b>Fecha nacimiento:</b> <?PHP echo @$info['fecha_nacimiento'];?>
</div>
<div class="fila">
<a href="<?PHP echo site_url('candidatos/informacion_basica');?>" class="funcion feditar"><span>Modificar informaci&oacute;n b&aacute;sica</span></a>
</div>

<div class="fila">
<b>Email:</b> <?PHP echo $info['email'];?>
</div>


</td>
  </tr>
</table>


</div>