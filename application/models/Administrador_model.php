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
						->select("id_usuario,nombre,correo")
						->from("banca.usuario")
						->where("tipo",2)
						->where("estado",1)
						->get()
						->result();
		}

		public function invalidar_usuario($valor)
		{
			$this->db->set('estado',1,false)
					 ->where('id_usuario',$valor)
					 ->update('banca.usuario');
		}

		public function ver_grafica()
		{
			return $this->db
						->select("count(*) as cantidad,fecha")
						->from("banca.documento")
						->group_by("fecha")
						->order_by("id_documento","asc")
						->limit(4)
						->get()
						->result();

						// ->select("*")
						// ->from("banca")
		// 				->get("documento","10")
		// 				->result();
	    }

	    public function monto_retiro()
	    {
	    	return $this->db
	    				->select("sum(b.monto) as monto")
	    				->from("banca.documento a")
	    				->join("banca.retiro b","b.id_documento = a.id_documento")
	    				->where("a.fecha","curdate()",false)
	    				->where("a.tipo",2)
	    				->get()
	    				->row();
	    }

	    public function monto_deposito()
	    {
	    	return $this->db
	    				->select("sum(b.monto_dep) as monto",false)
	    				->from("banca.documento a")
	    				->join("banca.deposito b","b.id_documento = a.id_documento")
	    				->where("a.fecha","curdate()",false)
	    				->where("a.tipo", 1)
	    				->get()
	    				->row();
	    }

	}
 ?>