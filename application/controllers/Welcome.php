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
		// $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		// $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		// // $this->form_validation->set_rules('bb', 'Berat Badan', 'required|trim');
		// // $data['pertanyaan'] = $this->Modelperiksa->Alldata();
		// // $jlh = $this->Modelperiksa->jumlahdata();
		// if ($this->form_validation->run() == false) {
		// 	$this->session->sess_destroy();
		// 	$this->load->view('clientside/proses');
		// } else {
		// 	$nama = $this->input->post('nama', TRUE);
		// 	$alamat = $this->input->post('alamat', TRUE);
		// 	$data = array(
		// 		'nama' => $nama,
		// 		'alamat' => $alamat,
		// 	);
		// 	$this->Modelpemeriksa->insert_data($data);
		// 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
		// 	redirect('Welcome');
		// }
	}
	public function diagnosis()
	{
		$data['pertanyaan'] = $this->Modelperiksa->Alldata();
		$jlh = $this->Modelperiksa->jumlahdata();
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('bb', 'Berat Badan', 'required|trim');
		for ($i = 0; $i < $jlh; $i++) {
			$this->form_validation->set_rules('jawaban' . $i, 'Jawaban', 'trim');
		}
		for ($i = 0; $i < $jlh; $i++) {
			$this->form_validation->set_rules('gejala' . $i, 'Jawaban', 'trim');
		}
		// $this->form_validation->set_rules('hasil', 'Hasil', 'required|trim');
		// $this->form_validation->set_rules('persentase', 'Persentase', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->sess_destroy();
			$this->load->view('clientside/diagnosis', $data);
		} else {
			$nama = $this->input->post('nama', TRUE);
			$alamat = $this->input->post('alamat', TRUE);
			$bb = $this->input->post('bb', TRUE);
			// $penyakit = $this->input->post('penyakit', TRUE);
			$j = 0;
			$gejala = array();
			while ($j < $jlh) {
				array_push($gejala, $this->input->post('gejala' . $j, TRUE));
				$j++;
			}
			$i = 0;
			$jawaban = array();
			while ($i < $jlh) {
				array_push($jawaban, $this->input->post('jawaban' . $i, TRUE));
				$i++;
			}
			$arrpenyakit = $this->Modelpenyakit->jlhgejala();
			$arrgejala = array();
			$bobot = array();
			// array_push($bobot, $this->fuzzy($bb, 15)); //15 merupakan batas atas penurunan berat badan di kirim ke array bobot
			// array_push($arrgejala, "beratbadanturun");
			// for ($i = 0; $i < count($arrpenyakit); $i++) {
			// 	for ($j = 0; $j < $jlh; $j++) {
			// 		if ($gejala[$j] == $arrpenyakit[$i]) {
			// 			array_push($bobot, $jawaban[$j]);
			// 			array_push($arrgejala, $gejala[$j]);
			// 		}
			// 		// elseif ($arrpenyakit[$i] == "beratbadanturun") {
			// 		// }
			// 	}
			// }
			//perhatikan asiign bobot berat badan ke array dan perhatikan hubungannya dengan gejala, itu salah array
			$this->nbds($nama, $alamat, $jawaban, $bb, $gejala);
			// $this->naivebayes($nama, $alamat, $jawaban, $bb, $gejala);
			// $this->dempster($nama, $alamat, $jawaban, $bb, $gejala);
			// $persentase = 0;
			// $data = array(
			// 	'nama' => $nama,
			// 	'alamat' => $alamat,
			// 	'hasil' => $nd,
			// 	'persentase' => $persentase,
			// );
			// $this->Modelpemeriksa->insert_data($data);
			// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
			// $this->hasildiagnosis($nama);
		}
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

	private function fuzzy($value, $limit)
	{
		// $limit2 = $limit * 0.5;
		$limit3 = 0;
		$value = $value + 0;
		if ($value >= $limit) {
			$newvalue = 0.9;
		} elseif ($value > $limit3 && $value < $limit) {
			$newvalue = ($value - $limit3) / ($limit - $limit3);
		}
		// elseif ($value > $limit3 && $value < $limit2) {
		// 	$newvalue = ($value - $limit2) / ($limit - $limit2);
		// }
		else {
			$newvalue = 1;
		}
		return $newvalue;
	}
	public function naivebayes($nama, $alamat, $data, $bb, $gejala)
	{
		$start = microtime(true);
		$n = 1;
		$jlh = $this->Modeldiagnosis->jumlahdata();
		$m = $jlh + 1;
		// get value of p in naive bayes
		$get = $this->Modelpenyakit->jlhpenyakit();
		$simpansementara = array_unique($get, SORT_REGULAR);
		$listpenyakit = array_values($simpansementara);
		$p = 1 / count($simpansementara);
		$gejaladiagnosis = $this->Modeldiagnosis->gejala();			//get array gejala from diagnosis table
		$gejalapenyakit = $this->Modelpenyakit->jlhgejala();		//get array gejala from penyakit table
		$nc = array();
		$newgejala = array();
		if ($bb != 0) {
			array_push($nc, $this->fuzzy($bb, 20));
			array_push($newgejala, "beratbadanturun");
		}
		for ($i = 0; $i < count($data); $i++) {
			if ($data[$i] != "0") {
				array_push($nc, $data[$i]);
				array_push($newgejala, $gejala[$i]);
			}
		}
		$banding = $newgejala;

		$hasil = array();
		$simpanpav = array();
		$newnc = array();
		$sementara1 = array();	//save array value of nc
		$sementara2 = array();	//save array value of gejalapenyakit
		$sementara3 = array();	//save array value of penyakit
		for ($i = 0; $i < count($gejalapenyakit); $i++) {		//delete gejala,nc,and get if value of nc =0
			for ($j = 0; $j < count($newgejala); $j++) {
				if ($newgejala[$j] == $gejalapenyakit[$i]) {
					array_push($sementara1, $nc[$j]);
					array_push($sementara2, $newgejala[$j]);
					array_push($sementara3, $get[$i]);
				}
			}
		}
		$newnc = array();
		$newgejala = array();
		$newget = array();
		//create class (base of penyakit)
		for ($i = 0; $i < count($listpenyakit); $i++) {
			$nc = array();
			$gejala = array();
			$get = array();
			for ($j = 0; $j < count($sementara3); $j++) {
				if ($listpenyakit[$i] == $sementara3[$j]) {
					array_push($nc, $sementara1[$j]);
					array_push($gejala, $sementara2[$j]);
					array_push($get, $sementara3[$j]);
				}
			}
			array_push($newnc, $nc);
			array_push($newgejala, $gejala);
			array_push($newget, $get);
		}
		$get = $newget;
		$newget = array();
		$nc = $newnc;
		$newnc = array();
		for ($i = 0; $i < count($banding); $i++) {
			for ($j = 0; $j < count($get); $j++) {
				for ($k = 0; $k < count($get[$j]); $k++) {
					if ($banding[$i] != $newgejala[$j][$k]) {
						array_push($newgejala[$j], $banding[$i]);
						$simpansementara = array_unique($newgejala[$j], SORT_REGULAR);
						$newgejala[$j] = array_values($simpansementara);
					}
				}
			}
		}
		$gejala = $newgejala;
		$newgejala = array();
		for ($i = 0; $i < count($gejala); $i++) {
			if ($gejala[$i] == NULL) {
				unset($gejala[$i]);
				unset($nc[$i]);
				unset($get[$i]);
			}
		}
		$gejala = array_values($gejala);
		$nc = array_values($nc);
		$get = array_values($get);
		for ($i = 0; $i < count($gejala); $i++) {
			$x = array();		//for set sembarang nilai nc
			$y = array();		//for set sembarang nilai get
			for ($j = 0; $j < count($gejala[$i]); $j++) {
				array_push($x, "0");
				array_push($y, "x");
			}
			array_push($newnc, $x);
			array_push($newget, $y);
		}
		for ($i = 0; $i < count($nc); $i++) {
			for ($j = 0; $j < count($nc[$i]); $j++) {
				$newnc[$i][$j] = $nc[$i][$j];
				$newget[$i][$j] = $get[$i][$j];
			}
		}
		for ($i = 0; $i < count($newnc); $i++) {
			for ($j = 0; $j < count($newnc[$i]); $j++) {
				if ($newget[$i][$j] == "x") {
					$newget[$i][$j] = $newget[$i][$j - 1];
				}
			}
		}
		for ($i = 0; $i < count($listpenyakit); $i++) {
			$sum = 1;
			for ($j = 0; $j < count($newget); $j++) {
				for ($k = 0; $k < count($newget[$j]); $k++) {
					if ($listpenyakit[$i] == $newget[$j][$k]) {
						$pav = ($newnc[$j][$k] + ($m * $p)) / ($n + $m);
						$sum = $sum * $pav;
					}
				}
			}
			array_push($hasil, $sum);
		}
		for ($i = 0; $i < count($hasil); $i++) {
			if ($hasil[$i] == 1) {
				$hasil[$i] = 0;
			}
		}
		// var_dump($hasil);
		$max = max($hasil);
		$persentase1 = array();
		array_push($persentase1, $max * 100);
		$persentase2 = array();
		array_push($persentase2, $persentase1);
		$hasilpenyakit = array();
		$hasilpenyakit2 = array();
		// get max value from array hasil
		for ($i = 0; $i < count($listpenyakit); $i++) {
			if ($hasil[$i] == $max) {
				// print_r($hasil[$i]);									// get max value from array hasil
				$hasildiagnosa = $listpenyakit[$i];					//get disease based the max value
			}
		}
		array_push($hasilpenyakit, $hasildiagnosa);
		array_push($hasilpenyakit2, $hasilpenyakit);
		// var_dump($max);
		// var_dump($hasilpenyakit);
		$waktu = microtime(true) - $start;
		$this->hasildiagnosis($nama, $alamat, $hasilpenyakit2, $persentase2, $waktu);
	}
	public function nbds($nama, $alamat, $jawaban, $bb, $gejala)
	{
		$start = microtime(true);
		$newbobot = array();
		$newgejala = array();
		if ($bb != 0) {
			array_push($newbobot, $this->fuzzy($bb, 20));
			array_push($newgejala, "beratbadanturun");
		}
		for ($i = 0; $i < count($jawaban); $i++) {
			if ($jawaban[$i] != "0") {
				array_push($newbobot, $jawaban[$i]);
				array_push($newgejala, $gejala[$i]);
			}
		}

		$n = 1;
		$jlh = $this->Modeldiagnosis->jumlahdata();
		$m = $jlh + 1;
		// get value of p in naive bayes
		$getpenyakitdb = $this->Modelpenyakit->jlhpenyakit();
		$getgejaladb = $this->Modelpenyakit->jlhgejala();
		$simpansementara = array_unique($getpenyakitdb, SORT_REGULAR);
		$listpenyakit = array_values($simpansementara);
		$p = 1 / count($simpansementara);

		$simpanpav = array();
		$newnc = array();
		$batasatas = (1 + ($m * $p)) / ($n + $m);
		$batasbawah = (0 + ($m * $p)) / ($n + $m);
		// get Final Value of disease and push to array hasil
		for ($j = 0; $j < count($newgejala); $j++) {
			$pav = ($newbobot[$j] + ($m * $p)) / ($n + $m);
			array_push($simpanpav, $pav);
			// array_push($newnc, $nc[$j]);
			// array_push($newgejala, $gejalapenyakit[$j]);

		}

		$newpenyakit = array();
		for ($i = 0; $i < count($newgejala); $i++) {
			$sementara = array();
			for ($j = 0; $j < count($getgejaladb); $j++) {
				if ($newgejala[$i] == $getgejaladb[$j]) {
					array_push($sementara, $getpenyakitdb[$j]);
				}
			}
			array_push($newpenyakit, $sementara);
		}

		if (count($simpanpav) > 1) {
			//Dempster Shafer proccess
			$nextpenyakit = array();
			$temppenyakit = array();
			$hasilpenyakit = array();
			$nextb = array();
			$tempnilai = array();
			for ($i = 1; $i < count($simpanpav); $i++) {
				if ($i == 1) {
					$temp = array();
					$b1 = $simpanpav[0];
					$b2 = $simpanpav[$i];
					$p1 = $batasatas - $b1;
					$p2 = $batasatas - $b2;
					$b1b2 = $b1 * $b2;
					$p1b2 = $p1 * $b2;
					$b1p2 = $b1 * $p2;
					$p1p2 = $p1 * $p2;
					array_push($nextb, $b1b2);
					array_push($nextb, $p1b2);
					array_push($nextb, $b1p2);
					array_push($nextb, $p1p2);
					for ($j = 0; $j < count($newpenyakit[$i - 1]); $j++) {
						for ($k = 0; $k < count($newpenyakit[$i]); $k++) {
							if ($newpenyakit[$i - 1][$j] == $newpenyakit[$i][$k]) {
								array_push($temp, $newpenyakit[$i][$k]);
							}
						}
					}
					array_push($temppenyakit, $temp);
					array_push($temppenyakit, $newpenyakit[$i]);
					array_push($temppenyakit, $newpenyakit[$i - 1]);
					$o = array();
					array_push($o, "o");
					array_push($temppenyakit, $o);
					// var_dump($temppenyakit);
					for ($j = 0; $j < count($temppenyakit); $j++) {
						if ($temppenyakit[$j] == NULL) {
							array_push($temppenyakit[$j], "n");
						}
					}
					$cek = 0;
					$tambahvalueo = 0;
					for ($j = 0; $j < count($temppenyakit); $j++) {
						for ($k = 0; $k < count($temppenyakit[$j]); $k++) {
							if ($temppenyakit[$j][$k] == "n") {
								$cek++;
								$tambahvalueo = $tambahvalueo + $nextb[$j];
							}
						}
					}
					$pembagi = 0;
					for ($j = 0; $j < count($nextb); $j++) {
						$pembagi += $nextb[$j];
					}
					// var_dump($tambahvalueo);
					$temp = $temppenyakit;
					$simpansementara = array_unique($temppenyakit, SORT_REGULAR);
					$temppenyakit = array_values($simpansementara);
					// var_dump($temppenyakit);
					for ($j = 0; $j < count($temppenyakit); $j++) {
						$sum = 0;
						for ($k = 0; $k < count($temp); $k++) {
							if ($temppenyakit[$j] == $temp[$k]) {
								$sum = ($sum + $nextb[$k]);
							}
						}
						if ($cek >= 1) {
							$sum = $sum / ($pembagi - $tambahvalueo);
						} else {
							$sum = $sum / $pembagi;
						}
						array_push($tempnilai, $sum);
					}
					// var_dump($tempnilai);

					// for ($j = 0; $j < count($temppenyakit); $j++) {
					// 	for ($k = 0; $k < count($temppenyakit[$j]); $k++) {
					// 		if ($temppenyakit[$j][$k] != "n" && $temppenyakit[$j][$k] != "o") {
					// 			$sum = $sum + $tempnilai[$j];
					// 		}
					// 	}
					// }
					for ($j = 0; $j < count($temppenyakit); $j++) {
						for ($k = 0; $k < count($temppenyakit[$j]); $k++) {
							if ($temppenyakit[$j][$k] == "n") {
								unset($temppenyakit[$j][$k]);
								unset($tempnilai[$j]);
							}
							// elseif ($temppenyakit[$j][$k] == "o") {
							// 	unset($tempnilai[$j]);
							// }
						}
					}
					for ($j = 0; $j <	count($temppenyakit); $j++) {
						if ($temppenyakit[$j] == NULL) {
							unset($temppenyakit[$j]);
						}
					}
					$temppenyakit = array_values($temppenyakit);
					// for ($j = 0; $j < count($temppenyakit); $j++) {
					// 	for ($k = 0; $k < count($temppenyakit[$j]); $k++) {
					// 		if ($temppenyakit[$j][$k] == "o") {
					// 			array_push($tempnilai, ($batasatas - $sum));
					// 		}
					// 	}
					// }
					$tempnilai = array_values($tempnilai);
					// for ($j = 0; $j < count($duplicatetemppenyakit); $j++) {
					// 	if ($j != (count($duplicatetemppenyakit) - 1)) {
					// 		for ($k = $j + 1; $k < count($duplicatetemppenyakit); $k++) {
					// 			if ($duplicatetemppenyakit[$j] == $duplicatetemppenyakit[$k]) {
					// 				$tempnilai[$j] = $tempnilai[$j] + $tempnilai[$k];
					// 				unset($temppenyakit[$k]);
					// 				unset($tempnilai[$k]);
					// 				$tempnilai = array_values($tempnilai);
					// 				$temppenyakit = array_values($temppenyakit);
					// 			}
					// 		}
					// 	}
					// }
				} else {

					$b = $simpanpav[$i];
					$p = $batasatas - $b;

					$nextb = array();
					// $nextp = array();
					$temp = array();
					for ($j = 0; $j < count($tempnilai); $j++) {
						$temp2 = array();
						$tempb = $tempnilai[$j] * $b;
						// $tempp = $tempnilai[$j] * $p;
						array_push($nextb, $tempb);
					}
					for ($j = 0; $j < count($temppenyakit); $j++) {
						$simpan = array();
						for ($k = 0; $k < count($temppenyakit[$j]); $k++) {
							if ($temppenyakit[$j][$k] != "o") {
								for ($l = 0; $l < count($newpenyakit[$i]); $l++) {
									if ($temppenyakit[$j][$k] == $newpenyakit[$i][$l]) {
										array_push($simpan, $temppenyakit[$j][$k]);
									} elseif ($temppenyakit[$j][$k] == end($temppenyakit[$j]) && $newpenyakit[$i][$l] == end($newpenyakit[$i]) && empty($simpan)) {
										$n = "n";
										array_push($simpan, $n);
									}
								}
							}
						}
						if ($simpan != NULL) {
							array_push($temp, $simpan);
						}
						for ($k = 0; $k < count($temppenyakit[$j]); $k++) {
							if ($temppenyakit[$j][$k] == "o") {
								array_push($temp, $newpenyakit[$i]);
							}
						}
					}
					// array_push($nextp, $tempp);
					// for ($m = 0; $m < count($temppenyakit[$j]); $m++) {
					// 	$simpan = array();
					// 	if ($temppenyakit[$j][$m] != "o") {
					// 		for ($k = 0; $k < count($newpenyakit[$i]); $k++) {
					// 			for ($l = 0; $l < count($temppenyakit[$j]); $l++) {
					// 				if ($newpenyakit[$i][$k] == $temppenyakit[$j][$l]) {
					// 					$x = $temppenyakit[$j][$l];
					// 					array_push($simpan, $x);
					// 				}
					// 			}
					// 		}
					// 		// $a = array_unique($simpan, SORT_REGULAR);

					// 		// $simpan = array_values($a);
					// 		array_push($temp, $simpan);
					// 	} else {
					// 		array_push($temp, $newpenyakit[$i]);
					// 	}
					// }
					// $a = array_unique($temp, SORT_REGULAR);

					// array_push($temp2, $x);
					// array_push($temp, $temp2);

					// $temp = array_values($a);

					for ($j = 0; $j < count($tempnilai); $j++) {
						$tempb = $tempnilai[$j] * $p;
						array_push($nextb, $tempb);
						// if ($temppenyakit[$j] != "o") {
						// 	array_push($temp, $temppenyakit[$j]);
						// } else {
						// 	array_push($temp, "o");
						// }
					}
					for ($j = 0; $j < count($temppenyakit); $j++) {
						$simpan = array();
						for ($k = 0; $k < count($temppenyakit[$j]); $k++) {
							if ($temppenyakit[$j][$k] != "o") {
								array_push($simpan, $temppenyakit[$j][$k]);
							}
						}
						if ($simpan != NULL) {
							array_push($temp, $simpan);
						}
						for ($k = 0; $k < count($temppenyakit[$j]); $k++) {
							if ($temppenyakit[$j][$k] == "o") {
								$o = ["o"];
								array_push($temp, $o);
							}
						}
					}
					$cek = 0;
					$tambahvalueo = 0;
					for ($j = 0; $j < count($temp); $j++) {
						for ($k = 0; $k < count($temp[$j]); $k++) {
							if ($temp[$j][$k] == "n") {
								$cek++;
								$tambahvalueo = $tambahvalueo + $nextb[$j];
							}
						}
					}
					//Bagian bawah dempster shafer (Teliti lebih dalam) #bug

					$simpansementara = array_unique($temp, SORT_REGULAR);
					$temppenyakit = array_values($simpansementara);

					$pembagi = 0;
					for ($j = 0; $j < count($nextb); $j++) {
						$pembagi += $nextb[$j];
					}

					$tempnilai = array();
					for ($j = 0; $j < count($temppenyakit); $j++) {
						$sum = 0;
						for ($k = 0; $k < count($temp); $k++) {
							if ($temppenyakit[$j] == $temp[$k]) {
								$sum = ($sum + $nextb[$k]);
							}
						}
						if ($cek >= 1) {
							$sum = $sum / ($pembagi - $tambahvalueo);
						} else {
							$sum = $sum / $pembagi;
						}
						array_push($tempnilai, $sum);
					}
					//unset n
					for ($j = 0; $j < count($temppenyakit); $j++) {
						for ($k = 0; $k < count($temppenyakit[$j]); $k++) {
							if ($temppenyakit[$j][$k] == "n") {
								unset($temppenyakit[$j]);
								unset($tempnilai[$j]);
								$temppenyakit = array_values($temppenyakit);
								$tempnilai = array_values($tempnilai);
							}
						}
					}
				}
			}
			$nilai = max($tempnilai);
			// var_dump($nilai);
			$simpanpersentase = array();
			array_push($simpanpersentase, $nilai);
			$persentase = array();
			array_push($persentase, $simpanpersentase);
			for ($i = 0; $i < count($tempnilai); $i++) {
				if ($tempnilai[$i] == $nilai) {
					// var_dump($temppenyakit[$i]);
					array_push($hasilpenyakit, $temppenyakit[$i]);
				}
			}
			// var_dump($persentase);
			// var_dump($hasilpenyakit);
		} elseif (count($simpanpav) == 1) {
			$hasilpenyakit = array();
			$nilai = max($simpanpav);
			$simpanpersentase = array();
			array_push($simpanpersentase, $nilai);
			$persentase = array();
			array_push($persentase, $simpanpersentase);
			for ($i = 0; $i < count($simpanpav); $i++) {
				if ($simpanpav[$i] == $nilai) {
					array_push($hasilpenyakit, $newpenyakit[$i]);
				}
			}
		} else {
			$simpanpersentase = array();
			array_push($simpanpersentase, 0);
			$temp = array();
			$persentase = array();
			array_push($persentase, $persentase);
			$hasilpenyakit = array();
			array_push($temp, "Anda tidak mengidap penyakit paru");
			array_push($hasilpenyakit, $temp);
		}

		$waktu = microtime(true) - $start;
		$this->hasildiagnosis($nama, $alamat, $hasilpenyakit, $persentase, $waktu);
	}
	public function dempster($nama, $alamat, $jawaban, $bb, $gejala)
	{
		$start = microtime(true);
		$newbobot = array();
		$newgejala = array();
		if ($bb != 0) {
			array_push($newbobot, $this->fuzzy($bb, 20));
			array_push($newgejala, "beratbadanturun");
		}
		for ($i = 0; $i < count($jawaban); $i++) {
			if ($jawaban[$i] != "0") {
				array_push($newbobot, $jawaban[$i]);
				array_push($newgejala, $gejala[$i]);
			}
		}

		$n = 1;
		$jlh = $this->Modeldiagnosis->jumlahdata();
		$m = $jlh + 1;
		// get value of p in naive bayes
		$getpenyakitdb = $this->Modelpenyakit->jlhpenyakit();
		$getgejaladb = $this->Modelpenyakit->jlhgejala();
		$simpansementara = array_unique($getpenyakitdb, SORT_REGULAR);
		$listpenyakit = array_values($simpansementara);
		$p = 1 / count($simpansementara);

		$simpanpav = array();
		$newnc = array();
		$batasatas = 1;
		// get Final Value of disease and push to array hasil
		for ($j = 0; $j < count($newgejala); $j++) {
			$pav = $newbobot[$j];
			array_push($simpanpav, $pav);
			// array_push($newnc, $nc[$j]);
			// array_push($newgejala, $gejalapenyakit[$j]);

		}

		$newpenyakit = array();
		for ($i = 0; $i < count($newgejala); $i++) {
			$sementara = array();
			for ($j = 0; $j < count($getgejaladb); $j++) {
				if ($newgejala[$i] == $getgejaladb[$j]) {
					array_push($sementara, $getpenyakitdb[$j]);
				}
			}
			array_push($newpenyakit, $sementara);
		}

		if (count($simpanpav) > 1) {
			//Dempster Shafer proccess
			$nextpenyakit = array();
			$temppenyakit = array();
			$hasilpenyakit = array();
			$nextb = array();
			$tempnilai = array();
			for ($i = 1; $i < count($simpanpav); $i++) {
				if ($i == 1) {
					$temp = array();
					$b1 = $simpanpav[0];
					$b2 = $simpanpav[$i];
					$p1 = $batasatas - $b1;
					$p2 = $batasatas - $b2;
					$b1b2 = $b1 * $b2;
					$p1b2 = $p1 * $b2;
					$b1p2 = $b1 * $p2;
					$p1p2 = $p1 * $p2;
					array_push($nextb, $b1b2);
					array_push($nextb, $p1b2);
					array_push($nextb, $b1p2);
					array_push($nextb, $p1p2);
					for ($j = 0; $j < count($newpenyakit[$i - 1]); $j++) {
						for ($k = 0; $k < count($newpenyakit[$i]); $k++) {
							if ($newpenyakit[$i - 1][$j] == $newpenyakit[$i][$k]) {
								array_push($temp, $newpenyakit[$i][$k]);
							}
						}
					}
					array_push($temppenyakit, $temp);
					array_push($temppenyakit, $newpenyakit[$i]);
					array_push($temppenyakit, $newpenyakit[$i - 1]);
					$o = array();
					array_push($o, "o");
					array_push($temppenyakit, $o);
					// var_dump($temppenyakit);
					for ($j = 0; $j < count($temppenyakit); $j++) {
						if ($temppenyakit[$j] == NULL) {
							array_push($temppenyakit[$j], "n");
						}
					}
					$cek = 0;
					$tambahvalueo = 0;
					for ($j = 0; $j < count($temppenyakit); $j++) {
						for ($k = 0; $k < count($temppenyakit[$j]); $k++) {
							if ($temppenyakit[$j][$k] == "n") {
								$cek++;
								$tambahvalueo = $tambahvalueo + $nextb[$j];
							}
						}
					}
					$pembagi = 0;
					for ($j = 0; $j < count($nextb); $j++) {
						$pembagi += $nextb[$j];
					}
					// var_dump($tambahvalueo);
					$temp = $temppenyakit;
					$simpansementara = array_unique($temppenyakit, SORT_REGULAR);
					$temppenyakit = array_values($simpansementara);
					// var_dump($temppenyakit);
					for ($j = 0; $j < count($temppenyakit); $j++) {
						$sum = 0;
						for ($k = 0; $k < count($temp); $k++) {
							if ($temppenyakit[$j] == $temp[$k]) {
								$sum = ($sum + $nextb[$k]);
							}
						}
						if ($cek >= 1) {
							$sum = $sum / ($pembagi - $tambahvalueo);
						} else {
							$sum = $sum / $pembagi;
						}
						array_push($tempnilai, $sum);
					}
					// var_dump($tempnilai);

					// for ($j = 0; $j < count($temppenyakit); $j++) {
					// 	for ($k = 0; $k < count($temppenyakit[$j]); $k++) {
					// 		if ($temppenyakit[$j][$k] != "n" && $temppenyakit[$j][$k] != "o") {
					// 			$sum = $sum + $tempnilai[$j];
					// 		}
					// 	}
					// }
					for ($j = 0; $j < count($temppenyakit); $j++) {
						for ($k = 0; $k < count($temppenyakit[$j]); $k++) {
							if ($temppenyakit[$j][$k] == "n") {
								unset($temppenyakit[$j][$k]);
								unset($tempnilai[$j]);
							}
							// elseif ($temppenyakit[$j][$k] == "o") {
							// 	unset($tempnilai[$j]);
							// }
						}
					}
					for ($j = 0; $j <	count($temppenyakit); $j++) {
						if ($temppenyakit[$j] == NULL) {
							unset($temppenyakit[$j]);
						}
					}
					$temppenyakit = array_values($temppenyakit);
					// for ($j = 0; $j < count($temppenyakit); $j++) {
					// 	for ($k = 0; $k < count($temppenyakit[$j]); $k++) {
					// 		if ($temppenyakit[$j][$k] == "o") {
					// 			array_push($tempnilai, ($batasatas - $sum));
					// 		}
					// 	}
					// }
					$tempnilai = array_values($tempnilai);
					// for ($j = 0; $j < count($duplicatetemppenyakit); $j++) {
					// 	if ($j != (count($duplicatetemppenyakit) - 1)) {
					// 		for ($k = $j + 1; $k < count($duplicatetemppenyakit); $k++) {
					// 			if ($duplicatetemppenyakit[$j] == $duplicatetemppenyakit[$k]) {
					// 				$tempnilai[$j] = $tempnilai[$j] + $tempnilai[$k];
					// 				unset($temppenyakit[$k]);
					// 				unset($tempnilai[$k]);
					// 				$tempnilai = array_values($tempnilai);
					// 				$temppenyakit = array_values($temppenyakit);
					// 			}
					// 		}
					// 	}
					// }
				} else {

					$b = $simpanpav[$i];
					$p = $batasatas - $b;

					$nextb = array();
					// $nextp = array();
					$temp = array();
					for ($j = 0; $j < count($tempnilai); $j++) {
						$temp2 = array();
						$tempb = $tempnilai[$j] * $b;
						// $tempp = $tempnilai[$j] * $p;
						array_push($nextb, $tempb);
					}
					for ($j = 0; $j < count($temppenyakit); $j++) {
						$simpan = array();
						for ($k = 0; $k < count($temppenyakit[$j]); $k++) {
							if ($temppenyakit[$j][$k] != "o") {
								for ($l = 0; $l < count($newpenyakit[$i]); $l++) {
									if ($temppenyakit[$j][$k] == $newpenyakit[$i][$l]) {
										array_push($simpan, $temppenyakit[$j][$k]);
									} elseif ($temppenyakit[$j][$k] == end($temppenyakit[$j]) && $newpenyakit[$i][$l] == end($newpenyakit[$i]) && empty($simpan)) {
										$n = "n";
										array_push($simpan, $n);
									}
								}
							}
						}
						if ($simpan != NULL) {
							array_push($temp, $simpan);
						}
						for ($k = 0; $k < count($temppenyakit[$j]); $k++) {
							if ($temppenyakit[$j][$k] == "o") {
								array_push($temp, $newpenyakit[$i]);
							}
						}
					}
					// array_push($nextp, $tempp);
					// for ($m = 0; $m < count($temppenyakit[$j]); $m++) {
					// 	$simpan = array();
					// 	if ($temppenyakit[$j][$m] != "o") {
					// 		for ($k = 0; $k < count($newpenyakit[$i]); $k++) {
					// 			for ($l = 0; $l < count($temppenyakit[$j]); $l++) {
					// 				if ($newpenyakit[$i][$k] == $temppenyakit[$j][$l]) {
					// 					$x = $temppenyakit[$j][$l];
					// 					array_push($simpan, $x);
					// 				}
					// 			}
					// 		}
					// 		// $a = array_unique($simpan, SORT_REGULAR);

					// 		// $simpan = array_values($a);
					// 		array_push($temp, $simpan);
					// 	} else {
					// 		array_push($temp, $newpenyakit[$i]);
					// 	}
					// }
					// $a = array_unique($temp, SORT_REGULAR);

					// array_push($temp2, $x);
					// array_push($temp, $temp2);

					// $temp = array_values($a);

					for ($j = 0; $j < count($tempnilai); $j++) {
						$tempb = $tempnilai[$j] * $p;
						array_push($nextb, $tempb);
						// if ($temppenyakit[$j] != "o") {
						// 	array_push($temp, $temppenyakit[$j]);
						// } else {
						// 	array_push($temp, "o");
						// }
					}
					for ($j = 0; $j < count($temppenyakit); $j++) {
						$simpan = array();
						for ($k = 0; $k < count($temppenyakit[$j]); $k++) {
							if ($temppenyakit[$j][$k] != "o") {
								array_push($simpan, $temppenyakit[$j][$k]);
							}
						}
						if ($simpan != NULL) {
							array_push($temp, $simpan);
						}
						for ($k = 0; $k < count($temppenyakit[$j]); $k++) {
							if ($temppenyakit[$j][$k] == "o") {
								$o = ["o"];
								array_push($temp, $o);
							}
						}
					}
					$cek = 0;
					$tambahvalueo = 0;
					for ($j = 0; $j < count($temp); $j++) {
						for ($k = 0; $k < count($temp[$j]); $k++) {
							if ($temp[$j][$k] == "n") {
								$cek++;
								$tambahvalueo = $tambahvalueo + $nextb[$j];
							}
						}
					}
					//Bagian bawah dempster shafer (Teliti lebih dalam) #bug

					$simpansementara = array_unique($temp, SORT_REGULAR);
					$temppenyakit = array_values($simpansementara);

					$pembagi = 0;
					for ($j = 0; $j < count($nextb); $j++) {
						$pembagi += $nextb[$j];
					}

					$tempnilai = array();
					for ($j = 0; $j < count($temppenyakit); $j++) {
						$sum = 0;
						for ($k = 0; $k < count($temp); $k++) {
							if ($temppenyakit[$j] == $temp[$k]) {
								$sum = ($sum + $nextb[$k]);
							}
						}
						if ($cek >= 1) {
							$sum = $sum / ($pembagi - $tambahvalueo);
						} else {
							$sum = $sum / $pembagi;
						}
						array_push($tempnilai, $sum);
					}
					//unset n
					for ($j = 0; $j < count($temppenyakit); $j++) {
						for ($k = 0; $k < count($temppenyakit[$j]); $k++) {
							if ($temppenyakit[$j][$k] == "n") {
								unset($temppenyakit[$j]);
								unset($tempnilai[$j]);
								$temppenyakit = array_values($temppenyakit);
								$tempnilai = array_values($tempnilai);
							}
						}
					}
					// if ($i == 5) {
					// 	var_dump($pembagi);
					// 	var_dump($temp);
					// 	var_dump($nextb);
					// 	var_dump($temppenyakit);
					// 	var_dump($tempnilai);
					// }

					// if ($i == 3) {
					// 	var_dump($temppenyakit);
					// 	var_dump($tempnilai);
					// 	// $nilai = max($tempnilai);
					// 	// for ($i = 0; $i < count($tempnilai); $i++) {
					// 	// 	if ($tempnilai[$i] == $nilai) {
					// 	// 		array_push($hasilpenyakit, $temppenyakit[$i]);
					// 	// 	}
					// 	// }
					// 	// var_dump($hasilpenyakit);
					// }

				}
			}
			$nilai = max($tempnilai);
			var_dump($tempnilai);
			$simpanpersentase = array();
			array_push($simpanpersentase, $nilai);
			$persentase = array();
			array_push($persentase, $simpanpersentase);
			for ($i = 0; $i < count($tempnilai); $i++) {
				if ($tempnilai[$i] == $nilai) {
					// var_dump($temppenyakit[$i]);
					array_push($hasilpenyakit, $temppenyakit[$i]);
				}
			}
			// var_dump($persentase);
			// var_dump($hasilpenyakit);
		} elseif (count($simpanpav) == 1) {
			$hasilpenyakit = array();
			$nilai = max($simpanpav);
			$simpanpersentase = array();
			array_push($simpanpersentase, $nilai);
			$persentase = array();
			array_push($persentase, $simpanpersentase);
			for ($i = 0; $i < count($simpanpav); $i++) {
				if ($simpanpav[$i] == $nilai) {
					array_push($hasilpenyakit, $newpenyakit[$i]);
				}
			}
		} else {
			$simpanpersentase = array();
			array_push($simpanpersentase, 0);
			$temp = array();
			$persentase = array();
			array_push($persentase, $persentase);
			$hasilpenyakit = array();
			array_push($temp, "Anda tidak mengidap penyakit paru");
			array_push($hasilpenyakit, $temp);
		}

		// // var_dump($nextb);
		// $data = array(
		// 	'nama' => $nama,
		// 	'alamat' => $alamat,
		// 	'hasil' => $hasilpenyakit,
		// 	'persentase' => 0,
		// );
		// $this->Modelpemeriksa->insert_data($data);
		// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
		$waktu = microtime(true) - $start;
		$this->hasildiagnosis($nama, $alamat, $hasilpenyakit, $persentase, $waktu);
	}
	public function hasildiagnosis($nama, $alamat, $hasilpenyakit, $persentase, $waktu)
	{
		// printf($nama);
		$data['nama'] = $nama;
		$data['alamat'] = $alamat;
		$data['hasil'] = $hasilpenyakit;
		$data['persentase'] = $persentase;
		$data['waktu'] = $waktu;

		$this->load->view('clientside/diagnosis2', $data);
	}
	public function dempstershafer($pav, $batasatas, $batasbawah, $nc, $nrgejala)
	{

		$jawaban = array();
		$gejala = array();
		$newgejala = array();
		$copynewgejala = array();
		$newbobot = array();
		// $getpenyakit = $this->Modelpenyakit->jlhpenyakit();
		$getgejala = $this->Modelpenyakit->jlhgejala();
		$sementara = array();
		for ($i = 0; $i < count($nc); $i++) {
			if ($nc[$i] != 0) {
				array_push($jawaban, $pav[$i]);
				array_push($gejala, $nrgejala[$i]);
			}
		}
		var_dump($getgejala); //lanjutin permasalahan terkait nilai gejala yang harus unique

		// var_dump($nc);
		// var_dump($nrgejala);
		// $mp = array();
		// for ($i = 0; $i < $jawaban; $i++) {
		// 	if ($jawaban[$i] != 0) {
		// 		// array_push($mb, $jawaban[$i]);
		// 		// $mps = 1 - $jawaban;
		// 		// array_push($mp, $mps);
		// 		array_push($newbobot, $jawaban[$i]);
		// 		for ($j = 0; $j < count($getpenyakit); $j++) {
		// 			if ($gejala[$i] == $getgejala[$j]) {
		// 				array_push($sementara, $getpenyakit[$j]);
		// 			}
		// 		}
		// 		array_push($newgejala, $sementara);
		// 		array_push($copynewgejala, $sementara);
		// 		unset($sementara);
		// 	}
		// }
		// $i = 1;
		// $j = 0;
		// $simpannilai1 = array();
		// $simpannilai2 = array();
		// $k = 0;
		// while ($i < count($newgejala)) {
		// 	if (current($newgejala) != end($copynewgejala)) {
		// 		while ($j < count(current($newgejala))) {
		// 			if ($i == 1) {
		// 				$mbb = $newbobot[$i - 1] * $newbobot[$i];
		// 				$mpb = (1 - $newbobot[$i - 1]) * $newbobot[$i];
		// 				$mbp = $newbobot[$i - 1] * (1 - $newbobot[$i]);
		// 				$mpp = (1 - $newbobot[$i - 1]) * (1 - $newbobot[$i]);
		// 				array_push($simpannilai1, $mbb);
		// 				array_push($simpannilai1, $mpb);
		// 				array_push($simpannilai1, $mbp);
		// 				array_push($simpannilai1, $mpp);
		// 			}
		// 			$j++;
		// 		}
		// 	}
		// 	$i++;
		// }
		// // for ($i = 0; $i < count($newgejala); $i++) {
		// // 	for ($j = 0; $j < 2; $j++) {
		// // 		if ($i == 0) {
		// // 			$mbb = $mb[$i] * $mb[$i + 1];
		// // 			$mpb = $mp[$i] * $mb[$i + 1];
		// // 			$mbp = $mb[$i] * $mp[$i + 1];
		// // 			$mpp = $mp[$i] * $mp[$i + 1];
		// // 		}
		// // 	}
		// // }
	}
	public function faq()
	{
		$data['faq'] = $this->Modelfaq->Alldata();
		$this->load->view('clientside/faq', $data);
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
						redirect('Welcome/pertanyaandiagnosis');
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
			$this->form_validation->set_rules('penyakit', 'Penyakit', 'required|trim');
			$this->form_validation->set_rules('jawaban', 'Jawaban', 'required|trim');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('adminside/tambahfaq');
			} else {
				$pertanyaan = $this->input->post('pertanyaan', TRUE);
				$jawaban = $this->input->post('jawaban', TRUE);
				$penyakit = $this->input->post('penyakit', TRUE);
				$data = array(
					'pertanyaan' => $pertanyaan,
					'penyakit' => $penyakit,
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
		$this->form_validation->set_rules('penyakit', 'Penyakit', 'required|trim');
		$id = $this->input->post('id');
		if ($this->form_validation->run() == FALSE) {
			$this->editfaq($id);
		} else {
			$pertanyaan = $this->input->post('pertanyaan', TRUE);
			$jawaban = $this->input->post('jawaban', true);
			$penyakit = $this->input->post('penyakit', true);
			$data = array(
				'pertanyaan' => $pertanyaan,
				'penyakit' => $penyakit,
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
