
<div class="empleo-descripcion">
<div class="fila">
<div class="empresa">
<?PHP if(file_exists('uploads/logo_'.md5($info['ruc']).'.jpg')):?>
<img src="<?PHP echo base_url('uploads/logo_'.md5($info['ruc']).'.jpg');?>"  />
<?PHP else:?>
<img src="<?PHP echo base_url('uploads/logo_empresa.jpg');?>" alt="Logo de la empresa"  />
<?PHP endif;?>
<p>

<a href="<?PHP echo site_url($info['ruc']);?>"><?PHP echo $info['nombre'];?></a>



</p>
</div>
</div>

<div class="fila"> 
<div class="caption"> 
Ruc: </div>
<?PHP echo $info['ruc'];?>
</div>


<div class="fila"> 
<div class="caption"> 
Descripci&oacute;n: </div>
<?PHP echo $info['descripcion'];?>
</div>



  
<div class="fila"> 
<div class="caption"> 
Telefono de contacto: </div>
<?PHP echo $info['telefono'];?>
</div>  

<div class="fila"> 
<div class="caption"> 
Website: 
</div>
<?PHP echo $info['website'];?>
</div>
  
  
  

  
  
  
  
  
  
  
  
  
  
  
</div>