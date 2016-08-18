<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Order_pesanan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Mbiaya_kirim');
		$this->load->model('Mmember');
		$this->load->model('Muser');
		$this->load->model('Mproduk');
		$this->load->model('Mdorder');
		$this->load->model('Morder');
		$this->load->model('Mkategori');
		$this->load->model('Mpembayaran');
		$this->load->library('cart');
		session_start();
	}
	function index(){
		$this->auth->restrict_member();			//* cek user sudah login /belum
		/*$this->auth->cek_menu(3);*/
		$id_level = $this->session->userdata('id_level');
		$data['menu'] = $this->Muser->get_menu_for_level($id_level);	//* cek user sudah login /belum

		$data['base_url'] = base_url().'admin/order_pesanan/index/';
		$data['total_rows'] = $this->db->count_all('tbl_order');
		$data['per_page'] = 10;
		$data['uri_segment'] = 4;
		$data['num_links']= 3;
		$data['next_link']='<';
		$data['next_link']='>';
		$data['cur_tag_open'] = '<li class="active"><a href="">';
		$data['num_tag_open'] = '<li>';
		
		$this->pagination->initialize($data);
		$data['order']=$this->Morder->getAll($data['per_page'],$this->uri->segment(4,0));
		$data['content']='order/data_order';
		$this->load->view('admin/template',$data);

	}
	function konfirmasi_order(){
		$this->load->view('user/konfirmasi_order');
	}
	function add_order(){
			$this->Morder->insert();
				$kdpesan = $this->Morder->getCode();
				$this->session->set_userdata('id_order', $kdpesan['id_order']);
			$this->Mpembayaran->insert();	
			foreach($this->cart->contents() as $items):
				$this->Mdorder->insert($items['id'], $items['qty']);
			endforeach;		
				/*$this->Mpesan->kurangi_stok($items['id'], $items['qty']);*/
			$this->cart->destroy();
			redirect('order_pesanan/konfirmasi_order');
	}
	function select_validate($selectValue){
		if($selectValue=='none'){
			$this->form_validation->set_message('select_validate','Tidak ada data yang dipilih');
			return false;
		}else{
			return true;
		}
	}
	function edit_order($id){
		$this->auth->restrict();
		$this->auth->cek_menu(2);
		$this->form_validation->set_rules('no_order','no_order','required');
		$this->form_validation->set_message('required','* Harus diisi');
		$this->form_validation->set_message('numeric','* Hanya boleh diisi angka');
		$this->form_validation->set_message('min_length[6]','* Minimal diisi 6 karakter');
		$this->form_validation->set_message('alpha_numeric','* Harus diisi kombinasi huruf dan angka');
		$this->form_validation->set_message('valid_emails','* Format email tidak valid');
		$this->form_validation->set_error_delimiters('', '</br>');
		
		if($this->form_validation->run()==FALSE){
			$level = $this->session->userdata('id_level');
			$data['menu'] = $this->Muser->get_menu_for_level($level);
			$data['order']=$this->Morder->select($id);
			$data['detil']=$this->Mdorder->select($id);
			$data['content']='order/edit_order';
			$this->load->view('admin/template',$data);
		}else{
			$this->Morder->update($id);
			$this->session->set_flashdata('success','Data order berhasil diperbarui !');
			redirect('admin/order/index');
		}

	}
}
?>