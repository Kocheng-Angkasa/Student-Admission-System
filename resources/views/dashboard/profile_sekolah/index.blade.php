@extends('dashboard.layouts.master')
 
@section('content')

@if(\Auth::user()->name != 'Admin')
<div class="row">
    <div class="col-md-12">

        <div class="box box-warning">
            <div class="box-body">
               
                <div class="row">
                    <div class="col-md">
                        <center>
                            <h1 class="text-danger">ANDA BUKAN ADMIN !!!</h1>
                        </center>
                </div>

            </div>
        </div>
    </div>
</div>
        @endif

@if(\Auth::user()->name == 'Admin')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">
               
                <form role="form" method="post" action="{{ url('profile-sekolah') }}" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                  <div class="box-body">
                  <div class="box box-warning">
                    <h2>Profil Sekolah</h2>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Sekolah</label>
                      <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Sekolah" value="{{ $dt->nama }}">
                    </div>
 
                    <div class="form-group">
                      <label for="exampleInputPassword1">No Telp</label>
                      <input type="text" name="no_telp" class="form-control" id="exampleInputPassword1" placeholder="No Telp" value="{{ $dt->no_telp }}">
                    </div>
 
                    <div class="form-group">
                      <label for="exampleInputPassword1">Alamat</label>
                      <textarea class="form-control" name="alamat" rows="5">{{ $dt->alamat }}</textarea>
                    </div>
 
                    <div class="form-group">
                      <label for="exampleInputFile">Logo Sekolah</label>
                      <input type="file" name="photo" id="exampleInputFile">
                    </div></br></br>
                    <div class="box box-warning">
                    <h2>Akademik</h2>
                    <div class="form-group">
                      <label for="exampleInputFile">Kalender Akademik(wajib pdf)</label>
                      <input type="file" name="akademik" id="exampleInputFile">
                    </div></br></br>
                    <div class="box box-warning">
                    <h2>Fasilitas</h2>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Judul fasilitas 1</label>
                      <input type="text" name="judul_fasilitas_1" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Judul Fasilitas 1" value="{{ $dt->judul_fasilitas_1 }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Deskripsi fasilitas 1</label>
                      <textarea class="form-control" name="desc_fasilitas_1" rows="5">{{ $dt->desc_fasilitas_1 }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Foto fasilitas 1</label>
                      <input type="file" name="pic_fasilitas_1" id="exampleInputFile">
                    </div></br>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Judul fasilitas 2</label>
                      <input type="text" name="judul_fasilitas_2" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Judul Fasilitas 1" value="{{ $dt->judul_fasilitas_1 }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Deskripsi fasilitas 2</label>
                      <textarea class="form-control" name="desc_fasilitas_2" rows="5">{{ $dt->desc_fasilitas_2 }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Foto fasilitas 2</label>
                      <input type="file" name="pic_fasilitas_2" id="exampleInputFile">
                    </div></br>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Judul fasilitas 3</label>
                      <input type="text" name="judul_fasilitas_3" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Judul Fasilitas 1" value="{{ $dt->judul_fasilitas_1 }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Deskripsi fasilitas 3</label>
                      <textarea class="form-control" name="desc_fasilitas_3" rows="5">{{ $dt->desc_fasilitas_3 }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Foto fasilitas 3</label>
                      <input type="file" name="pic_fasilitas_3" id="exampleInputFile">
                    </div>
      
                  </div>
                  <!-- /.box-body -->
                  
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
 
            </div>
        </div>
    </div>
</div>
@endif
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection