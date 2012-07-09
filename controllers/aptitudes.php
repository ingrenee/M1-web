<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" :
 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Mathew Davies
 * ----------------------------------------------------------------------------
 */
class Aptitudes extends CI_Controller {

	/**
	 * index
	 *
	 * @return void
	 * @author Mathew
	 **/

	 

	/*
 * Autocomplete formatter
 */
function autocomplete_format($results) {

	$this->load->view('aptitudes/formato',array('filas'=>$results));
}	
	
		
	 
	function buscar()
	{
		
		
		$results = array();

$categoria=(int)$this->uri->segment(3);
$w=array();
if($categoria>0):
$w['categorias_ID']=$categoria;
endif;

/*
 * Search for term if it is given
 */
if (isset($_GET['q'])) {
    $q = strtolower($_GET['q']);
    if ($q) {
		
		$h=$this->db->like('nombres',$q)->get_where('aptitudes',$w);
        foreach ($h->result_array() as $key => $value) {
            //if (strpos(strtolower($key), $q) !== false) {
                $results[] = array( $value['nombres'],$value['ID']);
            //}
			
        }
    }
}

/*
 * Output format
 */
$output = 'autocomplete';
if (isset($_GET['output'])) {
    $output = strtolower($_GET['output']);
}

/*
 * Output results
 */
if ($output === 'json') {
    echo json_encode($results);
} else {
  $this->autocomplete_format($results);
}
		
		
		
		
	}
	
	function buscar2()
	{
		
		
		$results = array();

$categoria=(int)$this->uri->segment(3);
$w=array();
if($categoria>0):
$w['categorias_ID']=$categoria;
endif;

/*
 * Search for term if it is given
 */
$_GET['q']=$_GET["term"];
if (isset($_GET['q']) && strlen($_GET['q'])>2) {
    $q = strtolower($_GET['q']);
    if ($q) {
		
		$h=$this->db->like('nombres',$q)->get_where('aptitudes',$w);
        foreach ($h->result_array() as $key => $value) {
            //if (strpos(strtolower($key), $q) !== false) {
				
				$data['id']=$value['nombres'];
				$data['label']=$value['nombres'];
				$data['value']=$value['nombres'];								
				
                $results[] = $data;//array( $value['nombres'],$value['ID']);
            //}
			
        }
    }
}

/*
 * Output format
 */
// $results[0]['label']=$_REQUEST;
$output = 'autocomplete';
if (isset($_GET['output'])) {
    $output = strtolower($_GET['output']);
}

/*
 * Output results
 */

$this->load->view('aptitudes/buscar2',array('filas'=>json_encode($results)));
//    echo json_encode($results);

		
		
		
		
	}
	function index()
	{
		$this->load->view('aptitudes/index');
		}
		
		
	function vista()
	{ $id=$this->uri->segment(3);
	$data['id']=$id;
		$this->load->view('aptitudes/vista',$data);
		
		}	
		
		function actualizar()
		{$data=array();
		$id=$this->uri->segment(3);
		$valor=$this->uri->segment(4);
			
			$tmp=explode('_',$id);
			$aptitudes_ID=$tmp[1];
			$categoria_ID=$tmp[2];
			$usuarios_id=$tmp[3];
			$t=$this->db->limit(1)->select('aptitudes')->where('md5(ID)',$usuarios_id)->get('usuarios')->row_array();
			$t2=$this->db->limit(1)->select('nombres')->where('ID',$aptitudes_ID)->get('aptitudes')->row_array();
			
			//print_r($t);
	$aptitudes_nombre=$t2['nombres'];
	
	$tag='['.$aptitudes_ID.':'.$aptitudes_nombre.':'.$categoria_ID.':'.$valor.']';
	
	$aptitudes_nombre=str_replace('','',strtolower($aptitudes_nombre));
	$tags[]='['.$aptitudes_ID.':'.$aptitudes_nombre.':'.$categoria_ID.':1]';
	$tags[]='['.$aptitudes_ID.':'.$aptitudes_nombre.':'.$categoria_ID.':2]';
	$tags[]='['.$aptitudes_ID.':'.$aptitudes_nombre.':'.$categoria_ID.':3]';
	$tags[]='['.$aptitudes_ID.':'.$aptitudes_nombre.':'.$categoria_ID.':4]';
	$tags[]='['.$aptitudes_ID.':'.$aptitudes_nombre.':'.$categoria_ID.':5]';
	
	$t['aptitudes']=$tag.(str_replace($tags,'',strtolower($t['aptitudes'])));
			
			$this->db->limit(1)->where('md5(ID)',$usuarios_id)->update('usuarios',array('aptitudes'=>$t['aptitudes']));
			$t=$this->db->limit(1)->select('aptitudes')->where('md5(ID)',$usuarios_id)->get('usuarios')->row_array();
		//	 print_r($t);
$meses[1]='B&aacute;sico';
$meses[2]='B&aacute;sico - Intermedio';
$meses[3]='Intermedio';
$meses[4]='Intermedio - Avanzado';
$meses[5]='Avanzado';

			$data['aptitud']=$meses[$valor];
			$data['t']=$t;
			//exit();
			$this->load->view('aptitudes/actualizar',$data);
			}
	
}