<div class="formulario">
<h2>Formulario de  contacto </h2> 

<?PHP echo _mensajes();?>
<div class="fila">
  <p>Si tienes algun comentario, pregunta o duda escribenos , nosotros si te vamos a leer.</p>
</div>
<form method="post">

<div class="fila">
      <div class="colu_2" style="float:left">E-mail<br>
<?PHP echo form_input('email',set_value('email'),' class="largo" ');?><?PHP echo form_error('email');?></div>
     
</div>

<div class="fila">
      <div class="colu_2" style="float:left">Asunto<br>
<?PHP echo form_input('asunto',set_value('asunto'),' class="largo" ');?><?PHP echo form_error('asunto');?></div>
      
      
</div>

<div class="fila2">
      <div class="colu_2" style="float:left">Mensaje<br>
<textarea name="sugerencia" cols="50" id="sugerencia" style="height:100px"></textarea> 
      <?PHP echo form_error('sugerencia');?></div>

</div>
<input type="submit" class="button large orange" value="Enviar mensaje">


</form>
</div>
