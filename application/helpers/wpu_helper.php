<?php

function options($name)
{
    $ci = get_instance();
    $ci->db->select('*');
    $ci->db->from('options');
    $ci->db->where('name', $name);
    return $ci->db->get()->row()->value;
}

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('login');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();

        $menu_id = $queryMenu['id'];
        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);
        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function is_siswa_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('noformulir')) {
        redirect('loginppdb');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();

        $menu_id = $queryMenu['id'];
        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);
        if ($userAccess->num_rows() < 1) {
            redirect('authppdb/blocked');
        }
    }
}

function is_guru_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('nip')) {
        redirect('loginguru');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();

        $menu_id = $queryMenu['id'];
        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);
        if ($userAccess->num_rows() < 1) {
            redirect('authguru/blocked');
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();
    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }

    /* atau dalam 1 query
    $ci->db->get_where('user_acces_menu',[
        'role_id'=>$role_id,
        'menu_id'=>$menu_id
    ]);
    */
}

function check_access_sub($role_id, $submenu_id)
{
    $ci = get_instance();
    $ci->db->where('role_id', $role_id);
    $ci->db->where('submenu_id', $submenu_id);
    $result = $ci->db->get('user_access_submenu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function check_websetting($name)
{
    $ci = get_instance();
    $ci->db->where('is_active', '1');
    $ci->db->where('name', $name);
    $result = $ci->db->get('options');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }

    /* atau dalam 1 query
    $ci->db->get_where('user_acces_menu',[
        'role_id'=>$role_id,
        'menu_id'=>$menu_id
    ]);
    */
}

function is_registered_active()
{
    $ci = get_instance();
    $userRegistered = $ci->db->get_where('options', [
        'name' => 'signup_member',
        'value' => '1'
    ]);
    if ($userRegistered->num_rows() < 1) {
        redirect('auth/blocked');
    }
}
function is_forgotpassword_active()
{
    $ci = get_instance();
    $userRegistered = $ci->db->get_where('options', [
        'name' => 'forgot_password',
        'value' => '1'
    ]);
    if ($userRegistered->num_rows() < 1) {
        redirect('auth/blocked');
    }
}

function slug($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
    // trim
    $text = trim($text, '-');
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // lowercase
    $text = strtolower($text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}

if (!function_exists('nominal')) {
    function nominal($angka)
    {
        $jd = number_format($angka, 0, ',', '.');
        return $jd;
    }
}

function getjumlahbiaya($id)
{
    $ci = get_instance();
    $ci->db->select('sum(nominal) as jumlah');
    $ci->db->from('m_jalur_biaya');
    $ci->db->where('gelombangjalur_id', $id);
    return $ci->db->get()->row()->jumlah;
}

function getdefault($id)
{
    $ci = get_instance();
    $ci->db->select('value as value');
    $ci->db->from('m_options');
    $ci->db->where('name', $id);
    return $ci->db->get()->row()->value;
}

function getjumlahbiayasiswa($siswa_id, $jenis, $is_paid = 'all')
{
    $ci = get_instance();
    $ci->db->select('sum(nominal) as jumlah');
    $ci->db->from('siswa_keuangan');
    $ci->db->where('siswa_id', $siswa_id);
    $ci->db->where('jenis', $jenis);
    if ($is_paid == 'paid') {
        $ci->db->where('is_paid', '1');
    }
    if ($is_paid == 'unpaid') {
        $ci->db->where('is_paid', '0');
    }
    return $ci->db->get()->row()->jumlah;
}

function getfieldtable($table, $field, $id)
{
    $ci = get_instance();
    $ci->db->select($field);
    $ci->db->from($table);
    $ci->db->where('id', $id);
    return $ci->db->get()->row()->$field;
}

function kekata($x)
{
    $x = abs($x);
    $angka = array(
        "", "satu", "dua", "tiga", "empat", "lima",
        "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"
    );
    $temp = "";
    if ($x < 12) {
        $temp = " " . $angka[$x];
    } else if ($x < 20) {
        $temp = kekata($x - 10) . " belas";
    } else if ($x < 100) {
        $temp = kekata($x / 10) . " puluh" . kekata($x % 10);
    } else if ($x < 200) {
        $temp = " seratus" . kekata($x - 100);
    } else if ($x < 1000) {
        $temp = kekata($x / 100) . " ratus" . kekata($x % 100);
    } else if ($x < 2000) {
        $temp = " seribu" . kekata($x - 1000);
    } else if ($x < 1000000) {
        $temp = kekata($x / 1000) . " ribu" . kekata($x % 1000);
    } else if ($x < 1000000000) {
        $temp = kekata($x / 1000000) . " juta" . kekata($x % 1000000);
    } else if ($x < 1000000000000) {
        $temp = kekata($x / 1000000000) . " milyar" . kekata(fmod($x, 1000000000));
    } else if ($x < 1000000000000000) {
        $temp = kekata($x / 1000000000000) . " trilyun" . kekata(fmod($x, 1000000000000));
    }
    return $temp;
}

function terbilang($x, $style = 4)
{
    if ($x < 0) {
        $hasil = "minus " . trim(kekata($x));
    } else {
        $hasil = trim(kekata($x));
    }
    switch ($style) {
        case 1:
            $hasil = strtoupper($hasil);
            break;
        case 2:
            $hasil = strtolower($hasil);
            break;
        case 3:
            $hasil = ucwords($hasil);
            break;
        default:
            $hasil = ucfirst($hasil);
            break;
    }
    return $hasil;
}

function getsettingsppsiswa($siswa_id)
{
    $ci = get_instance();
    $ci->db->select('nominal as jumlah');
    $ci->db->from('siswa_spp');
    $ci->db->where('siswa_id', $siswa_id);
    return $ci->db->get()->row()->jumlah;
}

function getbulanindo($n)
{
    $blnn = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    $bulanindo = $blnn[$n];
    return $bulanindo;
}
function getbulanromawi($n)
{
    $blnn = array('', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII');
    $bulanindo = $blnn[$n];
    return $bulanindo;
}
function gettanggalindo($tgl)
{
    if ($tgl <> '0000-00-00') {
        $tanggalindo = date('d-m-Y', strtotime($tgl));
    } else {
        $tanggalindo = '';
    }
    return $tanggalindo;
}

function gettanggalindo2($tgl)
{
    if ($tgl <> '0000-00-00') {
        $tanggalindo = date('d/m/Y', strtotime($tgl));
    } else {
        $tanggalindo = '';
    }
    return $tanggalindo;
}

function getfieldtable2($field, $table, $primary, $idkey)
{
    $ci = get_instance();
    $ci->db->select("$field as nama");
    $ci->db->from("$table");
    $ci->db->where("$primary", $idkey);
    return $ci->db->get()->row()->nama;
}

function get_namakelas($kelas_id)
{
    $ci = get_instance();
    $ci->db->select('nama_kelas as value');
    $ci->db->from('m_kelas');
    $ci->db->where('id', $kelas_id);
    return $ci->db->get()->row()->value;
}

function get_umur($tanggal_lahir)
{
    $biday = new DateTime($tanggal_lahir);
    $today = new DateTime();

    $diff = $today->diff($biday);
    $umur = $diff->y;
    return $umur;
}
function generatekodeinc4($table,$kodeawal,$kode) {
    $ci = get_instance();
    $ci->db->select("MAX(RIGHT($kode,4)) as kd_max from $table");
    $hasil = $ci->db->get()->row()->kd_max;
    if($hasil>0){
    $awal=$hasil+1;
    $kd = sprintf("%04s", $awal);
    }else{
    $kd="0001";
    }
    $kd=$kodeawal.$kd;
    return $kd;
    }
    function check_access_kategori($role_id, $kategori_id)
    {
        $ci = get_instance();
        $ci->db->where('role_id', $role_id);
        $ci->db->where('kategori_id', $kategori_id);
        $result = $ci->db->get('user_access_kategori');
    
        if ($result->num_rows() > 0) {
            return "checked='checked'";
        }
    }

    function check_access_user($asal_id, $tujuan_id)
    {
        $ci = get_instance();
        $ci->db->where('asal_id', $asal_id);
        $ci->db->where('tujuan_id', $tujuan_id);
        $result = $ci->db->get('user_access_user');
    
        if ($result->num_rows() > 0) {
            return "checked='checked'";
        }
    }

    function get_jumlahnilai($user_asal,$user_tujuan)
{
    $ci = get_instance();
    $ci->db->select('sum(jawaban) as value');
    $ci->db->from('bank_penilaian');
    $ci->db->where('user_asal', $user_asal);
    $ci->db->where('user_tujuan', $user_tujuan);
    return $ci->db->get()->row()->value;
}
function get_jumlahsoal($user_asal,$user_tujuan)
{
    $ci = get_instance();
    $ci->db->select('count(id) as value');
    $ci->db->from('bank_penilaian');
    $ci->db->where('user_asal', $user_asal);
    $ci->db->where('user_tujuan', $user_tujuan);
    return $ci->db->get()->row()->value;
}
function get_jumlahnilaiguru($user_tujuan)
{
    $ci = get_instance();
    $ci->db->select('sum(jawaban) as value');
    $ci->db->from('bank_penilaian');
    $ci->db->where('user_tujuan', $user_tujuan);
    return $ci->db->get()->row()->value;
}
function get_jumlahsoalguru($user_tujuan)
{
    $ci = get_instance();
    $ci->db->select('count(id) as value');
    $ci->db->from('bank_penilaian');
    $ci->db->where('user_tujuan', $user_tujuan);
    return $ci->db->get()->row()->value;
}
function get_jumlahnilaiguru_det($user_tujuan,$kategori_id)
{
    $ci = get_instance();
    $ci->db->select('sum(jawaban) as value');
    $ci->db->from('bank_penilaian');
    $ci->db->where('user_tujuan', $user_tujuan);
    $ci->db->where('kategori_id', $kategori_id);
    return $ci->db->get()->row()->value;
}
function get_jumlahsoalguru_det($user_tujuan,$kategori_id)
{
    $ci = get_instance();
    $ci->db->select('count(id) as value');
    $ci->db->from('bank_penilaian');
    $ci->db->where('user_tujuan', $user_tujuan);
    $ci->db->where('kategori_id', $kategori_id);
    return $ci->db->get()->row()->value;
}
function get_jumlahnilaiguru_role($user_tujuan,$kategori_id,$role_id)
{
    $ci = get_instance();
    $ci->db->select('sum(jawaban) as value');
    $ci->db->from('bank_penilaian');
    $ci->db->where('user_tujuan', $user_tujuan);
    $ci->db->where('kategori_id', $kategori_id);
    $ci->db->where('role_id', $role_id);
    return $ci->db->get()->row()->value;
}
function get_jumlahsoalguru_role($user_tujuan,$kategori_id,$role_id)
{
    $ci = get_instance();
    $ci->db->select('count(id) as value');
    $ci->db->from('bank_penilaian');
    $ci->db->where('user_tujuan', $user_tujuan);
    $ci->db->where('kategori_id', $kategori_id);
    $ci->db->where('role_id', $role_id);
    return $ci->db->get()->row()->value;
}