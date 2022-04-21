<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Kullanicilar;
use App\Models\Ogrenciler;
use App\Models\Hocalar;


class GirisIslemleri extends Controller
{
    public function girisSecimi()
    {
        $kullanicilar=Kullanicilar::where("gorev",1)->first();
        if($kullanicilar)
        {
            
            return view("admin.girisler.girisEkrani");
        }
        else
        {
            Kullanicilar::create([
                'adSoyad'=>"admin",
                'seflink'=>'admin',
                'email'=>"admin@gmail.com",
                'password'=>bcrypt(123),
                'gorev'=>1
            ]);
            return view("admin.girisler.adminGiris");
        }
        //kullanıcılardan gelen değer true   
        
    }
    public function adminGiris(Request $request)
    {
        return view("admin.girisler.adminGiris");
    }
    public function adminGirisPost(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->sifre]))
        {
            return view("admin.dinamik.anasayfa");
        }
    }
    
    public function ogrenci()
    {
        return view("admin.girisler.ogrenciGiris");
    }
    public function hoca()
    {
        return view("admin.girisler.hocaGiris");
    }
    
    public function ogrenciPost(Request $request)
    {
        
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->sifre])) //'email' kısmına foreach içerisindeki değişken
        {
            $ogrenci=Ogrenciler::where("email",$request->email)->first();
            Kullanicilar::where("email",$request->email)->update([
                "adSoyad"=>$ogrenci->adSoyad,
                "seflink"=>$ogrenci->seflink
            ]);
            return redirect()->route('sablon2');
        }
        else
        {
            return redirect()->back()->with("hata","Eposta ya da şifre hatalı");
        }
        //hata
    }
    
    public function ogrenciSifreAl()
    {
        return view("admin.girisler.sifreAlOgrenci");
    }
    public function ogrenciSifreAlPost(Request $request)
    {
        $ogrenciler=Kullanicilar::where("gorev",3)->get();
        $sifre=bcrypt($request->sifre);
        foreach($ogrenciler as $ogrenci)
        {
            if($request->email==$ogrenci->email)
            {
                Kullanicilar::where("email",$ogrenci->email)->update([
                    "password"=>$sifre,
                ]);

                return view("admin.girisler.ogrenciGiris");
            }
        } 
    }
    public function hocaPost(Request $request)
    {
        $hoca=Hocalar::where("email",$request->email)->first();
        
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->sifre])) //'email' kısmına foreach içerisindeki değişken
        {
            Kullanicilar::where("email",$request->email)->update([
                "adSoyad"=>$hoca->adsoyad,
                "seflink"=>$hoca->seflink
            ]);
            return view("admin.dinamik.anasayfa");
        }
        else
        {
            return redirect()->back()->with("hata","Eposta ya da şifre hatalı");
        }
        //hata
    }

    public function hocaSifreAl()
    {
        return view("admin.girisler.sifreAlHoca");
    }
    public function hocaSifreAlPost(Request $request)
    {
        $hocalar=Kullanicilar::where("gorev",2)->get();
        $sifre=bcrypt($request->sifre);
        foreach($hocalar as $hoca)
        {
            if($request->email==$hoca->email)
            {
                Kullanicilar::where("email",$hoca->email)->update([
                    "password"=>$sifre,
                ]);

                return view("admin.girisler.hocaGiris");
            }
        } 
    }
    public function cikis()
    {
        Auth::logout();
        return view("admin.girisler.girisEkrani");
        //yönlendirme
    }

    
}
