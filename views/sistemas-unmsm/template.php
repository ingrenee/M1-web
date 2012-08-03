<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"

    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>

    <head>

        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

        <title>Gescom</title>

        <?php echo link_tag('html/css/web.css'); ?>
 <?php echo link_tag('html/css/main.css'); ?>
 <!--
 <script type="text/javascript" src="http://code.jquery.com/jquery-latest.pack.js"></script>
 -->
  <script type="text/javascript" src="<?PHP echo  base_url('html/jquery-1.6.4.min.js')?>"></script>
  <script type="text/javascript" src="<?PHP echo  base_url('html/main.js')?>"></script>

 
    <script type="text/javascript" >
<?PHP $base=base_url('html');?>    
    $(document).ready(function(){

	$("#nicemenu img.arrow").click(function(){ 
								
		$("span.head_menu").removeClass('active');
		
		submenu = $(this).parent().parent().find("div.sub_menu");
		
		if(submenu.css('display')=="block"){
			$(this).parent().removeClass("active"); 	
			submenu.hide(); 		
			$(this).attr('src','<?PHP echo $base;?>/arrow_hover.png');									
		}else{
			$(this).parent().addClass("active"); 	
			submenu.fadeIn(); 		
			$(this).attr('src','<?PHP echo $base;?>/arrow_select.png');	
		}
		
		$("div.sub_menu:visible").not(submenu).hide();
		$("#nicemenu img.arrow").not(this).attr('src','<?PHP echo $base;?>/arrow.png');
						
	})
	.mouseover(function(){ $(this).attr('src','<?PHP echo $base;?>/arrow_hover.png'); })
	.mouseout(function(){ 
		if($(this).parent().parent().find("div.sub_menu").css('display')!="block"){
			$(this).attr('src','<?PHP echo $base;?>/arrow.png');
		}else{
			$(this).attr('src','<?PHP echo $base;?>/arrow_select.png');
		}
	});

	$("#nicemenu span.head_menu").mouseover(function(){ $(this).addClass('over')})
								 .mouseout(function(){ $(this).removeClass('over') });
	
	$("#nicemenu div.sub_menu").mouseover(function(){ $(this).fadeIn(); })
							   .blur(function(){ 
							   		$(this).hide();
									$("span.head_menu").removeClass('active');
								});		
								
	$(document).click(function(event){ 		
			var target = $(event.target);
			if (target.parents("#nicemenu").length == 0) {				
				$("#nicemenu span.head_menu").removeClass('active');
				$("#nicemenu div.sub_menu").hide();
				$("#nicemenu img.arrow").attr('src','<?PHP echo $base;?>/arrow.png');
			}
	});			   
							   
								   
});

    
    </script>
      

    </head>

    <body>
<div id="cargando" style="display: none;">
Cargando...
</div>
        <div id="pagina">

            <div id="head">

<div class="fila">
<div class="logo">
</div>



<div class="login">


<?php // echo validation_errors(); ?>



<?php echo form_open('welcome/login'); ?>
<span>Email: </span><?php echo form_input('email', set_value('email')); ?>

<span>Password: </span><?php echo form_password('password'); ?>


<?php echo form_submit('submit', 'Login'); ?>

<?php echo form_close(''); ?>

</div>

</div>


                

            </div>

            <div id="nicemenu">
    <ul>
        <li><span class="head_menu"><a href="index.php">Home</a></span>
        <li><span class="head_menu"><a href="index.html">Usuarios</a>
<img src="<?PHP echo $base;?>/arrow.png" width="18" height="15" align="top" class="arrow" /></span>
            <div class="sub_menu">
                 <?php echo anchor('welcome/activate', 'Activar cuenta'); ?>
                 <?php echo anchor('welcome/register', 'Registrarse'); ?>
            <?php echo anchor('welcome/login', 'Iniciar sesi&oacute;n'); ?>
                 <?php echo anchor('welcome/logout', 'Cerrar sesi&oacute;n'); ?>
                <?php echo anchor('welcome/change_password', 'Cambiar Password'); ?>
                 <?php echo anchor('welcome/forgotten_password', 'Recuperar Password '); ?>
                <?php echo anchor('welcome/profile', 'Perfil de usuario'); ?>
                <!--
                 <a href="index.html" class="item_line">Recent Activity</a>
                -->
            </div>
        </li>
        <li><span class="head_menu"><a href="index.html">Organize</a>
        <img src="<?PHP echo $base;?>/arrow.png" width="18" height="15" align="top" class="arrow" /></span>
             <div class="sub_menu">
                <a href="index.html">All your photos</a>
                <a href="index.html">Most recently uploaded photos</a>
                <a href="index.html">Your Sets</a>
                <a href="index.html">Your Map</a>
            </div>
        </li>
        <li><span class="head_menu"><a href="index.html">Contacts</a><img src="<?PHP echo $base;?>/arrow.png" width="18" height="15" align="top" class="arrow" /></span>
            <div class="sub_menu">
                <a href="index.html">Latest Photos</a>
                <a href="index.html">Contact List</a>
                <a href="index.html">People Search</a>
                <a href="index.html" class="item_line">Invite your Friends</a>
                <a href="index.html">Invite History</a>
                <a href="index.html">Guest Pass History</a>
                <a href="index.html" class="item_line">Give the gift of Flickr</a>
            </div>
        </li>
        <li><span class="head_menu"><a href="index.html">Groups</a><img src="<?PHP echo $base;?>/arrow.png" width="18" height="15" align="top" class="arrow" /></span>
        	<div class="sub_menu">
                <a href="index.html">Your Groups</a>
                <a href="index.html">Recent Changes</a>
                <a href="index.html" class="item_line">Search for a Group</a>
                <a href="index.html" class="item_line">Create a New Group</a>
            </div>
        </li>
        <li><span class="head_menu"><a href="index.php">Aplicaciones</a><img src="<?PHP echo $base;?>/arrow.png" width="18" height="15" align="top" class="arrow" /></span>
        	<div class="sub_menu">
                <a href="<?PHP  echo site_url('appgescom/info');?>" class="item_line">GESCOM perfiles</a>
                <a href="<?PHP  echo site_url('appgescom/seleccionarperfil');?>">Seleccionar perfil</a>
                <a href="<?PHP  echo site_url('appgescom/listar_competencias_perfil');?>">Competencias del perfil</a>
                <a href="<?PHP  echo site_url('appgescom/evaluar');?>">Evaluarme</a>
                <a href="#" class="item_line">Mis competencias</a>
                <a href="<?PHP  echo site_url('appgescom/evaluar');?>" >Editar mis competencias</a>

            </div>
        </li>
    </ul>
</div>

            <div id="main" class="main01">

<div class="c1">

<div class="info">

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

            <td colspan="2"><?php echo form_submit('submit', 'Register'); ?>
			
			<?php 
			
			$data = array(
    'name' => 'button',
    'id' => 'button',
    'value' => 'true',
    'type' => 'submit',
    'content' => 'Reset'
);
			echo form_button($data); ?>
			</td>

        </tr>

    </tfoot>

</table>
<?php echo form_close(''); ?>


</div>




</div>

<div class="c2">
                <?php echo $content."\n" ?>
</div>

            </div>

            <div id="pie">
GESCOM © 2011 · Español

                

            </div>

        </div>

    </body>

</html>