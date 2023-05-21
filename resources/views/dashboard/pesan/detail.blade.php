@extends('dashboard.layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
 
                    <a href="{{ url('pesan') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-refresh"></i> Kembali</a>
                </p>
            </div>
            <div class="box-body">
               <table class="table table-hover">
                   <tbody>
                       <tr>
                           <th width="10px">Judul </th>
                           <td width="10px">:</td>
                           <td>{{ $dt->judul }}</td>
                           <th style="text-align: right;">{{ date('d M Y H:i:s',strtotime($dt->created_at)) }}</th>
                        </tr>
                        <tr>
                           <th width="10px">Pengirim </th>
                           <td width="10px">:</td>
                           <td colspan="2">{{ $dt->users_r->name }}</td>
                           
                        </tr>
 
                       <tr>
                           <th width="10px">Isi Pesan</th>
                           <td colspan="3">:</td>   
                       </tr>
                       <tr>
                       <td colspan="4">{!! $dt->keterangan !!}</td>
                       </tr>
                   </tbody>
               </table>
            </div>
        </div>
    </div>
</div>
 
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