<!DOCTYPE html>
<html>

<head>
    <title>Nota PDF</title>
    <style type="text/css">
        body {
           margin-top: -20px;
        }
        table td {
            font: arial 12px;
        }

        table.data td,
        table.data th {
            border: 1px solid #ccc;
            padding: 5px;
        }

        table.data th {
            text-align: center;
        }

        table.data {
            border-collapse: collapse
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
        .buka {
            font-size: 17px;
            border: 2px solid black;
            text-align: center;
            margin-top: 5px;
            margin-left: 15px;
            margin-right: auto;
            width: 275px;
        }
        .nerima {
            font-size: 17px;
            text-align: center;
            margin-top: -20px;
        }
        .gariss {
            border-bottom: 1px solid black;
            margin-top: 45px;
            margin-left: auto;
            margin-right: auto;
            width: 90px
        }
        .kode {
            margin-top: -20px;
        }
    </style>
</head>

<body>
    <table class width="100%">
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
    <table class="kode" width="100%">
        <tr>
            <td rowspan="1" width="80%">
                <h4>Kode <b>GARANSI</b> : {{$garansi->id_garansi}}</h4>
            </td>
            <td rowspan="1" width="20%">
                <h4>Tanggal {{$garansi->tanggal}}</h4>
            </td>
        </tr>
    </table>
    <table class="isi" width="100%">
        <tr>
            <td width="40%"><b>Pemilik</b></td>
            <td width="60%">: {{$garansi->pemilik}}</td>
        </tr>
        <tr>
            <td ><b>Nomor Telepon</b></td>
            <td>: {{$garansi->telepon}}</td>
        </tr>
        <tr>
            <td><b>Merk </b></td>
            <td>: 
                @foreach($merk as $list)
                @if ($list->id_merk === $garansi->id_merk)
                {{ $list->nama_merk }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td><b>Model</b></td>
            <td>: {{$garansi->model}}</td>
        </tr>
        <tr>
            <td><b>IMEI</b></td>
            <td>: {{$garansi->no_imei}}</td>
        </tr>
        <tr>
            <td><b>Kerusakan</b></td>
            <td>: {{$garansi->kerusakan}}</td>
        </tr>
        <tr>
            <td><b>Keterangan</b></td>
            <td>: {{$garansi->keterangan}}</td>
        </tr>
    </table>
    <br>
    <table width="100%">
        <tr>
            <td width="60%">
                <p class="buka">Buka Tiap Hari Dari Pukul 09.00-17.30</p>
            </td>
            <td>
                <p class="nerima"> Yang Menerima </p>
                <p class="gariss"></p>
            </td>
        </tr>
    </table>
</body>

</html>