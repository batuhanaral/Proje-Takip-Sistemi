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
                <h3 class="card-title">Proje Öneri Formu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(session('basarili'))
                <div class="alert alert-success">{{session('basarili')}}</div>
              @endif
              @if(session('hata'))
                <div class="alert alert-danger">{{session('hata')}}</div>
                @endif
              <form method="post" action="">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Proje Başlık</label>
                    <input type="text" class="form-control" placeholder="Başlık" name="baslik">
                  </div>
                  <div class="form-group">
                    <label for="">Proje Konusu</label>
                    <textarea class="form-control" placeholder="Konu" name="konu" style="height:200px;"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Proje Yöntemleri</label>
                    <textarea class="form-control" placeholder="Yöntemler-Araştırmalar" name="yontem" style="height:200px;"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Anahtar Kelimeler</label>
                    <input type="text" class="form-control" placeholder="Anahtar Kelimeler" name="anahtar">
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Onayla">
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