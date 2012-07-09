<h1>Recuperar contrase&ntilde;a</h1>



<p>Ingrese su email para recuperar su contrase&ntilde;a</p>



<?php echo $this->native_session->flashdata('message'); ?>

<?php echo validation_errors(); ?>



<?php echo form_open('welcome/forgotten_password'); ?>



<table>

    <thead>

        <tr>

            <th colspan="2">Campos obligatorios</th>

        </tr>

    </thead>

    <tbody>

        <tr>

            <td>Email</td>

            <td><?php echo form_input('email', set_value('email')); ?></td>

        </tr>

    </tbody>

    <tfoot>

        <tr>

            <td colspan="2"><?php echo form_submit('submit', 'Reset Password'); ?></td>

        </tr>

    </tfoot>

</table>



<?php echo form_close(''); ?>



<?php echo form_open('welcome/forgotten_password_complete'); ?>



<table>

    <thead>

        <tr>

            <th colspan="2">Campos obligatorios</th>

        </tr>

    </thead>

    <tbody>

        <tr>

            <td>C&oacute;digo de recuperaci&oacute;n</td>

            <td><?php echo form_input('code', set_value('code')); ?></td>

        </tr>

    </tbody>

    <tfoot>

        <tr>

            <td colspan="2"><?php echo form_submit('submit', 'Enviar nueva contraseña'); ?></td>

        </tr>

    </tfoot>

</table>



<?php echo form_close(''); ?>