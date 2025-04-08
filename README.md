# Dbanie Waktunya Sholat

Menampilkan waktu sholat berdasarkan lokasi yang ditentukan di halaman pengaturan admin WordPress menggunakan shortcode.

## Deskripsi

Plugin ini memungkinkan Anda untuk menampilkan waktu sholat (Subuh, Terbit, Dzuhur, Ashar, Maghrib, Isya) di situs web WordPress Anda menggunakan shortcode. Lokasi untuk perhitungan waktu sholat dikonfigurasi melalui halaman pengaturan admin plugin. Plugin ini menggunakan API pihak ketiga (saat ini AlAdhan API) untuk mendapatkan data waktu sholat.

## Fitur

- Menampilkan waktu sholat menggunakan shortcode: `[fajr_prayer]`, `[sunrise]`, `[zuhr_prayer]`, `[asr_prayer]`, `[maghrib_prayer]`, `[isha_prayer]`.
- Pengaturan lokasi (Lintang dan Bujur) di halaman admin.
- Pilihan metode perhitungan waktu sholat.

## Instalasi

1. Unggah folder `dbanie-waktunya-sholat` ke direktori `wp-content/plugins/` di instalasi WordPress Anda.
2. Aktifkan plugin "Dbanie Waktunya Sholat" dari halaman Plugin di admin WordPress Anda.
3. Buka **Pengaturan > Waktu Sholat** untuk mengkonfigurasi lokasi dan metode perhitungan.
4. Gunakan shortcode yang tersedia di posting, halaman, atau widget teks Anda.

## Penggunaan

Setelah mengkonfigurasi lokasi dan metode di halaman pengaturan, Anda dapat menggunakan shortcode berikut untuk menampilkan waktu sholat di konten Anda:

- `[fajr_prayer]` - Waktu sholat Subuh.
- `[sunrise]` - Waktu Matahari Terbit.
- `[zuhr_prayer]` - Waktu sholat Dzuhur.
- `[asr_prayer]` - Waktu sholat Ashar.
- `[maghrib_prayer]` - Waktu sholat Maghrib.
- `[isha_prayer]` - Waktu sholat Isya.

## Kontribusi

Jika Anda ingin berkontribusi pada pengembangan plugin ini, silakan buat fork repositori dan ajukan pull request.

## Lisensi

GPL-3.0+
