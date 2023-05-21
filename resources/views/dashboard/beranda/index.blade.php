@extends('dashboard.layouts.master')
 
@section('content')

@if(\Auth::user()->name != 'Admin')
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="row">
                    <div class="col-md">
                        <center>
                            <h1>Selamat datang Calon Siswa {{ $sk->nama }}</h1>
                        </center>
                </div>
        </div>
    </div>
</div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header">

                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4">
                        <center>
                            <h1>{{ $pesan }}</h1>
                        </center>
 
                        @if($cek > 0)
                        <p>
                            
                            <center>
                                <a target="_blank" href="{{ url('cetak-biodata') }}" class="btn btn-flat btn-success">Cetak Bukti Pendaftaran</a>
                            </center>
                            </div>
                        </p>
                        @else
                        <p>
                            <center>
                                <a> </a>
                            </center>
                            </div>
                        </p>
                        @endif
                        <div class="col-md-4">
                        <center>
                            <h1>{{ $status }}</h1>
                        </center>
                        </div>
                        <div class="col-md-4">
                        <center>
                            <h1>{{ $pesan_lulus }}</h1>
                        </center>
                        </div>
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
            <div class="box-body">
               
                <div class="row">
                    <div class="col-md">
                        <center>
                            <h1>Selamat datang Admin PPDB</h1>
                        </center>
                </div>

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