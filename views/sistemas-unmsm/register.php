<h1>Registro</h1>



<?php echo $this->native_session->flashdata('message'); ?>



<?php echo validation_errors(); ?>



<?php echo form_open('welcome/register'); ?>



<table>

    <thead>

        <tr>

            <th colspan="2">Campos obligatorios</th>

        </tr>

    </thead>

    <tbody>

        <tr>

            <td>Nombre de usuario</td>

            <td><?php echo form_input('username', set_value('username')); ?></td>

        </tr>

        <tr>

            <td>Email </td>

            <td><?php echo form_input('email', set_value('email')); ?></td>

        </tr>

        <tr>

            <td>Password</td>

            <td><?php echo form_password('password'); ?></td>

        </tr>

    </tbody>

</table>



<table>

    <thead>

        <tr>

            <th colspan="2">Campos opcionales</th>

        </tr>

    </thead>

    <tbody>

        <tr>

            <td>Nombres</td>

            <td><?php echo form_input('first_name', set_value('first_name')); ?></td>

        </tr>

        <tr>

            <td>Apellidos</td>

            <td><?php echo form_input('last_name', set_value('last_name')); ?></td>

        </tr>

    </tbody>

    <tfoot>

        <tr>

            <td colspan="2"><?php echo form_submit('submit', 'Register'); ?></td>

        </tr>

    </tfoot>

</table>
<?php echo form_close(''); ?>