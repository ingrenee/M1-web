<div class="menu_candidatos">

<?PHP

 $t=$this->uri->segment(1).$this->uri->segment(2);

$$t=' class="select" ';

?>

<a href="<?PHP echo site_url('candidatos');?>" <?PHP echo @$candidatos;?>>Panel</a>
<a href="<?PHP echo site_url('candidatos/informacion_general');?>"   <?PHP echo @$candidatosinformacion_general;?>  >Info.General</a>
<a href="<?PHP echo site_url('formacion');?>" <?PHP echo @$formacion;?>>Académico</a>
<a href="<?PHP echo site_url('experiencia');?>" <?PHP echo @$experiencia;?>>Laboral</a>
<a href="<?PHP echo site_url('informatica');?>" <?PHP echo @$informatica;?>>Informática</a>
<a href="<?PHP echo site_url('idioma');?>" <?PHP echo @$idioma;?>>Idioma</a>


</div>