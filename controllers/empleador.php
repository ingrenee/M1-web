<?php

/*

 * ----------------------------------------------------------------------------

 * "THE BEER-WARE LICENSE" :

 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you

 * can do whatever you want with this stuff. If we meet some day, and you think

 * this stuff is worth it, you can buy me a beer in return Mathew Davies

 * ----------------------------------------------------------------------------

 */

class Empleador extends CI_Controller {



	/**

	 * index

	 *

	 * @return void

	 * @author Mathew

	 **/



	 

	function info($empleador_ID=false,$nombre=false)

	{

		
		if(!$empleador_ID):
		$empleador_ID=$this->uri->segment(3);

		endif;

//		var_dump($empleador_ID);

		

		

		$data['info']=$info=$this->lib_empleador->obtener_uno($empleador_ID);

		if(count($data['info'])<=0):
		redirect('error/page_404');
		endif;

	/*Si la empresa no existe la creamos*/
		
		//echo $info['ruc'];
		$empresas=$this->db->where('ruc',$info['ruc'])->get('empresas');
		if($empresas->num_rows()>0):
		$data['info_empresa']=$empresas->row_array();
		else:
		
		$up['ruc']=$info['ruc'];
		$up['nombre']=$info['nombre'];
		$up['creado']=ahora();
		$up['rubro']=$info['rubro'];
		$up['website']=$info['website'];
		$up['descripcion']=$info['descripcion'];
		$up['direccion']=$info['direccion'];
		$up['pais']=$info['pais'];				
		$up['departamento']=$info['departamento'];
		$up['distrito']=$info['distrito'];	
		
//		$this->empresas->agregar($up);	
		$this->db->insert('empresas',$up);	
		$data['info_empresa']=$up;
		endif;
		
		/**/




		$w['empleador_ID']=$empleador_ID;

		$w['estado']='publicado';

		$tmp=$this->lib_empleos->obtener_todos($w,4,'empleador/info/'.$empleador_ID.'/');

		$data['index']=(int)$this->uri->segment(4);

		$data['root']=$tmp[0];

		$data['paginacion']=$tmp[1];

		

		$data['_titulo_']=$data['info']['nombre'];

		$data['_descripcion_']=_cortar($data['info']['descripcion']).' ...';

		

		

		$data['content']=$this->load->view('empleador/info',$data,TRUE);
	
		$this->load->view('template2',$data);
		//exit();
		}

		
	
		function perfil($ruc=false)
		{
			
				$empresa=$this->db->limit(1)->where('ruc',$ruc)->get('empresas');
		if($empresa->num_rows()<=0):
		redirect('error/oferta_no_existe');
		endif;
		$data['info']=$empresa->row_array();
		 $data['content']=$this->load->view('empleador/perfil',$data,TRUE);

		$this->load->view('template_web',$data);
			}

	

}