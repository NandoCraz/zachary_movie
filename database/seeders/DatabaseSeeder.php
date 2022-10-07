<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\User;
use App\Models\Rating;
use App\Models\genre_movie;
use App\Models\MovieRating;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();

        Movie::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'superadmin2022@zmovie.com',
            'password' => bcrypt('adminarno2022'),
            'image' => 'profileImages/adminArno.jpg',
            'role' => 'admin',
        ]);

        // MovieRating::create([
        //     'user_id' => 1,
        //     'movie_id' => 1,
        //     'rating' => 89
        // ]);
        // MovieRating::create([
        //     'user_id' => 1,
        //     'movie_id' => 2,
        //     'rating' => 87
        // ]);
        // MovieRating::create([
        //     'user_id' => 1,
        //     'movie_id' => 3,
        //     'rating' => 89
        // ]);
        // MovieRating::create([
        //     'user_id' => 1,
        //     'movie_id' => 4,
        //     'rating' => 87
        // ]);
        // MovieRating::create([
        //     'user_id' => 1,
        //     'movie_id' => 5,
        //     'rating' => 87
        // ]);
        // MovieRating::create([
        //     'user_id' => 2,
        //     'movie_id' => 1,
        //     'rating' => 95
        // ]);
        // MovieRating::create([
        //     'user_id' => 2,
        //     'movie_id' => 2,
        //     'rating' => 78
        // ]);
        // MovieRating::create([
        //     'user_id' => 2,
        //     'movie_id' => 3,
        //     'rating' => 67
        // ]);
        // MovieRating::create([
        //     'user_id' => 2,
        //     'movie_id' => 4,
        //     'rating' => 98
        // ]);
        // MovieRating::create([
        //     'user_id' => 2,
        //     'movie_id' => 5,
        //     'rating' => 57
        // ]);
        // MovieRating::create([
        //     'user_id' => 3,
        //     'movie_id' => 1,
        //     'rating' => 89
        // ]);
        // MovieRating::create([
        //     'user_id' => 3,
        //     'movie_id' => 2,
        //     'rating' => 56
        // ]);
        // MovieRating::create([
        //     'user_id' => 3,
        //     'movie_id' => 3,
        //     'rating' => 80
        // ]);
        // MovieRating::create([
        //     'user_id' => 3,
        //     'movie_id' => 4,
        //     'rating' => 59
        // ]);
        // MovieRating::create([
        //     'user_id' => 3,
        //     'movie_id' => 5,
        //     'rating' => 60
        // ]);
        MovieRating::create([
            'user_id' => 4,
            'movie_id' => 1,
            'rating' => 4.5
        ]);
        MovieRating::create([
            'user_id' => 4,
            'movie_id' => 2,
            'rating' => 4
        ]);
        // MovieRating::create([
        //     'user_id' => 4,
        //     'movie_id' => 3,
        //     'rating' => 69
        // ]);
        // MovieRating::create([
        //     'user_id' => 4,
        //     'movie_id' => 4,
        //     'rating' => 81
        // ]);
        // MovieRating::create([
        //     'user_id' => 4,
        //     'movie_id' => 5,
        //     'rating' => 77
        // ]);

        Genre::create([
            'nama' => 'Sci-Fi',
            'slug' => 'sci-fi'
        ]);
        Genre::create([
            'nama' => 'Animation',
            'slug' => 'animation'
        ]);
        Genre::create([
            'nama' => 'Action',
            'slug' => 'action'
        ]);

        $genre = Genre::all();

        Movie::all()->each(function ($movie) use ($genre) {
            $movie->genre()->attach(
                $genre->random(rand(1, 3))->pluck('id')->toArray()
            );
        });


        // User::create([
        //     'name' => 'Zachary De Arno',
        //     'email' => 'zacharyde@gmail.com',
        //     'password' => bcrypt('zachary123'),
        // ]);
        // User::create([
        //     'name' => 'Shin Chronous',
        //     'email' => 'shinch@gmail.com',
        //     'password' => bcrypt('shin123'),
        // ]);

        // genre_movie::create([
        //     'movie_id' => 1,
        //     'genre_id' => 1,
        // ]);
        // genre_movie::create([
        //     'movie_id' => 1,
        //     'genre_id' => 3,
        // ]);
        // genre_movie::create([
        //     'movie_id' => 3,
        //     'genre_id' => 1,
        // ]);
        // genre_movie::create([
        //     'movie_id' => 3,
        //     'genre_id' => 3,
        // ]);
        // genre_movie::create([
        //     'movie_id' => 2,
        //     'genre_id' => 3,
        // ]);
        // genre_movie::create([
        //     'movie_id' => 4,
        //     'genre_id' => 2,
        // ]);
        // genre_movie::create([
        //     'movie_id' => 5,
        //     'genre_id' => 2,
        // ]);
        // genre_movie::create([
        //     'movie_id' => 5,
        //     'genre_id' => 3,
        // ]);

        //Movie::create([
        //     'user_id' => 1,
        //     'judul' => 'Spiderman : Far From Home',
        //     'slug' => 'spiderman-far-from-home',
        //     'excerpt' => 'Peter Parker (Tom Holland) tengah mengunjungi Eropa untuk liburan panjang bersama temaan-temanya. Sayangnya , Parker tidak bisa dengan tenang menikmati liburannya, karena Nick Fury datang secara tiba-tiba di kamar hotelnya. Selama di Eropa pun Peter harus menghadapi banyak musuh mulai dari Hydro Man, Sandman dan Molten Man.',
        //     'sutradara' => 'Jon Watts',
        //     'rating' => 86,
        //     'sinopsis' => '<p>Peter Parker (Tom Holland) tengah mengunjungi Eropa untuk liburan panjang bersama temaan-temanya. Sayangnya , Parker tidak bisa dengan tenang menikmati liburannya, karena Nick Fury datang secara tiba-tiba di kamar hotelnya. Selama di Eropa pun Peter harus menghadapi banyak musuh mulai dari Hydro Man, Sandman dan Molten Man.</p><p>Spider-Man: Far From Home adalah film superhero Amerika tahun 2019 berdasarkan karakter Marvel Comics Spider-Man, diproduksi bersama oleh Columbia Pictures dan Marvel Studios, dan didistribusikan oleh Sony Pictures Releasing. Ini adalah sekuel Spider-Man: Homecoming (2017) dan film ke-23 di Marvel Cinematic Universe (MCU). Film ini disutradarai oleh Jon Watts, ditulis oleh Chris McKenna dan Erik Sommers, dan dibintangi oleh Tom Holland sebagai Peter Parker / Spider-Man, bersama Samuel L. Jackson, Zendaya, Cobie Smulders, Jon Favreau, J. B. Smoove, Jacob Batalon, Martin Starr , Marisa Tomei, dan Jake Gyllenhaal.</p><p>Dalam film tersebut, Parker direkrut oleh Nick Fury (Jackson) dan Mysterio (Gyllenhaal) untuk menghadapi Elementals saat dia sedang dalam perjalanan sekolah ke Eropa. Diskusi untuk sekuel Spider-Man: Homecoming dimulai pada Oktober 2016, dan proyek tersebut dikonfirmasi akhir tahun itu. Holland, Watts, dan para penulis siap untuk kembali pada akhir tahun 2017. Pada tahun 2018, Jackson dan Gyllenhaal bergabung dengan para pemeran sebagai Fury dan Misteri, masing-masing. Holland mengungkapkan judul sekuel sebelum syuting, yang dimulai Juli itu dan berlangsung di Inggris, Republik Ceko, Italia, dan wilayah metropolitan New York. Produksi selesai pada Oktober 2018. Kampanye pemasaran adalah salah satu yang paling mahal untuk sebuah film yang pernah ada dan berusaha untuk menghindari mengungkapkan spoiler untuk Avengers: Endgame sebelum rilis April 2019.</p>'
        // ]);
        // Movie::create([
        //     'user_id' => 1,
        //     'judul' => 'Black Panther 2 : Wakanda Forever',
        //     'slug' => 'black-panther-2-wakanda-forever',
        //     'excerpt' => 'Black Panther 2 berkisah tentang Ratu Romanda, Shuri, M Baku (Winston Duke), dan Okoye (Danai Gurira), yang bertarung guna melindungi negaranya dari campur tangan kekuatan dunia setelah kematian Raja T Challa. Para rakyat Wakanda pun harus berusaha keras untuk menyatukan kekuatan dan melindungi negara mereka.',
        //     'sutradara' => 'Ryan Coogler',
        //     'rating' => 94,
        //     'sinopsis' => '<p>Black Panther 2 berkisah tentang Ratu Romanda, Shuri, M Baku Winston Duke, dan Okoye Danai Gurira, yang bertarung guna melindungi negaranya dari campur tangan kekuatan dunia setelah kematian Raja T Challa. Para rakyat Wakanda pun harus berusaha keras untuk menyatukan kekuatan dan melindungi negara mereka.</p><p>Black Panther: Wakanda Forever adalah film superhero Amerika yang akan datang berdasarkan karakter Marvel Comics Black Panther. Diproduksi oleh Marvel Studios dan didistribusikan oleh Walt Disney Studios Motion Pictures, film ini dimaksudkan untuk menjadi sekuel Black Panther 2018 dan film ke-30 di Marvel Cinematic Universe MCU. Film ini disutradarai oleh Ryan Coogler, yang ikut menulis skenario dengan Joe Robert Cole, dan dibintangi oleh Letitia Wright, Lupita Nyong o, Danai Gurira, Winston Duke, Florence Kasumba, Dominique Thorne, Michaela Coel, Tenoch Huerta, Martin Freeman , dan Angela Bassett.</p><p>Dalam film tersebut, para pemimpin kerajaan Wakanda berjuang untuk melindungi bangsa mereka setelah kematian Raja T Challa. Ide untuk sekuel dimulai setelah rilis Black Panther pada Februari 2018. Coogler bernegosiasi untuk kembali sebagai sutradara pada bulan-bulan berikutnya, dan Marvel Studios secara resmi mengkonfirmasi pengembangan sekuel pada pertengahan 2019. Rencana untuk film berubah pada Agustus 2020 ketika Black Panther membintangi Chadwick Boseman meninggal karena kanker usus besar, dengan Marvel memilih untuk tidak menyusun kembali perannya sebagai T Challa. Anggota pemeran utama lainnya dari film pertama dikonfirmasi untuk kembali pada November itu, dan judulnya diumumkan pada Mei 2021. Produksi awalnya berlangsung dari akhir Juni hingga awal November 2021, di Atlanta dan Brunswick, Georgia, serta di sekitar Massachusetts, sebelum jeda untuk memungkinkan Wright pulih dari cedera yang diderita selama pembuatan film. Produksi dilanjutkan pada pertengahan Januari 2022 dan selesai pada akhir Maret di Puerto Rico.</p>'
        // ]);
        // Movie::create([
        //     'user_id' => 2,
        //     'judul' => 'Dr. Strange',
        //     'slug' => 'dr-strange',
        //     'excerpt' => 'Dr. Stephen Strange mengalami sebuah kecelakaan yang fatal yang merusak kemampuan motorik kedua tangannya. Demi kesembuhannya, ia mengunjungi seorang penyihir misterius bernama Ancient One di Tibet.',
        //     'sutradara' => 'Scott Derrickson',
        //     'rating' => 85,
        //     'sinopsis' => '<p>Dr. Stephen Strange mengalami sebuah kecelakaan yang fatal yang merusak kemampuan motorik kedua tangannya. Demi kesembuhannya, ia mengunjungi seorang penyihir misterius bernama Ancient One di Tibet.</p><p>Doctor Stephen Vincent Strange adalah pahlawan super fiksi yang muncul di American Comic Book dipublikasikan oleh Marvel Comics. Dibuat oleh artis dan konseptualis karakter Steve Ditko dan penulis Stan Lee, karakter pertama muncul di Strange Tales #110.</p><p>Kisah asal karakter tersebut menceritakan bahwa dia pernah menjadi ahli bedah yang brilian tapi egois. Setelah kecelakaan mobil sangat merusak tangannya dan menghalangi kemampuannya untuk melakukan operasi, dia mencari bola untuk memperbaiki dan menemukan Ancient One. Setelah menjadi salah satu murid Sorcerer Supreme, ia menjadi praktisi seni mistik maupun bela diri. Seiring dengan mengetahui banyak mantra yang kuat, dia memiliki kostum dengan dua benda mistis—Cloak of Levitation dan Eye of Agamotto—yang memberinya kekuatan tambahan. Strange dibantu oleh teman dan pelayannya, Wong, dan berbagai macam benda mistis. Dia tinggal di sebuah rumah besar bernama Sanctum Sanctorum, yang terletak di New York City. Kemudian, Strange mengambil gelar Supreme Sorcerer.</p>'
        // ]);
        // Movie::create([
        //     'user_id' => 2,
        //     'judul' => 'Kimi no Nawa',
        //     'slug' => 'kimi-no-nawa',
        //     'excerpt' => 'Mitsuha Miyamizu, seorang siswi sekolah menengah atas yang tinggal di desa fiktif bernama Itomori di daerah pegunungan Hida Prefektur Gifu, mulai bosan dengan kehidupannya di pedesaan tempat dia lahir dan berharap dapat terlahir menjadi pemuda tampan yang hidup di Tokyo pada kehidupan selanjutnya. Kemudian, Taki Tachibana, seorang siswa sekolah menengah atas yang tinggal di Tokyo, terbangun dari tidurnya dan menyadari bahwa dirinya adalah Mitsuha, yang entah bagaimana bisa masuk ke dalam tubuh Taki.',
        //     'sutradara' => 'Makoto Shinkai',
        //     'rating' => 96,
        //     'sinopsis' => '<p>Mitsuha Miyamizu, seorang siswi sekolah menengah atas yang tinggal di desa fiktif bernama Itomori di daerah pegunungan Hida Prefektur Gifu, mulai bosan dengan kehidupannya di pedesaan tempat dia lahir dan berharap dapat terlahir menjadi pemuda tampan yang hidup di Tokyo pada kehidupan selanjutnya. Kemudian, Taki Tachibana, seorang siswa sekolah menengah atas yang tinggal di Tokyo, terbangun dari tidurnya dan menyadari bahwa dirinya adalah Mitsuha, yang entah bagaimana bisa masuk ke dalam tubuh Taki.</p><p>Your Name. (Jepang: 君の名は。; Romaji: Kimi no Na wa; harfiah: Namamu) adalah sebuah film anime Jepang produksi tahun 2016 bergenre fantasi yang ditulis dan disutradarai oleh Makoto Shinkai dan diproduksi oleh CoMix Wave Films. Perancangan tokoh film ini dikerjakan oleh Masayoshi Tanaka, dan penciptaan musik dibuat oleh band rock asal Jepang Radwimps. Film ini dibuat berdasarkan novel karya Makoto Shinkai berjudul sama yang dirilis sebulan sebelum pemutaran perdananya tentang seorang siswi di pedesaan Jepang dan seorang siswa di Tokyo yang saling bertukar tubuh. Film ini dibintangi oleh Ryunosuke Kamiki, Mone Kamishiraishi, Masami Nagasawa dan Etsuko Ichihara.</p><p>Film ini mendapat penerimaan luas yang baik daripada kritikus yang memuji film ini untuk animasi dan dampak emosionalnya, serta kesuksesannya secara komersial dengan menjadi film dengan pendapatan kotor keempat terbesar sepanjang waktu di Jepang, film animasi tradisional dengan pendapatan kotor ketujuh terbesar, dan film anime dengan pendapatan kotor terbesar sepanjang waktu di seluruh dunia, dengan total pendapatan mencapai US$355 juta per 30 Juli 2017.Film ini juga menjuarai Festival Film Sitges ke-49, Los Angeles Film Critics Association Awards tahun 2016, dan Mainichi Film Awards ke-71 untuk kategori Film Animasi Terbaik, serta menjadi nominasi dalam Japan Academy Prize ke-40 untuk kategori Animasi Terbaik Tahun Ini.</p>'
        // ]);
        // Movie::create([
        //     'user_id' => 2,
        //     'judul' => 'One Piece Film : Red',
        //     'slug' => 'one-piece-film-red',
        //     'excerpt' => 'One Piece Film: Red adalah sebuah film aksi-petualangan fantasi anime Jepang tahun 2022 yang disutradarai oleh Gorō Taniguchi dan diproduksi oleh Toei Animation. Ini adalah film fitur kelima belas dari seri film One Piece, berdasarkan manga dengan nama yang sama yang ditulis dan diilustrasikan oleh Eiichiro Oda.',
        //     'sutradara' => 'Gorō Taniguchi',
        //     'rating' => 95,
        //     'sinopsis' => '<p>One Piece Film: Red adalah sebuah film aksi-petualangan fantasi anime Jepang tahun 2022 yang disutradarai oleh Gorō Taniguchi dan diproduksi oleh Toei Animation. Ini adalah film fitur kelima belas dari seri film One Piece, berdasarkan manga dengan nama yang sama yang ditulis dan diilustrasikan oleh Eiichiro Oda.</p><p>Gorō Taniguchi sebelumnya telah menyutradarai OVA 1998, One Piece: Defeat The Pirate Ganzak!, yang diproduksi oleh Production I.G. Itu adalah adaptasi animasi pertama dari manga One Piece, dirilis sebelum serial anime disiarkan dan memiliki pemutaran terbatas di bioskop Jepang. Oda menyatakan bahwa Taniguchi adalah "orang pertama yang menghidupkan Luffy. Setelah pengumuman film pertama pada November 2021, Taniguchi mengatakan bahwa dia ingin mengekspresikan One Piece yang belum pernah dilihat sebelumnya dan dia akan menampilkannya di One Piece Film: Red.</p><p>Ini pertama kali diumumkan pada 21 November 2021 dalam rangka memperingati perilisan anime One Piece episode 1000 dan setelah penayangan episode tersebut, trailer dan poster teaser dirilis pada 21 November 2021. Penayangan perdana dunianya di Nippon Budokan, Tokyo pada tanggal 21 November 2021. 22 Juli 2022, untuk perayaan 25 tahun manga One Piece dan dirilis secara teatrikal pada 6 Agustus 2022 di Jepang. Film ini disebut-sebut akan berputar di sekitar karakter wanita baru bernama Uta. Pada 15 Agustus, film tersebut telah meraup lebih dari 7 miliar yen di Jepang menjadikannya film dengan pendapatan kotor tertinggi dari franchise One Piece sekarang di negara tersebut dan Pada 15 Agustus 2022, film tersebut meraup US$56,34 juta di box office seluruh dunia.</p>'
        // ]);
    }
}
