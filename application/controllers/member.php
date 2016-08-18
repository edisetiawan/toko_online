<?php class Member extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
		
		$this->load->model('Muser');
		$this->load->helper(array('form','url'));
		$this->load->model('Mmember');
		$this->load->model('Mproduk');
		$this->load->model('Muser');
		session_start();
		/*$this->load->model('Mchat');*/
	}

	function index(){
		if($this->auth->is_logged_in() == false){
			$this->login();
		}else{
			$this->load->model('Muser');
			$level = $this->session->userdata('id_level');
			$data['menu'] = $this->Muser->get_menu_for_level($level);
			
			$data['base_url'] = base_url().'home/index/';
			$data['total_rows'] = $this->db->count_all('tbl_produk');
			$data['per_page'] = 12;
			$data['uri_segment'] = 3;
			$data['num_links']= 3;
			$data['next_link']='<';
			$data['next_link']='>';
			$data['cur_tag_open'] = '<li class="active"><a href="">';
			$data['num_tag_open'] = '<li>';
			
			$this->pagination->initialize($data);
			$data['produk']=$this->Mproduk->getAll($data['per_page'],$this->uri->segment(3,0));
			$data['terbaru']=$this->Mproduk->produk_terbaru();
			$data['content']='user/content';
			$this->load->view('user/template',$data);
		}
	}
	public function login(){
		$this->load->library('form_validation');		//* memanggil library form_validation
		$this->form_validation->set_rules('username', 'username', 'required');	//*seting form input username password
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">','</span>');	//*seting form input username password

		if ($this->form_validation->run() == FALSE){ //* kondisi jika username dan password salah maka kembali ke hal depan
			$this->load->view('user/login');
		}else{
			$username = $this->input->post('username');	
			$password = $this->input->post('password');
			$success = $this->auth->do_login($username,$password);	//* selain itu maka eksekusi fungsi do_login dari library auth
			if($success){
				// lemparkan ke halaman index member
				redirect('member/index');
			}else{
				$this->session->set_flashdata('error','username dan password salah !');
				redirect('home/index',$data);	//* kembali ke hal depan
			}
		}
	}
	function logout(){
		if($this->auth->is_logged_in() == true){
			// jika dia memang sudah login, destroy session
			$this->auth->do_logout();
		}
		// larikan ke halaman utama
		redirect('home/index');
	}

	function cek_no_telp($no_telp){
        if ($this->Mmember->cek_no_telp($no_telp) == TRUE){
            $this->form_validation->set_message('callback_cek_no_telp', 'no telp yang anda masukkan sudah digunakan');
			$this->form_validation->set_error_delimiters('', '</br>');
            return FALSE;
        }else{          
            return TRUE;
        }
    }
	function cek_telp_lama($no_telp){
        if ($this->Mmember->cek_telp_lama($no_telp) == FALSE){
            $this->form_validation->set_message('callback_cek_no_telp', 'no telp yang anda masukkan salah');
			$this->form_validation->set_error_delimiters('', '</br>');
            return FALSE;
        }else{          
            return TRUE;
        }
    }
	function cek_username($username){
        if ($this->Mmember->cek_username($username) == TRUE){
            $this->form_validation->set_message('callback_cek_username', ' username yang anda masukkan sudah digunakan');
			$this->form_validation->set_error_delimiters('', '</br>');
            return FALSE;
        }else{          
            return TRUE;
        }
    }
	function cek_password($password){
        if ($this->Mmember->cek_password($password) == TRUE){
            $this->form_validation->set_message('password', ' password yang anda masukkan sudah digunakan');
			$this->form_validation->set_error_delimiters('', '</br>');
            return FALSE;
        }else{          
            return TRUE;
        }
    }
	function password_lama($password_lama){
        if ($this->Mmember->password_lama($password_lama) == FALSE){
            $this->form_validation->set_message('password_lama', ' password yang anda masukkan salah');
			$this->form_validation->set_error_delimiters('', '</br>');
            return FALSE;
        }else{          
            return TRUE;
        }
    }
	function registrasi(){
		$this->form_validation->set_rules('username','username','required|callback_cek_username');	//* setting form validation input registrasi
		$this->form_validation->set_rules('password','password','required|callback_cek_password|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm','password_confirm','required|callback_cek_password');
		$this->form_validation->set_rules('nama_member','nama_member','required');
		$this->form_validation->set_rules('no_telp','no_telp','required|callback_cek_no_telp');
		$this->form_validation->set_rules('email','email','valid_emails|required');
		
		$this->form_validation->set_message('valid_emails','* Format email tidak valid');
		$this->form_validation->set_message('matches','* Password harus sama');
		$this->form_validation->set_message('required','* Harus diisi');
		$this->form_validation->set_message('valid_emails','* Email tidak valid');
		$this->form_validation->set_message('numeric','* Hanya boleh diisi angka');	

		$this->form_validation->set_error_delimiters('', '</br>');	//* setting form validation input registrasi

		if($this->form_validation->run()==FALSE){
			if(isset($_POST['btn']) ){		//* session isian data
				$_SESSION['pos']=$_POST;
			}								//* session isian data
			$data['content']='user/registrasi';		//* memanggil form input registrasi
			$this->load->view('user/template',$data);		//* memanggil template
			$this->session->set_flashdata('error','Data member gagal ditambahkan !');
			
		}else{
			$this->Mmember->insert();		//* menyimpan data registrasi
			$member = $this->Mmember->getCode();	//* memanggil data yg baru disimpan
			
			$this->session->set_userdata('id_member', $member['id_member']);	//*	menyimpan data kedalam session
			$this->session->set_userdata('nama_member', $member['nama_member']);
			$this->session->set_userdata('no_telp', $member['no_telp']);		//*	menyimpan data kedalam session
			$this->Mmember->insert_user();	//* simpan data user
			?>
			  <!--<script type="text/javascript" language="javascript">
				alert("Data member berhasil ditambahkan!!!");
			  </script>-->
			  <?php
			$this->session->set_flashdata('success','Data member berhasil ditambahkan !');
			unset($_SESSION['pos']);				//* menghapus session isian data
			redirect ('home/index','refresh');
		}
	}
	function akun_member($id){
		$this->form_validation->set_rules('nama_member','nama_member','required');
		$this->form_validation->set_rules('email','email','valid_emails|required');
		
		$this->form_validation->set_rules('no_telp','no_telp','required');
		
		$this->form_validation->set_rules('email','email','valid_emails|required');
		$this->form_validation->set_message('valid_emails','* Format email tidak valid');
		$this->form_validation->set_message('required','* Harus diisi');
		$this->form_validation->set_message('numeric','* Hanya boleh diisi angka');
		

		$this->form_validation->set_error_delimiters('', '</br>');

		if($this->form_validation->run()==FALSE){
			$data['member'] = $this->Mmember->select($id);
			$data['content']='user/akun_member';
			$this->load->view('user/template',$data);
			$this->session->set_flashdata('error','Data member gagal diperbarui !');
		}else{
			$this->Mmember->update($id);
			$this->session->set_flashdata('success','Data member berhasil diperbarui !');
			redirect ('home/index');
		}
	}
	function ganti_password($id){
		$this->form_validation->set_rules('username','username','required|min_length[6]');
		$this->form_validation->set_rules('password','password','required|callback_cek_password|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm','password_confirm','required');
		$this->form_validation->set_rules('password_lama','password_lama','required|callback_password_lama');
		$this->form_validation->set_message('required','* Harus diisi');
		$this->form_validation->set_message('min_length[6]','* Minimal diisi 6 karakter');
		
		$this->form_validation->set_error_delimiters('', '</br>');
		if($this->form_validation->run()==FALSE){
			$data['member'] = $this->Mmember->select_password($id);
			$data['content']='user/ganti_password';
			$this->load->view('user/template',$data);
			$this->session->set_flashdata('error','Data member gagal diperbarui !');
		}else{
			$this->Mmember->update_password($id);
			$this->session->set_flashdata('success','Data member berhasil diperbarui !');
			redirect ('home/index');
		}
	}
	function lupa_password(){
		$this->form_validation->set_rules('password','password','required|callback_cek_password|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm','password_confirm','required|callback_cek_password');
		$this->form_validation->set_rules('nama_member','nama_member','required');
		$this->form_validation->set_rules('no_telp','no_telp','required|callback_cek_telp_lama');
		
		$this->form_validation->set_message('valid_emails','* Format email tidak valid');
		$this->form_validation->set_message('matches','* Password harus sama');
		$this->form_validation->set_message('required','* Harus diisi');
		$this->form_validation->set_message('valid_emails','* Email tidak valid');
		$this->form_validation->set_message('numeric','* Hanya boleh diisi angka');

		$this->form_validation->set_error_delimiters('', '</br>');

		if($this->form_validation->run()==FALSE){
			/*if(isset($_POST['btn']) ){
				$_SESSION['pos']=$_POST;
			}*/
			$data['content']='user/lupa_password';
			$this->load->view('user/template',$data);
			$this->session->set_flashdata('error','Data member gagal ditambahkan !');
			
		}else{
			
			$member = $this->Mmember->cekMember();
			
			$this->session->set_userdata('id_member', $member['id_member']);
			$this->session->set_userdata('nama_member', $member['nama_member']);
			$this->session->set_userdata('no_telp', $member['no_telp']);
			$this->Mmember->lupa_password();
			
			$newpass= $this->Mmember->ambil_password_baru();
			$this->session->set_userdata('username', $newpass['username']);
			$this->session->set_userdata('password', $newpass['password']);
			?>
			  <!--<script type="text/javascript" language="javascript">
				alert("Data member berhasil ditambahkan!!!");
			  </script>-->
			  <?php
			$this->session->set_flashdata('success','Data member berhasil ditambahkan !');
			/*unset($_SESSION['pos']);*/
			redirect ('home/index','refresh');
		}

	}
	function komentar(){
		
	}
	function chat_forum(){
		$this->auth->restrict_member();
		/*$this->auth->cek_menu_member(3);*/
		$id_level = $this->session->userdata('id_level');
		$data['menu'] = $this->Muser->get_menu_for_level($id_level);

			$data['content']='user/forum_chat';
			$this->load->view('user/template',$data);
	}
	function kirim_chat(){
		$this->auth->restrict_member();
		/*$this->auth->cek_menu_member(3);*/
		$id_level = $this->session->userdata('id_level');
		$data['menu'] = $this->Muser->get_menu_for_level($id_level);
		
		$user=$this->input->post('user');
		$pesan=$this->input->post('pesan');
		$id_user = $this->session->userdata('id_user');
		
		mysql_query("insert into tbl_chat (user,pesan,id_user) VALUES ('$user','$pesan','$id_user')");
		redirect ('member/ambil_pesan');
	}
	
	function ambil_pesan(){
		$tanggal=date('Y-m-d');
		$id_level = $this->session->userdata('id_level');
		$tampil=mysql_query("select * from tbl_chat 
		join tbl_user on tbl_user.id_user = tbl_chat.id_user
		join tbl_level on tbl_level.id_level = tbl_user.id_level
		where waktu like'%$tanggal%' 
		order by waktu asc");
		
		while($r=mysql_fetch_array($tampil)){
			if($r['id_user'] == 1){
				echo "
					<div class='direct-chat-msg right col-sm-7 pull-right'>
						<div class='direct-chat-info clearfix'>
							<span class='direct-chat-name pull-left'>$r[user]</span>
							<span class='direct-chat-timestamp pull-right'>$r[waktu]</span>
						</div>
						<img class='direct-chat-img' src=' ".base_url()."AdminLTE/dist/img/user3-128x128.jpg' alt='message user image'>
						<div class='direct-chat-text '>
							$r[pesan] <br>
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