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
    <title>Cetak Laporan Barang Masuk</title>
  </head>
  <body>
    <div class="form_group">
        <p align="center"><b>CV. Amarta Furniture</b></p>
    <p align="center"><b>Laporan Barang Masuk</b></p>
    <p align="center">Rentang Tanggal: {{date('d-M-Y', strtotime( $tglawal)) }} sampai {{date('d-M-Y', strtotime( $tglakhir)) }}</p>
    <table class="static" align="center" rules="all" border="1px" style="width: 95%">
        <thead>
            <tr>
                <th>Id Barang Masuk</th>
                <th>Id Produksi</th>
                <th>Tanggal Produksi</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Tanggal Masuk</th>
                <th>Jumlah Masuk</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cetak as $data)
            <tr>
                <td>{{$data->id}}</td>
                    <td>{{$data->id_produksi}}</td>
                    <td>{{$data->tanggal_produksi}}</td>
                    <td>{{$data->kodebarang}}</td>
                    <td>{{$data->barang['namabarang']}}</td>
                    <td>{{$data->barang['jenis']}}</td>
                    <td>{{$data->tglmasuk}}</td>
                    <td>{{$data->jmlahmasuk}}</td>
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