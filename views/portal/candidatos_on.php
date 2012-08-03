<link href="<?PHP  echo base_url('css/iframes.css');?>" rel="stylesheet" type="text/css" />
<?PHP $info=$this->native_session->userdata('login_data_candidatos');

?>
      <div class="fila">
    <h1>Candidatos</h1> 
     <h1>Hola, <span><?PHP echo $info['nombres'];?></span></h1> 
    
 <a href="<?PHP echo site_url('candidatos');?>"  target="_parent"class="boton01 flecha">Panel</a>
  <a href="<?PHP echo site_url('');?>"  target="_parent"class="boton01 flecha">Buscar empleos</a>
    <a href="<?PHP echo site_url('home/logout');?>" target="_parent" class="boton01 flecha">Salir</a>
      </div>

