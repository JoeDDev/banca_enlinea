<?php 
	
	/**
	 * 
	 */
	class Administrador extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->datos = array();
			$this->load->model("Administrador_model");
			//Como todo constructor todo lo que necesites y que vayas a utilizar en esta clase
			// es mejor declararlo aca, como por ejemplo los modelos		
		}	
		public function view($page = 'nuevo_usuario')
		{
			$this->load->view('administrador_view/header');	
			$this->load->view('administrador_view/nuevo_usuario');		
			$this->load->view('administrador_view/usuarios');
			$this->load->view('administrador_view/footer');		
		}


		public function ingreso_usuario()
		{

			if(($this->input->post('nombre'))&&($this->input->post('usuario'))&&($this->input->post('contrasena'))&&($this->input->post('confirmacion_psw'))) # usuario contrasena confirmacion_psw
			{
				#echo $this->input->post('nombre');
				$data = array("nombre" => $this->input->post('nombre'),"usuario" => $this->input->post('usuario'),"psw" => $this->input->post('contrasena'),"psw_true" => $this->input->post('confirmacion_psw'));

				if($data["psw"] != $data["psw_true"])
				{
					echo "<script>
							type=\"text/javascript\">alert(\"Las contraseñas que ingresó no coinciden, favor volver a ingresarlas\");
					      </script>";				
				}else{
					$insertar = array('nombre' => $data["nombre"] , 'tipo' => 2 , 'correo' => $data["usuario"] , 'password' => $data["psw"] , 'estado' => 1);
				}

				$this->Administrador_model->insertar_usuario($insertar);

			}		

			$this->datos["vista"] = 'administrador_view/nuevo_usuario'; // a ya
			$this->load->view("principal", $this->datos);		

		}

		public function mostrar_usuarios()
		{
			$this->datos = array('usuario' => $this->Administrador_model->ver_usuario_cajero());

			
			
			$this->datos["vista"] = 'administrador_view/usuarios';
			$this->load->view("principal",$this->datos);
		}

		public function grafica_transaccion()
		{
				
			// $data = $this->Administrador_model->ver_grafica();
			// $djason = json_encode($data);
					
			// $this->datos["grafica"] = $djason;

			$this->datos = array("grafica" => $this->Administrador_model->ver_grafica(),"monto_retiro" => $this->Administrador_model->monto_retiro(),"monto_deposito" => $this->Administrador_model->monto_deposito());

			// // $this->datos = array('monto_retiro' => $this->Administrador_model->monto_retiro());

			// echo "<pre>";
			// print_r ($this->Administrador_model->monto_retiro());
			// echo "</pre>";
			// die();
				
			$this->datos["vista"] = 'administrador_view/monitor_transferencias';
			// $this->load->view('administrador_view/monitor_transferencias');
			$this->load->view("principal", $this->datos);
		}


	}

 ?>