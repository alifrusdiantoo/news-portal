<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/news', function () {
    return view('news', ['title' => 'News', 'articles' => [
        [
            'id' => "1",
            'slug' => 'pernyataan-resmi-chelsea-soal-kasus-rasis-enzo-ke-skuad-perancis',
            'img' => 'https://akcdn.detik.net.id/community/media/visual/2024/07/16/enzo-fernandez-chelsea-timnas-argentina-copa-america-2024.jpeg?w=700&q=90',
            'title' => 'Pernyataan Resmi Chelsea soal Kasus Rasis Enzo ke Skuad Perancis',
            'author' => 'Fabrizio Romano',
            'date' => '18 Juli 2024',
            'text' => 'Chelsea membuat pernyataan resmi seusai gelandangnya melakukan aksi rasisme ke skuad Perancis saat bersama timnas Argentina. Argentina berhasil menjuarai Copa America 2024 setelah mengalahkan Kolombia dengan skor 1-0 di Stadion Hard Rock padda Senin (15/7/2024)',
            'tag' => 'Sport'
        ],
        [
            'id' => "2",
            'slug' => "hasil-timnas-indonesia-vs-filipina-6-0-Arlyansyah-Iqbal-bersinar-garuda-pesta",
            'img' => 'https://asset.kompas.com/crops/TGLBFTN9NR0rZiFOXKLTRgoURUo=/0x112:3804x2648/750x500/data/photo/2024/07/17/6697cd0dbcea6.jpg',
            'title' => 'Hasil Timnas Indonesia Vs Filipina 6-0: Arlyansyah-Iqbal Bersinar, Garuda Pesta',
            'author' => 'Ahcmad Albar',
            'date' => '18 Juli 2024',
            'text' => 'Timnas U19 Indonesia meraih kemenangan 6-0 atas Filipina dalam matchday pertama fase Grup A Piala AFF U19 2024. Laga timnas Indonesia vs Filipina dalam jadwal Piala AFF U19 2024 bergulir di Stadion Gelora Bung Tomo (GBT) pada Rabu (17/7/2024)....',
            'tag' => 'Sport'
        ],
    ]]);
});

Route::get('/news/{slug}', function ($slug) {
    $articles = [
        [
            'id' => '1',
            'slug' => 'pernyataan-resmi-chelsea-soal-kasus-rasis-enzo-ke-skuad-perancis',
            'img' => 'https://akcdn.detik.net.id/community/media/visual/2024/07/16/enzo-fernandez-chelsea-timnas-argentina-copa-america-2024.jpeg?w=700&q=90',
            'title' => 'Pernyataan Resmi Chelsea soal Kasus Rasis Enzo ke Skuad Perancis',
            'author' => 'Fabrizio Romano',
            'date' => '18 Juli 2024',
            'text' => 'Chelsea membuat pernyataan resmi seusai gelandangnya melakukan aksi rasisme ke skuad Perancis saat bersama timnas Argentina. Argentina berhasil menjuarai Copa America 2024 setelah mengalahkan Kolombia dengan skor 1-0 di Stadion Hard Rock padda Senin (15/7/2024). Setelah itu, gelandang Argentina, Enzo Fernandez, melakukan siaran langsung di media sosial Instagram guna memperlihatkan perayaan Argentina juara Copa America 2024. Penggemar mendengar nyanyian, yang diduga bernada rasialisme. Nyanyian itu ditujukan untuk pemain Perancis yang keturunan Afrika dan negara lainnya, tetapi berpaspor Perancis.',
            'tag' => 'Sport'
        ],
        [
            'id' => "2",
            'slug' => "hasil-timnas-indonesia-vs-filipina-6-0-Arlyansyah-Iqbal-bersinar-garuda-pesta",
            'img' => 'https://asset.kompas.com/crops/TGLBFTN9NR0rZiFOXKLTRgoURUo=/0x112:3804x2648/750x500/data/photo/2024/07/17/6697cd0dbcea6.jpg',
            'title' => 'Hasil Timnas Indonesia Vs Filipina 6-0: Arlyansyah-Iqbal Bersinar, Garuda Pesta',
            'author' => 'Ahcmad Albar',
            'date' => '18 Juli 2024',
            'text' => 'Timnas U19 Indonesia meraih kemenangan 6-0 atas Filipina dalam matchday pertama fase Grup A Piala AFF U19 2024. Laga timnas Indonesia vs Filipina dalam jadwal Piala AFF U19 2024 bergulir di Stadion Gelora Bung Tomo (GBT) pada Rabu (17/7/2024). Timnas Indonesia membuka keunggulan 1-0 atas Filipina seusai Arlyansyah Abdulmanan mencatatkan namanya di papan skor pada menit ke-12. Gol bermula saat Dony Tri Pamungkas melakukan pergerakan dari sisi kiri. Ia lalu melepaskan umpan tarik kepada Arlyansyah yang sudah menunggu di tengah kotak penalti. Arlyansyah pun menyodorkan kakinya guna menyambut bola umpan Dony Tri Pamungkas dan menjebol gawang Filipina.',
            'tag' => 'Sport'
        ],
    ];

    $article = Arr::first($articles, function ($article) use ($slug) {
        return $article['slug'] == $slug;
    });

    return view('article', ['article' => $article]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
