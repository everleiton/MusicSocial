<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Musico extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('Inicio/index');
	}
	
	public function registro(){
		$this->load->view('/Inicio/registro');
	}
	
	
	
	public function insert()
  {

		$this->load->model('Musico_Model');
    
        $passEncript= md5($this->input->post('pass'));
				$user['nombre'] = $this->input->post('nombre');
    $user['correo'] = $this->input->post('correo');
    $user['pass'] = $passEncript;
		$user['direccion'] = $this->input->post('direccion');
		$user['foto'] =  addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
		
		$data['id'] = $this->Musico_Model->insertar($user);
		
		
		
		
		$instrumento['id_usuario']= $data['id'] ;
	$instrumento['id_instrumeto']= $this->input->post('instrumento');
	$this->Musico_Model->insertarInstrumento($instrumento);
	
	$genero = $this->input->post('genero');
	foreach ($genero as $gen) {
		$gene['id_usuario']= $data['id'] ;
	$gene['id_genero']= $gen;
	$this->Musico_Model->insertargenero($gene);
	}
		

		
		
  
	redirect( base_url());
    

  }
	
	
	
	public function authenticate() {
		
		/*tomamos los 2 datos del from con el pass ya modificado*/
		$user = $this->input->post('email');
		$passever= md5($this->input->post('password'));
		
		/*cargamos el modelo y enviamos la consulta a la DB*/
		$this->load->model('Musico_Model');
		
		$query = $this->Musico_Model->authenticate($user, $passever); /* <<<<<<<<<<<<<<<<<<<<<<<<<<<<<NO TOCAR*/
		
		
		$row = $query->row_array();
		
		if (isset($row))
		{
	
		
			/*  echo $row['id'];
			echo base64_encode($row['photo']);
			echo "-------------";
		 */
			$user = array(
				'id'            => $row['id'],
				'nombre'         => $row['nombre'],
				'correo'      => $row['correo'],
				'pass'          => $row['pass'],
				'direccion'  => $row['direccion'],
				'foto'  =>  base64_encode($row['foto'])
				
			); 
	
			var_dump($user);
		$this->session->set_userdata('user', $user); /* <<<<<<<<<<<<<<<<<<<<<<<<<<<<<NO TOCAR*/
			
			
		echo "no funca";
				$this->load->view('/Inicio/inicio');
			
			}}
  
}
