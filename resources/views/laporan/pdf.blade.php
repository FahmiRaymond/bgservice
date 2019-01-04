<!DOCTYPE html>
<html>

<head>
    <title>Produk PDF</title>
    <style type="text/css">
        .text-center {
            text-align: center;
        }
        table {
            border-collapse: collapse;
        }
        .kop td {
            border: 1px solid white;
        }
        .garis {
            border-bottom: 3px solid black;
            margin-top: -12px;
            margin-left: auto;
            margin-right: auto;
        }
        h1 {
            text-align:center;
        }
        h3 {
            margin-top:-20px;
            text-align:center;
        }
        .isi th, td{
            border: 1px solid black;
            padding: 5px;
        }
        .isi td {
            font-size: 15px;
            
        }
    </style>
</head>

<body>
    <table class="kop" width="100%">
        <tr>
            <td rowspan="1" width="5%">
                <img src="img/bg-icon.png" width="100px" alt="">
            </td>
            <td rowspan="1" width="60%">
                <h1>BINTANG GAJAH SERVICE PHONE </h1>
                <h3>JL. Zamrud NO.10 Pasayangan-Martapura Telp. 0812 5000 2020</h3>
            </td>            
        </tr>
    </table>
    <div class="garis"></div>
    <br><br>
    <h3 class="text-center">Laporan Pendapatan bulan Ke-{{($month) }}/{{($year) }}</h3>
    <table class="isi">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pemilik</th>
                <th>Model</th>
                <th>Kerusakan</th>
                <th>Biaya</th>
                <th>Sparepart</th>
                <th>Laba</th>
            </tr>

        <tbody>
            @foreach($data as $row)
            <tr>
                @foreach($row as $col)
                <td>{{ $col }}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
