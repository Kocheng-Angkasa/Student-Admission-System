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
                        <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i>
                            Refresh</button>
                        <a href="{{ url('peserta') }}" class="btn btn-sm btn-flat btn-primary"><i
                                class="fa fa-refresh"></i> All Peserta</a>

                        <a href="{{ url('peserta/verifikasi') }}" class="btn btn-sm btn-flat btn-success"><i
                                class="fa fa-refresh"></i> Di verfifikasi</a>

                        <a href="{{ url('peserta/belum-verifikasi') }}" class="btn btn-sm btn-flat btn-danger"><i
                                class="fa fa-refresh"></i> Belum Di verfifikasi</a>
                    </p>
                    </p>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Aksi</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Email</th>
                                    <th>ID Registrasi</th>
                                    <th>No. Whatsapp</th>
                                    <th>Alamat</th>
                                    <th>Download</th>
                                    <th>Verifikasi</th>
                                    <th>Lulus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $e => $dt)
                                    <tr>
                                        <td>{{ $e + 1 }}</td>
                                        <td>
                                        <div style="width:60px">
                                        @if ($dt->biodata_r_count > 0)
                                        <a href="{{ url('peserta/'.$dt->id) }}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
                                        @else

                                        @endif
                                            <button href="{{ url('peserta/'.$dt->id) }}" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                        </div>
                                </td>
                                <td>
                                    <img src="{{ asset($dt->photo) }}" style="width: 100px;">
                                </td>
                                        <td>{{ $dt->name }}</td>
                                        <td>{{ $dt->nisn }}</td>
                                        <td>{{ $dt->email }}</td>
                                        <td>{{ $dt->id_registrasi }}</td>
                                        <td>{{ $dt->biodata_r->no_wa }}</td>
                                        <td>{{ $dt->biodata_r->alamat }}</td>
                                        @if ($dt->biodata_r_count > 0)
                                            <td>
                                                <p>
                                                    <a href="{{ asset($dt->biodata_r->akta) }}" class="btn btn-xs btn-success" download="">Download Akta</a>
                                                    <a href="{{ asset($dt->biodata_r->kk) }}" class="btn btn-xs btn-success" download="">Download KK</a>
                                                </p>
                                            </td>
                                        @else
                                        <td>
                                        <label class="label label-danger">Belum Melengkapi Data</label>
                                            </td>
                                        @endif 

                                        @if ($dt->biodata_r_count > 0)
                                        @if ($dt->is_verifikasi == 1)
                                            <td>
                                                <label class="label label-success">Sudah Verifikasi</label>
                                            </td>
                                        @else
                                            <td>
                                                <label class="label label-danger">Belum Diverifikasi</label>
                                            </td>
                                        @endif
                                        @else
                                        <td>
                                                
                                            </td>
                                        @endif
                                        
                                        @if ($dt->is_verifikasi == 1)
                                        @if($dt->is_lulus == null)
                                        <td>
                                                <p>
                                                <a href="{{ url('peserta/'.$dt->id.'/lulus') }}" class="btn btn-xs btn-primary">Luluskan</a>
                                                </p>
                                            </td>
                                        <td>
                                            @else
                                            <td>
                                                <p>
                                                <label class="label label-info">Sudah Lulus</label>
                                                </p>
                                            </td>
                                        <td>
                                            
                                            @endif
                                        </td>
                                        @else
                                            <td>
                                                <label> </label>
                                            </td>
                                        @endif

                                      
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

        @endif
    

@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function() {

            // btn refresh
            $('.btn-refresh').click(function(e) {
                e.preventDefault();
                $('.preloader').fadeIn();
                location.reload();
            })

        })
    </script>

@endsection
