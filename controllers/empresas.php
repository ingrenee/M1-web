<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" :
 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Mathew Davies
 * ----------------------------------------------------------------------------
 */
class Empresas extends CI_Controller {

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
    foreach ($results as $result) {
        echo $result[0] . '|' . $result[1] . "\n";
    }
}	
	
		
	 
	function buscar()
	{
		
		
		$results = array();



/*
 * Search for term if it is given
 */
if (isset($_GET['q'])) {
    $q = strtolower($_GET['q']);
    if ($q) {
		
		$h=$this->db->like('nombre',$q)->get('empresas');
        foreach ($h->result_array() as $key => $value) {
            //if (strpos(strtolower($key), $q) !== false) {
                $results[] = array( $value['nombre'],$value['ruc']);
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
    $data['filas']=json_encode($results);
	$this->load->view('empresas/formato',$data);
} else {
    //echo $this->autocomplete_format($results);
	$data['filas']=$results;
	//$data['filas']=json_encode($results);
	$this->load->view('empresas/formato',$data);
}
		
	
		
	}
}