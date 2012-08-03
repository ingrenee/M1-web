


<form action="" method="post" >

<div class="bloque">

<h1>Ofertas de trabajo/empleo en tu email</h1>
<p><?PHP echo _mensajes();?>
  
  
 </p>
<p>Actualmente 
<?PHP if($suscrito): ?>
<strong>S&iacute;</strong>
<?PHP else:?>
<strong>No</strong>
<?PHP endif;?> 

estas suscrito a los boletines de ofertas de empleo.</p>


<?PHP if($suscrito): ?>
<div class="fila">Para no recibir m&aacute;s boletines de ofertas de empleo haz click en el siguiente enlace:</div>

<div class="fila2">
<a href="<?PHP  echo site_url('candidatos/nosuscripcion/2');?>"  onclick="return confirm('Desea  cancelar los boletines de ofertas de empleo?');" class="button large orange">No recibir boletines </a>
</div>

<?PHP else:?>
<div class="fila">Para  recibir  boletines de ofertas de empleo haz click en el siguiente enlace:</div>

<div class="fila2">
<a href="<?PHP  echo site_url('candidatos/nosuscripcion/1');?>"   class="button large orange">Recibir boletines </a>
</div>

<?PHP endif;?> 





<!--
<ul  class="grupos">
           
          
            <li >
              
              <a href="https://www.facebook.com/groups/he.grupo1/"  title="Trabajos para Administración / Oficina [PERU]" target="_blank">              Trabajos para Administraci&oacute;n / Oficina [PERU] </a></li>
         
            
            
            <li >
              
              <a href="https://www.facebook.com/groups/he.grupo2/"  title="Trabajos para Arte / Diseño / Medios [PERU]" target="_blank">              Trabajos para Arte / Diseño / Medios [PERU]              </a></li>
            <li >
              
              <a href="https://www.facebook.com/groups/he.grupo3/"  title="Trabajos para Científicos / Investigación [PERU]" target="_blank">              Trabajos para Científicos / Investigación [PERU]              </a></li>
            <li >
              
              <a title="Trabajos para Dirección / Gerencia [PERU]" href="https://www.facebook.com/groups/he.grupo5/">              Trabajos para Dirección / Gerencia [PERU]              </a></li>
            <li >
              
              <a href="https://www.facebook.com/groups/he.grupo6/"  title="Trabajos para Economía / Contabilidad [PERU]" target="_blank">              Trabajos para Economía / Contabilidad [PERU]              </a></li>
            <li >
              
              <a href="https://www.facebook.com/groups/he.grupo7/"  title="Trabajos para Educación / Universidad" target="_blank">              Trabajos para Educación / Universidad [PERU]              </a></li>
            <li >
              
              <a href="https://www.facebook.com/groups/he.grupo8/"  title="Trabajos para Hosteleria / Turismo" target="_blank">              Trabajos para Hosteleria / Turismo [PERU]
              </a></li>
            <li >
              
              <a href="https://www.facebook.com/groups/he.grupo4/"  title="Trabajos para Informática / Telecomunicaciones [PERU]" target="_blank">              Trabajos para Informática / Telecomunicaciones [PERU]              </a></li>
            <li >
              
              <a href="https://www.facebook.com/groups/he.grupo9/"  title="Trabajos para Ingeniería / Técnicos" target="_blank">              Trabajos para Ingeniería / Técnicos [PERU]              </a></li>
            <li >
              
      <a href="https://www.facebook.com/groups/he.grupo10/"  title="Trabajos para Legal / Asesoría [PERU]" target="_blank">              Trabajos para Legal / Asesoría [PERU]              </a></li>
            <li >
              
      <a href="https://www.facebook.com/groups/he.grupo11/"  title="Trabajos para Marketing / Ventas [PERU]" target="_blank">              Trabajos para Marketing / Ventas [PERU]              </a></li>
            <li >
              
      <a href="https://www.facebook.com/groups/he.grupo12/"  title="Trabajos para Medicina / Salud [PERU]" target="_blank">              Trabajos para Medicina / Salud [PERU]              </a></li>
              
              
                 <li >
              
      <a href="https://www.facebook.com/groups/he.grupo13/"  title="Trabajos para Recursos Humanos [PERU]" target="_blank">              Trabajos para Recursos Humanos [PERU]              </a></li>
              
              
          <li >
              
              <a href="https://www.facebook.com/groups/he.grupo14/" title="Trabajos  Otros [PERU]" target="_blank">              Trabajos Otros [PERU]              </a></li>
          </ul>
          
          -->
</body>




</div>

</form>

<script>

$(function() {

	

$('#tags').tagsInput({'defaultText':'Escribe','maxChars' : 20});





});



</script>

