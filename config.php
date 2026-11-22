<?php
// Memulai session untuk menyimpan status validasi form dan ringkasan pesanan
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// =========================================================================
// PENGATURAN BRAND & KONTAK (Silakan ubah sesuai data toko Anda)
// =========================================================================
$brand_info = [
    'name'        => 'LANI MOVE',
    'tagline'     => 'Activewear Nyaman untuk Setiap Lekuk Tubuhmu',
    'description' => 'Menghadirkan pakaian olahraga wanita plus size yang dirancang khusus untuk kenyamanan, kebebasan bergerak, dan rasa percaya diri tanpa kompromi.',
    'whatsapp'    => '6282137469786', // Gunakan format kode negara 62 tanpa tanda + atau spasi
    'wa_display'  => '+62 821-3746-9786',
    'instagram'   => '@lanimove.id',
    'ig_url'      => 'https://instagram.com/lanimove.id',
    'shipping'    => 'Pengiriman dari kota Demak ke seluruh Indonesia via JNE, J&T, SiCepat, dan Instant Courier.',
    'return_policy' => 'Garansi tukar ukuran maksimal 3 hari setelah barang diterima (syarat: hangtag masih terpasang & belum dicuci).',
    'copyright'   => '© ' . date('Y') . ' LANI MOVE. Hak Cipta Dilindungi.'
];

// =========================================================================
// PENGATURAN DATA PRODUK (Ganti placeholder sesuai spesifikasi produk asli)
// =========================================================================
$product = [
    'name'          => 'MOVE Contour Tee',                                                                                           
    'design'        => 'Desain Color-blocking dengan aksen panel hitam pekat di sisi kanan-kiri yang memberi kesan ramping dan jenjang, dipadukan logo minimalis "MOVÉ" untuk tampilan bersih dan timeless.',
    'cut'           => 'Potongan Comfort Fit: Bagian badan mengalir halus menyamarkan area perut, dilengkapi keliman bawah melengkung (curved hem) yang lebih panjang di belakang untuk menutup pinggul secara natural saat aktif bergerak.',
    'material'      => 'Polyester-Spandex Interlock, memiliki teksture padat namun lentur ini membuat kain jatuh mengikuti lekuk tubuh tanpa menjiplak lipatan kulit. Dengan panel samping dari bahan Power Mesh Spandex yang memiliki pori-pori micro yang sangat rapat dan elastis,selain berfungsi memberikan kompresi ringan di sisi pinggang agar tampak ramping, pori-pori ini menjadi jalur sirkulasi di area ketiak hingga pinggang.',
    'size_range'    => 'XL — 4XL (Lingkar Dada 110 cm – 142 cm)',
    'usage'         => 'Cocok untuk jalan santai, gym, yoga, zumba, lari ringan, maupun daily casual outfit.',
    'price_normal'  => 189000, // Placeholder harga normal (angka tanpa titik)
    'price_promo'   => 149000, // Placeholder harga promo (angka tanpa titik)
    'stock_status'  => 'Tersedia (Siap Kirim)',
    'colors'        => [
        'Deep Navy'       => '#201846',
        'Warm Beige'      => '#DFD3C3',
        'Terracotta Clay' => '#C67B63',
    ],
    'sizes'         => ['XL', '2XL', '3XL', '4XL']
];

// =========================================================================
// PANDUAN UKURAN (Placeholder yang dapat diedit)
// =========================================================================
$size_guide = [
    [
        'size'   => 'XL',
        'chest'  => '110 – 116 cm',
        'length' => '70 cm',
        'rec'    => '[Contoh: BB 65 – 75 kg]'
    ],
    [
        'size'   => '2XL',
        'chest'  => '118 – 124 cm',
        'length' => '72 cm',
        'rec'    => '[Contoh: BB 76 – 85 kg]'
    ],
    [
        'size'   => '3XL',
        'chest'  => '126 – 132 cm',
        'length' => '74 cm',
        'rec'    => '[Contoh: BB 86 – 95 kg]'
    ],
    [
        'size'   => '4XL',
        'chest'  => '134 – 142 cm',
        'length' => '76 cm',
        'rec'    => '[Contoh: BB 96 – 108 kg]'
    ]
];

// =========================================================================
// DATA FAQ (Pertanyaan yang Sering Diajukan)
// =========================================================================
$faqs = [
    [
        'q' => '1. Apakah produk cocok untuk tubuh plus size?',
        'a' => 'Sangat cocok. Pola baju ini dirancang khusus berdasarkan proporsi tubuh wanita plus size dari ukuran XL hingga 5XL, bukan sekadar memperbesar pola ukuran standar.'
    ],
    [
        'q' => '2. Apakah bahannya nyaman untuk olahraga?',
        'a' => 'Ya, kami memilih material kain yang lembut di kulit, memiliki sirkulasi udara yang baik, dan tidak terasa kaku sehingga kamu tetap nyaman saat berkeringat maupun bergerak aktif.'
    ],
    [
        'q' => '3. Apakah modelnya ketat di bagian perut?',
        'a' => 'Tidak. Potongannya dirancang rileks (loose/relaxed fit) dan jatuh mengikuti gerak tubuh tanpa menekan atau mencetak lipatan di area perut, pinggang, maupun lengan.'
    ],
    [
        'q' => '4. Bagaimana cara memilih ukuran?',
        'a' => 'Silakan ukur lingkar dada dan panjang baju yang biasa kamu kenakan menggunakan meteran kain, lalu cocokkan dengan tabel Panduan Ukuran di atas. Jika ragu antara dua ukuran, pilih ukuran yang lebih besar untuk kenyamanan ekstra.'
    ],
    [
        'q' => '5. Bagaimana cara memesan?',
        'a' => 'Pilih warna, ukuran, dan jumlah baju pada formulir pemesanan di halaman ini, lalu klik tombol "Hitung & Siapkan Pesanan". Setelah rincian total muncul, klik tombol "Lanjut Checkout via WhatsApp" untuk terhubung langsung dengan admin kami.'
    ],
    [
        'q' => '6. Bagaimana kebijakan penukaran barang?',
        'a' => 'Kami menyediakan layanan tukar ukuran jika ukuran yang dipilih kurang pas. Pastikan label/hangtag masih terpasang rapi, baju belum dicuci atau dipakai berolahraga, dan ajukan maksimal 3 hari setelah paket diterima.'
    ]
];

// Helper Function Format Rupiah
function format_rupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

// Helper Function Gambar (Menggunakan gambar lokal jika ada, atau fallback placeholder berkualitas)
function get_image($local_path, $fallback_url) {
    if (file_exists(__DIR__ . '/' . $local_path)) {
        return $local_path;
    }
    return $fallback_url;
}
?>