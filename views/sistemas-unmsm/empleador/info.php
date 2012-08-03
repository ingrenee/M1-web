<div class="empleo-descripcion">
<div class="fila">
<div class="empresa">
<?PHP if(file_exists('uploads/logo_'.md5($info['ID']).'.jpg')):?>
<img src="<?PHP echo base_url('uploads/logo_'.md5($info['ID']).'.jpg');?>"  />
<?PHP else:?>
<img src="<?PHP echo base_url('uploads/logo_empresa.jpg');?>" alt="Logo de la empresa"  />
<?PHP endif;?>
<p>

<a href="<?PHP echo site_url('empresa-'._titulo($info['nombre'],'').'-'.$info['ID'].'.html');?>"><?PHP echo $info['nombre'];?></a>



</p>
</div>
</div>

<div class="fila"> 
<div class="caption"> 
Ruc:
</div>
<?PHP echo $info['ruc'];?>
</div>


<div class="fila"> 
<div class="caption"> 
Descripcion:
</div>
<?PHP echo $info['descripcion'];?>
</div>


<div class="fila"> 
<div class="caption"> 
Encargado:
</div>
<?PHP echo $info['encargado'];?>
</div>

<div class="fila"> 
<div class="caption"> 
Cargo:
</div>
<?PHP echo $info['cargo'];?>
</div>
  
<div class="fila"> 
<div class="caption"> 
Telefono de contacto:
</div>
<?PHP echo $info['telefono'];?>
</div>  

<div class="fila"> 
<div class="caption"> 
Email de contacto:
</div>
<?PHP echo $info['email_contacto'];?>
</div>
  
  
  

  
  
  
  
  
  
  
  
  
  
  
</div>

<h2>Ofertas publicadas</h2>

<?PHP  $this->load->view('welcome/lista');?>