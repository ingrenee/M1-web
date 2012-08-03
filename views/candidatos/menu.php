<div class="menu_candidatos">

<?PHP

 $t=$this->uri->segment(1).$this->uri->segment(2);

$$t=' class="select" ';

?>

<a href="<?PHP echo site_url('candidatos');?>" <?PHP echo (isset($candidatos))?$candidatos:'';?>>Panel</a>
<a href="<?PHP echo site_url('candidatos/informacion_general');?>"   <?PHP echo (isset($candidatosinformacion_general))?$candidatosinformacion_general:'';?>  >Info.General</a>
<a href="<?PHP echo site_url('formacion');?>" <?PHP echo (isset($formacion))?$formacion:'';?>>Académico</a>
<a href="<?PHP echo site_url('experiencia');?>" <?PHP echo (isset($experiencia))?$experiencia:'';?>>Laboral</a>
<a href="<?PHP echo site_url('informatica');?>" <?PHP echo (isset($informatica))?$informatica:'';?>>Informática</a>
<a href="<?PHP echo site_url('idioma');?>" <?PHP echo (isset($idioma))?$idioma:'';?>>Idioma</a>


</div>