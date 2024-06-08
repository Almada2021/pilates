<!DOCTYPE html>
<html>

<head>
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
    <link href="{{ public_path('assets/css/itinerary.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>

    <div class="title-container">
        <h1>
            <div class="date">
                {{ $useDate }}
            </div>
            {{ mb_convert_encoding($employee['name'], 'UTF-8') }}
            {{ mb_convert_encoding($employee['last_name'], 'UTF-8') }}
        </h1>
    </div>
    <table>
        <thead>
            <tr>
                <th>Hora</th>
                <th>Grupo</th>
                <th>Clientes</th>
            </tr>
        </thead>
        <tbody>
            @php
                usort($itemsEmployee, function ($a, $b) {
                    return strtotime($a['start']) - strtotime($b['start']);
                });
            @endphp
            @foreach ($itemsEmployee as $item)
                <tr>
                    <td>{{ $item['start'] }} - {{ $item['end'] }}</td>
                    <td>{{ $item['group_name'] }}</td>
                    <td class="special-td">
                        @foreach ($item['clients'] as $index => $client)
                            {{ $index + 1 }}. {{ $client['name'] }} {{ $client['last_name'] }}<br>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
