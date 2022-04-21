@extends("admin.sablon")
@section("anasayfa")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kocaeli Üniversitesi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Modül Ekle</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Öğrenci Ekleme Formu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(session('basarili'))
                <div class="alert alert-success">{{session('basarili')}}</div>
              @endif
              @if(session('hata'))
                <div class="alert alert-danger">{{session('hata')}}</div>
                @endif
              <form method="post" action="{{route('ogrenciEklePost')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="">Öğrenci Numarası</label>
                    <input type="text" class="form-control" placeholder="Adı Soyadı" name="ogr_no">
                  </div>
                  <div class="form-group">
                    <label for="">Ad Soyad</label>
                    <input type="text" class="form-control" placeholder="Adı Soyadı" name="adSoyad">
                  </div>
                  <div class="form-group">
                    <label>E-Posta adresi</label>
                    <input type="email" class="form-control" placeholder="E-Posta adresi" name="email">
                  </div>
                  <div class="form-group">
                    <label for="">Telefon Numarası</label>
                    <input type="number" class="form-control"  placeholder="Telefon Numarası" name="telefon">
                  </div>
                  <div class="form-group">
                    <label for="">Fakülte</label>
                    <select type="number" class="form-control input-default" name="bolum_id">
                    <optgroup label="Teknoloji">
                    @if($bolumlerTeknoloji)
                      @foreach($bolumlerTeknoloji as $bolumler)
                      <option value="{{$bolumler->id}}">{{$bolumler->bolumAdi}}</option>
                      @endforeach
                    @endif
                    </optgroup>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Sınıf</label>
                  <select type="number" class="form-control input-default" name="sinif">
                      <option value="hazirlik">Hazırlık</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="">Hocalar</label>
                  <select type="number" class="form-control input-default" name="hoca">
                    <optgroup label="Teknoloji">
                    @if($hocalarTeknoloji)
                      @foreach($hocalarTeknoloji as $hocalar)
                      <option value="{{$hocalar->id}}" @if($hocalar->sayac>=10) disabled @endif>{{$hocalar->adsoyad}}</option>
                      @endforeach
                    @endif
                    </optgroup>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="">Resim</label>
                    <input type="file" class="form-control input-default" placeholder="Resim Alanı" name="resim">
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Öğrenci Ekle">
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    </div>  
@endsection