<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run()
    {
        $news = [
            
    [
        'title' => 'Festival Budaya Desa Meriahkan Hari Jadi ke-75',
        'slug' => Str::slug('Festival Budaya Desa Meriahkan Hari Jadi ke-75'),
        'excerpt' => 'Berbagai kegiatan budaya dan pertunjukan rakyat digelar untuk merayakan hari jadi desa ke-75.',
        'content' => 'Dalam rangka memperingati hari jadi Desa Sukamaju ke-75, pemerintah desa menyelenggarakan festival budaya selama 2 hari berturut-turut. Acara ini menampilkan tari tradisional, lomba memasak makanan khas, serta pameran hasil kerajinan lokal. Ratusan warga memadati balai desa untuk menyaksikan pertunjukan tersebut.',
        'category' => 'Budaya',
        'category_color' => 'warning',
        'author' => 'Panitia HUT Desa',
        'views' => 1430,
        'image' => 'news/festival-budaya.jpg'
    ],
    [
        'title' => 'Bantuan Pupuk Subsidi Disalurkan ke Petani',
        'slug' => Str::slug('Bantuan Pupuk Subsidi Disalurkan ke Petani'),
        'excerpt' => 'Dinas Pertanian menyalurkan pupuk subsidi kepada kelompok tani di desa untuk meningkatkan hasil panen.',
        'content' => 'Sebanyak 20 ton pupuk subsidi jenis Urea dan NPK disalurkan kepada kelompok tani Desa Mekarsari. Bantuan ini diharapkan mampu meningkatkan produktivitas lahan pertanian menjelang musim tanam. Penyaluran dilakukan secara transparan dan diawasi langsung oleh BPD serta perangkat desa.',
        'category' => 'Pertanian',
        'category_color' => 'success',
        'author' => 'Admin Desa',
        'views' => 960,
        'image' => 'news/pupuk-subsidi.jpg'
    ],
    [
        'title' => 'Sosialisasi Kesehatan untuk Lansia Digelar di Balai Desa',
        'slug' => Str::slug('Sosialisasi Kesehatan untuk Lansia Digelar di Balai Desa'),
        'excerpt' => 'Puskesmas menggelar sosialisasi kesehatan dan pemeriksaan gratis bagi lansia di desa.',
        'content' => 'Sebagai bentuk perhatian terhadap warga lanjut usia, Puskesmas Kecamatan bekerjasama dengan Posyandu lansia mengadakan sosialisasi dan pemeriksaan kesehatan. Pemeriksaan meliputi tekanan darah, gula darah, serta konsultasi dengan dokter umum. Kegiatan ini diikuti oleh lebih dari 100 lansia.',
        'category' => 'Kesehatan',
        'category_color' => 'danger',
        'author' => 'Puskesmas',
        'views' => 789,
        'image' => 'news/sosialisasi-lansia.jpg'
    ],
    [
        'title' => 'Turnamen Bola Voli Antar Dusun Sukses Digelar',
        'slug' => Str::slug('Turnamen Bola Voli Antar Dusun Sukses Digelar'),
        'excerpt' => 'Turnamen bola voli yang diikuti oleh 8 tim antar dusun berlangsung meriah dan sportif.',
        'content' => 'Karang taruna Desa mengadakan turnamen bola voli antar dusun untuk mempererat persaudaraan dan menjaring bakat muda. Tim Dusun Timur keluar sebagai juara setelah mengalahkan tim Dusun Selatan di partai final. Warga sangat antusias menyaksikan pertandingan yang digelar selama 3 hari ini.',
        'category' => 'Olahraga',
        'category_color' => 'primary',
        'author' => 'Karang Taruna',
        'views' => 1112,
        'image' => 'news/voli-turnamen.jpg'
    ],
    [
        'title' => 'Koperasi Desa Luncurkan Program Simpan Pinjam Baru',
        'slug' => Str::slug('Koperasi Desa Luncurkan Program Simpan Pinjam Baru'),
        'excerpt' => 'Program simpan pinjam berbunga ringan diluncurkan koperasi desa untuk membantu pelaku UMKM.',
        'content' => 'Koperasi Desa Sejahtera meluncurkan program simpan pinjam baru dengan bunga rendah 1% per bulan. Program ini bertujuan mendukung pelaku UMKM dan petani kecil dalam memperoleh modal usaha. Sosialisasi program dilakukan di balai desa dengan dihadiri pengurus koperasi dan tokoh masyarakat.',
        'category' => 'Ekonomi',
        'category_color' => 'info',
        'author' => 'Koperasi Sejahtera',
        'views' => 574,
        'image' => 'news/koperasi.jpg'
    ],
    [
        'title' => 'Desa Juara Lomba Desa Tingkat Kabupaten',
        'slug' => Str::slug('Desa Juara Lomba Desa Tingkat Kabupaten'),
        'excerpt' => 'Desa Mulyorejo berhasil meraih juara 1 lomba desa tingkat kabupaten berkat inovasi digitalisasi layanan.',
        'content' => 'Desa Mulyorejo dinobatkan sebagai juara 1 lomba desa tingkat Kabupaten setelah menunjukkan inovasi pelayanan publik berbasis digital. Dengan aplikasi layanan desa yang diluncurkan awal tahun ini, warga dapat mengurus surat menyurat secara online. Penilaian dilakukan oleh tim dari Dinas PMD dan disambut antusias warga.',
        'category' => 'Pemerintahan',
        'category_color' => 'secondary',
        'author' => 'Tim Pemerintah Desa',
        'views' => 1633,
        'image' => 'news/juara-desa.jpg'
    ],
    [
        'title' => 'Gotong Royong Bersihkan Saluran Irigasi',
        'slug' => Str::slug('Gotong Royong Bersihkan Saluran Irigasi'),
        'excerpt' => 'Warga bersama-sama membersihkan saluran irigasi untuk menghindari banjir saat musim hujan.',
        'content' => 'Menjelang musim hujan, warga Desa Sidomulyo mengadakan kerja bakti membersihkan saluran irigasi. Kegiatan ini dipimpin langsung oleh Kepala Dusun dan diikuti oleh seluruh lapisan masyarakat. Selain untuk kelancaran pengairan sawah, kegiatan ini juga mencegah genangan air di pemukiman.',
        'category' => 'Lingkungan',
        'category_color' => 'success',
        'author' => 'Admin Desa',
        'views' => 682,
        'image' => 'news/gotong-royong.jpg'
    ],
    [
        'title' => 'Pemuda Desa Ciptakan Alat Pengusir Hama Otomatis',
        'slug' => Str::slug('Pemuda Desa Ciptakan Alat Pengusir Hama Otomatis'),
        'excerpt' => 'Inovasi alat pengusir burung otomatis dari botol bekas diciptakan pemuda desa.',
        'content' => 'Seorang pemuda desa menciptakan alat pengusir hama burung otomatis menggunakan motor bekas kipas angin dan botol air mineral. Alat ini mampu berputar dan menghasilkan suara bising yang efektif mengusir burung dari sawah. Temuan ini mulai banyak digunakan oleh petani sekitar.',
        'category' => 'Teknologi',
        'category_color' => 'dark',
        'author' => 'Karang Taruna',
        'views' => 835,
        'image' => 'news/alat-hama.jpg'
    ],
    [
        'title' => 'Pembangunan Jembatan Gantung Mulai Dikerjakan',
        'slug' => Str::slug('Pembangunan Jembatan Gantung Mulai Dikerjakan'),
        'excerpt' => 'Pemerintah desa memulai pembangunan jembatan gantung yang menghubungkan dua dusun terpencil.',
        'content' => 'Setelah melalui proses perencanaan dan pengadaan, pembangunan jembatan gantung sepanjang 50 meter akhirnya dimulai. Jembatan ini menghubungkan Dusun Kedung dengan Dusun Selorejo yang selama ini hanya bisa dilewati perahu kecil. Warga menyambut gembira karena akan memudahkan akses pendidikan dan layanan kesehatan.',
        'category' => 'Infrastruktur',
        'category_color' => 'primary',
        'author' => 'Admin Desa',
        'views' => 1201,
        'image' => 'news/jembatan.jpg'
    ],
    [
        'title' => 'Pelatihan Digital Marketing untuk UMKM Desa',
        'slug' => Str::slug('Pelatihan Digital Marketing untuk UMKM Desa'),
        'excerpt' => 'UMKM desa diberi pelatihan digital marketing untuk memperluas jangkauan pasar.',
        'content' => 'Dinas Koperasi bekerjasama dengan komunitas digital lokal memberikan pelatihan digital marketing untuk 40 pelaku UMKM di desa. Materi pelatihan meliputi pembuatan konten, pemanfaatan media sosial, hingga penggunaan marketplace. Diharapkan pelaku UMKM bisa bersaing secara online dan memperluas jangkauan produk mereka.',
        'category' => 'Pendidikan',
        'category_color' => 'info',
        'author' => 'Tim UMKM',
        'views' => 1078,
        'image' => 'news/digital-umkm.jpg'
    ],

        ];

        foreach ($news as $item) {
            News::create($item);
        }
    }
}