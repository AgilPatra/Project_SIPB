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
    <title>Laporan Bahan Baku</title>
  </head>
  <body>
    <div class="form_group">
        <p align="center"><b>CV. Amarta Furniture</b></p>
    <p align="center"><b>Laporan Bahan Baku</b></p>
    <table class="static" align="center" rules="all" border="1px" style="width: 95%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Bahan Baku</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Size</th>
                <th>Kuantitas</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($bahanbakuList as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->kode_bahanbaku}}</td>
                    <td>{{$data->tanggal}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->jenis}}</td>
                    <td>{{$data->size}}</td>
                    <td>{{$data->qty}}</td>
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