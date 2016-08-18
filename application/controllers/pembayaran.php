<?php class Pembayaran extends CI_Controller{
var $imagePath = 'public/media/pembayaran/';

	function __construct(){
		parent::__construct();
		$this->load->model('Mpembayaran');
		$this->load->model('Muser');
		$this->load->model('Mdorder');
		$this->load->model('Morder');
	}
	function bayar_order($id = null){
		$this->auth->restrict_member();
		/*$this->auth->cek_menu(2);*/
		$id_level = $this->session->userdata('id_level');
		$data['menu'] = $this->Muser->get_menu_for_level($id_level);
	
		if ($id == null) {
			$id = $this->input->post('id_order');
		}
		$this->form_validation->set_rules('no_transfer', 'no_transfer', 'required|xss_clean');
		$this->form_validation->set_error_delimiters('', '<br/>');
		if ($this->form_validation->run() == TRUE) {
			$tagihan = $this->input->post('tagihan');
			$jml_bayar = $this->input->post('jml_bayar');
			if($jml_bayar == $tagihan){
				$data = array(
					'no_transfer' => $this->input->post('no_transfer'),
					'tgl_bayar' => $this->input->post('tgl_bayar'),
					'permalink' => url_title($this->input->post('no_transfer')),
					'status_bayar' => "Lunas",
					'jml_bayar' => $this->input->post('jml_bayar'),
				);
			}else{
				$data = array(
					'no_transfer' => $this->input->post('no_transfer'),
					'tgl_bayar' => $this->input->post('tgl_bayar'),
					'permalink' => url_title($this->input->post('no_transfer')),
					'status_bayar' => "Kurang",
					'jml_bayar' => $this->input->post('jml_bayar'),
				);
			}
			if ($_FILES['image']['error'] != 4) {
				$config['upload_path'] = $this->imagePath;
				$config['allowed_types'] = 'jpg|png|jpeg|gif';
				$config['max_size'] = '200000';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload("image")) {
					$image = $this->upload->data();
					$data['image'] = $this->imagePath . $image['file_name'];
				}
			}
			$this->Mpembayaran->update($id, $data);
			$this->session->set_flashdata('success', 'Post edited');
			redirect('order_pesanan/index');
		}
		
		$data['pembayaran'] = $this->Mpembayaran->findById($id);
		$this->load->view('user/bayar_order', $data);
	}
}
?>