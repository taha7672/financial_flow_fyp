@if (count($ladgers) > 0)
    @php
        $index = 1;
    @endphp
    @foreach ($ladgers as $ladgers)
        <tr>
            <td>{{ $index++ }}</td>
            {{-- <td>{{ $ladgers->invoice->client->first_name ?? '' }} {{ $ladgers->invoice->client->last_name ?? '' }}</td>
            <td>{{ $ladgers->invoice->customer->name ?? '' }}</td>
            <td>{{ $ladgers->invoice_number ?? '' }}</td> --}}


        </tr>
    @endforeach

    @endif
