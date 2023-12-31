<?php
session_start();
define("BASE_URL", "http://localhost/penjadwalan/");

function configsmtp($mail){
    // SMTP configuration
    // $mail->IsSMTP();
    // $mail->Mailer = "smtp";

    // $mail->SMTPDebug  = 1;
    // $mail->SMTPAuth   = TRUE;
    // $mail->Port       = 465;
    // $mail->Host       = "ssl://mail.apotekaltrosdago.com";
    // $mail->Username   = "admin@apotekaltrosdago.com";
    // $mail->Password   = "adminapotek";

    // //Set the SMTP port number - likely to be 25, 465 or 587
    // $mail->Host     = 'smtp.mailtrap.io';
    // $mail->Port       = 2525;
    // $mail->SMTPAuth   = true;
    // $mail->Username = '430b3cf6903a9e';
    // $mail->Password = '31aa5340c222a9';

    // $mail->setFrom('admin@apotekaltrosdago.com', 'Apotek Altros Dago');
    // $mail->addReplyTo('admin@apotekaltrosdago.com', 'Apotek Altros Dago');

    // Set email format to HTML
    // $mail->isHTML(true);
}

function indexrandom($n){
    switch ($n) {
        case 1:
            $nilaiir = 0.00;
            break;

        case 2:
            $nilaiir = 0.00;
            break;

        case 3:
            $nilaiir = 0.58;
            break;

        case 4:
            $nilaiir = 0.90;
            break;

        case 5:
            $nilaiir = 1.12;
            break;

        case 6:
            $nilaiir = 1.24;
            break;

        case 7:
            $nilaiir = 1.32;
            break;

        case 8:
            $nilaiir = 1.41;
            break;

        case 9:
            $nilaiir = 1.45;
            break;

        case 10:
            $nilaiir = 1.49;
            break;

        case 11:
            $nilaiir = 1.51;
            break;

        case 12:
            $nilaiir = 1.48;
            break;

        case 13:
            $nilaiir = 1.56;
            break;
    }

    return $nilaiir;
}


function tampil_gaji($gaji)
{
    $string1 = explode(' - ', $gaji);
    $count = count($string1);
    if ($count == 1) {
        return number_format($string1[0]);
    } else {
        return number_format($string1[0]) . ' - ' . number_format($string1[1]);
    }
}


function random_name($name)
{
    // mengacak angka untuk nama file
    $acak = rand(00000000, 99999999);

    $ImageExt       = substr($name, strrpos($name, '.'));
    $ImageExt       = str_replace('.', '', $ImageExt); // Extension
    $name      = preg_replace("/\.[^.\s]{3,4}$/", "", $name);
    $NewImageName   = $acak . '.' . $ImageExt;
    return $NewImageName;
}


function cek_login()
{
    if (!isset($_SESSION['login'])) {
        redirect('login');
    }
}

//fungsi memasukan data kedalam session
function session_userdata($data)
{
    foreach ($data as $key => $value) {
        $_SESSION[$key] = $value;
    }
}

//fungsi untuk pindah halaman dengan membawa pesan
function redirect($url, $message = false)
{
    if ($message) {
        $_SESSION['message'] = $message;
    }
    header('location: ' . BASE_URL . $url);
}

//fungsi untuk cek pesan yang di bawa oleh fungsi redirect
function session_flashdata()
{
    if (isset($_SESSION['message'])) :
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    endif;
}

function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
      $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
      $temp = penyebut($nilai - 10). " belas";
    } else if ($nilai < 100) {
      $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
      $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
      $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
      $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
      $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
      $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
      $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
      $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
  }

  function terbilang($nilai) {
    if($nilai<0) {
      $hasil = "minus ". trim(penyebut($nilai));
    } else {
      $hasil = trim(penyebut($nilai));
    }         
    return $hasil;
  }
  
//fungsi untuk mengubah dari integer menjadi Rp, int
function rupiah($nilai = 0)
{
    $string = "Rp, " . number_format($nilai);
    return $string;
}

//fungsi untuk mencegah serangan xss
function cetak($str)
{
    return htmlentities($str, ENT_QUOTES, 'UTF-8');
}

//fungsii untuk mengubah tanggal menjadi tanggal indonesia
function tgl_indo($tgl)
{
    $ubah = gmdate($tgl, time() + 60 * 60 * 8);
    $pecah = explode("-", $ubah);
    $tanggal = $pecah[2];
    $bulan = bulan($pecah[1]);
    $tahun = $pecah[0];
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function format_tgl($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
function bulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}

function new_format_number($number)
	{
		if($number < 10){
			$new_number = "0" . $number;
		}else{
			$new_number = $number;
		}

		return $new_number;
	}