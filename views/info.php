<?PHP
 
$info=$this->native_session->userdata('login_data_candidatos');

_set_nivel_cv('informatica',substr_count($info['aptitudes'], ':1:'));
_set_nivel_cv('idiomas',substr_count($info['aptitudes'], ':2:'));

?>
<?PHP $this->load->view('candidatos/menu');?>

<div class="bloque">

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17%" valign="top"><a href="<?PHP echo site_url('imagen');?>">
    <img src="<?PHP _imagen($info['ID']);?>" class="avatar"></a></td>
    <td  valign="top">
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
<div class="fila">
<span><strong>Perfil completado al <?PHP echo $nivel=_nivel_cv()?>%: </strong></span>
<div class="meter  nostripes">
			<span style="width: <?PHP echo $nivel;?>%"></span>
		</div>
 </div>
</td>
  </tr>
</table>


</div>