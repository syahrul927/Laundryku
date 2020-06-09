<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	 function __construct() {
		parent:: __construct();
		$this->load->model("Global_m");
	}
	
	public function index()
	{
		$this->load->view('login_v');
	}

	public function ceklogin(){
		$userid 	= $this->input->post('username');
		$pass 		= $this->input->post('password');
		$key		= "!@#$%^&*";
		$password	= $key."".$pass."".$key;

		// echo $password."<br>";


		$where = array(
			'username' => $userid,
			'password' => md5($password)
		);

		$datauser = $this->Global_m->cek_login_m('login', $where);

		foreach ($datauser->result() as $dt) {
			$nama	= $dt->nama;
			$email  = $dt->email; 
		}

		if($datauser->num_rows()>0){
			$data_session = array(
					'nama'=>$nama,
					'email' => $email,
					'username' => $userid
			);
			$this->session->set_userdata($data_session);
			redirect(base_url('menuutama'));
		}
		else{
			?>
			<script type="text/javascript">
				alert('Maaf username atau password salah !')
				window.open("<?php echo base_url()."Login"?>","_self")
			</script>
			<?php
		}

	}
}
?>