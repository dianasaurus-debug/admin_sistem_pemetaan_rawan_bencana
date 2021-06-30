<?php

namespace Database\Seeders;

use App\Models\DetailSop;
use Illuminate\Database\Seeder;

class DetailSopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //bencana banjir
        DetailSop::insert([
           [
               'id_sop' => 1,
               'tindakan' => 'Pengenalan dan pengkajian ancaman bencana'
           ],
            [
                'id_sop' => 1,
                'tindakan' => 'Pengembangan budaya sadar bencana'
            ],
            [
                'id_sop' => 1,
                'tindakan' => 'Identifikasi dan pengenalan secara pasti terhadap sumber bahaya/ ancaman bencana'
            ],
            [
                'id_sop' => 1,
                'tindakan' => 'Pemantauan penggunaan teknologi secara tiba-tiba/berangsur-angsur berpotensi sumber bahaya/ancaman'
            ],
            [
                'id_sop' => 1,
                'tindakan' => 'Pengenalan tata ruang dan lingkungan hidup'
            ],
            [
                'id_sop' => 1,
                'tindakan' => 'Pengorganisasian, pemasangan, pegujian sistem peringatan dini'
            ],
            [
                'id_sop' => 1,
                'tindakan' => 'Penyebarluasan informasi tentang peringatan bencana'
            ],
            [
                'id_sop' => 1,
                'tindakan' => 'Penyediaan barang perlatan untuk pencegahan pemulihan prasarana dan sarana'
            ],
            [
                'id_sop' => 2,
                'tindakan' => 'Pengkajian secara cepat dan tepat terhadap lokasi, kerusakan dan sumber daya'
            ],
            [
                'id_sop' => 2,
                'tindakan' => 'Penentuan status keadaan darurat bencana'
            ],
            [
                'id_sop' => 2,
                'tindakan' => 'Penyelamatan dan evakuasi masyarakat yang terkena bencana, penampungan dan tempat dini'
            ],
            [
                'id_sop' => 2,
                'tindakan' => 'Pengerahan kebutuhan dasar melalui penyediaan, kebutuhan air bersih dan sanitasi, pangan, sandang, pelayanan kesehatan, pelayanan psycososial'
            ],
            [
                'id_sop' => 2,
                'tindakan' => 'Perlindungan dan prioritas terhadap kelompok rentan'
            ],
            [
                'id_sop' => 2,
                'tindakan' => 'Pemulihan segera prasarana dan sarana vital, memperbaiki dan atau mengganti kerusakan akibat bencana'
            ],
            [
                'id_sop' => 2,
                'tindakan' => 'Melaksanakan monitoring, evaluasi dan pelaporan'
            ],
            [
                'id_sop' => 3,
                'tindakan' => 'Pemulihan sosial psikologis'
            ],
            [
                'id_sop' => 3,
                'tindakan' => 'Pelayanan kesehatan'
            ],
            [
                'id_sop' => 3,
                'tindakan' => 'Rekonsiliasai dan resolusi konflik'
            ],
            [
                'id_sop' => 3,
                'tindakan' => 'Pemulihan sosial, ekonomi dan budaya '
            ],
            [
                'id_sop' => 3,
                'tindakan' => 'Pemulihan keamanan dan  ketertiban'
            ],
            [
                'id_sop' => 3,
                'tindakan' => 'Pemulihan fungsi pemerintahan'
            ],
            [
                'id_sop' => 3,
                'tindakan' => 'Pemulihan fungsi pelayanan publik'
            ],
            [
                'id_sop' => 3,
                'tindakan' => 'Rekontruksi'
            ],

        ]);

        //bencana kekeringan
        DetailSop::insert([
            [
                'id_sop' => 4,
                'tindakan' => 'Memanfaatkan sumber air yang ada secara efektif dan efisien'
            ],
            [
                'id_sop' => 4,
                'tindakan' => 'Memprioritaskan pemanfaatan sumber air yang tersedia untuk keperluan air baku untuk air bersih'
            ],
            [
                'id_sop' => 4,
                'tindakan' => 'Menanam pohon sebanyak banyaknya di lingkungan kita'
            ],
            [
                'id_sop' => 4,
                'tindakan' => 'Memberikan perlindungan sumbersumber air bersih yang tersedia'
            ],
            [
                'id_sop' => 4,
                'tindakan' => 'Melakukan panen dan konservasi air'
            ],
            [
                'id_sop' => 4,
                'tindakan' => 'Membuat dan memperbanyak daerah resapan air dengan tidak menutup semua permukaan dengan plester semen atau ubin keramik'
            ],
            [
                'id_sop' => 4,
                'tindakan' => 'Membuat waduk (embung) disesuaikan dengan keadaan lingkungan'
            ],
            [
                'id_sop' => 5,
                'tindakan' => 'Membuat sumur pantek atau sumur bor untuk mendapatkan air'
            ],
            [
                'id_sop' => 5,
                'tindakan' => 'Menyediakan air bersih dengan mobil tangka yang sudah disediakan oleh dinas terkait'
            ],
            [
                'id_sop' => 5,
                'tindakan' => 'Melakukan penyemaian hujan buatan di daerah tangkapan hujan'
            ],
            [
                'id_sop' => 5,
                'tindakan' => 'Menyediakan pompa air'
            ],
            [
                'id_sop' => 5,
                'tindakan' => 'Melakukan pengaturan pemberian air bagi pertanian secara darurat seperti gilir giring'
            ],
            [
                'id_sop' => 6,
                'tindakan' => 'Pemulihan sosial psikologis'
            ],
            [
                'id_sop' => 6,
                'tindakan' => 'Pelayanan kesehatan'
            ],
            [
                'id_sop' => 6,
                'tindakan' => 'Rekonsiliasai dan resolusi konflik'
            ],
            [
                'id_sop' => 6,
                'tindakan' => 'Pemulihan sosial, ekonomi dan budaya '
            ],
        ]);

        //bencana longsor
        DetailSop::insert([
            [
                'id_sop' => 7,
                'tindakan' => 'Pembuatan bangunan penahan, jangkar (anchor), dan pilling'
            ],
            [
                'id_sop' => 7,
                'tindakan' => 'Hindarkan daerah rawan bencana untuk pembangunan pemukiman dan fasilitas utama lainnya'
            ],
            [
                'id_sop' => 7,
                'tindakan' => 'Persiapkan dukungan logistik:
                a.Makanan siap saji dan minuman\n
                b.Lampu senter dan baterai cadangan
                c.Uang tunai secukupnya
                d.Obatobatan khusus sesuai pemakai'
            ],
            [
                'id_sop' => 7,
                'tindakan' => 'Mendirikan bangunan dengan fondasi yang kuat'
            ],
            [
                'id_sop' => 7,
                'tindakan' => 'Simak informasi dari radio mengenai informasi hujan dan kemungkinan tanah longsor'
            ],
            [
                'id_sop' => 7,
                'tindakan' => 'Pembuatan tanggul penahan untuk runtuhan batuan (rock fall)'
            ],
            [
                'id_sop' => 7,
                'tindakan' => 'Penutupan rekahan di atas lereng untuk mencegah air masuk secara cepat ke dalam tanah'
            ],
            [
                'id_sop' => 7,
                'tindakan' => 'Pondasi tiang pancang sangat disarankan untuk menghindari bahaya liquefaction (infeksi cairan)'
            ],
            [
                'id_sop' => 7,
                'tindakan' => 'Apabila pihak berwenang menginstruksikan untuk evakuasi, segera lakukan hal tersebut'
            ],
            [
                'id_sop' => 7,
                'tindakan' => 'Dalam beberapa kasus relokasi sangat disarankan. Menanami kawasan yang gersang dengan tanaman yang memiliki akar kuat, banyak dan dalam seperti nangka, durian, pete, kaliandra dan sebagainya'
            ],
            [
                'id_sop' => 7,
                'tindakan' => 'Tidak mendirikan bangunan permanen di daerah tebing dan tanah yang tidak stabil (tanah gerak)'
            ],
            [
                'id_sop' => 7,
                'tindakan' => 'Membuat selokan yang kuat untuk mengalirkan air hujan'
            ],
            [
                'id_sop' => 7,
                'tindakan' => 'Waspada ketika curah hujan tinggi'
            ],
            [
                'id_sop' => 7,
                'tindakan' => 'Jangan menggunduli hutan dan menebang pohon sembarangan'
            ],
            [
                'id_sop' => 8,
                'tindakan' => 'Segera evakuasi untuk menjauhi suara gemuruh atau arah datangnya longsoran'
            ],
            [
                'id_sop' => 8,
                'tindakan' => 'Apabila mendengar suara sirine peringatan longsor, segera evakuasi ke arah zona evakuasi yang telah ditentukan. (Beberapa wilayah di Indonesia telah terpasang Sistem Peringatan Dini Longsor)'
            ],
            [
                'id_sop' => 8,
                'tindakan' => 'Apabila Anda di luar, cari tempat yang lapang dan perhatikan sisi tebih atau tanah yang mengalami longsor'
            ],
            [
                'id_sop' => 8,
                'tindakan' => 'Apabila Anda di dalam rumah dan terdengar suara gemuruh, segera ke luar cari tempat lapang dan tanpa penghalang'
            ],
            [
                'id_sop' => 9,
                'tindakan' => 'Hindari wilayah longsor karena kondisi tanah yang labil'
            ],
            [
                'id_sop' => 9,
                'tindakan' => 'Apabila hujan turun setelah longsor terjadi, antisipasi longsor susulan'
            ],
            [
                'id_sop' => 9,
                'tindakan' => 'Jangan segera kembali ke rumah Anda, perhatikan apakah longsor susulan masih akan terjadi'
            ],
            [
                'id_sop' => 9,
                'tindakan' => 'Apabila Anda diminta untuk membantu proses evakuasi, gunakan sepatu khusus dan peralatan yang menjamin keselamatan Anda'
            ],
            [
                'id_sop' => 9,
                'tindakan' => 'Perhatikan kondisi tanah sebagai pijakan yang kokoh bagi langkah Anda'
            ],
            [
                'id_sop' => 9,
                'tindakan' => 'Apabila harus menghadapi reruntuhan bangunan untuk menyelamatkan korban, pastikan tidak menimbulkan dampak yang lebih buruk atau menunggu pihak berwenang untuk melakukan evakuasi korban'
            ],
        ]);

        //bencana puting beliung
        DetailSop::insert([
            [
                'id_sop' => 10,
                'tindakan' => 'Menyusun peta rawan bencana putting beliung'
            ],
            [
                'id_sop' => 10,
                'tindakan' => 'Sosialisasikan putting beliung kepada masyarakat baik tandatanda maupun cara berlindung'
            ],
            [
                'id_sop' => 10,
                'tindakan' => 'Memangkas ranting pohon besar dan menebang pohon yang sudah rapuh'
            ],
            [
                'id_sop' => 10,
                'tindakan' => 'Selalu ikuti informasi prakiraan cuaca'
            ],
            [
                'id_sop' => 10,
                'tindakan' => 'Jika tidak penting sekali, hindari bepergian apabila langit tampak awan gelap dan menggantung'
            ],
            [
                'id_sop' => 10,
                'tindakan' => 'Siapkan lokasi aman untuk mengungsi'
            ],
            [
                'id_sop' => 10,
                'tindakan' => 'Segera menjauh dari lokasi kejadian jika memungkinkan karena puting beliung berlangsung sangat cepat'
            ],
            [
                'id_sop' => 10,
                'tindakan' => 'Jika sedang di dalam rumah semi permanen/kayu hingga bangunan bergoyang, segeralah keluar rumah untuk mencari perlindungan di tempat lain karena bisa jadi rumah tersebut akan roboh'
            ],
            [
                'id_sop' => 10,
                'tindakan' => 'Hindari berteduh di bawah pohon besar, baliho, papan reklame, dan jalur kabel listrik '
            ],
            [
                'id_sop' => 10,
                'tindakan' => 'Bersabarlah untuk tetap berlindung di tempat aman. Angin puting beliung biasanya terjadi 510 menit'
            ],
            [
                'id_sop' => 11,
                'tindakan' => 'Berlindung pada bangunan yang kokoh dan aman begitu angin kencang menerjang'
            ],
            [
                'id_sop' => 11,
                'tindakan' => 'Segera menjauh dari lokasi kejadian jika memungkinkan karena puting beliung berlangsung sangat cepat'
            ],
            [
                'id_sop' => 11,
                'tindakan' => 'Jika sedang di dalam rumah semi permanen/kayu hingga bangunan bergoyang, segeralah keluar rumah untuk mencari perlindungan di tempat lain karena bisa jadi rumah tersebut akan roboh'
            ],
            [
                'id_sop' => 11,
                'tindakan' => 'Hindari berteduh di bawah pohon besar, baliho, papan reklame, dan jalur kabel listrik '
            ],
            [
                'id_sop' => 11,
                'tindakan' => 'Bersabarlah untuk tetap berlindung di tempat aman. Angin puting beliung biasanya terjadi 510 menit'
            ],
            [
                'id_sop' => 12,
                'tindakan' => 'Melakukan koordinasi dengan pihak dalam pertolongan para korban'
            ],
            [
                'id_sop' => 12,
                'tindakan' => 'Mendirikan posko dan evakuasi untuk korban yang selamat'
            ],
            [
                'id_sop' => 12,
                'tindakan' => 'Mendirikan tempat penampungan korban bencana secara darurat'
            ],
            [
                'id_sop' => 12,
                'tindakan' => 'Melakukan koordinasi bahan bantuan'
            ],
            [
                'id_sop' => 12,
                'tindakan' => 'Melakukan evakuasi pelaksanaan pertolongan dan perkiraan kerugian material'
            ],
        ]);
    }
}
