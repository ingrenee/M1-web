<h1>Activacion de cuenta</h1>



<p>Ingrese el  codigo de activacion que fue enviado a su bandeja de entrada.</p>



<?php echo $this->native_session->flashdata('message'); ?>

<?php echo validation_errors(); ?>



<?php echo form_open('welcome/activate'); ?>



<table>

    <thead>

        <tr>

            <th colspan="2">Campos  obligatorios</th>

        </tr>

    </thead>

    <tbody>

        <tr>

            <td>Codigo de verificaci&oacute;n</td>

            <td><?php echo form_input('code', set_value('code')); ?></td>

        </tr>

    </tbody>

    <tfoot>

        <tr>

            <td colspan="2"><?php echo form_submit('submit', 'Activar'); ?></td>

        </tr>

    </tfoot>

</table>



<?php echo form_close(''); ?>