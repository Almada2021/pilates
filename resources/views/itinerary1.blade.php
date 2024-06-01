<!DOCTYPE html>
<html>

<head>
    <link href="{{ public_path('assets/css/itinerary.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    {{-- add h1 who print the date in format dd/mm/yyyy --}}
    <h1>{{ $useDate }}</h1>
    {{-- loop emplooyes variable --}}
    @foreach ($employees->chunk(2) as $chunk)
        <table cellspacing="0" border="1" class="big-table">
            <tr>
                @foreach ($chunk as $employee)
                    <td class="box">
                        {{-- add p element with employee name and last name and convert in case of unknow characters --}}
                        <h2>{{ mb_convert_encoding($employee->name, 'UTF-8', 'UTF-8') }}
                            {{ mb_convert_encoding($employee->last_name, 'UTF-8', 'UTF-8') }}</h2>
                        <table border="0">
                            <tr class="hidden-row">
                                <td class="min-table-tite">Hora</td>
                                <td class="min-table-tite">Sala</td>
                                <td class="min-table-tite">Grupo</td>
                            </tr>

                            {{-- print groupItineraries --}}
                            @foreach ($groupItineraries as $groupItinerary)
                                {{-- recorre todo el groupitineraries y encuentra el que tiene el mismo employee --}}
                                <tr>
                                    <td>g</td>
                                    <td>g</td>
                                    <td>g</td>
                                </tr>
                            @endforeach
                            
                        </table>
                    </td>
                @endforeach
            </tr>

        </table>
    @endforeach
</body>

</html>
