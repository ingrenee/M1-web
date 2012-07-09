<link href="<?PHP  echo base_url('css/iframes.css');?>" rel="stylesheet" type="text/css" />


<?PHP $tmp=$this->native_session->userdata('login_datos');?>

<div class="fila fila_info"> <h1>Empresas: <span  style="font-size:11px; color:#FFFFFF"><?PHP echo $tmp['nombre'];?></span></h1>
</div>
<div class="fila fila_info">
<h1>Encargado: <span style="font-size:11px; color:#FFFFFF"><?PHP echo $tmp['encargado'];?></span></h1>
</div>
<div class="fila">
<a href="<?PHP echo base_url('admin.php/home/agregar');?>"  target="_parent"class="boton01 flecha">Agregar oferta</a>
<a href="<?PHP echo base_url('admin.php/welcome/logout');?>"  target="_parent"class="boton01 flecha">Salir</a>
</div>
</div>