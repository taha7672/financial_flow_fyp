<?php  if(count($discounts) > 0){?>
    @php
        $index=1;
    @endphp
    @foreach ($discounts as $discount)
    @if ($discount != Null)
        
    
        <tr>
          <td>{{$discount->discount_date}} </td>
          <td>{{$discount->invoice->client->last_name??''}} </td>
          <td>{{$discount->invoice->customer->name??''}} </td>
          <td>{{$discount->invoice_number}} </td>
          <td>{{$discount->invoice->inv_total_amount??''}} </td>
          <td>{{$discount->amount}} </td>

            <td>
                @if ($discount->invoice->paid_status??'' == 1)
                    <span class="badge badge-success">Paid</span>
                @else
                    <span class="badge badge-danger">Unpaid</span>
                @endif
        
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-success">Action</button>
                    <button type="button"
                        class="btn btn-success dropdown-toggle dropdown-toggle-split"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only"></span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item "    href="{{ URL::to('admin/discount/edit/' . $discount->id) }}" 
                            id="edit" style="cursor: pointer;">Edit</a>
                        <a class="dropdown-item " data-id="{{ $discount->id }}" 
                            id="delete" style="cursor: pointer;">Delete</a>

                    </div>
                </div>


            </td>

        </tr>
        @endif
    @endforeach

<?php }else{?>
    <tr>
        <td colspan="8" class="text-center">No Data Found</td>
    </tr>
<?php }?>

