<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cms\LoginController;
use App\Http\Controllers\Cms\BackgroundController;
use App\Http\Controllers\Cms\ProfilController;
use App\Http\Controllers\Cms\CmsController;
use App\Http\Controllers\Cms\Content\ParameterController;
use App\Http\Controllers\Cms\Content\MenuController;
use App\Http\Controllers\Cms\Information\NewsController;
use App\Http\Controllers\Cms\Information\PhotosController;
use App\Http\Controllers\Cms\Information\VideosController;
use App\Http\Controllers\Cms\Information\BannerController;
use App\Http\Controllers\Cms\Contact\ContactController;
use App\Http\Controllers\Cms\Setting\UserController;
use App\Http\Controllers\Cms\Setting\PegawaiController;
use App\Http\Controllers\Cms\Setting\GroupController;
use App\Http\Controllers\FormPengajuanController;
use App\Http\Controllers\PHPMailerController;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Cms\Information\MonitoringController;
use App\Http\Controllers\Cms\Information\LembagaSeni;
use App\Http\Controllers\Cms\Information\Seniman;
use App\Http\Controllers\Cms\Information\ProgramSeni;

//front
Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('/home', [LandingController::class, 'home2'])->name('landing.home');
Route::get('/show-collections/{slug}', [LandingController::class, 'show_collections'])->name('landing.show-collections');
Route::get('/search', [LandingController::class, 'search'])->name('landing.search');
Route::get('/show-collection-detail/{slug}', [LandingController::class, 'show_collection_detail'])->name('landing.show-collection-detail');
Route::get("email", [PHPMailerController::class, "email"])->name("email");
Route::post("send-email", [PHPMailerController::class, "composeEmail"])->name("send-email");
Route::get('peta-sebaran', [LandingController::class, 'peta_sebaran'])->name('landing.peta-sebaran');
//Route::get('/generate-password/{tulispassword}', function ($request) {
//    return Hash::make(md5($request));
//});
//sitemap
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index']);
Route::get('/sitemap/{id}', [App\Http\Controllers\SitemapController::class, 'posts']);
Route::get('/page-sitemap.xml', [App\Http\Controllers\SitemapController::class, 'page']);

//login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/auth', [LoginController::class, 'auth']);
Route::get('/forgot-password', [LoginController::class, 'forgot_password']);
Route::post('/req-password', [LoginController::class, 'req_password']);
Route::post('/setup-password', [LoginController::class, 'setup_password']);
Route::get('/reset-password/{param}', [LoginController::class, 'reset_password']);
Route::get('/signup', [LoginController::class, 'signup']);
Route::post('/register', [LoginController::class, 'auth_register']);
Route::get('/user-activate/{param}', [LoginController::class, 'user_activate']);

Route::middleware(['auth'])
        ->prefix('monitoring')
        ->group(function () {
            Route::get('/', [MonitoringController::class, 'index'])->name('monitoring');
            Route::get('/json', [MonitoringController::class, 'json'])->name('monitoring');
            Route::get('/add', [MonitoringController::class, 'add'])->name('monitoring');
            Route::get('/pegawai', [MonitoringController::class, 'pegawai'])->name('monitoring');
            Route::get('/provinsi', [MonitoringController::class, 'provinsi'])->name('monitoring');
            Route::get('/kabupaten/{id}', [MonitoringController::class, 'kabupaten'])->name('monitoring');
            Route::post('/store', [MonitoringController::class, 'store'])->name('monitoring');
            Route::post('/update', [MonitoringController::class, 'update'])->name('monitoring');
            Route::post('/update_monitoring', [MonitoringController::class, 'update1'])->name('monitoring');
            Route::post('/update_pegawai', [MonitoringController::class, 'update_pegawai'])->name('monitoring');
            Route::post('/delete_pegawai', [MonitoringController::class, 'delete_pegawai'])->name('monitoring');
            Route::post('/add-pegawai', [MonitoringController::class, 'add_pegawai'])->name('monitoring');
            Route::post('/update_lembaga', [MonitoringController::class, 'update_lembaga'])->name('monitoring');
            Route::post('/update_seniman', [MonitoringController::class, 'update_seniman'])->name('monitoring');
            Route::post('/update_program', [MonitoringController::class, 'update_program'])->name('monitoring');
            Route::post('/simpan_seniman', [MonitoringController::class, 'simpan_seniman'])->name('monitoring');
            Route::post('/simpan_program', [MonitoringController::class, 'simpan_program'])->name('monitoring');
            Route::post('/add_lembaga', [MonitoringController::class, 'add_lembaga'])->name('monitoring');
            Route::post('/del_lembaga', [MonitoringController::class, 'del_lembaga'])->name('monitoring');
            Route::post('/del_seniman', [MonitoringController::class, 'del_seniman'])->name('monitoring');
            Route::post('/del_program', [MonitoringController::class, 'del_program'])->name('monitoring');
            Route::get('/lihat/{id}', [MonitoringController::class, 'lihat'])->name('monitoring');
            Route::get('/ubah/{id}', [MonitoringController::class, 'ubah'])->name('monitoring');
            Route::get('/detil-monitoring/{id}', [MonitoringController::class, 'detil_monitoring'])->name('monitoring');
            Route::get('/monitoring-hasil/{id}', [MonitoringController::class, 'monitoring_hasil'])->name('monitoring');
            Route::get('/monitoring-seniman/{id}', [MonitoringController::class, 'monitoring_hasil2'])->name('monitoring');
            Route::get('/monitoring-program/{id}', [MonitoringController::class, 'monitoring_hasil3'])->name('monitoring');
            Route::get('/get-pegawai/{id}', [MonitoringController::class, 'get_pegawai'])->name('monitoring');
        });
        
Route::middleware(['auth'])
        ->prefix('parameter')
        ->group(function () {
            Route::get('/', [ParameterController::class, 'index']);
            Route::get('/json', [ParameterController::class, 'json']);
            Route::post('/store', [ParameterController::class, 'store']);
            Route::post('/destroy', [ParameterController::class, 'destroy']);
        });

Route::middleware(['auth'])
        ->prefix('menu')
        ->group(function () {
            Route::get('/', [MenuController::class, 'index']);
            Route::get('/json', [MenuController::class, 'json']);
            Route::get('/add/{id}', [MenuController::class, 'form']);
            Route::get('/edit/{id}', [MenuController::class, 'form']);
            Route::post('/store', [MenuController::class, 'store']);
            Route::post('/destroy', [MenuController::class, 'destroy']);
        });
        
Route::middleware(['auth'])
        ->prefix('news')
        ->group(function () {
            Route::get('/', [NewsController::class, 'index']);
            Route::get('/json', [NewsController::class, 'json']);
            Route::get('/form/{id}', [NewsController::class, 'form']);
            Route::post('/store', [NewsController::class, 'store']);
            Route::post('/news-approval', [NewsController::class, 'news_approval']);
            Route::post('/destroy', [NewsController::class, 'destroy']);
            Route::get('/kabupaten', [NewsController::class, 'kabupaten']);
            Route::get('/check_slug', [NewsController::class, 'check_slug']);
        });
        
Route::middleware(['auth'])
        ->prefix('user')
        ->group(function () {
            Route::get('/', [UserController::class, 'index']);
            Route::get('/json', [UserController::class, 'json']);
            Route::post('/store', [UserController::class, 'store']);
            Route::post('/destroy', [UserController::class, 'destroy']);
            Route::post('/change', [UserController::class, 'change']);
        });
        
Route::middleware(['auth'])
        ->prefix('lembaga')
        ->group(function () {
            Route::get('/', [LembagaSeni::class, 'index'])->name('lembaga');
            Route::get('/json', [LembagaSeni::class, 'json'])->name('lembaga');
            Route::get('/detil/{id}', [LembagaSeni::class, 'detil'])->name('lembaga');
            Route::get('/provinsi', [LembagaSeni::class, 'Provinsi'])->name('lembaga');
            Route::get('/kabupaten/{id_provinsi}', [LembagaSeni::class, 'Kabupaten'])->name('lembaga');
            Route::post('update', [LembagaSeni::class, 'Update'])->name('lembaga');
            Route::post('delete', [LembagaSeni::class, 'Delete'])->name('lembaga');
        });
        
Route::middleware(['auth'])
        ->prefix('seniman')
        ->group(function () {
            Route::get('/', [Seniman::class, 'index'])->name('seniman');
            Route::get('/json', [Seniman::class, 'json'])->name('seniman');
            Route::get('/detil/{id}', [Seniman::class, 'detil'])->name('seniman');
            Route::get('/detil-seniman/{id}', [Seniman::class, 'detil2'])->name('seniman');
            Route::post('/update', [Seniman::class, 'Update'])->name('seniman');
            Route::post('/delete', [Seniman::class, 'Delete'])->name('seniman');
        });
        
Route::middleware(['auth'])
        ->prefix('program-seni')
        ->group(function () {
            Route::get('/', [ProgramSeni::class, 'index'])->name('program-seni');
            Route::get('/json', [ProgramSeni::class, 'json'])->name('program-seni');
            Route::get('/detil/{id}', [ProgramSeni::class, 'detil'])->name('program-seni');
            Route::get('/detil-program/{id}', [ProgramSeni::class, 'detil2'])->name('program-seni');
            Route::post('/update', [ProgramSeni::class, 'Update'])->name('program-seni');
            Route::post('/delete', [ProgramSeni::class, 'Delete'])->name('program-seni');
        });
        
Route::middleware(['auth'])
        ->prefix('pegawai')
        ->group(function () {
            Route::get('/', [PegawaiController::class, 'index']);
            Route::get('/json', [PegawaiController::class, 'json']);
            Route::post('/store', [PegawaiController::class, 'store']);
            Route::get('/pegawai-edit/{id}', [PegawaiController::class, 'edit']);
        });

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    
    Route::get('my-pengajuan', [FormPengajuanController::class, 'index'])->name('form-pengajuan.index');
    Route::get('form-pengajuan/create', [FormPengajuanController::class, 'create'])->name('form-pengajuan.create');
    Route::post('form-pengajuan/store', [FormPengajuanController::class, 'store'])->name('form-pengajuan.store');
    route::post('form-pengajuan/upload-media', [FormPengajuanController::class, 'uploadMedia'])->name('form-pengajuan.upload-media');
    Route::get('/get-kabkota/{id}', [FormPengajuanController::class, 'getKabKota'])->name('get.kabkota');

    //dashboard
    Route::get('/cmsadmin', function () {
        return redirect('dashboard');
    });
    Route::get('/dashboard', [CmsController::class, 'index'])->name('dashboard');

    //background
    Route::get('/background', [BackgroundController::class, 'index']);
    Route::get('/background/table/{val}', [BackgroundController::class, 'table']);
    Route::post('/background/upload', [BackgroundController::class, 'upload']);

    #### Information
    //banner
    Route::get('/banner', [BannerController::class, 'index']);
    Route::get('/banner/json', [BannerController::class, 'json']);
    Route::post('/banner/store', [BannerController::class, 'store']);
    Route::post('/banner/destroy', [BannerController::class, 'destroy']);

    //photos
    Route::get('/photos', [PhotosController::class, 'index']);
    Route::get('/photos/json', [PhotosController::class, 'json']);
    Route::post('/photos/store', [PhotosController::class, 'store']);
    Route::post('/photos/destroy', [PhotosController::class, 'destroy']);

    //videos
    Route::get('/videos', [VideosController::class, 'index']);
    Route::get('/videos/json', [VideosController::class, 'json']);
    Route::post('/videos/store', [VideosController::class, 'store']);
    Route::post('/videos/destroy', [VideosController::class, 'destroy']);

    #### Consultation
    #### Contact
    //contact
    Route::get('/contact', [ContactController::class, 'index']);
    Route::get('/contact/json', [ContactController::class, 'json']);
    Route::post('/contact/destroy', [ContactController::class, 'destroy']);
    
//group
    Route::get('/group', [GroupController::class, 'index']);
    Route::get('/group/json', [GroupController::class, 'json']);
    Route::get('/group/show/{id}', [GroupController::class, 'show']);
    Route::post('/group/store', [GroupController::class, 'store']);
    Route::post('/group/destroy', [GroupController::class, 'destroy']);
});
