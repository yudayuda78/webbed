<?php

use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\MailController;
use App\Models\isiContent;
use App\Http\Controllers\Editprofil;
use App\Http\Controllers\Landingpage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\Editpassword;
use App\Http\Controllers\Eventcontroller;
use App\Http\Controllers\HubungiController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizposttestController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SertifController;
use App\Http\Controllers\EcourseController;
use App\Http\Controllers\PendaftarandiklatController;
use App\Http\Controllers\PendaftaranworkshopController;
use App\Http\Controllers\NewsertifController;
use App\Http\Controllers\RekappesertaController;
use App\Http\Controllers\RevsertifController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\PembayaranEcourse;
use App\Http\Controllers\PembayaranEcourseController;
use App\Http\Controllers\PembayaranWorkshopController;
use App\Http\Controllers\TemplateSertifController;
use App\Http\Controllers\BahanAjarBukuController;
use App\Http\Controllers\ModulAjarController;
use App\Http\Controllers\GenerateSoalController;
use App\Http\Controllers\AdministrasiGuruController;
use App\Http\Controllers\BahanAjarController;
use App\Http\Controllers\PertanyaanGenerateSoalController;
use App\Http\Controllers\JawabanGenerateSoalController;
use App\Http\Controllers\SocialiteController;
use App\Models\Evaluasi;
use App\Models\Formevaluasi;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//root landingpage BED
Route::get('/', [Landingpage::class, 'index']);

// event BED
Route::get('/event', [Eventcontroller::class, 'index'])->name('event');
Route::get('event/search', [Eventcontroller::class, 'search'])->name('event.search');


//login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/auth/redirect', [SocialiteController::class, 'redirect'])->name('gmail.redirect');
Route::get('/auth/google/callback', [SocialiteController::class, 'callback'])->name('gmail.callback');


//route register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

//hubungi
Route::get('/partnership', [HubungiController::class, 'partnership'])->name('partnership');
Route::get('/instruktur', [HubungiController::class, 'instruktur'])->name('instruktur');
Route::get('/contentcreator', [HubungiController::class, 'contentcreator'])->name('contentcreator');

//edit profil
Route::get('/profil/edit', [Editprofil::class, 'edit'])->name('profile.edit');
Route::put('/profil/update', [Editprofil::class, 'update'])->name('profile.update');

//edit password
Route::get('/password/edit', [Editpassword::class, 'edit'])->name('password.edit');
Route::put('/password/update', [Editpassword::class, 'update'])->name('password.update');

//bahan ajar
Route::get('bahanajar', [BahanAjarController::class, 'index'])->name('bahanajar');
Route::get('bahanajar/buku', [BahanAjarBukuController::class, 'index']);
Route::get('bahanajar/buku/{bahanAjarBuku:slug}', [BahanAjarBukuController::class, 'show']);
Route::get('/bukudownload/{id}', [ContentController::class, 'download'])->middleware('auth')->name('book.download');

//Administrasi Guru
Route::get('administrasiguru', [AdministrasiGuruController::class, 'index']);

//modul ajar
Route::get('administrasiguru/modulajar', [ModulAjarController::class, 'index'])->name('modulajar.index')->middleware('auth');
Route::get('administrasiguru/modulajar/{modulAjar:slug}', [ModulAjarController::class, 'show'])->name('modulajar.show')->middleware('auth');
Route::get('administrasiguru/mymodulajar', [ModulAjarController::class, 'mymodulajarindex'])->middleware('auth')->name('mymodulajar');
Route::get('administrasiguru/mymodulajar/{modulAjar:slug}', [ModulAjarController::class, 'mymodulajarshow'])->middleware('auth')->name('show.mymodulajar');
Route::get('administrasiguru/buatmodulajar', [ModulAjarController::class, 'modulajarform'])->middleware('auth')->name('formmodulajar');
Route::post('administrasiguru/tambahdatamodulajar', [ModulAjarController::class, 'tambahdatamodulajar'])->middleware('auth')->name('tambahdatamodulajar');
Route::get('administrasiguru/downloadmodulajar/{id}', [ModulAjarController::class, 'downloadmodulajar'])->middleware('auth')->name('modulajar.download');
Route::get('administrasiguru/tambahmymodulajar/{id}', [ModulAjarController::class, 'tambahmymodulajar'])->middleware('auth')->name('modulajar.tambahmymodulajar');
Route::get('administrasiguru/hapusdatamymodulajar/{id}', [ModulAjarController::class, 'hapusmymodulajar'])->middleware('auth')->name('hapusdatamymodulajar');
Route::get('administrasiguru/editmymodulajar/{id}', [ModulAjarController::class, 'editmymodulajar'])->middleware('auth')->name('editmymodulajar');
Route::post('administrasiguru/editdatamymodulajar/{id}', [ModulAjarController::class, 'editdatamymodulajar'])->middleware('auth')->name('editdatamymodulajar');

//generate soal
Route::get('administrasiguru/generatesoal', [GenerateSoalController::class, 'index'])->middleware('auth');
Route::get('administrasiguru/kumpulangeneratesoal', [GenerateSoalController::class, 'kumpulan'])->middleware('auth')->name('kumpulansoal');
Route::get('administrasiguru/generatesoal/{generateSoal:slug}', [GenerateSoalController::class, 'show'])->middleware('auth');
Route::get('administrasiguru/mysoal', [GenerateSoalController::class, 'mysoalindex'])->name('mysoal');
Route::post('/generatesoal', [GenerateSoalController::class, 'store']);
Route::post('/pertanyaangeneratesoal', [PertanyaanGenerateSoalController::class, 'store']);
Route::post('/jawabangeneratesoal', [JawabanGenerateSoalController::class, 'store']);



//rute filter
Route::get('/content/filter', [ContentController::class, 'filter'])->name('content.filter');


//rute download

Route::get('/downloadworksheet/{id}', [ContentController::class, 'download'])->middleware('auth')->name('content.download');
Route::get('/downloadebook/{id}', [ContentController::class, 'ebookdownload'])->middleware('auth')->name('ebook.download');

//landing page ticykit
Route::get('/ticykit', [Landingpage::class, 'indexticykit'])->name('Landingpage');

Route::get('ticykit/worksheet', [ContentController::class, 'index'])->name('ticykit.worksheet');
Route::get('ticykit/worksheet/search', [ContentController::class, 'search'])->name('content.search');


Route::get('ticykit/ebook', [ContentController::class, 'ebookindex'])->name('ticykit.ebook');
Route::get('ticykit/ebook/search', [ContentController::class, 'ebooksearch'])->name('ebook.search');

Route::get('ticykit/powerpoint', [ContentController::class, 'pptindex'])->name('ticykit.ppt');

//halaman single post
Route::get('ticykit/worksheet/{isiContent:slug}', [ContentController::class, 'show']);
Route::get('ticykit/ebook/{ebook:slug}', [ContentController::class, 'ebookshow']);


//halaman event
// Route::get('/event', [Eventcontroller::class, 'index'])->name('event');

Route::get('/sertifikat/download/{id}', [SertifController::class, 'generate'])->name('sertif.download');
Route::get('/sertifikat/download2/{id}', [SertifController::class, 'generate2'])->name('sertif.download2');
Route::get('/sertifikat/download3/{id}', [SertifController::class, 'generate3'])->name('sertif.download3');
Route::get('/sertifikat/download1revisi/{id}', [SertifController::class, 'generate1revisi'])->name('sertif.download1revisi');
Route::get('/sertifikat/download16-19/{id}', [SertifController::class, 'generate1619nov'])->name('sertif.download16-19');
Route::get('/sertifikat/download16-19rev/{id}', [SertifController::class, 'generate1619novrev'])->name('sertif.download16-19rev');
Route::get('/sertifikat/download1-4des/{id}', [SertifController::class, 'generate1des'])->name('sertif.download1des');
Route::get('/sertifikat/download1-4desrev/{id}', [SertifController::class, 'generate1desrev'])->name('sertif.download1desrev');
Route::get('/sertifikat/download16-19desrev/{id}', [SertifController::class, 'generate2des'])->name('sertif.download2des');
Route::get('/sertifikat/download16-19desrev2/{id}', [SertifController::class, 'generate2desrev'])->name('sertif.download2desrev');
Route::get('/sertifikat/download5-8jan/{id}', [SertifController::class, 'generate5jan'])->name('sertif.download5jan');
Route::get('/sertifikat/download12-14jan/{id}', [SertifController::class, 'generate12jan'])->name('sertif.download12jan');
Route::get('/sertifikat/download5-8janrev/{id}', [SertifController::class, 'generate5janrev'])->name('sertif.download5janrev');
Route::get('/sertifikat/download12-14janrev/{id}', [SertifController::class, 'generate12janrev'])->name('sertif.download12janrev');
Route::get('/sertifikat/download20-23jana/{id}', [SertifController::class, 'generate20jana'])->name('sertif.download20jana');
Route::get('/sertifikat/download20-23janb/{id}', [SertifController::class, 'generate20janb'])->name('sertif.download20janb');
Route::get('/sertifikat/download20-23janc/{id}', [SertifController::class, 'generate20janc'])->name('sertif.download20janc');
Route::get('/sertifikat/download20-23jand/{id}', [SertifController::class, 'generate20jand'])->name('sertif.download20jand');
Route::get('/sertifikat/download20-23jane/{id}', [SertifController::class, 'generate20jane'])->name('sertif.download20jane');
Route::get('/sertifikat/download20-23janf/{id}', [SertifController::class, 'generate20janf'])->name('sertif.download20janf');
Route::get('/sertifikat/download20-23jang/{id}', [SertifController::class, 'generate20jang'])->name('sertif.download20jang');
Route::get('/sertifikat/download24-27jan/{id}', [SertifController::class, 'generate24jan'])->name('sertif.download24jan');
Route::get('/sertifikat/download20-23janrevisi/{id}', [SertifController::class, 'generate20janrevisi'])->name('sertif.download20janrevisi');
Route::get('/sertifikat/download27-31jan/{id}', [SertifController::class, 'generate27jan'])->name('sertif.download27jan');
Route::get('/sertifikat/download1-4febab/{id}', [SertifController::class, 'generate1febab'])->name('sertif.download1febab');
Route::get('/sertifikat/download1-4febcd/{id}', [SertifController::class, 'generate1febcd'])->name('sertif.download1febcd');
Route::get('/sertifikat/download1-4febef/{id}', [SertifController::class, 'generate1febef'])->name('sertif.download1febef');
Route::get('/sertifikat/download1-4febgi/{id}', [SertifController::class, 'generate1febgi'])->name('sertif.download1febgi');
Route::get('/sertifikat/download1-4febjl/{id}', [SertifController::class, 'generate1febjl'])->name('sertif.download1febjl');
Route::get('/sertifikat/download1-4febm/{id}', [SertifController::class, 'generate1febm'])->name('sertif.download1febm');
Route::get('/sertifikat/download1-4febn/{id}', [SertifController::class, 'generate1febn'])->name('sertif.download1febn');
Route::get('/sertifikat/download1-4febor/{id}', [SertifController::class, 'generate1febor'])->name('sertif.download1febor');
Route::get('/sertifikat/download1-4febs/{id}', [SertifController::class, 'generate1febs'])->name('sertif.download1febs');
Route::get('/sertifikat/download1-4febtz/{id}', [SertifController::class, 'generate1febtz'])->name('sertif.download1febtz');

Route::get('/sertifikat/download24-27janrev/{id}', [SertifController::class, 'generate24janrev'])->name('sertif.download24janrev');
Route::get('/sertifikat/download28-31janrev/{id}', [SertifController::class, 'generate28janrev'])->name('sertif.download28janrev');
Route::get('/sertifikat/download6-9feb/{id}', [SertifController::class, 'generate6feb'])->name('sertif.download6feb');
Route::get('/sertifikat/download1-4febrev/{id}', [SertifController::class, 'generate1febrev'])->name('sertif.download1febrev');
Route::get('/sertifikat/download9-12feb/{id}', [SertifController::class, 'generate9feb'])->name('sertif.download9feb');
Route::get('/sertifikat/download6-9febrev/{id}', [SertifController::class, 'generate6febrev'])->name('sertif.download6febrev');
Route::get('/sertifikat/download13-15feb/{id}', [SertifController::class, 'generate13feb'])->name('sertif.download13feb');
Route::get('/sertifikat/download9-12febrev/{id}', [SertifController::class, 'generate9febrev'])->name('sertif.download9febrev');
Route::get('/sertifikat/download13-15febrev/{id}', [SertifController::class, 'generate13febrev'])->name('sertif.download13febrev');

//halaman single event
Route::get('/event/{isiEvent:slug}', [Eventcontroller::class, 'show'])->name('isiEvent');

//absensi
Route::get('/presensi', [PresensiController::class, 'show'])->name('show.presensi');
Route::get('/presensi/{presensi:slug}', [PresensiController::class, 'view']);
Route::post('/presensi/tambahdata', [PresensiController::class, 'tambahData'])->name('presensi.tambahdata');
Route::get('/halamansukses', [PresensiController::class, 'sukses']);
Route::get('/absensilimit', function () {
    return view('absensi.limit');
})->name('absensi.limit');
// Route::get('/presensi/Adm-Jan3_1', [PresensiController::class, 'tutup']);
// Route::get('/presensi/Adm-Jan3_2', [PresensiController::class, 'tutup']);
// Route::get('/presensi/Adm-Jan3_3', [PresensiController::class, 'tutup']);
// Route::get('/presensi/Adm-Jan3_4', [PresensiController::class, 'tutup']);

//Absensi Tailwind
Route::get('/absensi-tw', function () {
    return view('absensi.tw-absensi');
});
//Pendaftaran Tawilind
Route::get('/pendaftaran-tw', function () {
    return view('pendaftaran.tw-pendaftaran');
});

//pendaftaran
Route::get('/pendaftaran', [PendaftarandiklatController::class, 'index'])->name('index.pendaftaran');
Route::get('/pendaftaran/{pendaftarandiklat:slug}', [PendaftarandiklatController::class, 'show'])->name('pendaftaran.slug');
Route::get('/suksesdaftar', [PendaftarandiklatController::class, 'sukses']);
Route::get('/suksesdaftar2', [PendaftarandiklatController::class, 'sukses2']);
Route::get('/donasiworkshop2', [PendaftarandiklatController::class, 'donasiworkshop']);
Route::post('/tamabahdonasiworkshop', [PendaftarandiklatController::class, 'tambahdatadonasi'])->name('tambahdatadonasiworkshop');
Route::post('/pendaftaran/tambahdata', [PendaftarandiklatController::class, 'create'])->name('pendaftaran.tambahdata');
Route::get('/cekpendaftaran', [PendaftarandiklatController::class, 'lacak'])->name('pendaftaran.lacak');




//form evaluasi
Route::get('/evaluasi', [EvaluasiController::class, 'index'])->name('index.evaluasi');
Route::get('/evaluasi/{evaluasi:slug}', [EvaluasiController::class, 'show'])->name('evaluasi.slug');
Route::get('/evaluasis/{evaluasi:slug}/search', [EvaluasiController::class, 'search'])->name('evaluasi.search');
Route::post('/evaluasi/tambahdata', [EvaluasiController::class, 'create'])->name('evaluasi.tambahdata');
Route::get('/donasikegiatannew', [EvaluasiController::class, 'donasikegiatan'])->name('donasikegaiatannew');
Route::post('/evaluasi/tambahdonasi', [EvaluasiController::class, 'tambahdatadonasi'])->name('tambahdatadonasikegiatan');



//sertifikat
Route::get('/newsertifikat', [NewsertifController::class, 'index'])->name('index.newsertif');
Route::get('/newsertifikat/{newsertif:slug}', [NewsertifController::class, 'show'])->name('sertifikat.slug');
Route::get('/newsertifikats/{newsertif:slug}/search', [NewsertifController::class, 'search'])->name('sertifikat.search');
Route::get('/newsertifikat/{newsertif:slug}/{datas:slug}', [NewsertifController::class, 'showUser'])->name('sertifikat.user');
Route::get('/newsertifikats/download/{id}', [NewsertifController::class, 'generate'])->name('sertif.download01');


//form revisi sertifikat
Route::get('/formrevsertifikat', [RevsertifController::class, 'index'])->name('index.revsertifikat');
Route::get('/formrevsertifikat/{revsertif:slug}', [RevsertifController::class, 'show'])->name('revsertifikat.slug')->middleware('limitacces');
Route::post('/formrevisisertif/tambahdatarevisi', [RevsertifController::class, 'create'])->name('revsertif.tambahdata');
Route::get('/suksesrevisi', [RevsertifController::class, 'sukses']);

// hasil revisi sertifikat
Route::get('/revsertifikat', [RevsertifController::class, 'showrevindex'])->name('showsertifindex.revsertifikat');
Route::get('/revsertifikat/{revsertif:slug2}', [RevsertifController::class, 'showrevshow'])->name('showsertifshow.revsertifikat');
Route::get('/revsertifikat/{revsertif:slug2}/{datas:slug2}', [RevsertifController::class, 'showUserrev'])->name('revsertifikat.user');
Route::get('/revsertifikats/{revsertif:slug2}/search', [RevsertifController::class, 'search'])->name('revsertifikat.search');
Route::get('/revsertifikats/download/{id}', [RevsertifController::class, 'generate'])->name('sertif.download02');
Route::get('/revsertiflimit', function () {
    return view('revsertif.limit');
})->name('revsertif.limit');

//quiz
Route::get('quiz', [QuizController::class, 'index']);
Route::post('quiz/submit', [QuizController::class, 'submitquiz'])->name('submit-quiz');
Route::post('quizposttest/submit', [QuizposttestController::class, 'submitquizposttest'])->name('submit-posttest');

//coba
// Route::post('faklah', [QuizposttestController::class, 'submitquizposttest'])->name('faklah');

//kebiajakan-privasi
Route::get('/kebijakan-privasi', function () {
    return view('pages.kebijakan-privasi');
});

//syarat dan ketentuan
Route::get('/syarat-ketentuan', function () {
    return view('pages.syarat-ketentuan');
});

//tentang kami
Route::get('/tentang-kami', function () {
    return view('pages.tentang-kami');
});

//Kerjasama
Route::get('/kerjasama', function () {
    return view('pages.kerjasama');
});

//Ecourse
Route::get('/ecourse', [EcourseController::class, 'index'])->name('ecourse.index');
Route::get('/paymentecourse/{ecourse:slug}', [EcourseController::class, 'pembayaran'])->name('pembayaran')->middleware('auth');
Route::get('/ecourse/{ecourse:slug}', [EcourseController::class, 'show'])->name('ecourse.show');
Route::get('cobatopik', [EcourseController::class, 'cobatopik']);
Route::get('/donasi', [EcourseController::class, 'donasi'])->middleware('auth')->name('donasi');
Route::post('/tambahdatadonasi', [EcourseController::class, 'create'])->name('tambahdatadonasi');
Route::post('/tambahdatapembayaranecourse', [EcourseController::class, 'createpembayaranecourse'])->name('tambahdatapembayaranecourse');
Route::get('/sertifikatecourse', [EcourseController::class, 'sertifikat'])->name('sertifikatecourse');
Route::get('/downloadsertifikatecourse', [EcourseController::class, 'donwloadsertifikat'])->name('downloadsertifikatecourse');
Route::get('/prosespembayaran', [EcourseController::class, 'prosespembayaran'])->name('prosespembayaran');
Route::get('/prosesverifikasi', [EcourseController::class, 'prosesverifikasi'])->name('prosesverifikasi');
Route::get('/ecoursesignup', [EcourseController::class, 'registerecourse'])->middleware('guest');
Route::post('/ecoursesignup', [EcourseController::class, 'signupstore'])->name('ecourse.signup')->middleware('guest');
Route::post('/ecourselogin', [EcourseController::class, 'loginecourse'])->name('ecourse.login')->middleware('guest');


Route::get('/pendaftarandiklat', function () {
    return view('pendaftaran.formpendaftaran');
});

Route::get('/ecourse/content', function () {
    return view('ecourse.content-ecourse');
});

Route::get('/cobaqrcode', function () {
    return view('cobaqrcode');
});

//Admin
// Route::middleware(['auth', 'user.admin'])->group(function () {
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('admin');
Route::get('/admin/showlogin', [AdminController::class, 'showlogin'])->name('show');
Route::post('/admin/login', [AdminController::class, 'login'])->name('adminlogin');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('adminlogout');





//Admin Pendaftaran

Route::get('/admin/pendaftaran', [AdminController::class, 'indexpendaftaran'])->name('adminpendaftaran')->middleware('admin');
Route::get('/admin/pendaftaran/tambahpendaftaran', [AdminController::class, 'tambahpendaftaran'])->name('tambahpendaftaran');
Route::post('/admin/tambahdatapendaftaran', [AdminController::class, 'tambahdatapendaftaran'])->name('tambahdatapendaftaran');
Route::get('/admin/hapusdatapendaftaran/{id}', [AdminController::class, 'hapusdatapendaftaran'])->name('hapusdatapendaftaran');
Route::get('/admin/pendaftaran/editpendaftaran/{id}', [AdminController::class, 'editpendaftaran'])->name('editpendaftaran');
Route::post('/admin/editdatapendaftaran/{id}', [AdminController::class, 'editdatapendaftaran'])->name('editdatapendaftaran');
Route::get('/admin/downloaddatapendaftaran/{id}', [AdminController::class, 'downloaddatapendaftaran'])->name('downloaddatapendaftaran');
Route::get('/admin/pendaftaran/search', [AdminController::class, 'searchpendaftaran'])->name('searchpendaftaran');
Route::delete('/hapusgambarpendaftaran/{id}', [AdminController::class, 'hapusgambarpendaftaran'])->name('hapusgambarpendaftaran');


Route::get('/admin/event', [AdminController::class, 'indexevent'])->name('adminevent')->middleware('admin');
Route::get('/admin/event/tambahevent', [AdminController::class, 'tambahevent'])->name('tambahevent');
Route::post('/admin/tambahdataevent', [AdminController::class, 'tambahdataevent'])->name('tambahdataevent');
Route::get('/admin/hapusdataevent/{id}', [AdminController::class, 'hapusdataevent'])->name('hapusdataevent');
Route::get('/admin/event/editevent/{id}', [AdminController::class, 'editevent'])->name('editevent');
Route::post('/admin/editdataevent/{id}', [AdminController::class, 'editdataevent'])->name('editdataevent');
Route::get('/admin/event/search', [AdminController::class, 'searchevent'])->name('searchevent');
Route::delete('/hapusgambarevent/{id}', [AdminController::class, 'hapusgambarevent'])->name('hapusgambarevent');




//Admin Pendaftaran Workshop

Route::get('/admin/pendaftaranworkshop', [AdminController::class, 'indexpendaftaranworkshop'])->name('adminpendaftaranworkshop')->middleware('admin');
Route::get('/admin/pendaftaran/tambahpendaftaranworkshop', [AdminController::class, 'tambahpendaftaranworkshop'])->name('tambahpendaftaranworkshop');
Route::post('/admin/tambahdatapendaftaranworkshop', [AdminController::class, 'tambahdatapendaftaranworkshop'])->name('tambahdatapendaftaranworkshop');
Route::get('/admin/hapusdatapendaftaranworkshop/{id}', [AdminController::class, 'hapusdatapendaftaranworkshop'])->name('hapusdatapendaftaranworkshop');
Route::get('/admin/pendaftaranworkshop/editpendaftaranworkshop/{id}', [AdminController::class, 'editpendaftaranworkshop'])->name('editpendaftaranworkshop');
Route::post('/admin/editdatapendaftaranworkshop/{id}', [AdminController::class, 'editdatapendaftaranworkshop'])->name('editdatapendaftaranworkshop');
Route::get('/admin/downloaddatapendaftaranworkshop/{id}', [AdminController::class, 'downloaddatapendaftaranworkshop'])->name('downloaddatapendaftaranworkshop');
Route::get('/admin/pendaftaranworkshop/search', [AdminController::class, 'searchpendaftaranworkshop'])->name('searchpendaftaranworkshop');


//Admin Evaluasi
Route::get('/admin/evaluasi', [AdminController::class, 'indexevaluasi'])->name('adminevaluasi')->middleware('admin');
Route::get('/admin/evaluasi/tambahevaluasi', [AdminController::class, 'tambahevaluasi'])->name('tambahevaluasi');
Route::post('/admin/tambahdataevaluasi', [AdminController::class, 'tambahdataevaluasi'])->name('tambahdataevaluasi');
Route::get('/admin/hapusdataevaluasi/{id}', [AdminController::class, 'hapusdataevaluasi'])->name('hapusdataevaluasi');
Route::get('/admin/evaluasi/editevaluasi/{id}', [AdminController::class, 'editevaluasi'])->name('editevaluasi');
Route::post('/admin/editdataevaluasi/{id}', [AdminController::class, 'editdataevaluasi'])->name('editdataevaluasi');
Route::get('/admin/downloaddataevaluasi/{id}', [AdminController::class, 'downloaddataevaluasi'])->name('downloaddataevaluasi');
Route::get('/admin/evaluasi/{evaluasi:slug}/search', [AdminController::class, 'searchevaluasi'])->name('searchevaluasi');
Route::get('/isievaluasi/{evaluasi:slug}', [AdminController::class, 'showisievaluasi'])->name('isievaluasi');
Route::get('/chartevaluasi/{evaluasi:slug}', [AdminController::class, 'showchartevaluasi'])->name('chartevaluasi');

//Admin Sertifikat
Route::get('/admin/sertifikat', [AdminController::class, 'indexsertifikat'])->name('adminsertifikat')->middleware('admin');
Route::get('/admin/sertifikat/search', [AdminController::class, 'searchsertifikat'])->name('searchsertifikat');
Route::get('/admin/sertifikat/tambahsertifikat', [AdminController::class, 'tambahsertifikat'])->name('tambahsertifikat');
Route::post('/admin/tambahdatasertifikat', [AdminController::class, 'tambahdatasertifikat'])->name('tambahdatasertifikat');
Route::get('/admin/hapusdatasertifikat/{id}', [AdminController::class, 'hapusdatasertifikat'])->name('hapusdatasertifikat');
Route::get('/admin/sertifikat/editsertifikat/{id}', [AdminController::class, 'editsertifikat'])->name('editsertifikat');
Route::post('/admin/editdatasertifikat/{id}', [AdminController::class, 'editdatasertifikat'])->name('editdatasertifikat');
Route::get('/admin/downloaddatasertifikat/{id}', [AdminController::class, 'downloaddatasertifikat'])->name('downloaddatasertifikat');

//Admin Revsertif
Route::get('/admin/revsertifikat', [AdminController::class, 'indexrevsertifikat'])->name('adminrevsertifikat')->middleware('admin');
Route::get('/admin/revsertifikat/search', [AdminController::class, 'searchrevsertifikat'])->name('searchrevsertifikat');
Route::get('/admin/sertifikat/tambahrevsertifikat', [AdminController::class, 'tambahrevsertifikat'])->name('tambahrevsertifikat');
Route::post('/admin/tambahdatarevsertifikat', [AdminController::class, 'tambahdatarevsertifikat'])->name('tambahdatarevsertifikat');
Route::get('/admin/hapusdatarevsertifikat/{id}', [AdminController::class, 'hapusdatarevsertifikat'])->name('hapusdatarevsertifikat');
Route::get('/admin/sertifikat/editrevsertifikat/{id}', [AdminController::class, 'editrevsertifikat'])->name('editrevsertifikat');
Route::post('/admin/editdatarevsertifikat/{id}', [AdminController::class, 'editdatarevsertifikat'])->name('editdatarevsertifikat');
Route::get('/admin/downloaddatarevsertifikat/{id}', [AdminController::class, 'downloaddatarevsertifikat'])->name('downloaddatarevsertifikat');
Route::get('/formadminrevsertifikat/{revsertif:slug}', [AdminController::class, 'tambahdatarevisi'])->name('adminrevsertifikat.slug');

//Admin Presensi
Route::get('/admin/presensi', [AdminController::class, 'indexpresensi'])->name('adminpresensi')->middleware('admin');
Route::get('/admin/presensi/search', [AdminController::class, 'searchpresensi'])->name('searchpresensi');
Route::get('/admin/presensi/tambahpresensi', [AdminController::class, 'tambahpresensi'])->name('tambahpresensi');
Route::post('/admin/tambahdatapresensi', [AdminController::class, 'tambahdatapresensi'])->name('tambahdatapresensi');
Route::get('/admin/hapusdatapresensi/{id}', [AdminController::class, 'hapusdatapresensi'])->name('hapusdatapresensi');
Route::get('/admin/presensi/editpresensi/{id}', [AdminController::class, 'editpresensi'])->name('editpresensi');
Route::post('/admin/editdatapresensi/{id}', [AdminController::class, 'editdatapresensi'])->name('editdatapresensi');
Route::get('/admin/downloaddatapresensi/{id}', [AdminController::class, 'downloaddatapresensi'])->name('downloaddatapresensi');


//Surat
Route::get('/admin/surat', [SuratController::class, 'index'])->name('indexsurat')->middleware('admin');
Route::post('/admin/generatesurat', [SuratController::class, 'generate'])->name('generatesurat');
Route::get('/admin/listnomorsurat', [SuratController::class, 'listnomor'])->name('listnomorsurat');

//verifikasi pwmbayaran workshop
Route::get('/admin/verifikasiworkshop', [PembayaranWorkshopController::class, 'indexverifikasiworkshop'])->name('indexverifikasiworkshop')->middleware('admin');
Route::get('/admin/verifikasiworkshop/{pendaftarandiklat:slug}', [PembayaranWorkshopController::class, 'showverifikasiworkshop'])->name('showverifikasiworkshop');
Route::post('/admin/updateverifikasiworkshop/{id}', [PembayaranWorkshopController::class, 'updateverifikasiworkshop'])->name('updateverifikasiworkshop');
Route::get('/admin/arsipverifikasiworkshop', [PembayaranWorkshopController::class, 'indexarsip'])->name('indexarsipverifikasiworkshop');
Route::get('/admin/downloaddataworkshop/{slug}', [PembayaranWorkshopController::class, 'downloaddataworkshop'])->name('downloaddataworkshop');
// Route::post('/admin/updateverifikasiworkshop/{id}', [PembayaranWorkshopController::class, 'updateverifikasiworkshop'])->name('updateverifikasiworkshop');

//verifikasi pwmbayaran ecourse
Route::get('/admin/verifikasiecourse', [PembayaranEcourseController::class, 'index'])->name('indexverifikasi')->middleware('admin');
Route::get('/admin/arsipverifikasiecourse', [PembayaranEcourseController::class, 'arsip'])->name('arsipverifikasi');
Route::post('/admin/updatev erifikasiecourse/{id}', [PembayaranEcourseController::class, 'updateverifikasi'])->name('updateverifikasi');

//template sertif
Route::get('/admin/templatesertif', [TemplateSertifController::class, 'index'])->name('indextemplatesertif')->middleware('admin');
Route::post('/admin/uploadtemplatesertif', [TemplateSertifController::class, 'create'])->name('uploadtemplatesertif');

//Ticykit
Route::get('/admin/ticykitworksheet', [AdminController::class, 'ticykitworksheet'])->name('ticykitworksheet')->middleware('admin');
Route::get('/admin/ticykitworksheet/tambahworksheet', [AdminController::class, 'tambahworksheet'])->name('tambahworksheet');
Route::post('/admin/tambahdataworksheet', [AdminController::class, 'tambahdataworksheet'])->name('tambahdataworksheet');


// });

//search sertif
Route::get('/sertifikat/16-19Oktober2023/search', [SertifController::class, 'search']);
Route::get('/sertifikat/7-9November/search', [SertifController::class, 'search2']);
Route::get('/sertifikat/9-11November/search', [SertifController::class, 'search3']);
Route::get('/sertifikat/1-4November2023Revisi/search', [SertifController::class, 'search1rev']);
Route::get('/sertifikat/16-19November2023Revisi/search', [SertifController::class, 'search1619nov'])->name('search16-19nov');
Route::get('/sertifikat/16-19November2023Revisi-1/search', [SertifController::class, 'search1619novrev'])->name('search16-19novrev');
Route::get('/sertifikat/1-4Desember/search', [SertifController::class, 'search1des'])->name('search1-4des');
Route::get('/sertifikat/1-4DesemberRevisi/search', [SertifController::class, 'search1desrev'])->name('search1-4desrev');
Route::get('/sertifikat/Desember2-2023/search', [SertifController::class, 'search2des'])->name('search16-19des');
Route::get('/sertifikat/Desember2-2023rev/search', [SertifController::class, 'search2desrev'])->name('search16-19desrev');
Route::get('/sertifikat/Januari1-2024', [SertifController::class, 'search5jan'])->name('search5-8des');
Route::get('/sertifikat/Januari1214-2024', [SertifController::class, 'search12jan'])->name('search12-14des');
Route::get('/sertifikat/Januari1-2024rev', [SertifController::class, 'search5janrev'])->name('search5-8desrev');
Route::get('/sertifikat/Januari1214-2024rev', [SertifController::class, 'search12janrev'])->name('search12-14desrev');
Route::get('/sertifikat/Januari2023-2024a', [SertifController::class, 'search20jana'])->name('search20-23jana');
Route::get('/sertifikat/Januari2023-2024b', [SertifController::class, 'search20janb'])->name('search20-23janb');
Route::get('/sertifikat/Januari2023-2024c', [SertifController::class, 'search20janc'])->name('search20-23janc');
Route::get('/sertifikat/Januari2023-2024d', [SertifController::class, 'search20jand'])->name('search20-23jand');
Route::get('/sertifikat/Januari2023-2024e', [SertifController::class, 'search20jane'])->name('search20-23jane');
Route::get('/sertifikat/Januari2023-2024f', [SertifController::class, 'search20janf'])->name('search20-23janf');
Route::get('/sertifikat/Januari2023-2024g', [SertifController::class, 'search20jang'])->name('search20-23jang');
Route::get('/sertifikat/Januari2427-2024', [SertifController::class, 'search24jan'])->name('search24-27jan');
Route::get('/sertifikat/Januari2023-2024revisi', [SertifController::class, 'search20janrevisi'])->name('search20-23janrevisi');
Route::get('/sertifikat/Januari2023-2731', [SertifController::class, 'search27jan'])->name('search27-31jan');
// 1-4 feb 2024
Route::get('/sertifikat/1-4Februari2024ab', [SertifController::class, 'search1febab'])->name('search1-4febab');
Route::get('/sertifikat/1-4Februari2024cd', [SertifController::class, 'search1febcd'])->name('search1-4febcd');
Route::get('/sertifikat/1-4Februari2024ef', [SertifController::class, 'search1febef'])->name('search1-4febef');
Route::get('/sertifikat/1-4Februari2024gi', [SertifController::class, 'search1febgi'])->name('search1-4febgi');
Route::get('/sertifikat/1-4Februari2024jl', [SertifController::class, 'search1febjl'])->name('search1-4febjl');
Route::get('/sertifikat/1-4Februari2024m', [SertifController::class, 'search1febm'])->name('search1-4febm');
Route::get('/sertifikat/1-4Februari2024n', [SertifController::class, 'search1febn'])->name('search1-4febn');
Route::get('/sertifikat/1-4Februari2024or', [SertifController::class, 'search1febor'])->name('search1-4febor');
Route::get('/sertifikat/1-4Februari2024s', [SertifController::class, 'search1febs'])->name('search1-4febs');
Route::get('/sertifikat/1-4Februari2024tz', [SertifController::class, 'search1febtz'])->name('search1-4febtz');

Route::get('/sertifikat/Januari2427-2024rev', [SertifController::class, 'search24janrev'])->name('search24-27janrev');
Route::get('/sertifikat/Januari2831-2024rev', [SertifController::class, 'search28janrev'])->name('search28-31janrev');
Route::get('/sertifikat/6-9Februari2024', [SertifController::class, 'search6feb'])->name('search6feb');
Route::get('/sertifikat/1-4Februari2024rev', [SertifController::class, 'search1febrev'])->name('search1-4febrev');
Route::get('/sertifikat/9-12Februari2024', [SertifController::class, 'search9feb'])->name('search9-12feb');
Route::get('/sertifikat/6-9Februari2024rev', [SertifController::class, 'search6febrev'])->name('search6febrev');
Route::get('/sertifikat/13-15Februari2024', [SertifController::class, 'search13feb'])->name('search13feb');
Route::get('/sertifikat/9-12Februari2024rev', [SertifController::class, 'search9febrev'])->name('search9-12febrev');
Route::get('/sertifikat/13-15Februari2024rev', [SertifController::class, 'search13febrev'])->name('search13febrev');

//Show abjad sertif
Route::get('/sertifikat/16-19Oktober2023', [SertifController::class, 'showabjad'])->name('showabjad');


//show sertif
Route::get('/event/sertif/1-4November2023', [SertifController::class, 'showsertif'])->name('eventsertif');
Route::get('/event/sertif/7-9November2023', [SertifController::class, 'showsertif2'])->name('eventsertif7-9nov');
Route::get('/event/sertif/9-11November2023', [SertifController::class, 'showsertif3'])->name('eventsertif9-22nov');
Route::get('/event/sertif/1-4November2023Revisi', [SertifController::class, 'showsertif1revisi'])->name('eventsertif1revisi');
Route::get('/event/sertif/16-19November2023', [SertifController::class, 'showsertif1619nov'])->name('eventsertif16-19nov');
Route::get('/event/sertif/16-19November2023Revisi', [SertifController::class, 'showsertif1619novrev'])->name('eventsertif16-19novrev');
Route::get('/event/sertif/1-4Desember2023', [SertifController::class, 'showsertif1des'])->name('eventsertif1-4des');
Route::get('/event/sertif/1-4Desember2023Revisi', [SertifController::class, 'showsertif1desrev'])->name('eventsertif1-4desrev');
Route::get('/event/sertif/Desember2-2023', [SertifController::class, 'showsertif2des'])->name('eventsertif16-19desrev');
Route::get('/event/sertif/Desember2-2023rev', [SertifController::class, 'showsertif2desrev'])->name('eventsertif16-19desrev2');
Route::get('/event/sertif/Januari1-2024', [SertifController::class, 'showsertif5jan'])->name('eventsertif5-8jan');
Route::get('/event/sertif/Januari1214-2024', [SertifController::class, 'showsertif12jan'])->name('eventsertif12-14jan');
Route::get('/event/sertif/Januari1-2024rev', [SertifController::class, 'showsertif5janrev'])->name('eventsertif5-8janrev');
Route::get('/event/sertif/Januari1214-2024rev', [SertifController::class, 'showsertif12janrev'])->name('eventsertif12-14janrev');
Route::get('/event/sertif/Januari2023-2024a', [SertifController::class, 'showsertif20jana'])->name('eventsertif20-23jana');
Route::get('/event/sertif/Januari2023-2024b', [SertifController::class, 'showsertif20janb'])->name('eventsertif20-23janb');
Route::get('/event/sertif/Januari2023-2024b', [SertifController::class, 'showsertif20janb'])->name('eventsertif20-23janb');
Route::get('/event/sertif/Januari2023-2024c', [SertifController::class, 'showsertif20janc'])->name('eventsertif20-23janc');
Route::get('/event/sertif/Januari2023-2024d', [SertifController::class, 'showsertif20jand'])->name('eventsertif20-23jand');
Route::get('/event/sertif/Januari2023-2024e', [SertifController::class, 'showsertif20jane'])->name('eventsertif20-23jane');
Route::get('/event/sertif/Januari2023-2024f', [SertifController::class, 'showsertif20janf'])->name('eventsertif20-23janf');
Route::get('/event/sertif/Januari2023-2024g', [SertifController::class, 'showsertif20jang'])->name('eventsertif20-23jang');
Route::get('/event/sertif/Januari2427-2024', [SertifController::class, 'showsertif24jan'])->name('eventsertif24-27jan');
Route::get('/event/sertif/Januari2023-2024revisi', [SertifController::class, 'showsertif20janrevisi'])->name('eventsertif20-23janrevisi');
Route::get('/event/sertif/Januari2731-2024', [SertifController::class, 'showsertif27jan'])->name('eventsertif27-31jan');
// sertif 1-4 feb
Route::get('/event/sertif/1-4Februari2024ab', [SertifController::class, 'showsertif1febab'])->name('eventsertif1-4febab');
Route::get('/event/sertif/1-4Februari2024cd', [SertifController::class, 'showsertif1febcd'])->name('eventsertif1-4febcd');
Route::get('/event/sertif/1-4Februari2024ef', [SertifController::class, 'showsertif1febef'])->name('eventsertif1-4febef');
Route::get('/event/sertif/1-4Februari2024gi', [SertifController::class, 'showsertif1febgi'])->name('eventsertif1-4febgi');
Route::get('/event/sertif/1-4Februari2024jl', [SertifController::class, 'showsertif1febjl'])->name('eventsertif1-4febjl');
Route::get('/event/sertif/1-4Februari2024m', [SertifController::class, 'showsertif1febm'])->name('eventsertif1-4febm');
Route::get('/event/sertif/1-4Februari2024n', [SertifController::class, 'showsertif1febn'])->name('eventsertif1-4febn');
Route::get('/event/sertif/1-4Februari2024or', [SertifController::class, 'showsertif1febor'])->name('eventsertif1-4febor');
Route::get('/event/sertif/1-4Februari2024s', [SertifController::class, 'showsertif1febs'])->name('eventsertif1-4febs');
Route::get('/event/sertif/1-4Februari2024tz', [SertifController::class, 'showsertif1febtz'])->name('eventsertif1-4febtz');

Route::get('/event/sertif/Januari2427-2024rev', [SertifController::class, 'showsertif24janrev'])->name('eventsertif24-27janrev');
Route::get('/event/sertif/Januari2831-2024rev', [SertifController::class, 'showsertif28janrev'])->name('eventsertif28-31janrev');
Route::get('/event/sertif/1-4Februari2024rev', [SertifController::class, 'showsertif1febrev'])->name('eventsertif1-4febrev');
Route::get('/event/sertif/9-12Februari2024', [SertifController::class, 'showsertif9feb'])->name('eventsertif9-12feb');
Route::get('/event/sertif/6-9Februari2024rev', [SertifController::class, 'showsertif6febrev'])->name('eventsertif6-9febrev');
Route::get('/event/sertif/13-15Februari2024', [SertifController::class, 'showsertif13feb'])->name('eventsertif13-15feb');
Route::get('/event/sertif/9-12Februari2024rev', [SertifController::class, 'showsertif9febrev'])->name('eventsertif9-12febrev');
Route::get('/event/sertif/13-15Februari2024rev', [SertifController::class, 'showsertif13febrev'])->name('eventsertif13-15febrev');


Route::get('/rekappeserta/1-4maret2024', [RekappesertaController::class, 'index'])->name('rekap1-4mar');
Route::get('/rekappeserta/1-4maret2024/search', [RekappesertaController::class, 'search'])->name('searchrekap');


Route::get('kirim-email', 'App\Http\Controllers\MailController@index');
// Route::get('emailverifikasiworkshop', [MailController::class, 'verifikasiworkshop']->name('emailverifikasiworkshop'));
