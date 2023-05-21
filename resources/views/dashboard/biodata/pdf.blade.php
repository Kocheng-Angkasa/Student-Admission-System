<!DOCTYPE html>
<!-- saved from url=(0105)https://s3-eu-west-1.amazonaws.com/htmlpdfapi.production/free_html5_invoice_templates/example2/index.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Bukti Pendaftaran</title>
    <link rel="stylesheet" href="./ex/style.css" media="all">
    <style>
      table td {
    text-align: center;
}
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
      
        <h2 class="name">{{ $sk->nama }}</h2>
        <div>{{ $sk->alamat }}</div>
        <div>{{ $sk->no_telp }}</div>
        <div><a href="mailto:ppdb@tadikamesra.com">ppdb@tadikamesra.com</a></div>
      </div>
      <div id="company">
      <img style="height: 78px;" src="{{ $sk->photo }}">
      </div>
      
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">Pemilik Dokumen :</div>
          <h2 class="name">{{ $dt->name }}</h2>
          <div>{{ $dt->id_registrasi }}</div>
        </div>

      </div>
      
      <table border="0" cellspacing="0" cellpadding="0">
      <thead>
          <tr>

            <th class="desc" style="font-size: 20px;" colspan="2">Data diri :</th>
          </tr>
        </thead>
        <tbody>
        <tr>
            <td class="descft" colspan="2"><img style="height: 200px;" src="{{ $dt->photo }}"></td>

          </tr>
          <tr>
            <td class="desc"><h3>Nama Lengkap</h3></td>
            <td class="unit">{{ $dt->name }}</td>
          </tr>
          <tr>
            <td class="desc"><h3>NISN</h3></td>
            <td class="unit">{{ $dt->nisn }}</td>
          </tr>
          <tr>
            <td class="desc"><h3>Alamat</h3></td>
            <td class="unit">{{ $dt->biodata_r->alamat }}</td>
          </tr>
          <tr>
            <td class="desc"><h3>TTL</h3></td>
            <td class="unit">{{ $dt->biodata_r->tempat_lahir }}, {{ $dt->biodata_r->tanggal_lahir }}</td>
          </tr>
          <tr>
            <td class="desc"><h3>Email</h3></td>
            <td class="unit">{{ $dt->email }}</td>
          </tr>
          <tr>
            <td class="desc"><h3>No. Whatsapp</h3></td>
            <td class="unit">{{ $dt->biodata_r->no_wa }}</td>
          </tr>
        </tbody>

      </table>
      
    </main>
    
    <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">Cetak dokumen ini dengan kertas A4</div>
        <div class="notice">Dokumen ini wajib dibawa saat daftar ulang</div>
      </div>
    <footer>
      
    <div>Dokumen ini diterbitkan oleh {{ $sk->nama }}</div>
    </footer>
  
</body></html>