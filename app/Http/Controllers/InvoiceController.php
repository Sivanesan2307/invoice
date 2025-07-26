<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceRequest;
use App\Services\InvoiceCalculator;
use App\Models\Invoice;
use App\Events\InvoiceCreated;
use Illuminate\Support\Facades\Mail;


class InvoiceController extends Controller
{
   public function store(StoreInvoiceRequest $request, InvoiceCalculator $calculator)
    {
        $data = $request->validated();

        $calc = $calculator->calculate(
            $data['quantity'],
            $data['price_per_item'],
            $data['tax_percentage']
        );

        $invoice = Invoice::create(array_merge($data, [
            'subtotal' => $calc['subtotal'],
            'tax_amount' => $calc['taxAmount'],
            'total' => $calc['total'],
        ]));

        event(new InvoiceCreated($invoice));

        return redirect()->back()->with('success', 'Invoice Created & Email Sent!');
    }
}
