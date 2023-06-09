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
               
                <form role="form" method="post" action="{{ url('verifikasi') }}">
                    @csrf
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">ID Pendaftaran</label>
                      <input type="text" name="id_pendaftaran" class="form-control" id="exampleInputEmail1" placeholder="Masukkan ID Pendaftaran">
                    </div>
                  </div>
                  <!-- /.box-body -->
     
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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