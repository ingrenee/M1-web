<?php

/*

 * ----------------------------------------------------------------------------

 * "THE BEER-WARE LICENSE" :

 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you

 * can do whatever you want with this stuff. If we meet some day, and you think

 * this stuff is worth it, you can buy me a beer in return Mathew Davies

 * ----------------------------------------------------------------------------

 */

class Home extends CI_Controller {



	/**

	 * index

	 *

	 * @return void

	 * @author Mathew

	 **/



	 

	function busco()

	{

		$q=$this->uri->segment(3);

		$q=str_replace('.html','',$q);

		$qx=$q;

		$q=str_replace('-','%',$q);

		$this->native_session->set_userdata('q',$q);

redirect('buscar/'.$qx);

		}

		

	

		

	 

	function index()

	{

		

	

		$w1=array('estado ='=>'publicado');

		/*$q=$this->input->post('q');

		$q_session=$this->native_session->userdata('q');

		echo "[".$q."]";

		if(isset($q) && strlen($q)>1):

		$w1['titulo like']='%'.$q.'%';

		$this->native_session->set_userdata('q',$q);

		historial_busquedas($q); 

		

		elseif(isset($q_session)):

		$w1['titulo like']='%'.$q_session.'%';

		endif;

*/

		

$config['uri_segment'] = 3;

$config['per_page']   = 10;

$config['num_links']   = 7;

$config['base_url'] = site_url('home/index/');

$config['first_link'] = 'Inicio';
$config['last_link'] = 'Final';

$config['total_rows'] = $this->db->select('ID')->get_where('entradas',$w1)->num_rows();





$this->pagination->initialize($config);





$data['root']=$this->db->order_by('creado','desc')->select('ID,titulo,creado,salario,departamento,salario_tipo ,salario_2,vacantes')

->select('SUBSTRING( descripcion , 1,350) as descripcion',false)->

get_where('entradas',$w1,$config['per_page'],$this->uri->segment(3));



$data['index']=(int)$this->uri->segment(3);

$data['paginacion']=$this->pagination->create_links();

//$tmp[]=$cat1->row_array();











$data['content']=$this->load->view('welcome/lista',$data,true);



$data['_titulo_']='Bolsa de trabajo y ofertas de empleo,'.strtolower($this->native_session->userdata('titulo'));

$data['_descripcion_']=strtolower($this->native_session->userdata('descripcion'));//Todas las ofertas de empleo y trabajo, busqueda de trabajo y empleo, publicacion de  ofertas de trabajo y empleo, bolsa de empleo, y practicas pre profesionales , publicacion de curriculum, todo gratis.';

//$this->output->cache(30);


$this->load->view('home',$data);

		

		

		

		

	

		

	}

	




	
function web($empleador_ruc=false,$num=false,$modo=true)
{

		
		if(!$empleador_ruc):
		$empleador_ruc=$this->uri->segment(3);
		else:
		
		$data['modo_empresa']=$modo;
		
		endif;

//		var_dump($empleador_ID);

		$empresa=$this->db->limit(1)->where('ruc',$empleador_ruc)->get('empresas');
		
		//exit();
		if($empresa->num_rows()<=0):
		redirect('error/oferta_no_existe');
		endif;
		
			
			
$s='update  subdominios set contador=contador+1 where  ruc="'.$empleador_ruc.'" ';			
$this->db->query($s);
//$this->db->where('ruc',$tmp2['ruc'])->update('subdominios',array('contador'=>$tmp2['contador']+1));
	
		$data['info']=$empresa->row_array();

		
 //echo $empleador_ruc;
		$empleadores=$this->lib_empleador->obtener_donde('ruc',$empleador_ruc);
		
		$cad='';
		foreach($empleadores->result_array() as $k => $v):
		if((int)$k==0):
		$cad=''.$v['ID'];
		else:
		$cad.=','.$v['ID'];
		endif;
		endforeach;
		
		
//$data['info']=$this->lib_empleador->obtener_uno($v['ID']);

	  	$w['empleador_ID in']='('.$cad.')';
		//exit();
		$w['estado']='"publicado"';

		$tmp=$this->lib_empleos->obtener_todos($w,2,''.$empleador_ruc.'/',false,10);

		//echo $this->db->last_query();
		//exit();
		$data['index']=(int)$this->uri->segment(2);

		$data['root']=$tmp[0];

		$data['paginacion']=$tmp[1];

		

		//$data['_titulo_']=$data['info']['nombre'];

		//$data['_descripcion_']=_cortar($data['info']['descripcion']).' ...';
$data['content']=$this->load->view('empleador/web',$data,TRUE);
$this->load->view('template_web',$data);
}

function _remap($method,$params=array())
{
	
	
if($_SERVER['SERVER_NAME']!= 'localhost' && $_SERVER['SERVER_NAME'] != 'hayempleo.com'):
$tmp=$this->db->limit(1)->where('nombre',$_SERVER['SERVER_NAME'])->where('estado','publicado')->get('subdominios');

	if($tmp->num_rows()>0):
		$tmp2=$tmp->row_array();
$w['operacion']='USOsubdominio';
	$w['texto']=$_SERVER['SERVER_NAME'];
	$w['creado']=ahora();
	$w['ip']=$_SERVER['REMOTE_ADDR'];
	$this->db->insert('sucesos',$w);
	
	$this->web(str_replace(' ','',$tmp2['ruc']),0,false);
	else:
	 if (method_exists($this, $method))
    {
	//	$this->$method();
       //print_r($params);
	   
	   return call_user_func_array(array($this, $method), $params);
    }
	endif;
	
else:
	
	 if (method_exists($this, $method))
    {
        return call_user_func_array(array($this, $method), $params);
    }
endif;
		//print_r($_SERVER);
		
         
    }		














	/**

	 * activate

	 * doesn't currently work

	 *

	 * @return void

	 * @author Mathew

	 **/

	

	/**

	 * register

	 *

	 * @return void

	 * @author Mathew

	 **/

	

public function logout()

	{

	   

	   // $this->ci->native_session->unset_userdata($identity);

		$this->native_session->sess_destroy();

		redirect('');

	}

	

	/**

	 * status

	 *

	 * @return void

	 * @author Mathew

	 **/

	
	/**

	 * change password

	 *

	 * @return void

	 * @author Mathew

	 **/

	

	/**

	 * forgotten password

	 *

	 * @return void

	 * @author Mathew

	 **/

	

}