<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Product;
use App\Http\Requests\API\CheckoutRequest;

class CheckoutController extends Controller
{

    public function checkout(CheckoutRequest $request)
    {
        $data = $request->except('trans_detail');
        $data['trans_id'] = 'TRX' . date('Yn') . mt_rand(1000, 9999);

        $trans = Transaction::create($data);

        foreach ($request->trans_detail as $product) {
            $details[] = new TransactionDetail([
                'trans_id' => $trans->id,
                'product_id' => $product
            ]);

            Product::find($product)->decrement('qty');
        }

        $trans->detail()->saveMany($details);
        return ResponseFormatter::success($trans);
    }
}
