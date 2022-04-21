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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Adı Soyadı</th>
                    <th>Bölümü</th>
                    <th>Sınıfı</th>
                    <th>Proje</th>
                    <th>Rapor</th>
                  </tr>
                  </thead>
                  <tbody>
                  @isset($hocaOgrenciler)
                    @foreach($hocaOgrenciler as $hocaOgrenci)
                    <tr>
                      <td>{{$hocaOgrenci->adSoyad}}</td>
                      <td>Internet
                        Explorer 4.0
                      </td>
                      <td>{{$hocaOgrenci->sinif}}</td>
                      <td> <a href="{{route('projeListele',[Auth()->user()->seflink,$hocaOgrenci->id])}}" class="btn btn-success">Projeleri</a></td>
                      <td> <a href="" class="btn btn-danger">Raporları</a></td>
                    </tr>
                    @endforeach
                  @endisset
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Öğrenci Adı Soyadı</th>
                    <th>Bölümü</th>
                    <th>Sınıfı</th>
                    <th>Proje</th>
                    <th>Rapor</th>
                  </tr>
                  </tfoot>
                </table>
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