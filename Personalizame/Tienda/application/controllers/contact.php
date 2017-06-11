<?php

class Contact extends CI_Controller{
	public function formContacto(){
		$datos['mensajeEnviado'] = "<span style='color:red; font-size: 25px; line-height: 40px; margin: 10px;'>Error! Por favor, inténtalo de nuevo.</span>";

		if(isset($_POST['name']))
		{
			$name=$_POST['name'];
			$email=$_POST['email'];
			$message=$_POST['message'];

			$to = "alejandro.fa.daw@gmail.com";
			$subject = "PersonalÃ­zame - Formulario de Contacto";
			$message = " Nombre: " . $name ."\r\n Email: " . $email . "\r\n Mensaje:\r\n" . $message;
				
			$from = "Personalizame";
			$headers = "From:" . $from . "\r\n";
			$headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n";

			if(@mail($to,$subject,$message,$headers))
			{
				$datos['mensajeEnviado'] = "<span style='color:blue; font-size: 25px; line-height: 40px; margin: 10px;'>Tu mensaje fue enviado!</span>";
			}
		}

		$this->load->view('home', $datos);
	}
}
?>
