<?php
header("Content-Type: application/rss+xml"); 
echo('<?xml version="1.0" encoding="UTF-8"?>');
?>
<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	>

<channel>
<title>Hay empleo</title>
<atom:link href="<?PHP echo site_url('feed/categoria/'.$categoria);?>" rel="self" type="application/rss+xml"/>
<link>http://www.hayempleo.com/</link>
<description/>
<lastBuildDate><?PHP echo date('d/m/y H:i:s');?></lastBuildDate>
<language>es</language>
<sy:updatePeriod>hourly</sy:updatePeriod>
<sy:updateFrequency>1</sy:updateFrequency>
<?PHP foreach($feed->result_array() as $k => $v):?>
<item>
<title><?PHP echo $v['titulo'];?></title>
<link>
<?PHP echo  site_url('trabajo-'._titulo($v['titulo'],'').'-'.$v['ID'].'.html');?>
</link>

<pubDate>  <?PHP 

echo date_format(date_create($v['creado']), 'd/m/y H:i:s');

?></pubDate>
<dc:creator>HayEmpleo</dc:creator>
<category>
<![CDATA[ <?PHP echo $nombre_categoria; ?> ]]>
</category>

<guid isPermaLink="false"><?PHP echo  site_url('trabajo-'._titulo($v['titulo'],'').'-'.$v['ID'].'.html');?></guid>
<description>
<![CDATA[
<?PHP _extrae_lugar(@$v['pais'],',');?> <?PHP _extrae_lugar(@$v['departamento']);?>  | Moneda: <?PHP  echo _moneda($v['salario_tipo']);?> 
Salario: <?PHP echo _salario($v['salario_2'],$v['salario']);?> |
<?PHP echo _cortar($v['descripcion']).'...';?>
]]>
</description>
<content:encoded>
<![CDATA[
  <?PHP echo ($v['descripcion']);?>
]]>
</content:encoded>

</item>
<?PHP endforeach;?>
</channel>
</rss>