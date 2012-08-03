
<h2>Candidatos</h2>
<h1 class="titulo02">Acceder a la plataforma</h1>






<div class="formulario">

<div class="fila">
<?PHP _mensajes();?>
</div>
<?php echo form_open(''); ?>




           <div class="fila">
           <div class="caption"> Email </div>

            <?php echo form_input('email', set_value('email'),'class="largo"'); ?>
            <?PHP  echo form_error('email');?>
            </div>

     
            <div class="fila">
            <div class="caption">
            Password</div>

            <?php echo form_password('pass'); ?>
            <?PHP  echo form_error('pass');?>
            </div>

    
            <div class="fila2"><input type="submit"  class="button large orange"value="Ingresar" /></div>

   

<?php echo form_close(''); ?>
</div>