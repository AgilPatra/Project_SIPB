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
    <title>Cetak Laporan Barang</title>
  </head>
  <body>
    <div class="form_group">
        <p align="center"><b>CV. Amarta Furniture</b></p>
    <p align="center"><b>Laporan Barang</b></p>
    <table class="static" align="center" rules="all" border="1px" style="width: 95%">
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Jenis</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cetak as $data)
            <tr>
              
                <td>{{$data->kodebarang}}</td>
                <td>{{$data->namabarang}}</td>
                <td>{{$data->stok}}</td>
                <td>{{$data->jenis}}</td>
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