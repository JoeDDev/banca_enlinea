<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Administrador_model extends CI_Model
	// Primero toda clase se inicia en mayuscula, de igual manera el archivo
	{
		public function insertar_usuario($data=array()) // no es java para declarar primero el tipo
		{
			$this->db->insert('usuario',$data); // qué onda de qué, allí mando a insertar en mi bd
			//Recordemos que va, Clase -> metodo -> objeto
		}

		public function ver_usuario_cajero()
		{
			// $db = $this->db->get('usuario',1);
			return $this->db
						->select("id_usuario,nombre")
						->from("usuario")
						->where("tipo",2)
						->get()
						->row();
		}
	}
 ?>