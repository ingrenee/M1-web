<h1>Login</h1>



<?php echo validation_errors(); ?>


<div class="formulario">
<?php echo form_open('welcome/login'); ?>




<div class="fila">
       Email Address

         <?php echo form_input('email', set_value('email')); ?>
      </div>

<div class="filas">
         Password

           <?php echo form_password('password'); ?>
</div>
   

         
ww	

<?php echo form_submit('submit', 'Login'); ?>
<?php echo form_close(''); ?>
</div>