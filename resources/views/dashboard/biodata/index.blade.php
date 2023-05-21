@extends('dashboard.layouts.master')
 
@section('content')
 
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

              @if($cek < 1)
              <form role="form" method="POST" action=" {{ url('/biodata/'.\Auth::user()->id) }}" enctype="multipart/form-data">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">No. Whatsapp</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" 
                  placeholder="Masukkan No. Whatsapp anda" name="no_wa" value="{{ old('no_wa') }}">
                  @error('no_wa')
                <span class="text-danger">
			            Nomor Whatsapp harus diisi !
		            </span>
                @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tempat Lahir</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" 
                  placeholder="Masukkan tempat lahir anda" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                  @error('tempat_lahir')
                <span class="text-danger">
			            Tempat lahir harus diisi !
		            </span>
                @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Lahir</label>
                  <input type="text" class="form-control datepicker" id="exampleInputPassword1" 
                  placeholder="Masukkan tanggal lahir anda" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                  autocomplete="off">
                  @error('tanggal_lahir')
                <span class="text-danger">
			            Tanggal lahir harus diisi !
		            </span>
                @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <textarea class="form-control" name="alamat" rows="5">{{ old('alamat') }}</textarea>
                  @error('alamat')
                <span class="text-danger">
			            Alamat harus diisi !
		            </span>
                @enderror                  
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Upload Akta Kelahiran</label>
                  <input type="file" name="akta" class="form-control" value="{{ old('akta') }}" id="exampleInputPassword1" autocomplete="off">
                  @error('akta')
                <span class="text-danger">
			            Harus mengupload Akta Kelahiran !</br>atau upload ulang Akta Kelahiran
		            </span>
                @enderror
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Upload Kartu Keluarga</label>
                  <input type="file" name="kk" class="form-control" id="exampleInputPassword1" autocomplete="off">
                  @error('kk')
                <span class="text-danger">
			            Harus mengupload kartu Keluarga !</br>atau upload ulang Kartu Keluarga
		            </span>
                @enderror
                </div> </br>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="flexCheckDefault" required>
                  <label class="form-check-label text-danger" for="flexCheckDefault">
                    Data hanya bisa dilengkapi 1 kali. Apakah data yang anda kirim telah sesuai ?
                  </label></br>
                </div> </br>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="flexCheckDefault" required>
                  <label class="form-check-label text-danger" for="flexCheckDefault">
                    Data yang saya kirim benar dan dapat dipertanggungjawabkan oleh hukum
                  </label></br>
                </div>
                
              <!-- /.box-body -->
 
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" onclick="if(!this.form.checkbox.checked){alert('Anda belum menyutujui persyaratan dari kami !');return false}">Submit</button>
              </div>
            </form>

            @else
            <form role="form" method="POST" action=" {{ url('/biodata/'.\Auth::user()->id) }}" enctype="multipart/form-data">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">No. Whatsapp</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" 
                  placeholder="Masukkan No. Whatsapp anda" name="no_wa" value="{{ $dt->no_wa }}" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tempat Lahir</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" 
                  placeholder="Masukkan tempat lahir anda" name="tempat_lahir" value="{{ $dt->tempat_lahir }}" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Lahir</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" 
                  placeholder="Masukkan tanggal lahir anda" name="tanggal_lahir" 
                  autocomplete="off" value="{{ $dt->tanggal_lahir }}" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <textarea class="form-control" name="alamat" rows="5" readonly>{{ $dt->alamat }}</textarea>                  
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Akta Kelahiran</label>
                  <input type="text" name="akta" class="form-control" id="exampleInputPassword1" value="{{ $dt->akta }}" autocomplete="off" readonly>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Kartu Keluarga</label>
                  <input type="text" name="kk" class="form-control" id="exampleInputPassword1" value="{{ $dt->kk }}" autocomplete="off" readonly>
                </div>
               
              </div>
              <!-- /.box-body -->
 
              <div class="box-footer">
                <h class="text-danger"><b>Kamu sudah melengkapi data. Hubungi admin melalui kolom pesan untuk merequest pembaharuan data.</b></h></br>
              </div>
            </form>

              @endif
            </div>
        </div>
    </div>
</div>
 @foreach ($errors as $item)
     {{ $item->message }}
 @endforeach
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