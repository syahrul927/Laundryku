<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	 function __construct() {
		parent:: __construct();
		$this->load->model("Global_m");
	}
	public function index(){
		if(empty($_SESSION['username'])){
			$this->login();
		}
		
		redirect(base_url('customer'));
	}
	public function login()
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
			'kasirId' => $userid,
			'password' => md5($password)
		);

		$datauser = $this->Global_m->cek_login_m('kasir', $where);

		foreach ($datauser->result() as $dt) {
			$nama	= $dt->nama;
		}

		if($datauser->num_rows()>0){
			$data_session = array(
					'nama'=>$nama,
					'username' => $userid
			);
			$this->session->set_userdata($data_session);
			redirect(base_url('dashboard'));
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
	public function logout(){
		session_destroy();
		redirect(base_url('account/login'));

	}

}
?>