import re
from google import genai
import sys
import json

# Inisialisasi klien Gemini AI
client = genai.Client(api_key="AIzaSyB9tssLYm_4AqAJhtbSjT9Km9lnF0oqYYw")

def classify_pengaduan(isi_laporan, kerugian_masyarakat):
    """
    Fungsi untuk mengklasifikasikan kategori pengaduan berdasarkan isi_laporan dan kerugian_masyarakat.
    """
    # Kategori 1: Harus Segera Diselesaikan
    if re.search(r"(pelaku usaha melakukan kekerasan|penipuan|lapor polisi|polisi)", isi_laporan, re.IGNORECASE) and \
       re.search(r"(lima juta|5\.000\.000)", kerugian_masyarakat, re.IGNORECASE):
        return 1  # Harus Segera Diselesaikan

    # Kategori 2: Prioritas
    elif re.search(r"(pelaku usaha melanggar perjanjian dengan saya|akad|perjanjian|tidak sesuai perjanjian|barang palsu)", isi_laporan, re.IGNORECASE) and \
         re.search(r"(dua juta|2\.000\.000)", kerugian_masyarakat, re.IGNORECASE):
        return 2  # Prioritas

    # Kategori 3: Pengaduan Biasa
    elif re.search(r"(garansi tidak bisa dilakukan|claim|sni|tanggung jawab)", isi_laporan, re.IGNORECASE) and \
         re.search(r"(satu juta|1\.000\.000)", kerugian_masyarakat, re.IGNORECASE):
        return 3  # Pengaduan Biasa

    # Default: Belum Ditentukan
    return 6  # Belum Ditentukan

if __name__ == "__main__":
    print("gemini.py dijalankan")
    try:
        # Baca input JSON dari sys.stdin
        input_data = json.loads(sys.stdin.read())
    except json.JSONDecodeError:
        print(json.dumps({"error": "Input JSON tidak valid"}))
        sys.exit(1)

    # Ambil isi_laporan dan kerugian_masyarakat dari input
    isi_laporan = input_data.get("isi_laporan", "")
    kerugian_masyarakat = input_data.get("kerugian_masyarakat", "")

    # Validasi input
    if not isi_laporan or not kerugian_masyarakat:
        print(json.dumps({"error": "isi_laporan atau kerugian_masyarakat tidak boleh kosong"}))
        sys.exit(1)

    # Klasifikasikan pengaduan
    kategori = classify_pengaduan(isi_laporan, kerugian_masyarakat)

    # Cetak hasil klasifikasi dalam format JSON
    print(json.dumps({"kategori": kategori}))