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
        <u><h1  style="margin-top:20px;">Invoice Barang Masuk (Stock In)</h1></u>
    </center>
    <table>
        <tr>
            <td>No Document </td>
            <td> : </td>
            <td>{{ $items[0]->no_document }}</td>
        </tr>
        <tr>
            <td>Tanggal </td>
            <td> : </td>
            <td>{{ $items[0]->tanggal_document }}</td>
        </tr>
        <tr>
            <td>Catatan</td>
            <td> : </td>
            <td>{{ $items[0]->catatan }}</td>
        </tr>
    </table>
    {{-- Detail --}}
    <table width="90%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th width="20%">Barang</th>
                <th>Jumlah</th>
                <th>Harga Beli</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            {{-- begin loop appliance types --}}
            {{$no = 1}}
            {{$total_qty = 0}}
            {{$total_harga = 0}}
            @forelse ($items as $item )
            <tr>
                        <td align="center">{{ $no }}</td>
                        <td>{{ $item->kode_barang }}</td>
                        <td style="padding-left: 15px">{{  $item->nama_barang }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ ($item->jumlah * $item->harga) }}</td>
                    </tr>
                {{$no++}}
                {{$total_qty++}}
                {{$total_harga+= ($item->jumlah * $item->harga)}}
                {{-- end loop appliance categories --}}
            @empty
                <tr>
                    Data kosong
                </tr>
            @endforelse
            {{-- end loop appliance types --}}
        </tbody>

    </table>
    <div >
        <h4>
            Total Barang : {{$total_qty}} <br>
            Total Harga : Rp. {{$total_harga}}
        </h4>
    </div>
</body>
</html>
