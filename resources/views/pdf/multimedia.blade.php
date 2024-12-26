<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>
<body>
    <h1 style="text-align: center">Data Tim Multimedia</h1>
    <hr>
    <table style="width: 100%" border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr style="text-align: center">
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->jenis_kelamin }}</td>
                    <td>{{ $d->jabatan }}</td>
                    <td>{{ $d->alamat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
