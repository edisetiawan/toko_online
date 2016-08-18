<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
		$this->load->model('Muser');
		$this->load->helper(array('form','url'));
	}
	public function index(){
		if($this->auth->is_logged_in() == false){
			$this->login();
		}else{
			$this->load->model('Muser');
			$level = $this->session->userdata('id_level');
			$data['menu'] = $this->Muser->get_menu_for_level($level);
			session_unset();
			$data['content']='admin/content';
			$this->load->view('admin/template',$data);
		}
	}

	public function login(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">','</span>');

		if ($this->form_validation->run() == FALSE){
				$this->load->view('admin/login');
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$success = $this->auth->do_login($username,$password);
			if($success){
				redirect('admin/home/index');
			}else{
				$data['login_info'] = "Maaf, username dan password salah!";
				$this->load->view('admin/login',$data);
			}
		}
	}
	function logout(){
		if($this->auth->is_logged_in() == true){
			$this->auth->do_logout();
		}
		redirect('admin/home/login');
	}
	function chat_forum(){
		$this->auth->restrict();
		/*$this->auth->cek_menu_member(3);*/
		$id_level = $this->session->userdata('id_level');
		$data['menu'] = $this->Muser->get_menu_for_level($id_level);

			$data['content']='admin/chat_forum';
			$this->load->view('admin/template',$data);
	}
	function kirim_chat(){
		$this->auth->restrict();
		/*$this->auth->cek_menu_member(3);*/
		$id_level = $this->session->userdata('id_level');
		$data['menu'] = $this->Muser->get_menu_for_level($id_level);

		$user=$this->input->post('user');
		$pesan=$this->input->post('pesan');
		$id_user=$this->session->userdata('id_user');
		
		mysql_query("insert into tbl_chat (user,pesan,id_user) VALUES ('$user','$pesan','$id_user')");
		redirect ('admin/home/ambil_pesan');
		session_unset();
	}
	
	function ambil_pesan(){
		$tanggal=date('Y-m-d');
		$tampil=mysql_query("select * from tbl_chat 
		join tbl_user on tbl_user.id_user = tbl_chat.id_user
		join tbl_level on tbl_level.id_level = tbl_user.id_level
		where waktu like'%$tanggal%' 
		order by waktu asc");
		while($r=mysql_fetch_array($tampil)){
		/*echo "<li><b>$r[user]</b> (<i>$r[waktu]</i>) : <br> $r[pesan] </li>";*/
			if($r['id_user'] == 1){
				echo "
					<div class='direct-chat-msg right col-sm-7 pull-right'>
						<div class='direct-chat-info clearfix'>
							<span class='direct-chat-name pull-left'>$r[user]</span>
							<span class='direct-chat-timestamp pull-right'>$r[waktu]</span>
						</div>
						<img class='direct-chat-img' src=' ".base_url()."AdminLTE/dist/img/user3-128x128.jpg' alt='message user image'>
						<div class='direct-chat-text '>
							$r[pesan] 
						</div>
					</div>
				";
			}else{
				echo "
					<div class='direct-chat-msg col-sm-6'>
						<div class='direct-chat-info clearfix'>
							<span class='direct-chat-name pull-left'>$r[user]</span>
							<span class='direct-chat-timestamp pull-right'>$r[waktu]</span>
						</div>
						<img class='direct-chat-img' src=' ".base_url()."AdminLTE/dist/img/user1-128x128.jpg' alt='message user image'>
						<div class='direct-chat-text '>
							$r[pesan] 
						</div>
					</div>
					
					";
			}
		}
	}

}
?>