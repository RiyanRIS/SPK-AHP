<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peternakayam extends CI_Controller
{

	var $bobot = array(
		'1' => 'Sama Penting Dengan',
		'2' => 'Mendekati Sedikit Lebih Penting',
		'3' => 'Sedikit Lebih Penting',
		'4' => 'Mendekati Lebih Penting',
		'5' => 'Lebih Penting',
		'6' => 'Mendekati Lebih Penting',
		'7' => 'Sangat Penting',
		'8' => 'Mendekati Mutlak',
		'9' => 'Mutlak Sangat Penting',
	);

	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('stat'))) {
			redirect('Login', 'refresh');
		} else {

			$this->load->model('Crud');
			$this->load->model('AHP');
			$this->load->model('AHP2');
		}
		//Do your magic here
	}

	public function index()
	{
		$data = array(
			'role' => $this->session->userdata('ha'),
			'nama' => $this->session->userdata('nama'),
			'nilai_preferensi' => $this->bobot,
			'kriteria' => $this->db->get_where('kriteria', 'status = "A"')->result(),
			'alternatif' => $this->db->get('alternatif')->result(),
			'gambar' => 'background-image: url("../assets/images/ayam.jpg"); background-size:cover; widht:100%;',
			//'url' => 'background-image: linear-gradient(to right, #EAD6EE, #A0F1EA);',
		);
		//echo json_encode($data);
		$this->load->view('Header', $data);
		$this->load->view('Index');
		#$this->load->view('Footer');
	}
}

/* End of file Peternakayam.php */
/* Location: ./application/controllers/Peternakayam.php */