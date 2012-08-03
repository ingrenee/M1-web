
<?PHP $tremolo=45;?>
<?PHP if($root->num_rows()):?>

  <?PHP foreach($root->result_array() as $k =>$v):?>
  <?PHP 
  
  if($k==0):
$titulo=$descripcion=$v['titulo'];
elseif($k<10):
$titulo.=','.$v['titulo'];
else:
$descripcion.=','.$v['titulo'];
  endif;
  
  ?>
<div class="empleo borde<?PHP if($k<1)echo 0;?>">
<div class="info info_<?PHP echo (rand(0,1)==1)?"a":"a";?>">
<span class="titulo">vacantes</span>
<span class="dato"><?PHP echo (int)$v['vacantes'];?></span>

<span class="titulo">publicado</span>
<span class="dato">
<?PHP 
echo date_format(date_create($v['creado']), 'd/m/y');
?>
</span>

</div>
<div class="descripcion">
<?PHP  if(isset($modo_empresa) && $modo_empresa===true): 
 $ruc=$info['ruc'].'/';
else:
$ruc='';
endif; ?>
<h1>
<a 
href="<?PHP echo  site_url($ruc.'trabajo-'._titulo($v['titulo'],'').'-'.$v['ID'].'.html');?>"><?PHP echo @++$index;?>. <?PHP echo ($v['titulo']);?></a></h1>
<p><?PHP echo _cortar($v['descripcion']);?></p>
<span class="lugar">
<?PHP _extrae_lugar(@$v['pais'],',');?> <?PHP _extrae_lugar(@$v['departamento']);?> </span>
<span class="sueldo">
<?PHP  echo _moneda($v['salario_tipo']);?> 
<?PHP echo _salario($v['salario_2'],$v['salario']);?></span>
</div>
</div>
  <?PHP endforeach;?>


<div class="paginacion">
<?PHP echo $paginacion;?></div>

<?PHP 
$this->native_session->set_userdata('titulo',$titulo);
$this->native_session->set_userdata('descripcion',$descripcion);

?>
<?PHP else:?>
<div class="fila">No hay empleos con la palabra ingresada.</div>
<?PHP endif;?>