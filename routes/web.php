<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Apiv1Controller;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\Cms\LoginController;
use App\Http\Controllers\Cms\BackgroundController;
use App\Http\Controllers\Cms\ProfilController;
use App\Http\Controllers\Cms\CmsController;
use App\Http\Controllers\Cms\Content\ParameterController;
use App\Http\Controllers\Cms\Content\MenuController;
use App\Http\Controllers\Cms\Information\DocumentController;
use App\Http\Controllers\Cms\Information\NewsController;
use App\Http\Controllers\Cms\Information\OpinionController;
use App\Http\Controllers\Cms\Information\FigureController;
use App\Http\Controllers\Cms\Information\PhotosController;
use App\Http\Controllers\Cms\Information\VideosController;
use App\Http\Controllers\Cms\Information\LinksController;
use App\Http\Controllers\Cms\Information\BannerController;
use App\Http\Controllers\Cms\Schedule\ShalatController;
use App\Http\Controllers\Cms\Schedule\ImsakiyahController;
use App\Http\Controllers\Cms\Consultation\AnswerController;
use App\Http\Controllers\Cms\Consultation\ConsultationController;
use App\Http\Controllers\Cms\Consultation\GuidanceController;
use App\Http\Controllers\Cms\Contact\ContactController;
use App\Http\Controllers\Cms\Contact\ComplaintController;
use App\Http\Controllers\Cms\Setting\UserController;
use App\Http\Controllers\Cms\Setting\GroupController;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\LandingController;

//front
Route::get('/', [LandingController::class, 'index'])->name('landing.home');
Route::get('/show-collections/{type}', [LandingController::class, 'show_collections'])->name('landing.show-collections');
Route::get('/show-collection-detail/{slug}', [LandingController::class, 'show_collection_detail'])->name('landing.show-collection-detail');
// Route::get('/', [ContentController::class, 'index']);
Route::post('/search', [ContentController::class, 'search']);
Route::get('/search', [ContentController::class, 'search']);
Route::get('/kabupaten/{id}', [ContentController::class, 'kabupaten']);
Route::get('/direktorat/{id}', [ContentController::class, 'show']);
Route::get('/jurnalis/{id}', [ContentController::class, 'show']);
Route::get('/editor/{id}', [ContentController::class, 'show']);
Route::get('/fotografer/{id}', [ContentController::class, 'show']);
Route::get('/our-collection', [ContentController::class, 'our_collection']);
//Route::get('/generate-password/{tulispassword}', function ($request) {
//    return Hash::make(md5($request));
//});
//old url
Route::get('/jadwalshalat', function () {
    return redirect('/jadwal-shalat');
});
Route::get('/profil/sejarah', function () {
    return redirect('/sejarah');
});
//sitemap
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index']);
Route::get('/sitemap/{id}', [App\Http\Controllers\SitemapController::class, 'posts']);
Route::get('/page-sitemap.xml', [App\Http\Controllers\SitemapController::class, 'page']);

//api
Route::post('/api', [ApiController::class, 'index']);
Route::post('/api/tahun', [ApiController::class, 'tahun']);
Route::post('/api/propinsi', [ApiController::class, 'propinsi']);
Route::post('/api/kabupaten', [ApiController::class, 'kabupaten']);
Route::post('/api/jadwal-shalat', [ApiController::class, 'shalat']);
Route::post('/api/jadwal-imsakiyah', [ApiController::class, 'imsakiyah']);
Route::post('/api/berita', [ApiController::class, 'berita']);

//apiv1
Route::get('/apiv1', [Apiv1Controller::class, 'index']);
Route::get('/apiv1/getShalatProv', [Apiv1Controller::class, 'propinsi']);
Route::get('/apiv1/getShalatKabko', [Apiv1Controller::class, 'kabupaten']);
Route::get('/apiv1/getShalatJadwal', [Apiv1Controller::class, 'index']);
Route::get('/apiv1/getImsakJadwal', [Apiv1Controller::class, 'index']);
Route::post('/apiv1', [Apiv1Controller::class, 'index']);
Route::post('/apiv1/getShalatProv', [Apiv1Controller::class, 'index']);
Route::post('/apiv1/getShalatKabko', [Apiv1Controller::class, 'index']);
Route::post('/apiv1/getShalatJadwal', [Apiv1Controller::class, 'shalat']);
Route::post('/apiv1/getImsakJadwal', [Apiv1Controller::class, 'imsak']);

//login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/auth', [LoginController::class, 'auth']);
Route::get('/forgot-password', [LoginController::class, 'forgot_password']);
Route::post('/req-password', [LoginController::class, 'req_password']);
Route::post('/setup-password', [LoginController::class, 'setup_password']);
Route::get('/reset-password/{param}', [LoginController::class, 'reset_password']);
Route::get('/signup', [LoginController::class, 'signup']);
Route::post('/register', [LoginController::class, 'auth_register']);
Route::get('/user-activate/{param}', [LoginController::class, 'user_activate']);

Route::group(['middleware' => ['auth']], function () {
    //dashboard
    Route::get('/cmsadmin', function () {
        return redirect('dashboard');
    });
    Route::get('/dashboard', [CmsController::class, 'index']);

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

    //document
    Route::get('/document', [DocumentController::class, 'index']);
    Route::get('/document/json', [DocumentController::class, 'json']);
    Route::post('/document/store', [DocumentController::class, 'store']);
    Route::post('/document/destroy', [DocumentController::class, 'destroy']);

    //news
    Route::get('/news', [NewsController::class, 'index']);
    Route::get('/news/json', [NewsController::class, 'json']);
    Route::get('/news/form/{id}', [NewsController::class, 'form']);
    Route::post('/news/store', [NewsController::class, 'store']);
    Route::post('/news/destroy', [NewsController::class, 'destroy']);

    //opinion
    Route::get('/opinion', [OpinionController::class, 'index']);
    Route::get('/opinion/json', [OpinionController::class, 'json']);
    Route::get('/opinion/form/{id}', [OpinionController::class, 'form']);
    Route::post('/opinion/store', [OpinionController::class, 'store']);
    Route::post('/opinion/destroy', [OpinionController::class, 'destroy']);

    //figure
    Route::get('/figure', [FigureController::class, 'index']);
    Route::get('/figure/json', [FigureController::class, 'json']);
    Route::get('/figure/form/{id}', [FigureController::class, 'form']);
    Route::post('/figure/store', [FigureController::class, 'store']);
    Route::post('/figure/destroy', [FigureController::class, 'destroy']);

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

    //links
    Route::get('/links', [LinksController::class, 'index']);
    Route::get('/links/json', [LinksController::class, 'json']);
    Route::post('/links/store', [LinksController::class, 'store']);
    Route::post('/links/destroy', [LinksController::class, 'destroy']);


    #### Jadwal

    //shalat
    Route::get('/shalat', [ShalatController::class, 'index']);
    Route::get('/shalat/json', [ShalatController::class, 'json']);
    Route::get('/shalat/show/{id}', [ShalatController::class, 'show']);

    //imsakiyah
    Route::get('/imsakiyah', [ImsakiyahController::class, 'index']);
    Route::get('/imsakiyah/json', [ImsakiyahController::class, 'json']);
    Route::get('/imsakiyah/show/{id}', [ImsakiyahController::class, 'show']);


    #### Consultation

    //answer
    Route::get('/answer', [AnswerController::class, 'index']);
    Route::get('/answer/json', [AnswerController::class, 'json']);
    Route::get('/answer/form/{id}', [AnswerController::class, 'form']);
    Route::post('/answer/store', [AnswerController::class, 'store']);
    Route::post('/answer/destroy', [AnswerController::class, 'destroy']);

    //answer
    Route::get('/consultation', [ConsultationController::class, 'index']);
    Route::get('/consultation/json', [ConsultationController::class, 'json']);
    Route::get('/consultation/form/{id}', [ConsultationController::class, 'form']);
    Route::post('/consultation/store', [ConsultationController::class, 'store']);
    Route::post('/consultation/destroy', [ConsultationController::class, 'destroy']);

    //guidance
    Route::get('/guidance', [GuidanceController::class, 'index']);
    Route::get('/guidance/json', [GuidanceController::class, 'json']);
    Route::get('/guidance/form/{id}', [GuidanceController::class, 'form']);
    Route::post('/guidance/store', [GuidanceController::class, 'store']);
    Route::post('/guidance/destroy', [GuidanceController::class, 'destroy']);


    #### Contact
    //contact
    Route::get('/contact', [ContactController::class, 'index']);
    Route::get('/contact/json', [ContactController::class, 'json']);
    Route::post('/contact/destroy', [ContactController::class, 'destroy']);

    //complaint
    Route::get('/complaint', [ComplaintController::class, 'index']);
    Route::get('/complaint/json', [ComplaintController::class, 'json']);
    Route::post('/complaint/destroy', [ComplaintController::class, 'destroy']);


    #### Setting

    //user
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/json', [UserController::class, 'json']);
    Route::post('/user/store', [UserController::class, 'store']);
    Route::post('/user/destroy', [UserController::class, 'destroy']);
    Route::post('/user/change', [UserController::class, 'change']);

    //group
    Route::get('/group', [GroupController::class, 'index']);
    Route::get('/group/json', [GroupController::class, 'json']);
    Route::get('/group/show/{id}', [GroupController::class, 'show']);
    Route::post('/group/store', [GroupController::class, 'store']);
    Route::post('/group/destroy', [GroupController::class, 'destroy']);
});

Route::get('/{slug}', [ContentController::class, 'show']);
Route::get('/{slug}/{id}', [ContentController::class, 'detail']);
Route::post('/{slug}/store', [ContentController::class, 'store']);
Route::post('/{slug}/search', [ContentController::class, 'show']);
Route::get('/{slug}/default/{id}', [ContentController::class, 'update']);
