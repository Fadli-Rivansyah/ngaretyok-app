
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, th, td {
            padding: 3px;
            border: 1px solid black;
            border-collapse: collapse;
            text-transform: capitalize;
        }
    </style>
</head>
<body>
    <p>Hallo {{$name}} 👋</p>
    <p>Apa kabar?? Sudah lama tidak berjumpa hehehe.. Ayo {{$name}} rumput kamu sudah bisa di panen sekarang.</p>
    <p>Daftar lapak</p>
    <table>
        <thead>
            <tr>
                <th>
                    Nama Lapak
                </th>
            </tr>
        </thead>
        <tbody>
            @php
                use App\Models\Lapak;
                $siapPanen = Lapak::where('tanggal_lapak', '>=', now())->get();
            @endphp

            @foreach ($siapPanen as $item)
            <tr>
                <td>{{$item->nama_lapak}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>