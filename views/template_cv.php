<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<meta name="description" content="oferta de empleo,  aqui encontraras trabajo, las empresas publican sus ofertas y avisos, crea tu curriculum vitae gratis, hector doy trabajo recuerda hay empleo y hay trabajo" />
<meta name="keywords" content="trabajo en lima, busco trabajo, trabajo de, Ofertas de trabajo, Bolsas de trabajo, avisos de trabajo, empleos lima, buscar empleo, hay empleo ,Ofertas de empleo, curriculum vitae, busco chamba, chamba, búsqueda de empleo, búsqueda de trabajo, empleo " />

<title>HayEmpleo.com</title>



<?PHP if( (strlen($cv_modelos_codigo)<3) || ($cv_modelos_codigo=='default')):?><link href="<?PHP echo base_url('css/cv/base.css')?>" rel="stylesheet" type="text/css" />

<?PHP else:?>
<link href="<?PHP echo base_url('css/cv/'.strtolower($cv_modelos_codigo).'/'.strtolower($cv_modelos_codigo).'.css')?>" rel="stylesheet" type="text/css" />
<?PHP endif;?>
<?PHP include(str_replace('system','',BASEPATH).'ga.php');?>
</head>

<body>

<div id="cv_lienzo">
<div id="cv_capa01">
<div id="cv_capa02">
<div class="he_pagina">

<?PHP
echo $content;
?>

</div>
</div>
</div>
</div>


</body>
</html>