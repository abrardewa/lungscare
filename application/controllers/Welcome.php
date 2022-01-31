<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		// if (!$this->session->userdata('username') == null) {
		// 	redirect('Welcome/LoginCon');
		// }
		// is_logged_in();
	}
	public function index()
	{
		$this->load->view('clientside/landingpage');
	}
	public function displaypertanyaan()
	{
	}
	public function proses()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('bb', 'Berat Badan', 'required|trim');
		$data['pertanyaan'] = $this->Modelperiksa->Alldata();
		$jlh = $this->Modelperiksa->jumlahdata();
		if ($this->form_validation->run() == false) {
			$this->session->sess_destroy();
			$this->load->view('clientside/proses', $data);
		}
	}
	public function diagnosis()
	{
		// $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		// $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		// $this->form_validation->set_rules('bb', 'Berat Badan', 'required|trim');
		// $data['pertanyaan'] = $this->Modelperiksa->Alldata();
		// $jlh = $this->Modelperiksa->jumlahdata();
		// for ($i = 0; $i < $jlh; $i++) {
		// 	$this->form_validation->set_rules('jawaban' . $i, 'Jawaban', 'required|trim');
		// }
		// // $this->form_validation->set_rules('hasil', 'Hasil', 'required|trim');
		// // $this->form_validation->set_rules('persentase', 'Persentase', 'required|trim');
		// if ($this->form_validation->run() == false) {
		// 	$this->session->sess_destroy();	
		// 	$this->load->view('clientside/diagnosis', $data);
		// } else {
		// 	$nama = $this->input->post('nama', TRUE);
		// 	$alamat = $this->input->post('alamat', TRUE);
		// 	$bb = $this->input->post('bb', TRUE);
		// 	// $penyakit = $this->input->post('penyakit', TRUE);
		// 	// $gejala = array();
		// 	// for ($i = 0; $i < $jlh; $i++) {
		// 	// 	array_push($gejala, $this->input->post('gejala' . $i, TRUE));
		// 	// }
		// 	$jawaban = array();
		// 	for ($i = 0; $i < $jlh; $i++) {
		// 		array_push($jawaban, $this->input->post('jawaban' . $i, TRUE));
		// 	}
		// 	$arrpenyakit = $this->Modelpenyakit->Alldata();
		// 	$bobot = array();
		// 	array_push($bobot, $this->fuzzy($bb, 15)); //15 merupakan batas atas penurunan berat badan di kirim ke array bobot
		// 	for ($i = 0; $i < count($arrpenyakit); $i++) {
		// 		for ($j = 0; $j < $jlh; $j++) {
		// 			array_push($bobot, $jawaban[$j]);
		// 		}
		// 	}
		// 	//perhatikan asiign bobot berat badan ke array dan perhatikan hubungannya dengan gejala, itu salah array
		// 	$naivebayes = $this->naivebayes($bobot);
		// 	// $dempster = $this->dempstershafer($jawaban);
		// 	$persentase = 0;
		// 	$data = array(
		// 		'nama' => $nama,
		// 		'alamat' => $alamat,
		// 		'hasil' => $naivebayes,
		// 		// 'persentase' => $persentase,
		// 	);
		// 	$this->Modelpemeriksa->insert_data($data);
		// 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
		// 	// redirect('Welcome/hasildiagnosis');
		// 	redirect('Welcome/hasildiagnosis');
		// }
	}

	private function _diagnosis($jlh)
	{
		// $nama = $this->input->post('nama', TRUE);
		// $alamat = $this->input->post('alamat', TRUE);
		// $bb = $this->input->post('bb', TRUE);
		// // $penyakit = $this->input->post('penyakit', TRUE);
		// // $gejala = array();
		// // for ($i = 0; $i < $jlh; $i++) {
		// // 	array_push($gejala, $this->input->post('gejala' . $i, TRUE));
		// // }
		// $jawaban = array();
		// for ($i = 0; $i < $jlh; $i++) {
		// 	array_push($jawaban, $this->input->post('jawaban' . $i, TRUE));
		// }
		// $arrpenyakit = $this->Modelpenyakit->Alldata();
		// $bobot = array();
		// array_push($bobot, $this->fuzzy($bb, 15)); //15 merupakan batas atas penurunan berat badan di kirim ke array bobot
		// for ($i = 0; $i < count($arrpenyakit); $i++) {
		// 	for ($j = 0; $j < $jlh; $j++) {
		// 		array_push($bobot, $jawaban[$j]);
		// 	}
		// }
		// //perhatikan asiign bobot berat badan ke array dan perhatikan hubungannya dengan gejala, itu salah array
		// $naivebayes = $this->naivebayes($bobot);
		// // $dempster = $this->dempstershafer($jawaban);
		// // $persentase = $this->input->post('persentase', TRUE);
		// $data = array(
		// 	'nama' => $nama,
		// 	'alamat' => $alamat,
		// 	'hasil' => $naivebayes,
		// 	// 'persentase' => $persentase,
		// );
		// $this->Modelpemeriksa->insert_data($data);
		// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
		// // redirect('Welcome/hasildiagnosis');
	}
	public function hasildiagnosis()
	{
		$this->load->view('clientside/diagnosis2');
	}
	private function fuzzy($value, $limit)
	{
		$limit2 = $limit * 0.5;
		$limit3 = 0;
		if ($value >= $limit) {
			$newvalue = 0.9;
		} elseif ($value >= $limit2 && $value < $limit) {
			$newvalue = ($value - $limit2) / ($limit - $limit2);
		} elseif ($value > $limit3 && $value < $limit2) {
			$newvalue = ($value - $limit2) / ($limit - $limit2);
		} else {
			$newvalue = 0;
		}
		return $newvalue;
	}
	public function naivebayes($data)
	{
		$n = 1;
		$jlh = $this->Modeldiagnosis->jumlahdata();
		$m = $jlh + 1;
		// get value of p in naive bayes
		$get = $this->Modelpenyakit->jlhpenyakit();
		$simpansementara = array_unique($get, SORT_REGULAR);
		$listpenyakit = array_values($simpansementara);
		$p = count($simpansementara);
		$gejaladiagnosis = $this->Modeldiagnosis->gejala();			//get array gejala from diagnosis table
		$gejalapenyakit = $this->Modelpenyakit->jlhgejala();		//get array gejala from penyakit table
		$nc = array();
		for ($i = 0; $i < count($get); $i++) {						//get nc for naive bayes
			for ($j = 0; $j < count($gejaladiagnosis); $j++) {
				if ($gejalapenyakit[$i] = $gejaladiagnosis[$j]) {		//get value for all nc ex berat badan
					array_push($nc, $data[$j + 1]);
				} elseif ($gejalapenyakit[$i] == "beratbadanturun") {	//get value for berat badan
					array_push($nc, $data[0]);
				}
			}
		}
		$hasil = array();
		$sum = 1;
		for ($i = 0; $i < count($listpenyakit); $i++) {				// get Final Value of disease and push to array hasil
			for ($j = 0; $j < count($nc); $j++) {
				if ($listpenyakit[$i] == $get[$j]) {
					$pav = ($nc[$j] + ($m * $p)) / ($n + $m);
					$sum = $sum * $pav;
				}
			}
			array_push($hasil, $sum);
			$sum = 1;
		}
		$max = max($hasil);											// get max value from array hasil
		for ($i = 0; $i < count($listpenyakit); $i++) {
			if ($hasil[$i] = $max) {
				$hasildiagnosa = $listpenyakit[$i];					//get disease based the max value
			}
		}
		return $hasildiagnosa;										//return the disease 
	}
	public function dempstershafer($data)
	{
	}
	public function faq()
	{
		$this->load->view('clientside/faq');
	}
	public function login()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->session->sess_destroy();
			$this->load->view('adminside/login');
		} else {
			$this->_login();
		}
	}
	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('akun', ['username' => $username])->row_array();
		if ($user) {
			if ($user['is_active'] == 1) {
				//cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'username' => $user['username'],
						'role_id' => $user['role_id'],
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('Welcome/dashboard');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert
			 			alert-danger" role="alert"> <?=?>Password salah! </div>');
					redirect('Welcome/login');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert
			 	alert-danger" role="alert">Akun belum diaktifkan!</div>');
				redirect('Welcome/login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert
			 alert-danger" role="alert">Akun belum terdaftar!</div>');
			redirect('Welcome/login');
		}
		if (!$this->session->userdata('username')) {
			redirect('Welcome/login');
		}
	}

	public function dashboard()
	{
		if ($this->session->userdata('username') != "") {
			$this->load->view('adminside/dashboard');
		} else {
			$this->session->set_flashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data.');
			redirect('Welcome/login');
		}
	}
	public function pertanyaandiagnosis()
	{
		if ($this->session->userdata('username') != "") {
			$data['pertanyaan'] = $this->Modeldiagnosis->Alldata();
			$this->load->view('adminside/pertanyaandiagnosis', $data);
		} else {
			$this->session->set_flashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data.');
			redirect('Welcome/login');
		}
	}
	public function pertanyaanfaq()
	{
		if ($this->session->userdata('username') != "") {
			$data['pertanyaan'] = $this->Modelfaq->Alldata();
			$this->load->view('adminside/pertanyaanfaq', $data);
		} else {
			$this->session->set_flashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data.');
			redirect('Welcome/login');
		}
	}
	public function datapasien()
	{
		if ($this->session->userdata('username') != "") {
			$data['pasien'] = $this->Modelpemeriksa->Alldata();
			$this->load->view('adminside/datapasien', $data);
		} else {
			$this->session->set_flashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data.');
			redirect('Welcome/login');
		}
	}
	public function penyakit()
	{
		if ($this->session->userdata('username') != "") {
			$data['penyakit'] = $this->Modelpenyakit->Alldata();
			$this->load->view('adminside/penyakit', $data);
		} else {
			$this->session->set_flashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data.');
			redirect('Welcome/login');
		}
	}
	public function akun()
	{
		if ($this->session->userdata('username') != "") {
			$data['akun'] = $this->Modelakun->Alldata();
			$this->load->view('adminside/akun', $data);
		} else {
			$this->session->set_flashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data.');
			redirect('Welcome/login');
		}
	}
	public function tambahdiagnosis()
	{
		if ($this->session->userdata('username') != "") {
			$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required|trim');
			$this->form_validation->set_rules('gejala', 'Pertanyaan', 'required|trim');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('adminside/tambahdiagnosis');
			} else {
				$pertanyaan = $this->input->post('pertanyaan', TRUE);
				$gejala = $this->input->post('gejala', TRUE);
				$filter1 = str_replace(' ', '', $gejala);
				$filter2 = strtolower($filter1);
				$data = array(
					'pertanyaan' => $pertanyaan,
					'gejala' => $filter2,
				);
				$this->Modeldiagnosis->insert_data($data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
				redirect('Welcome/pertanyaandiagnosis');
			}
		} else {
			$this->session->set_flashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data.');
			redirect('Welcome/login');
		}
	}
	public function tambahfaq()
	{
		if ($this->session->userdata('username') != "") {
			$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required|trim');
			$this->form_validation->set_rules('jawaban', 'Jawaban', 'required|trim');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('adminside/tambahfaq');
			} else {
				$pertanyaan = $this->input->post('pertanyaan', TRUE);
				$jawaban = $this->input->post('jawaban', TRUE);
				$data = array(
					'pertanyaan' => $pertanyaan,
					'jawaban' => $jawaban,
				);
				$this->Modelfaq->insert_data($data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
				redirect('Welcome/pertanyaanfaq');
			}
		} else {
			$this->session->set_flashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data.');
			redirect('Welcome/login');
		}
	}
	public function tambahpenyakit()
	{
		if ($this->session->userdata('username') != "") {
			$this->form_validation->set_rules('penyakit', 'Penyakit', 'required|trim');
			$this->form_validation->set_rules('gejala', 'Gejala', 'required|trim');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('adminside/tambahpenyakit');
			} else {
				$penyakit = $this->input->post('penyakit', TRUE);
				$gejala = $this->input->post('gejala', TRUE);
				$filter1 = str_replace(' ', '', $gejala);
				$filter2 = strtolower($filter1);
				$data = array(
					'penyakit' => $penyakit,
					'gejala' => $filter2,
				);
				$this->Modelpenyakit->insert_data($data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
				redirect('Welcome/penyakit');
			}
		} else {
			$this->session->set_flashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data.');
			redirect('Welcome/login');
		}
	}
	public function tambahakun()
	{
		if ($this->session->userdata('username') != "") {
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[akun.username]', ['is_unique' => 'username sudah dipakai!']);
			$this->form_validation->set_rules('password', 'Password', 'required|trim');
			$this->form_validation->set_rules('status', 'Status', 'required|trim');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('adminside/tambahakun');
			} else {


				$nama = $this->input->post('nama', TRUE);
				$username =  htmlspecialchars($this->input->post('username', true));
				$password =  password_hash($this->input->post('password'), PASSWORD_DEFAULT);
				$status = $this->input->post('status', TRUE);
				if ($status == "aktif" || $status == "Aktif" || $status == "AKTIF") {
					$status = 1;
				} else {
					$status = 0;
				}

				$data = array(
					'nama' => $nama,
					'username' => $username,
					'password' => $password,
					'role_id' => 1,
					'is_active' => $status,
				);
				$this->Modelakun->insert_data($data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun sudah Berhasil Ditambahkan!</div>');
				redirect('Welcome/akun');
			}
		} else {
			$this->session->set_flashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data.');
			redirect('Welcome/login');
		}
	}
	public function editdiagnosis($id)
	{
		if ($this->session->userdata('username') == "admin") {
			$data['pertanyaandiagnosis'] = $this->Modeldiagnosis->ambil_id($id);
			$this->load->view('adminside/editdiagnosis', $data);
		} else {
			$this->session->set_flashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data.');
			redirect('Welcome/login');
		}
	}
	public function editfaq($id)
	{
		if ($this->session->userdata('username') == "admin") {
			$data['pertanyaanfaq'] = $this->Modelfaq->ambil_id($id);
			$this->load->view('adminside/editfaq', $data);
		} else {
			$this->session->set_flashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data.');
			redirect('Welcome/login');
		}
	}
	public function editpenyakit($id)
	{
		if ($this->session->userdata('username') == "admin") {
			$data['penyakit'] = $this->Modelpenyakit->ambil_id($id);
			$this->load->view('adminside/editpenyakit', $data);
		} else {
			$this->session->set_flashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data.');
			redirect('Welcome/login');
		}
	}
	public function editakun($id)
	{
		if ($this->session->userdata('username') == "admin") {
			$data['akun'] = $this->Modelakun->ambil_id($id);
			$this->load->view('adminside/editakun', $data);
		} else {
			$this->session->set_flashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data.');
			redirect('Welcome/login');
		}
	}
	public function hapusDiagnosis($id)
	{
		$this->Modeldiagnosis->hapus_data($id);
		$this->pertanyaandiagnosis();
	}
	public function hapusFaq($id)
	{
		$this->Modelfaq->hapus_data($id);
		$this->pertanyaanfaq();
	}
	public function hapusAkun($id)
	{
		$this->Modelakun->hapus_data($id);
		$this->akun();
	}
	public function hapusPenyakit($id)
	{
		$this->Modelpenyakit->hapus_data($id);
		$this->penyakit();
	}
	public function updatepertanyaandiagnosis()
	{

		$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required|trim');
		$this->form_validation->set_rules('gejala', 'Pertanyaan', 'required|trim');
		$id = $this->input->post('id');
		if ($this->form_validation->run() == FALSE) {
			$this->editdiagnosis($id);
		} else {
			$pertanyaan = $this->input->post('pertanyaan', TRUE);
			$gejala = $this->input->post('gejala', true);
			$filter1 = str_replace(' ', '', $gejala);
			$filter2 = strtolower($filter1);
			$data = array(
				'pertanyaan' => $pertanyaan,
				'gejala' => $filter2,
			);
			$where = array('id' => $id);
			$this->Modeldiagnosis->updatedata($where, $data, 'pertanyaandiagnosis');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Diubah!</div>');
			redirect('Welcome/pertanyaandiagnosis');
		}
	}
	public function updatepertanyaanfaq()
	{

		$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required|trim');
		$this->form_validation->set_rules('jawaban', 'Jawaban', 'required|trim');
		$id = $this->input->post('id');
		if ($this->form_validation->run() == FALSE) {
			$this->editfaq($id);
		} else {
			$pertanyaan = $this->input->post('pertanyaan', TRUE);
			$jawaban = $this->input->post('jawaban', true);
			$data = array(
				'pertanyaan' => $pertanyaan,
				'jawaban' => $jawaban,
			);
			$where = array('id' => $id);
			$this->Modelfaq->updatedata($where, $data, 'faq');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Diubah!</div>');
			redirect('Welcome/pertanyaanfaq');
		}
	}
	public function updatepenyakit()
	{

		$this->form_validation->set_rules('penyakit', 'Penyakit', 'required|trim');
		$this->form_validation->set_rules('gejala', 'Gejala', 'required|trim');
		$id = $this->input->post('id');
		if ($this->form_validation->run() == FALSE) {
			$this->editpenyakit($id);
		} else {
			$penyakit = $this->input->post('penyakit', TRUE);
			$gejala = $this->input->post('gejala', true);
			$filter1 = str_replace(' ', '', $gejala);
			$filter2 = strtolower($filter1);
			$data = array(
				'penyakit' => $penyakit,
				'gejala' => $filter2,
			);
			$where = array('id' => $id);
			$this->Modelpenyakit->updatedata($where, $data, 'penyakit');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Diubah!</div>');
			redirect('Welcome/penyakit');
		}
	}
	public function updateakun()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[akun.username]', ['is_unique' => 'username sudah dipakai!']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('status', 'Status', 'required|trim');
		$id = $this->input->post('id');
		if ($this->form_validation->run() == FALSE) {
			$this->editakun($id);
		} else {
			$nama = $this->input->post('nama', TRUE);
			$username =  htmlspecialchars($this->input->post('username', true));
			$password =  password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$status = $this->input->post('status', TRUE);
			if ($status == "aktif" || $status == "Aktif" || $status == "AKTIF") {
				$status = 1;
			} else {
				$status = 0;
			}

			$data = array(
				'nama' => $nama,
				'username' => $username,
				'password' => $password,
				'role_id' => 1,
				'is_active' => $status,
			);
			$where = array('id' => $id);
			$this->Modelakun->updatedata($where, $data, 'akun');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Diubah!</div>');
			redirect('Welcome/akun');
		}
	}
}
