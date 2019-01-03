{{-- <!DOCTYPE html>
<html>

<head>
    <title>Document</title>
</head>
<style type="text/css">
    .wrapper {
        padding-left: 10px;
        /* display: grid; */
        grid-template-columns: 175px 175px 175px 175px;
        grid-template-rows: 70px 20px 210px 100px;
    }

    .item0 {
        grid-column-start: 1;
        grid-column-end: 5;
    }

    .item1 {
        grid-column-start: 2;
        grid-column-end: 5;
    }

    .item2 {
        grid-column-start: 2;
        grid-column-end: 4;
    }

    .item3 {
        grid-column-start: 1;
        grid-column-end: 4;
    }

    .item4 {
        margin-top: -10px;
        grid-column-start: 4;
        grid-column-end: 5;
    }

    h1 {
        font-family: serif;
        text-align: center;
        font-size: 30px;
        margin-top: 8px;
        margin-bottom: -28px;
    }

    h4 {
        text-align: center
    }

    img {
        display: block;
        margin-top: 8px;
        margin-left: auto;
        margin-right: auto;
    }

    .garis {
        border-bottom: 3px solid black;
        margin-top: -12px;
        margin-left: auto;
        margin-right: auto;
        width: 650px;
    }

    .isi p {
        margin-top: 0px;
        margin-bottom: 8px;
    }

    .buka p {
        font-size: 18px;
        border: 2px solid black;
        margin-top: 30px;
        margin-left: 15px;
        margin-right: auto;
        width: 285px;
    }

</style>

<body>
    <div class="wrapper">
        <div>
            <p></p>
            <img src="img/bg-icon.png" width="100px" alt="">
        </div>
        <div class="item1">
            <h1>BINTANG GAJAH SERVICE PHONE</h1>
            <h4>JL. Zamrud NO.10 Pasayangan-Martapura</h4>
        </div>
        <div class="item0">
            <div class="garis">
                <p></p>
            </div>
        </div>
        <div class="isi">
            <p>Pemilik</p>
            <p>Nomor Telepon</p>
            <p>Merk</p>
            <p>Model</p>
            <p>IMEI</p>
            <p>Kerusakan</p>
            <p>Biaya</p>
            <p>Keterangan</p>
        </div>
        <div class="item2 isi">
            <p>: {{$servisan->pemilik}}</p>
            <p>: {{$servisan->telepon}}</p>
            <p>: {{$servisan->merk}}</p>
            <p>: {{$servisan->model}}</p>
            <p>: {{$servisan->no_imei}}</p>
            <p>: {{$servisan->kerusakan}}</p>
            <p>: {{$servisan->biaya}}</p>
            <p>: {{$servisan->keterangan}}</p>
        </div>
        <div>
            <p><b>{{$servisan->tanggal}}</b></p>
            <p><b>{{$servisan->id_servisan}}</b></p>
        </div>
        <div class="item3 buka">
            <p>Buka tiap hari dari pukul 09.00 - 17.30</p>
        </div>
        <div class="item4">
            <p>yang menerima :</p>
            <br>
            <p>UCOK</p>
        </div>
    </div>
</body>

</html> --}}
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
                <h4>Kode Servisan : {{$servisan->id_servisan}}</h4>
            </td>
            <td rowspan="1" width="20%">
                <h4>Tanggal {{$servisan->tanggal}}</h4>
            </td>
        </tr>
    </table>
    <table class="isi" width="100%">
        <tr>
            <td width="40%"><b>Pemilik</b></td>
            <td width="60%">: {{$servisan->pemilik}}</td>
        </tr>
        <tr>
            <td ><b>Nomor Telepon</b></td>
            <td>: {{$servisan->telepon}}</td>
        </tr>
        <tr>
            <td><b>Merk </b></td>
            <td>: 
                @foreach($merk as $list)
                @if ($list->id_merk === $servisan->id_merk)
                {{ $list->nama_merk }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td><b>Model</b></td>
            <td>: {{$servisan->model}}</td>
        </tr>
        <tr>
            <td><b>IMEI</b></td>
            <td>: {{$servisan->no_imei}}</td>
        </tr>
        <tr>
            <td><b>Kerusakan</b></td>
            <td>: {{$servisan->kerusakan}}</td>
        </tr>
        <tr>
            <td><b>Biaya</b></td>
            <td>: {{"Rp. ".format_uang($servisan->biaya)}}</td>
        </tr>
        <tr>
            <td><b>Keterangan</b></td>
            <td>: {{$servisan->keterangan}}</td>
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