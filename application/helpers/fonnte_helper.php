<?php
defined('BASEPATH') or exit('No direct script access allowed');

function send_fonnte_message($to, $message)
{
    $CI = &get_instance();
    $CI->load->config('fonnte'); // Memuat konfigurasi Fonnte

    $base_url = $CI->config->item('fonnte_base_url');
    $token = $CI->config->item('fonnte_token');

    $data = [
        'target' => $to, // Nomor WhatsApp tujuan
        'message' => $message, // Pesan yang akan dikirim
        'countryCode' => '62' // Kode negara (opsional, default Indonesia)
    ];

    $headers = [
        'Authorization: ' . $token,
        'Content-Type: application/json'
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $base_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Tambahkan log untuk mencetak response API Fonnte
    log_message('debug', 'Fonnte Response: ' . $response);
    log_message('debug', 'Fonnte HTTP Code: ' . $http_code);

    if ($http_code == 200) {
        return true;
    } else {
        log_message('error', 'Failed to send WhatsApp message via Fonnte: ' . $response);
        return false;
    }
}