<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SayfaKontrol;
use App\Http\Controllers\GirisIslemleri;
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

Route::get("/",[SayfaKontrol::class,"sablon"])->name('sablon');

Route::get("adminPaneli/giris-secimi",[GirisIslemleri::class,"girisSecimi"]);
Route::get("adminPaneli/admin-giris",[GirisIslemleri::class,"adminGiris"])->name("adminGirisPost");
Route::post("adminPaneli/admin-giris-post",[GirisIslemleri::class,"adminGirisPost"])->name("adminGirisPost");



Route::get("adminPaneli/ogrenci-giris",[GirisIslemleri::class,"ogrenci"])->name("ogrenciGiris");
Route::get("adminPaneli/ogrenci",[SayfaKontrol::class,"sablon"])->name("sablon2");
Route::post("adminPaneli/ogrenci",[GirisIslemleri::class,"ogrenciPost"])->name("ogrenciGirisPost");

Route::get("adminPaneli/ogrenci-sifre-al",[GirisIslemleri::class,"ogrenciSifreAl"])->name("ogrenciSifreAl");
Route::post("adminPaneli/ogrenci-sifre-al-post",[GirisIslemleri::class,"ogrenciSifreAlPost"])->name("ogrenciSifreAlPost");

Route::get("adminPaneli/hoca-giris",[GirisIslemleri::class,"hoca"])->name("hocaGiris");
Route::post("adminPaneli/hoca",[GirisIslemleri::class,"hocaPost"])->name("hocaGirisPost");

Route::get("adminPaneli/hoca-sifre-al",[GirisIslemleri::class,"hocaSifreAl"])->name("hocaSifreAl");
Route::post("adminPaneli/hoca-sifre-al-post",[GirisIslemleri::class,"hocaSifreAlPost"])->name("hocaSifreAlPost");

Route::get("adminPaneli/cikis-yapildi",[GirisIslemleri::class,"cikis"])->name("cikis");



Route::get("adminPaneli",[SayfaKontrol::class,"sablon"]);
Route::get("adminPaneli/hocaEkle",[SayfaKontrol::class,"hocaEkle"])->name("hocaEkle");
Route::post("adminPaneli/hocaEklePost",[SayfaKontrol::class,"hocaEklePost"])->name("hocaEklePost");

Route::get("adminPaneli/ogrenciEkle",[SayfaKontrol::class,"ogrenciEkle"])->name("ogrenciEkle");
Route::post("adminPaneli/ogrenciEklePost",[SayfaKontrol::class,"ogrenciEklePost"])->name("ogrenciEklePost");

Route::get("adminPaneli/liste/{hocaAdi}",[SayfaKontrol::class,"ogrenciListele"])->name("ogrenciListele");
Route::get("adminPaneli/projeListe/{hocaAdi}/{ogrenci}",[SayfaKontrol::class,"projeListele"])->name("projeListele");

Route::get("adminPaneli/projeOnerisi/{ogrenciAdi}",[SayfaKontrol::class,"projeOnerisi"])->name("projeOnerisi");
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
