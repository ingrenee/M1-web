<script type="text/javascript" src="<?PHP echo base_url('js/jquery.maskedinput-1.3.min.js');?>"></script>

<?PHP $this->load->view('info');?>
<div class="bloque formulario">
<h2 class="blanco">Modificar contraseña</h2>





<?PHP _mensajes();?>

<form method="post">
<div class="formu2">

<div class="fila">
<div class="caption">
Contraseña antigua
</div>
<?PHP echo form_password('pass',set_value('pass'));?>
<?PHP echo form_error('pass');?>
</div>

<div class="fila">
<div class="caption">
Nueva contraseña
</div>
<?PHP echo form_password('pass2',set_value('pass2'));?>
<?PHP echo form_error('pass2');?>
</div>

<div class="fila">
<div class="caption">
Repetir Nueva contraseña
</div>

<?PHP echo form_password('re-pass2',set_value('re-pass2'));?>
<?PHP echo form_error('re-pass2');?>
</div>
























<div class="fila">
<button class="button large orange">Actualizar</button>
</div>
</div>
</form></div>
