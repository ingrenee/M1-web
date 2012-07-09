<?PHP 
header("Content-type: text/xml;charset=UTF-8");
echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>

<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"

         xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"

         xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<url>
<loc>http://www.hayempleo.com</loc>
<lastmod><?PHP echo date("Y-m-d");?></lastmod>
<changefreq>always</changefreq>
</url>
<url>
<loc>http://www.hayempleo.com/hayempleo/about</loc>
<lastmod><?PHP echo date("Y-m-d");?></lastmod>
<changefreq>always</changefreq>
</url>
<url>
<loc>http://www.hayempleo.com/hayempleo/contacto</loc>
<lastmod><?PHP echo date("Y-m-d");?></lastmod>
<changefreq>always</changefreq>
</url>
<url>
<loc>http://www.hayempleo.com/suscripciones/</loc>
<lastmod><?PHP echo date("Y-m-d");?></lastmod>
<changefreq>always</changefreq>
</url>
<url>
<loc>http://www.hayempleo.com/login/candidato/</loc>
<lastmod><?PHP echo date("Y-m-d");?></lastmod>
<changefreq>always</changefreq>
</url>
<url>
<loc>http://www.hayempleo.com/registros/candidato/</loc>
<lastmod><?PHP echo date("Y-m-d");?></lastmod>
<changefreq>always</changefreq>
</url>
<url>
<loc>http://www.hayempleo.com/admin.php/welcome/login/</loc>
<lastmod><?PHP echo date("Y-m-d");?></lastmod>
<changefreq>always</changefreq>
</url>
<url>
<loc>http://www.hayempleo.com/index.php/registro/registrar/</loc>
<lastmod><?PHP echo date("Y-m-d");?></lastmod>
<changefreq>always</changefreq>
</url>
<?PHP 
$j=1;
foreach($filas->result_array() as $k => $v):?>
   <url>
      <loc><?PHP echo  site_url('trabajo-'._titulo($v['titulo'],'').'-'.$v['ID'].'.html');?></loc>
<lastmod><?PHP echo date("Y-m-d");?></lastmod>
  <changefreq>daily</changefreq>
   </url>
<?PHP endforeach;?>
</urlset>