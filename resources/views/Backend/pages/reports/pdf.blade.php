<html>
<head>
    <style>
        table, tr, td {
            padding: 5px;
        }
    </style>
</head>
<body>

<table style="">
    <tbody>
    <tr>
        <td align="center">
            {{-- <img src="{{getConstant('LOGO')}}" alt="logo"/><br/> --}}
            {{getConstant('SITE')}}
            <br>
            {{getConstant('EMAIL')}}
            <br>
            <span style="text-align: center;font-weight:bold; ">{{$title}} </span>
        </td>
    </tr>
    </tbody>
</table>
@php
    $total_credit = 0.00;
    $total_debit = 0.00;
@endphp
    

    <table style="width: 99%;">
                <tr style="font-weight:bold; ">
                    <th style="border-bottom: 1px solid black; width:15%;">Date</th>
                    <th style="border-bottom: 1px solid black; width:15%;">Client</th>
                    <th style="border-bottom: 1px solid black; width:15%;">Customer</th>
                    <th style="border-bottom: 1px solid black; width:15%;">Inv.Num</th>
                    <th style="border-bottom: 1px solid black; width:15%;">Type</th>
                    <th style="border-bottom: 1px solid black; width:12%;">Credit</th>
                    <th style="border-bottom: 1px solid black; width:13%;">Debit</th>
                  
                </tr>
           
              @foreach ($ledgers as $ledger)
              @php
                    $total_credit += $ledger->credit;
                    $total_debit += $ledger->debit;
                
                  
              @endphp
              <tr style="line-height: 80%;">
                  <td style="border-bottom: 1px solid black;">{{ dateformat($ledger->created_at)}}</td>
                  <td style="border-bottom: 1px solid black;">{{$ledger->client->last_name}} </td>
                  <td style="border-bottom: 1px solid black;">{{$ledger->customer->name}}</td>
                  <td style="border-bottom: 1px solid black;">{{$ledger->invoice->invoice_number}}</td>
                  <td style="border-bottom: 1px solid black;">{{$ledger->type}} </td>
                  <td style="border-bottom: 1px solid black;">{{$ledger->credit}} </td>
                  <td style="border-bottom: 1px solid black;">{{$ledger->debit}} </td>
        
              </tr>
                  
              @endforeach
              <br>
              <tr  style="line-height:50%;font-weight:bold;">
                    <td colspan="5"  style="text-align: right;border-bottom: 1px solid black; font-weight:bold;">Total: </td>
                    <td style="border-bottom: 1px solid black; font-weight:bold;">{{ number_format($total_credit, 2) }} </td>
                    <td style="font-weight: bold;border-bottom: 1px solid black;font-weight:bold;">{{ number_format($total_debit, 2) }}</td>
              </tr>
    </table>
</body>

</html>

