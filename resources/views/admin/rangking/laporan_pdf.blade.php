<!DOCTYPE html>
<html>
<head>
    <title>Data Rangking Siswa</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <table class="no_border">
        <thead>
            <tr>
                <td style="text-align: center; border:0px"><b>Data Rangking Siswa</b></td>
            </tr>
            <tr>
                <td style="text-align: center; border:0px"><b>SD N 43 Pagar Alam</b></td>
            </tr>
        </thead>
    </table>
    <br>
    <table>
        <thead>
            <tr>
                <th style="width:10%">Rangking</th>
                <th>Nama</th>
                <th>Nilai Akhir</th>
            </tr>
        </thead>
        <tbody>
            @php
                $x=1;
            @endphp
            @foreach ($hasilPerhitungan as $hasil)
                <tr>
                    <td style="text-align: center">{{$x++ }}</td>
                    <td>{{ $hasil['nama'] }}</td>
                    <td>{{ round($hasil['nilai'], 2) }}</td>
                </tr>
            @endforeach
        </tbody>
        
    </table>
</body>
</html>
