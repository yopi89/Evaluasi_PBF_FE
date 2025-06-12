1. Install Laravel

laravel new example-app

ini membuat folder terserah Namanya

2. masuk ke vs code 

cd eval_pbf_frontend_latihan

code .

3. buka terminal vs code dan install npm

# Cara sesuai dokumentasi Laravel

cd example-app
npm install && npm run build
composer run dev


# Cara kalo yang dokumentasi Laravel ga bisa maka pake ini

set NODE_OPTIONS=--max-old-space-size=4096

npm install

npm run build

npm run dev

4. .env bagian session driver diganti file

SESSION_DRIVER=file

5. tambahkan/buat ini di env juga

API_BASE_URL=http://localhost:8080

6. pergi ke config -> service dan tambahkan saja di Bawah seperti ini 

 'api' => [
        'api_base_url' => env('API_BASE_URL'),
    ],

7. buat controller di terminal jangan manual

php artisan make:controller MahasiswaController

buat juga untuk dosen

8. buat func index di controller mahasiswa

public function index(){
        $response = Http::get(config('services.api.api_base_url').'/mahasiswa');

        return view ('mahasiswa.index', [
            'mahasiswa' => $response->json()
        ]);
    }

lalu tambahkan use di atas

use Illuminate\Support\Facades\Http;

9. ke resource -> view buat folder mahasiswa

lalu buat file index.blade.php

isi ini
@dd($mahasiswa);

10. lalu ke folder router -> web.php dan tambahkan ini

Route::get('/mahasiswa',[MahasiswaController::class, 'index']);

dan diatasnya tambah ini

use App\Http\Controllers\MahasiswaController;


CODING FE

1. Buat dashboard

a. buat folder layout dan buat file app.blade.php

resource->view->buat folder layout->buat file app.blade.php

b. buat folder pages dan buat file dashboard

resource->view->buat folder pages->buat file dashboard.blade.php

2. Buat routes untuk dashboard

Route::get('/dashboard', [DashboardController::class, 'index']);

lalu ubah ini juga jadi dashboard

Route::get('/', function () {
    return view('pages.dashboard');
});

3. Buat DashboardController

4. Buat file form tampilan tambah dosen

resource->view->dosen->create.blade.php

5. buat route untuk dosen create

Route::get('/dosen/create',[DosenController::class, 'create']);

ctrl+klik tulisan create nya agar langsung menuju DosenControllernya

6. Buat func create

7. ubah action di view create dosen dengan ini

 <form action="/dosen/store" method="POST">

ini untuk membuat function simpan

8. buat route store untuk menyimpan

Route::post('/dosen/store',[DosenController::class, 'store']);

9. buat func store di DosenController

10. buat form edit dengan pergi ke

resource->view->dosen->edit.blade.php

11. buat route untuk dosen edit

Route::get('/dosen/edit/{nidn}',[DosenController::class, 'edit']);

12. buat func edit

13. ubah action di from edit

<form action="/dosen/update" method="POST">

ini buat update file yang di edit

14. buat route update dosen

Route::put('/dosen/update',[DosenController::class, 'update']);

15. buat func update di DosenController

16. buat route delete

Route::delete('/dosen/delete/{nidn}',[DosenController::class, 'destroy']);

17. buat controller destroy untuk menghapus


