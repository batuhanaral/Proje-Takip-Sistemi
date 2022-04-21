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
                <h3 class="card-title">Öğretim Görevlisi Ekleme Formu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(session('basarili'))
                <div class="alert alert-success">{{session('basarili')}}</div>
              @endif
              @if(session('hata'))
                <div class="alert alert-danger">{{session('hata')}}</div>
                @endif
              <form method="post" action="{{route('hocaEklePost')}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Ad Soyad</label>
                    <input type="text" class="form-control" placeholder="Adı Soyadı" name="adsoyad">
                  </div>
                  <div class="form-group">
                    <label for="">Ünvan</label>
                    <select type="number" class="form-control input-default" name="unvan">
                      <option value="profesor">Profesor</option>
                      <option value="docent">Doçent</option>
                      <option value="doktorOgretimUyesi">Doktor Öğretim Üyesi</option>
                      <option value="ogretimGorevlisi">Öğretim Görevlisi</option>
                      <option value="arastirmaGorevlisi">Araştırma Görevlisi</option>
                  </select>
                  </div>
                  <div class="form-group">
                    <label>E-Posta adresi</label>
                    <input type="email" class="form-control" placeholder="E-Posta adresi" name="email">
                  </div>
                  <div class="form-group">
                    <label for="">Fakülte</label>
                    <select type="number" class="form-control input-default" name="bolum_id">
                    <optgroup label="Teknoloji">
                    <option value="1">Bilişim Sistemleri Mühendisliği</option>
                    <option value="2">Enerji Sistemleri Mühendisliği</option>
                    <option value="3">Biyomedikal Mühendisliği</option>
                    <option value="4">Otomotiv Mühendisliği</option>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Hoca Ekle">
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