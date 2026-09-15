<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\FinishedProduct;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WebsiteContentSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();
        $adminId = $admin ? $admin->id : 1;

        // 1. Seed or Update Products
        $products = [
            [
                'code' => 'FG-01',
                'name' => 'GARAM KERAPAN SAPI',
                'category' => 'Garam Konsumsi',
                'weight_per_pack_gram' => 250,
                'packaging' => '150 gr, 200 gr, 250 gr, 500 gr',
                'stock_packs' => 350,
                'price_per_pack' => 3500,
                'cost_per_pack' => 2000,
                'min_stock_packs' => 50,
                'notes' => 'Garam beryodium yang mengandung yodium minimum 30 ppm untuk konsumsi harian keluarga sehat.',
                'image' => 'asset/images/ptgaram/product-1.jpg',
                'is_active' => true,
            ],
            [
                'code' => 'FG-02',
                'name' => 'GARAM SARCIL',
                'category' => 'Garam Konsumsi',
                'weight_per_pack_gram' => 250,
                'packaging' => '200 gr, 250 gr, 500 gr',
                'stock_packs' => 280,
                'price_per_pack' => 4000,
                'cost_per_pack' => 2200,
                'min_stock_packs' => 40,
                'notes' => 'Garam dapur halus bermutu tinggi, cepat larut dan menyempurnakan rasa hidangan.',
                'image' => 'asset/images/ptgaram/product-2.jpg',
                'is_active' => true,
            ],
            [
                'code' => 'FG-03',
                'name' => 'GARAM BANYU MILI PREMIUM',
                'category' => 'Garam Konsumsi',
                'weight_per_pack_gram' => 500,
                'packaging' => '250 gr, 500 gr, 1.000 gr',
                'stock_packs' => 420,
                'price_per_pack' => 5000,
                'cost_per_pack' => 2800,
                'min_stock_packs' => 50,
                'notes' => 'Produk unggulan CV. Banyu Mili dengan kristal murni putih bersih berstandar SNI.',
                'image' => 'asset/images/ptgaram/product-3.jpg',
                'is_active' => true,
            ],
            [
                'code' => 'FG-04',
                'name' => 'GARAM KEMILAU LOSARANG',
                'category' => 'Garam Konsumsi',
                'weight_per_pack_gram' => 250,
                'packaging' => '200 gr dan 250 gr',
                'stock_packs' => 190,
                'price_per_pack' => 3000,
                'cost_per_pack' => 1800,
                'min_stock_packs' => 30,
                'notes' => 'Garam beryodium ekonomis berkualitas untuk warung dan rumah makan.',
                'image' => 'asset/images/ptgaram/product-4.jpg',
                'is_active' => true,
            ],
            [
                'code' => 'FG-05',
                'name' => 'GARAM KASAR INDUSTRI SAK 50KG',
                'category' => 'Garam Kasar',
                'weight_per_pack_gram' => 50000,
                'packaging' => '25 kg dan 50 kg',
                'stock_packs' => 120,
                'price_per_pack' => 115000,
                'cost_per_pack' => 85000,
                'min_stock_packs' => 20,
                'notes' => 'Garam kristal kasar untuk industri penyamakan kulit, pengawetan ikan, dan water softener.',
                'image' => 'asset/images/ptgaram/product-1.jpg',
                'is_active' => true,
            ],
            [
                'code' => 'FG-06',
                'name' => 'GARAM KASAR WATER TREATMENT',
                'category' => 'Garam Kasar',
                'weight_per_pack_gram' => 50000,
                'packaging' => '50 kg sak karung',
                'stock_packs' => 85,
                'price_per_pack' => 120000,
                'cost_per_pack' => 90000,
                'min_stock_packs' => 15,
                'notes' => 'Garam industri filtrasi resin dan regenerasi water treatment pabrik.',
                'image' => 'asset/images/ptgaram/product-1.jpg',
                'is_active' => true,
            ],
            [
                'code' => 'FG-07',
                'name' => 'GARAM HALUS FOOD GRADE SAK 50KG',
                'category' => 'Garam Halus',
                'weight_per_pack_gram' => 50000,
                'packaging' => '25 kg dan 50 kg',
                'stock_packs' => 95,
                'price_per_pack' => 145000,
                'cost_per_pack' => 105000,
                'min_stock_packs' => 20,
                'notes' => 'Garam murni halus bebas kotoran food grade untuk industri roti, mie, dan bumbu instan.',
                'image' => 'asset/images/ptgaram/product-1.jpg',
                'is_active' => true,
            ],
            [
                'code' => 'FG-08',
                'name' => 'GARAM INDUSTRI ANEKA PANGAN',
                'category' => 'Garam Industri',
                'weight_per_pack_gram' => 25000,
                'packaging' => '25 kg dan 50 kg',
                'stock_packs' => 150,
                'price_per_pack' => 75000,
                'cost_per_pack' => 52000,
                'min_stock_packs' => 25,
                'notes' => 'Garam murni tersertifikasi halal dan BPOM untuk manufaktur pangan berskala besar.',
                'image' => 'asset/images/ptgaram/product-1.jpg',
                'is_active' => true,
            ],
        ];

        foreach ($products as $p) {
            FinishedProduct::updateOrCreate(
                ['code' => $p['code']],
                $p
            );
        }

        // 2. Seed Articles
        $articles = [
            [
                'title' => 'CV. Banyu Mili Kembangkan Industri Garam untuk Menjawab Kebutuhan Pasar Nasional',
                'slug' => 'cv-banyu-mili-kembangkan-industri-garam-untuk-menjawab-kebutuhan-pasar-nasional',
                'category' => 'Berita',
                'image' => 'asset/images/ptgaram/slide-3.jpg',
                'published_at' => '2026-09-15 08:30:00',
                'excerpt' => 'Surabaya, 15 September 2026 - Perkembangan kebutuhan garam di Indonesia terus mengalami peningkatan seiring dengan ekspansi sektor industri pangan dan manufaktur.',
                'content' => "Surabaya, 15 September 2026 – Perkembangan kebutuhan garam di Indonesia terus mengalami peningkatan seiring dengan pertumbuhan pesat industri makanan, farmasi, tekstil, dan pengolahan hasil laut. Menjawab tantangan tersebut, CV. Banyu Mili melakukan modernisasi lini pengolahan dan standardisasi kontrol mutu guna memastikan pasokan kristal garam berdaya saing tinggi.\n\nDireksi CV. Banyu Mili menyampaikan bahwa keberhasilan industri garam nasional berakar pada kemitraan erat dengan petani garam lokal serta adopsi teknologi pencucian (washing) dan iodisasi modern. Dengan kapasitas produksi yang terus ditingkatkan, CV. Banyu Mili siap menyuplai kebutuhan garam konsumsi keluarga maupun garam industri berspesifikasi ketat ke seluruh nusantara.",
                'is_published' => true,
                'created_by' => $adminId,
            ],
            [
                'title' => 'Garam Berkualitas dan Industri Masa Depan: Strategi CV. Banyu Mili Menatap Peluang',
                'slug' => 'garam-berkualitas-dan-industri-masa-depan-strategi-cv-banyu-mili-menatap-peluang',
                'category' => 'Artikel',
                'image' => 'asset/images/ptgaram/slide-2.jpg',
                'published_at' => '2026-09-14 09:15:00',
                'excerpt' => 'Industri pengolahan garam nasional terus bergerak dinamis menuntut inovasi efisiensi energi dan kemurnian produk yang konsisten.',
                'content' => "Industri pengolahan garam nasional kini bergerak menuju era baru di mana efisiensi rantai pasok dan sertifikasi mutu menjadi parameter mutlak. CV. Banyu Mili memposisikan diri sebagai mitra strategis bagi berbagai manufaktur nasional.\n\nMelalui penerapan standar operasional berbasis ISO dan HACCP, setiap butir kristal garam yang diproses melewati tahapan sortir kemurnian, pengeringan terukur, serta pengujian laboratorium berkala sehingga bebas dari kontaminasi logam berat dan kotoran fisik.",
                'is_published' => true,
                'created_by' => $adminId,
            ],
            [
                'title' => 'Ketepatan Produksi Menjadi Kekuatan CV. Banyu Mili dalam Menjawab Kebutuhan Industri',
                'slug' => 'ketepatan-produksi-menjadi-kekuatan-cv-banyu-mili-dalam-menjawab-kebutuhan-industri',
                'category' => 'Berita',
                'image' => 'asset/images/ptgaram/slide-1.jpg',
                'published_at' => '2026-09-13 10:00:00',
                'excerpt' => 'Ketepatan jadwal pengiriman dan kesesuaian kadar NaCl menjadi kunci kepercayaan pelanggan industri terhadap pasokan CV. Banyu Mili.',
                'content' => "Dalam ekosistem manufaktur modern, keterlambatan bahan baku dapat memicu kerugian signifikan pada kelancaran rantai produksi. Sadar akan hal tersebut, CV. Banyu Mili mengintegrasikan sistem inventori pergudangan real-time dengan armada logistik terpercaya.\n\nLayanan pengiriman tepat waktu dengan armada terawat memastikan pasokan garam curah maupun kemasan sak tiba di fasilitas pabrik mitra tanpa kendala.",
                'is_published' => true,
                'created_by' => $adminId,
            ],
            [
                'title' => 'Menjaga Mutu di Tengah Perubahan Industri, CV. Banyu Mili Memperkuat Arah Bisnis',
                'slug' => 'menjaga-mutu-di-tengah-perubahan-industri-cv-banyu-mili-memperkuat-arah-bisnis',
                'category' => 'Artikel',
                'image' => 'asset/images/ptgaram/slide-3.jpg',
                'published_at' => '2026-09-12 11:00:00',
                'excerpt' => 'Kualitas bukan sekadar ukuran produk melainkan pondasi reputasi bisnis yang kokoh di tengah persaingan pasar yang kian dinamis.',
                'content' => "Di era persaingan terbuka, diferensiasi mutu adalah satu-satunya benteng pertahanan yang solid. CV. Banyu Mili menerapkan prinsip perbaikan berkelanjutan (kaizen) pada seluruh lini penanganan garam, mulai dari penerimaan bahan baku kristal mentah hingga pengemasan akhir tahan lembap.",
                'is_published' => true,
                'created_by' => $adminId,
            ],
            [
                'title' => 'Tips Memilih Garam Beryodium Alami Berkualitas untuk Kesehatan Keluarga',
                'slug' => 'tips-memilih-garam-beryodium-alami-berkualitas-untuk-kesehatan-keluarga',
                'category' => 'Resep',
                'image' => 'asset/images/ptgaram/slide-2.jpg',
                'published_at' => '2026-09-11 13:30:00',
                'excerpt' => 'Kenali tanda-tanda garam konsumsi yang higienis, kering, dan mengandung kadar yodium yang cukup untuk mencegah gangguan pertumbuhan.',
                'content' => "Garam beryodium merupakan mikronutrien esensial bagi metabolisme tubuh, fungsi tiroid, dan kecerdasan anak. Memilih garam yang benar-benar berkualitas membutuhkan kejelian ibu bijak.\n\nPastikan memilih garam yang berbutir halus, berwarna putih bersih alami tanpa pemutih kimia berbahaya, tidak mudah basah/menggumpal, dan memiliki izin edar resmi BPOM serta label SNI seperti seluruh varian produk GARAM BANYU MILI.",
                'is_published' => true,
                'created_by' => $adminId,
            ],
            [
                'title' => 'CV. Banyu Mili Membangun Masa Depan Industri Garam melalui Kualitas dan Keandalan',
                'slug' => 'cv-banyu-mili-membangun-masa-depan-industri-garam-melalui-kualitas-dan-keandalan',
                'category' => 'Berita',
                'image' => 'asset/images/ptgaram/slide-1.jpg',
                'published_at' => '2026-09-10 14:00:00',
                'excerpt' => 'Komitmen pada keberlanjutan dan pemberdayaan tambak garam pesisir Jawa Timur menjadi landasan kuat perusahaan.',
                'content' => "Keberlanjutan ekosistem tambak garam pesisir adalah kunci ketahanan garam nasional. CV. Banyu Mili terus membina kelompok tani garam dengan transfer pengetahuan teknik meja kristalisasi geomembran untuk menghasilkan kristal garam mentah dengan kemurnian tinggi.",
                'is_published' => true,
                'created_by' => $adminId,
            ],
        ];

        foreach ($articles as $art) {
            Article::updateOrCreate(
                ['slug' => $art['slug']],
                $art
            );
        }
    }
}
