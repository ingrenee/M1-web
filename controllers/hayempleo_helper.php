<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Email Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/email_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Validate email address
 *
 * @access	public
 * @return	bool
 */
if ( ! function_exists('_titulo'))
{
	
function _titulo($t,$html='.html')
{

	if(strlen($t)<=0):
	$t='non';
	endif;

	$t=str_replace(' ','-',$t);
	$r=array('–','á','é','í','ó','ú','Á','É','Í','Ó','Ú','ñ','Ñ','?','¿',',','(',')',':','/','.','!','¡','\\','"','#','º','°','|');
	$r2=array('','a','e','i','o','u','A','E','I','O','U','n','N','','','','','','','-','','','','','','','','','');
	$t=str_replace($r,$r2,$t);
	$find = array(' ', '&', '\r\n', '\n', '+');
$t = str_replace ($find, '-', $t);
$t=str_replace('--','-',$t);
// Eliminamos y Reemplazamos el resto de caracteres especiales
$find = array('/[\-]+/', '/<[^>]*>/');
$repl = array("-",'');
$t = preg_replace ($find, $repl, $t);
	$t=strtolower($t);
	return $t.$html;
	}

}

// ------------------------------------------------------------------------

function actualizar_index_cache()
{
		$filepath=str_replace('system','application',BASEPATH.'web/cache/'.md5(base_url('')));
			if(file_exists($filepath)):
					touch($filepath);
                    unlink($filepath);
                    log_message('debug', "Cache deleted for: ".$filepath);
		
			endif;
	}
	
	
function actualizar_oferta_cache($titulo,$id)
{
	 $url=base_url('trabajo-'._titulo($titulo,'').'-'.$id.'.html');
	
//	exit();
		$filepath=str_replace('system','application',BASEPATH.'web/cache/'.md5($url));
			if(file_exists($filepath)):
					touch($filepath);
                    unlink($filepath);
                    log_message('debug', "Cache deleted for: ".$filepath);
		
			endif;
}
