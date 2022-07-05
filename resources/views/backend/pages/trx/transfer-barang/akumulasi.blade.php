<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
    <style>
        * {
            padding: 0;
            /* margin: 0; */
            font-family: 'Arimo-Regular';
        }
        @font-face {
            font-family: 'Arimo-Regular';
            font-style: normal;
            font-weight: normal;
            src: url("{{ storage_path('fonts/Arimo-Regular.ttf') }}") format("truetype");
        }
        @page {
            margin: 20px;
        }
        table {
            border-collapse: collapse;
            padding: 15px 0 15px 0;
        }
        table tr td, th {
            padding: 5px;
            border: 1px solid black;
            font-size:10px;
            font-family: 'Arimo-Regular';
        }
    </style>
</head>
<body>
    <center>
        <u><h1  style="margin-top:20px;">Akumulasi Barang Keluar</h1></u>
    </center>
    {{-- Detail --}}
    <table width="90%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th width="20%">Barang</th>
                <th>Stock Gudang</th>
                <th>Jumlah Keluar</th>
                <th>Sisa</th>
                <th>Satuan</th>
            </tr>
        </thead>
        <tbody>
            {{-- begin loop appliance types --}}
            {{$no = 1}}
            {{$total_stock = 0}}
            {{$total_jumlah = 0}}
            {{$total_sisa = 0}}
            @forelse ($items as $item )
            <tr>
                        <td align="center">{{ $no }}</td>
                        <td>{{ $item->kode_barang }}</td>
                        <td style="padding-left: 15px">{{  $item->nama_barang }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>{{ $item->jumlah_keluar }}</td>
                        <td>{{ ($item->stock - $item->jumlah_keluar) }}</td>
                        <td>{{ $item->unit_satuan }}</td>
                    </tr>
                {{$no++}}
                {{$total_stock+= $item->stock }}
                {{$total_jumlah+= $item->jumlah_keluar }}
                {{$total_sisa+= ($item->stock - $item->jumlah_keluar) }}
                {{-- end loop appliance categories --}}
            @empty
                <tr>
                    Data kosong
                </tr>
            @endforelse
            {{-- end loop appliance types --}}
        </tbody>
        
    </table>
    <table>
        <tr>
            <td>Total Stock </td>
            <td>{{ $total_stock }}</td>
        </tr>
        <tr>
            <td>Total Masuk </td>
            <td>{{ $total_jumlah }}</td>
        </tr>
    </table>
</body>
</html>