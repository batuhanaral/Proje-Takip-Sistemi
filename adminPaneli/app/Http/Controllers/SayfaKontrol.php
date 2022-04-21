<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Hocalar;
use App\Models\Fakulte;
use App\Models\Bolum;
use App\Models\Ogrenciler;
use App\Models\Kullanicilar;

use Illuminate\Http\Request;

class SayfaKontrol extends Controller
{
    function __construct()//hiçbir fonksiyon çağrılmadan çalışan fonksiyon
    {  
       // moduller tablosundaki durumu 1 olan değerleri paylaş
        //moduller değişkenine moduller tablosundaki durumu 1 olan değerleri tanımla ve viewe gönder
    }
    
    public function sablon()
    {
        return view("admin.dinamik.anasayfa");
    }
    public function hocaEkle()
    {
        return view("admin.dinamik.hocaEkle");
    }
    public function hocaEklePost(Request $request)
    {
        
        $request->validate([
            "adsoyad"=>'required',
            "unvan"=>'required',
            "email"=>'required'
        ]);
        $hocaAdsoyad=$request->adsoyad;
        $hocaSeflink=Str::of($hocaAdsoyad)->slug('');
        $hocaUnvan=$request->unvan;
        $hocaEmail=$request->email;
        $hocaKontrol=Hocalar::whereEmail($hocaEmail)->first(); //bu isimde hoca var mı kontrol
        if($hocaKontrol)
        {
            return redirect()->route("hocaEkle")->with("hata","Sistemde kayıtlı hoca girmek istediniz !!"); // redirect yönlendirme
        }
        else
        {
            $bolumID=$request->bolum_id;
            if($bolumID==1 || $bolumID==2 || $bolumID==3 || $bolumID==4)
            {
                $fakulteID=1;
                Hocalar::create([
                    "adsoyad"=>$hocaAdsoyad,
                    "seflink"=>$hocaSeflink,
                    "unvan"=>$hocaUnvan,
                    "email"=>$hocaEmail,
                    "fakulte_id"=>$fakulteID,
                    "bolum_id"=>$request->bolum_id,
                ]);
                Kullanicilar::create([
                    "email"=>$hocaEmail,
                    "sifre"=>"oguz123",
                    "gorev"=>2
                ]);

            }
            
        return redirect()->route("hocaEkle")->with("basarili","İşleminiz Başarılı");
        
        }
    }

    public function ogrenciEkle()
    {
            $hocalarTeknoloji=Hocalar::where("fakulte_id",1)->get();
            $bolumlerTeknoloji=Bolum::where("fakulte_id",1)->get();          
            return view("admin.dinamik.ogrenciEkle",compact(['hocalarTeknoloji','bolumlerTeknoloji']));

    }
    public static function ogrenciEklePost(Request $request)
    {
        
        $request->validate([
            "ogr_no"=>'required',
            "adSoyad"=>'required',
            "email"=>'required',
            "telefon"=>'required',
            "sinif"=>'required'
        ]);
        $resimDosyasi=$request->file('resim');
        $ogrenciKontrol=Ogrenciler::where("ogr_no",$request->ogr_no)->first(); //bu numaralı öğrenci var mı
        if($ogrenciKontrol)
        {
            return redirect()->route("ogrenciEkle")->with("hata","Sistemde kayıtlı öğrenci girmek istediniz !!"); // redirect yönlendirme
        }
        else
        {
            if($resimDosyasi)
            {
                $resim=$resimDosyasi->getClientOriginalName();
                $resimDosyasi->move(public_path("images/".$request->ogr_no),$resim);
                
                Ogrenciler::create([
                    "ogr_no"=>$request->ogr_no,
                    "adSoyad"=>$request->adSoyad,
                    "email"=>$request->email,
                    "telefon"=>$request->telefon,
                    "sinif"=>$request->sinif,
                    "resim"=>$resim
                    
                ]);
            }
            else
            {
                $bolumID=$request->bolum_id;
                
                if($bolumID==1 || $bolumID==2 || $bolumID==3 || $bolumID==4)
                {
                    $HocaAdet=0;
                    $fakulteID=1;
                    $hocalarTeknoloji=Hocalar::where("fakulte_id",$fakulteID)->get();
                    
                    foreach($hocalarTeknoloji as $hoca)
                    {
                        $HocaAdet++; // random komutu 0 ile sayaç arasında  
                    }
                    $hoca=Hocalar::where("id",$request->hoca)->first();
                    
                    if($hoca)
                    {
                        $hocaID=$hoca->id;
                        $hocaSAYAC=$hoca->sayac;
                        $hocaSAYAC++;
                        $ogrenciSeflink=Str::of($request->adSoyad)->slug('');
                        Ogrenciler::create([
                            "ogr_no"=>$request->ogr_no,
                            "adSoyad"=>$request->adSoyad,
                            "seflink"=>$ogrenciSeflink,
                            "email"=>$request->email,
                            "telefon"=>$request->telefon,
                            "sinif"=>$request->sinif,
                            "hoca_id"=>$hocaID,
                            "fakulte_id"=>$fakulteID,
                            "bolum_id"=>$bolumID,
                        ]);
                        Hocalar::where("id",$hocaID)->update([
                            "sayac"=>$hocaSAYAC,
                        ]);
                        Kullanicilar::create([
                            "email"=>$request->email,
                            "gorev"=>3
                        ]);
                        
                    }
                       
                }
            }
                return redirect()->route("ogrenciEkle")->with("basarili","İşleminiz Başarılı");
        }
    }

    public function ogrenciListele($Seflink)
    {
        $hocaID=Hocalar::where("seflink",$Seflink)->first();
        $hocaOgrenciler=Ogrenciler::where("hoca_id",$hocaID->id)->get();
        return view("admin.dinamik.liste",compact('hocaOgrenciler'));
    }
    public function projeListele($Seflink,$ogrenciID)
    {
        $ogrenciBilgiler=Ogrenciler::where("id",$ogrenciID)->first();
        return view("admin.dinamik.projeListesi",compact('ogrenciBilgiler'));
    }

    public function projeOnerisi($seflink)
    {
        
        return view("admin.dinamik.projeOneri");
    }

}
