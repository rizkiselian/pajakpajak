<?php
function cek_query($res, $notifikasi)
{
    $ci = get_instance();
    if ($res > 0) {
        return $ci->session->set_flashdata('flash', 'success-Berhasil-Data Berhasil Di' . $notifikasi);
    } else {
        return $ci->session->set_flashdata('flash', 'error-Gagal-Data Gagal Di' . $notifikasi);
    }
}

function simpan_log($aksi, $keterangan)
{
    $ci = get_instance();
    $tgl_sekarang = date('Y-m-d');
    $tgl_kode = date('y-m-d');
    $cek_kode = $ci->db->get_where('log_user', ['date(waktu_akses)' => $tgl_sekarang])->num_rows();
    if ($cek_kode > 0) {
        $ci->db->select('log_id');
        $ci->db->from('log_user');
        $ci->db->where('date(waktu_akses)', $tgl_sekarang);
        $ci->db->order_by("log_id DESC");
        $ci->db->limit(1, 0);
        $last_kode = $ci->db->get()->row_array();
        $no_urut = substr($last_kode['log_id'], 6, 4);
        $v_kode = (int)($no_urut);
        $id_log = $v_kode + 1;
    } else {
        $id_log = 1;
    }
    $kode_log = str_replace('-', '', $tgl_kode) . str_pad($id_log, 4, "0",  STR_PAD_LEFT);

    $browser = [
        'browser' => $ci->agent->browser(),
        'version' => $ci->agent->version(),
        'os' => $ci->agent->platform(),
        'ip' => $ci->input->ip_address()
    ];
    $string = [
        'log_id'    => $kode_log,
        'username'     => $ci->session->userdata('username'),
        'aktivitas'    => $aksi,
        'aktivitas_detail' => $keterangan,
        'browser'     => json_encode($browser),
        'waktu_akses' => date('Y-m-d H:i:s')
    ];
    return $string;
}

function format_tanggal($tanggal)
{
    return date('d-m-Y', strtotime($tanggal));
}

function tanggal_database($tanggal)
{
    return date('Y-m-d', strtotime($tanggal));
}

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect(site_url());
    } else {
        $timeout = $ci->session->userdata('timeout');
        if (time() < $timeout) {
            $ci->session->set_userdata('timeout', time() + 600);
            $user_id = $ci->session->userdata('user_id');
            $nip = $ci->session->userdata('nip');
            $nama_lengkap = $ci->session->userdata('nama_lengkap');
            $role_admin = $ci->session->userdata('role_admin');
            $data = [
                "user" => $user_id,
                "nip" => $nip,
                "nama_lengkap" => $nama_lengkap,
                "role" => $role_admin
            ];
            return $data;
        } else {
            redirect(site_url());
        }
    }
}