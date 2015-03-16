<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$login = $this->session->userdata('control');
		if (empty($login)) {
			$this->load->view('login');
		} else {
			redirect('index.php/login/sukses');
		}
	}

	public function logged_in()
	{
		$username = $this->input->post('username', TRUE);
		$password = md5($this->input->post('password', TRUE));
		$login = array('username'=>$username,'password'=>$password);
		$logged_in = $this->roni->roni_one('users', $login);
		if ($logged_in == FALSE) {
			?>
				<script>
					alert('Login gagal cok!');
				</script>
			<?php
			echo '<meta http-equiv="refresh" content="0; url='.base_url('index.php/login').'">';
		} else {
			foreach ($logged_in as $jones) {
				$switch = $jones->secure;
			}
			$this->session->set_userdata(array('control'=>$switch));
			redirect('index.php/login/sukses');
		}
	}

	// public function _login()
	// {
	// 	$session = $this->session->userdata('control');
	// 	$roni = $this->roni->roni_one('users',array('secure'=>$session));
	// 	if ($roni == FALSE) {
	// 		return array();
	// 	} else {
	// 		return $roni;
	// 	}
	// }

	public function sukses()
	{
		$sukses = $this->session->userdata('control');
		if (!empty($sukses)) {
			$this->load->view('sukses');
		} else {
			?>
				<script>
					alert('Tidak ada session!');
				</script>
			<?php
			echo '<meta http-equiv="refresh" content="0; url='.base_url('index.php/login').'">';
		}
	}
	
	public function logout(){
		$session = $this->session->userdata('control');
		$this->session->unset_userdata(array('control' => $session));
		?>
			<script>
				alert('Logout sukses!');
			</script>
		<?php
		echo '<meta http-equiv="refresh" content="0; url='.base_url('index.php/login').'">';
	}

}