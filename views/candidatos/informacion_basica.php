<script type="text/javascript" src="<?PHP echo base_url('js/jquery.maskedinput-1.3.min.js');?>"></script>

<?PHP $this->load->view('info');?>
<div class="bloque formulario">
<h2 class="blanco">Informacion básica</h2>





<?PHP _mensajes();?>

<form method="post">
<div class="formu2">

<div class="fila">
<div class="caption">
Nombres
</div>
<?PHP echo form_input('nombres',_e($usuario,'nombres'));?>
<?PHP echo form_error('nombres');?>
</div>

<div class="fila">
<div class="caption">
Apellidos
</div>
<?PHP echo form_input('apellidos',_e($usuario,'apellidos'));?>
<?PHP echo form_error('apellidos');?>
</div>

<div class="fila">
<div class="caption">
Fecha de nacimiento
</div>
<?PHP $tmp=explode('-',@$usuario['fecha_nacimiento']);

if(count($tmp)>2):
$usuario['fecha_nacimiento']=$tmp[2].'/'.$tmp[1].'/'.$tmp[0];
else:$usuario['fecha_nacimiento']=NULL;

endif;
?>
<?PHP echo form_input('fecha_nacimiento',_e($usuario,'fecha_nacimiento'),' id="fecha_nacimiento" ');?>(dd/mm/aaa)
<?PHP echo form_error('fecha_nacimiento');?>
</div>

























</div>
<div class="formulario">
<div class="fila2">
<input type="submit" class="button large orange" value="Actualizar"> 
</div>
</div>
</form></div>
<script  type="application/javascript">
jQuery(function($){
   $("input#fecha_nacimiento").mask("99/99/9999");
});
</script>