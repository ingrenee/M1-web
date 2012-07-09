<?PHP 
header("Content-type: text/xml;charset=UTF-8");
echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<sitemapindex xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"

         xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/siteindex.xsd"

         xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?PHP 

for( $i=0; $i<$total;$i=$i+$rango):?>
   <sitemap>
      <loc><?PHP echo site_url();?>sitemap<?PHP echo $i+1;?>.xml</loc>
      <lastmod><?PHP echo date("Y-m-d");?></lastmod>
     </sitemap><?PHP endfor;?></sitemapindex>