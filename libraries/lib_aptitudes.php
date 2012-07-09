<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" :
 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Mathew Davies
 * ----------------------------------------------------------------------------
 */
 
/**
* Redux Authentication 2
*/
class Lib_aptitudes
{
	/**
	 * CodeIgniter global
	 *
	 * @var string
	 **/
	protected $ci;
	protected $id;
	/**
	 * account status ('not_activated', etc ...)
	 *
	 * @var string
	 **/
	protected $status;

	/**
	 * __construct
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function __construct()
	{
		$this->ci =& get_instance();
		
		$info=$this->ci->native_session->userdata('login_data_candidatos');
		$this->id=$info['ID'];
	}
	
function agregar($data=array())
	{
		$data['usuarios_ID']=$this->id;
		$data['creado']=ahora();
		$this->ci->db->insert('aptitudes',$data);
		return $this->ci->db->insert_id();
		}
	function agregar_si_no_existe($nombre,$array=array(),$agregar=true)
	{
		$array['nombres']=$nombre;
		$tmp=$this->obtener_segun('nombres',$nombre);
		
		if($tmp->num_rows()>0):
		
		 $x=$tmp->result_array();

		 return $x[0]['ID'];

		else:
		if($agregar):
		return $this->agregar($array);	
		else:
		return 0;
		endif;
		endif;
		
	
		}
	
	
	function obtener_uno($id)
	{
		return $this->ci->db->where('usuarios_ID',$this->id)->where('ID',$id)->get('aptitudes')->row_array();

		}
		
		function obtener_segun($clave,$valor)
	{
		return $this->ci->db->where($clave,$valor)->get('aptitudes');

		}	
		
		
		function obtener_todos()
	{
		
				return $this->ci->db->where('usuarios_ID',$this->id)->get('aptitudes');
		

		}	
		
		
		function corta($str,$categoria=false,$url='informatica/borrar/',$id='')
		{
			/*
[211:la torea es inmens:9][211:la torer inmens:9][211:la torer de pisa es inmens:9]
			*/
			$id=md5($id);
			$cad='';
			//var_dump($str);
			if(strlen($str)>9):
			$t=explode('][',$str);
			$t[0]=str_replace('[','',$t[0]);
			$t[count($t)-1]=str_replace(']','',$t[count($t)-1]);
			$cad=array();
			
			
			foreach($t as $k => $v):
			$h=$this->forma_tag($v,$categoria,$url,$id);
			
			if($h):
			$cad[$h[1]][]=$h[0];
			endif;
			
			endforeach;
					return $cad;		
			else:
			return array();			
			endif;

			
			}
			
			
			function forma_tag($str,$categoria=false,$url='informatica/borrar/',$id)
			{
				/* ID de  aptitud, nombre de aptitud, categoria de aotitud ,  nivel de aprendi<za*/

//
$meses[1]='B&aacute;sico';
$meses[2]='B&aacute;sico - Intermedio';
$meses[3]='Intermedio';
$meses[4]='Intermedio - Avanzado';
$meses[5]='Avanzado';
				$t=explode(':',$str);
				$id_ap=$t[0];
				$t[0]=$t[0].'_'.$categoria;
				$h='<div    class="tag">
				<a href="'.site_url($url.$id_ap).'" onclick="return confirm(\'Desea borrar  el registros?\')" class="tagdelete">&nbsp;</a>
				<span id="'.$t[0].'" class="tagger">'.$t[1].'</span>
				
				<div  id="div_tag_'.$t[0].'_'.$id.'" class="div_tag"><span 
				id="tag_'.$t[0].'_'.$id.'" class="tag_ajax"
				>'.$meses[(int)$t[count($t)-1]].'</span>
				<div id="temp_tag_'.$t[0].'_'.$id.'"></div>
				</div>
				
				</div>';
				if(!$categoria):
						
				return array($h,$t[3]);
				else:
				//echo $categoria.':'.$t[2].'<br />';
				if($categoria==(int)$t[2]):
				return array($h,$t[3]);
				else:
				return false;
				endif;
				endif;
				
				}
		
	
}
