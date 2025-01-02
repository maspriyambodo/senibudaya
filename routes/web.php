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

    //profil
    Route::get('/profil', [ProfilController::class, 'index']);
    Route::post('/profil/store', [ProfilController::class, 'store']);
    Route::post('/profil/change', [ProfilController::class, 'change']);

    #### Content

    //parameter
    Route::get('/parameter', [ParameterController::class, 'index']);
    Route::get('/parameter/json', [ParameterController::class, 'json']);
    Route::post('/parameter/store', [ParameterController::class, 'store']);
    Route::post('/parameter/destroy', [ParameterController::class, 'destroy']);

    //menu
    Route::get('/menu', [MenuController::class, 'index']);
    Route::get('/menu/json', [MenuController::class, 'json']);
    Route::get('/menu/add/{id}', [MenuController::class, 'form']);
    Route::get('/menu/edit/{id}', [MenuController::class, 'form']);
    Route::post('/menu/store', [MenuController::class, 'store']);
    Route::post('/menu/destroy', [MenuController::class, 'destroy']);

    #### Information

    //banner
    Route::get('/banner', [BannerController::class, 'index']);
    Route::get('/banner/json', [BannerController::class, 'json']);
    Route::post('/banner/store', [BannerController::class, 'store']);
    Route::post('/banner/destroy', [BannerController::class, 'destroy']);

    //news
    Route::get('/news', [NewsController::class, 'index']);
    Route::get('/news/json', [NewsController::class, 'json']);
    Route::get('/news/form/{id}', [NewsController::class, 'form']);
    Route::post('/news/store', [NewsController::class, 'store']);
    Route::post('/news/news-approval', [NewsController::class, 'news_approval']);
    Route::post('/news/destroy', [NewsController::class, 'destroy']);
    Route::get('/news/kabupaten', [NewsController::class, 'kabupaten']);
    Route::get('/news/check_slug', [NewsController::class, 'check_slug']);

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

    #### Setting

    //user
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/json', [UserController::class, 'json']);
    Route::post('/user/store', [UserController::class, 'store']);
    Route::post('/user/destroy', [UserController::class, 'destroy']);
    Route::post('/user/change', [UserController::class, 'change']);
    
    Route::get('/pegawai', [PegawaiController::class, 'index']);
    Route::get('/pegawai/json', [PegawaiController::class, 'json']);
    Route::post('/pegawai/store', [PegawaiController::class, 'store']);
    Route::get('/pegawai-edit/{id}', [PegawaiController::class, 'edit']);
    
    Route::get('/monitoring', [MonitoringController::class, 'index'])->name('monitoring');
    Route::get('/monitoring/json', [MonitoringController::class, 'json'])->name('monitoring');
    Route::get('/monitoring/add', [MonitoringController::class, 'add'])->name('monitoring');
    Route::get('/monitoring/pegawai', [MonitoringController::class, 'pegawai'])->name('monitoring');
    Route::get('/monitoring/provinsi', [MonitoringController::class, 'provinsi'])->name('monitoring');
    Route::post('/monitoring/store', [MonitoringController::class, 'store'])->name('monitoring');
    Route::post('/monitoring/update', [MonitoringController::class, 'update'])->name('monitoring');
    Route::get('/monitoring/lihat/{id}', [MonitoringController::class, 'lihat'])->name('monitoring');
    Route::get('/monitoring/ubah/{id}', [MonitoringController::class, 'ubah'])->name('monitoring');
    
    Route::get('/lembaga', [LembagaSeni::class, 'index'])->name('lembaga');
    Route::get('/lembaga/json', [LembagaSeni::class, 'json'])->name('lembaga');
    Route::get('/lembaga/detil/{id}', [LembagaSeni::class, 'detil'])->name('lembaga');
    Route::get('/lembaga/provinsi', [LembagaSeni::class, 'Provinsi'])->name('lembaga');
    Route::get('/lembaga/kabupaten/{id_provinsi}', [LembagaSeni::class, 'Kabupaten'])->name('lembaga');
    Route::post('lembaga/update', [LembagaSeni::class, 'Update'])->name('lembaga');
    Route::post('lembaga/delete', [LembagaSeni::class, 'Delete'])->name('lembaga');
    
    Route::get('/seniman', [Seniman::class, 'index'])->name('seniman');
    Route::get('/seniman/json', [Seniman::class, 'json'])->name('seniman');
    Route::get('/seniman/detil/{id}', [Seniman::class, 'detil'])->name('seniman');
    Route::post('seniman/update', [Seniman::class, 'Update'])->name('seniman');
    Route::post('seniman/delete', [Seniman::class, 'Delete'])->name('seniman');
    
    
//group
    Route::get('/group', [GroupController::class, 'index']);
    Route::get('/group/json', [GroupController::class, 'json']);
    Route::get('/group/show/{id}', [GroupController::class, 'show']);
    Route::post('/group/store', [GroupController::class, 'store']);
    Route::post('/group/destroy', [GroupController::class, 'destroy']);
});