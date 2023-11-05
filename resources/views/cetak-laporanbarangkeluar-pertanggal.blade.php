<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <style>
        table.static {
            position:relative;
            border: 1px solid #543535;
        }
    </style>
    <title>Cetak Laporan Barang Keluar</title>
  </head>
  <body>
    <div class="form_group">
        <p align="center"><b>CV. Amarta Furniture</b></p>
    <p align="center"><b>Laporan Barang Keluar</b></p>
    <p align="center">Rentang Tanggal: {{date('d-M-Y', strtotime( $tglawal)) }} sampai {{date('d-M-Y', strtotime( $tglakhir)) }}</p>
    <table class="static" align="center" rules="all" border="1px" style="width: 95%">
        <thead>
            <tr>
                <th>Id Keluar</th>
                <th>Id Permintaan Barang</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Tanggal Keluar</th>
                <th>Jumlah Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cetak as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->id_pbarang}}</td>
                <td>{{$data->kodebarang}}</td>
                <td>{{$data->barang['namabarang']}}</td>
                <td>{{$data->barang['jenis']}}</td>
                <td>{{$data->tglkeluar}}</td>
                <td>{{$data->jmlahkeluar}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
  </body>
</html>