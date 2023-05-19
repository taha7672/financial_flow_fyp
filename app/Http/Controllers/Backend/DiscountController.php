<?php


namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Discount;
use Illuminate\Http\Request;
use App\Models\Backend\Invoice;
use Illuminate\Support\Facades\Storage;
use App\Models\Backend\Ledger;
use App\Traits\UploadImg;

use function App\Helpers\getConstant;


class DiscountController extends Controller

{
    use UploadImg;


    public function index()
    {
      
        return view('Backend.pages.discount.discounts');
    }
    // getDiscounts
    public function getDiscounts(Request $request)
    {
        // dd($request->all());
        $columns = array(
            0 => 'id',
            1 => 'discount_date',
            2 => 'client_name',
            3 => 'customer_name',
            4 => 'invoice_number',
            5 => 'amount',
            6 => 'invoice_amount',
            7 => 'invoice_status',
            8 => 'action',
        );

        $totalData = Discount::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $discounts =Discount::with('invoice.customer.user')->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');
            $discounts = Discount::with('invoice.customer.user')->where('invoice_number', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
                // dd($discounts);

            $totalFiltered = Discount::where('invoice_number', 'LIKE', "%{$search}%")->count();
        }

        $data = array();
        if (!empty($discounts)) {
            $index=1;
            foreach ($discounts as $discount) {
                // $show = route('discount.show', $discount->id);
                $edit = route('edit.discount', $discount->id);
                $inv_detail = route('inv.details', ['inv_uinque_key'=>$discount->invoice->inv_uinque_key]);
                $nestedData['id'] = $index++;
                $nestedData['client_name'] = $discount->invoice->client->last_name??'';
                $nestedData['customer_name'] = $discount->invoice->customer->name??'';
                $nestedData['discount_date'] = dateFormat($discount->discount_date);
                $nestedData['invoice_number'] = '<a href="' . $inv_detail . '"target="_blank" >'.$discount->invoice_number.'</a>';
                $nestedData['amount'] = $discount->amount;
                $nestedData['invoice_amount'] = $discount->invoice->inv_total_amount??'';
                $nestedData['invoice_status'] = $discount->invoice->paid_status;
                $nestedData['action'] = '<div class="btn-group">
                <button type="button" class="btn btn-success">Action</button>
                <button type="button"
                    class="btn btn-success dropdown-toggle dropdown-toggle-split"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only"></span>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item "    href="' . $edit . '"
                        id="edit" style="cursor: pointer;">Edit</a>
                    <a class="dropdown-item " data-id="{{ $discount->id }}" 
                        id="delete" style="cursor: pointer;">Delete</a>
                    

                </div>
            </div>';
                $data[] = $nestedData;
            }
        }


        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );
       
        echo json_encode($json_data);
    }







    // create
    public function create()
    {
        return view('Backend.pages.discount.create');
    }
    // store 
    public function store(Request $request)
    {
        $request->validate([
            'invoice_number' => 'required',
            'discount_date' => 'required',
            'discount_amount' => 'required',
            'discount_discription' => 'required',
            'attachment' => 'required',
        ]);

        $invoice = Invoice::where('invoice_number', $request->invoice_number)->first(['id', 'client_id', 'customer_id']);

        $discount_date =  $request->discount_date;
        $discount_date = date('Y-m-d', strtotime($discount_date));
        if ($invoice != null) {
            $invoice_id = $invoice->id;
            $discount = new Discount();
            $discount->invoice_id = $invoice_id;
            $discount->discount_date = $discount_date;
            $discount->invoice_number = $request->invoice_number;
            $discount->amount = $request->discount_amount;
            $discount->description = $request->discount_discription;
            $discount->attachment = $this->uploadImg('/discount/attach', $request->attachment);
            $discount->save();

            if ($discount && $invoice) {
                $client_id = $invoice->client_id;
                $customer_id = $invoice->customer_id;
                $invoice_id = $invoice_id;
                $type = 'Discount';
                $narration =  $discount->description;
                $credit = $discount->amount;
                $debit = 0.00;
                // customerLedger 
                $customerLedger =   Ledger::customerLedger($client_id, $customer_id, $invoice_id, $type, $narration, $credit, $debit);
                // clientLedger
                $credit = 0.00;
                $debit = $discount->amount;
                $clientLedger =  Ledger::clientLedger($client_id, $customer_id, $invoice_id, $type, $narration, $credit, $debit);
            }
            if ($discount) {

                session()->flash('message', 'Discount Applied successfully');
                return redirect()->route('discounts');
            }
        } else {
            session()->flash('error', 'Invoice Number is not found');
            return redirect()->back();
        }
    }
    // edit 
    public function edit($id)
    {
        $discount = Discount::find($id);
        return view('Backend.pages.discount.create', compact('discount'));
    }
    // update
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'invoice_number' => 'required',
        ]);
        $invoice = Invoice::where('invoice_number', $request->invoice_number)->first('id');
        $discount = Discount::find($id);

        if ($discount->attachment) {
            $old_file_name = $discount->attachment;
        }
        $discount_date =  $request->discount_date;
        // change date format to 0000-00-00
        $discount_date = date('Y-m-d', strtotime($discount_date));

        // if $invoice is not null then get id from invoice object
        if ($invoice != null) {
            $invoice_id = $invoice->id;

            $discount->invoice_id = $invoice_id;
            $discount->discount_date = $discount_date;
            $discount->invoice_number = $request->invoice_number;
            $discount->amount = $request->discount_amount;
            $discount->description = $request->discount_discription;
            $file = $request->attachment;
            // if file has image then delete old one 
            if ($file) {
                if ($old_file_name) {
                    $old_file_path = asset('storage/images/discount/attach/') . $old_file_name;
                    Storage::disk('uploads')->delete($old_file_path);
                }
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('/discount/attach', $file_name, ['disk' => 'uploads']);
                $discount->attachment = $file_name;
            }
            $discount->save();
            // dd($discount);
            // if discount updated 
            if ($discount) {
                session()->flash('message', 'Discount Updated successfully');
                return redirect()->route('discounts');
            }
        } else {
            session()->flash('error', 'Invoice Number is not found');
            return redirect()->back();
        }
    }
    // delete
    public function delete(Request $request, $id)
    {
        $discount = Discount::findOrFail($id);
        // dd($id);
        $discount->delete();
        // pass the response to ajax request 
        return response()->json(['message' => 'Discount Deleted Successfully']);
    }
}
