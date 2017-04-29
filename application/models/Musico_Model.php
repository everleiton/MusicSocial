<?php

class Musico_Model extends CI_Model{

	function insertar($user)
	{
		$query = $this->db->insert('usuario',$user);
		$insert_id = $this->db->insert_id();
		
		   return  $insert_id;
		
	}
	
	function insertarInstrumento($inst)
	{
		$query = $this->db->insert('usuario_instrumento',$inst);

		return $query;
	}
	function insertargenero($gen)
	{
		$query = $this->db->insert('usuario_genero',$gen);

		return $query;
	}

	 function authenticate($user, $pass) {
		 $query = $this->db->get_where('usuario', array('correo' => $user, 'pass' => $pass));
		
	//return $query->result_object();
	  return $query;
  }

}