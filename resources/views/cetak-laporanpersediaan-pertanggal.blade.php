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
    <title>Cetak Laporan Persediaan Barang</title>
  </head>
  <body>
    <div class="form_group">
        <p align="center"><b>CV. Amarta Furniture</b></p>
    <p align="center"><b>Laporan Persediaan Barang</b></p>
    <table class="static" align="center" rules="all" border="1px" style="width: 95%">
        <thead>
            <tr>
                <th>Kode Bahan Baku</th>
                <th>Nama</th>
                <th>tglmasuk</th>
                <th>jmlmasuk</th>
                <th>tglkeluar</th>
                <th>jmlkeluar</th>
                <th>stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cetak as $data)
            <tr>
                <td>{{$data->kodebarang}}</td>
                <td>{{$data->namabarang}}</td>
                <td>{{$data->tglmasuk}}</td>
                <td>{{$data->jmlahmasuk}}</td>
                <td>{{$data->tglkeluar}}</td>
                <td>{{$data->jmlahkeluar}}</td>
                <td>{{$data->stok}}</td>
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