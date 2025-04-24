<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan MOORA - Hasil Akhir</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
        th { background-color: #f2f2f2; }
        h3 { text-align: center; }
    </style>
</head>
<body>

    <h3>Laporan Hasil Akhir Peringkat Penerima Bantuan Langsung Tunai</h3>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width:100px">No </th> 
                <th style="width:100px">Alternatif</th>
                <th style="width:100px">Benefit</th>
                <th style="width:100px">Cost</th>
                <th style="width:100px">Skor Akhir</th>
                <th style="width:100px">Peringkat </th> 
            </tr>
        </thead>
        <tbody>
            @foreach($ranked as $i =>$row)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $row['alternatif'] }}</td>
                    <td>{{ number_format($row['benefit'], 4) }}</td>
                    <td>{{ number_format($row['cost'], 4) }}</td>
                    <td>{{ number_format($row['skor_akhir'], 4) }}</td>
                    <td>{{ $row['ranking'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>