<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Category;
use App\Models\Contact;
use App\Models\HomeSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@omk.id',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create home settings
        HomeSetting::create([
            'hero_title' => 'Orang Muda Katolik',
            'hero_subtitle' => 'Bersama dalam Iman, Tumbuh dalam Kasih, Bergerak untuk Sesama',
            'hero_tagline' => 'Katolik',
            'welcome_title' => 'Sambutan Ketua OMK',
            'welcome_name' => 'Ketua OMK',
            'welcome_message' => 'Selamat datang di website resmi Orang Muda Katolik. Kami adalah komunitas anak muda Katolik yang bersatu dalam semangat iman, harapan, dan kasih. Mari bergabung bersama kami dalam setiap kegiatan dan pelayanan gereja.',
            'statistic_member' => 50,
            'statistic_activity' => 25,
            'brand_name' => 'OMK Paroki',
            'footer_description' => 'Komunitas Orang Muda Katolik yang bergerak dalam semangat iman, harapan, dan kasih untuk pelayanan gereja dan masyarakat.',
            'footer_copyright' => '© ' . date('Y') . ' OMK Paroki. Semua hak dilindungi. Dibuat dengan ❤️ untuk pelayanan gereja.',
        ]);

        // Create about
        About::create([
            'history' => 'Orang Muda Katolik (OMK) adalah organisasi pemuda Gereja Katolik yang berdiri untuk mewadahi dan memberdayakan kaum muda dalam kehidupan menggereja. OMK hadir sebagai wadah pembinaan iman, pengembangan diri, dan aksi sosial bagi kaum muda Katolik di lingkungan paroki.',
            'vision' => 'Menjadi komunitas orang muda Katolik yang beriman, berdedikasi, dan berdampak bagi masyarakat.',
            'mission' => "1. Membangun iman kaum muda melalui kegiatan rohani dan pembinaan\n2. Mengembangkan potensi dan bakat kaum muda\n3. Berpartisipasi aktif dalam kegiatan gereja dan masyarakat\n4. Menjalin persaudaraan antar sesama anggota",
            'goals' => 'Terbentuknya generasi muda Katolik yang tangguh, beriman mendalam, dan mampu menjadi terang bagi sesama.',
            'pastor_name' => 'Rm. Pastor Paroki',
            'pastor_bio' => 'Bapak pendamping OMK yang membimbing dan mendampingi kegiatan OMK.',
        ]);

        // Create categories
        Category::create(['name' => 'Kegiatan Rohani', 'slug' => 'kegiatan-rohani']);
        Category::create(['name' => 'Kegiatan Sosial', 'slug' => 'kegiatan-sosial']);
        Category::create(['name' => 'Kegiatan Seni & Budaya', 'slug' => 'kegiatan-seni-budaya']);
        Category::create(['name' => 'Olahraga', 'slug' => 'olahraga']);
        Category::create(['name' => 'Rekoleksi', 'slug' => 'rekoleksi']);

        // Create contact
        Contact::create([
            'address' => 'Gereja Paroki, Jl. Gereja No. 1, Kota',
            'email' => 'omk@gereja.id',
            'phone' => '081234567890',
            'instagram' => '@omk_paroki',
            'maps' => 'Gereja Paroki, Jl. Gereja No. 1, Kota',
        ]);
    }
}
