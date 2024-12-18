<?php

namespace App\Livewire\Payments;

use App\Models\User;
use App\Models\Invoice;
use App\Models\Payment;
use Livewire\Component;
use App\Models\PaymentMethod;
use Livewire\Attributes\Validate;
use RealRashid\SweetAlert\Facades\Alert;

class Cart extends Component
{
    public $invoices;
    public $selectedInvoices = [];
    public $invoicesTotalAmount;
    public $payments = [];

    public $totalPaymentAmount;

    #[Validate()]
    public $payment_number;

    #[Validate()]
    public $payment_date;

    #[Validate()]
    public $payed_by;

    #[Validate()]
    public $payment_method;

    #[Validate()]
    public $description;


    protected $rules = [
        'payment_number'    => 'required|unique:payments,payment_number',
        'payment_date'      => 'required|date|before_or_equal:today',
        'payed_by'          => 'nullable|exists:users,id',
        'description'       => 'nullable|string|max:65535',
    ];

    public function mount()
    {
        // Find the last Transaction
        $lastTransaction = Payment::orderBy('created_at', 'desc')
            ->first();

        // If no Transaction exist, start from 1
        $orderCount = $lastTransaction
            ? (int) substr($lastTransaction->payment_number, strrpos($lastTransaction->payment_number, '-') + 1) + 1
            : 1;

        // Format with leading zeros if needed (e.g., for a 2-digit format)
        $formattedOrderCount = str_pad($orderCount, 2, '0', STR_PAD_LEFT);

        // Construct the formatted LPO order number
        $formattedString = "PAY-{$formattedOrderCount}";

        // Generate the payment_number
        $this->payment_number = $formattedString;
    }

    public function updatedSelectedInvoices()
    {
        $this->invoicesTotalAmount = $this->invoices->whereIn('id', $this->selectedInvoices)->sum('total_amount');
    }


    public function updatedPayments($value, $key)
    {
        // Find the invoice by its ID
        $invoice = Invoice::findOrFail($key);

        // Ensure the value is numeric based on whether $value is an array or string
        if (is_array($value)) {
            // If $value is an array, access the 'invoice_amount' field safely
            $paymentAmount = isset($value['invoice_amount']) && is_numeric($value['invoice_amount'])
                ? (float) $value['invoice_amount']
                : 0.0;
        } else {
            // If $value is a string, ensure it's numeric
            $paymentAmount = is_numeric($value) ? (float) $value : 0.0;
        }

        $totalAmount = (float) $invoice->total_amount;

        // Calculate the due balance based on the payment amount
        $dueBalance = number_format($totalAmount - $paymentAmount, 2, '.', '');

        // Check if the payment amount exceeds the total amount
        if ($paymentAmount > $totalAmount) {
            // Cap the payment to the total amount if it's greater
            $this->payments[$key]['invoice_amount'] = $totalAmount;
            $this->payments[$key]['due_balance'] = 0; // No balance due
        } else {
            // Set the new payment amount and recalculate the due balance
            $this->payments[$key]['invoice_amount'] = $paymentAmount;
            $this->payments[$key]['due_balance'] = max($dueBalance, 0); // Ensure due balance is never negative
        }

        $this->totalPaymentAmount += $paymentAmount;
    }


    public function fillFullAmounts($id)
    {
        $invoice = Invoice::findOrFail($id);

        $this->payments[$id]['invoice_amount'] = $invoice->total_amount;
        $this->payments[$id]['due_balance'] = 0;

        $this->totalPaymentAmount += $this->payments[$id]['invoice_amount'];
    }


    // public function processPayments()
    // {
    //     // dd($this->payment_method);
    //     $validatedData = $this->validate();


    //     // Create the main payment record
    //     $payment = Payment::create([
    //         'payment_number'    => $this->payment_number,
    //         'payment_date'      => $validatedData['payment_date'],
    //         'payed_by'          => $validatedData['payed_by'],
    //         'amount_paid'       => $this->totalPaymentAmount,
    //         'payment_method'    => $this->payment_method,
    //         'description'       => $validatedData['description'],
    //     ]);


    //     // Process each invoice
    //     foreach ($this->payments as $invoiceNumber => $paymentAmount) {
    //         $invoice = Invoice::where('invoice_number', $invoiceNumber)->first();

    //         if ($invoice) {
    //             $invoiceBalance = $invoice->total_amount - $paymentAmount;

    //             // Link the payment to the invoice
    //             $payment->invoicePayments()->attach($invoice->invoice_number, [
    //                 'payment_number'    => $payment->payment_number,
    //                 // 'invoice_number',
    //                 'amount_paid'       => $paymentAmount,
    //                 'invoice_balance'   => $invoiceBalance,
    //             ]);

    //             // Update the invoice status
    //             if ($invoiceBalance == 0) {
    //                 $invoice->update(['status' => 'payment_complete']);
    //             } else {
    //                 $invoice->update(['status' => 'payment_complete']);
    //             }
    //         }
    //     }

    //     $this->reset();

    //     Alert::toast('Payments processed successfully.', 'success');
    //     return redirect()->route('cart');
    // }

    public function processPayments()
    {
        $validatedData = $this->validate();

        // Create the main payment record
        $payment = Payment::create([
            'payment_number'    => $this->payment_number,
            'payment_date'      => $validatedData['payment_date'],
            'payed_by'          => $validatedData['payed_by'],
            'amount_paid'       => $this->totalPaymentAmount,
            'payment_method'    => $this->payment_method,
            'description'       => $validatedData['description'],
        ]);

        // Process and attach each selected invoice
        foreach ($this->payments as $invoiceId => $paymentData) {
            $invoice = Invoice::find($invoiceId);

            if ($invoice) {
                $invoiceBalance = $invoice->total_amount - $paymentData['invoice_amount'];

                // Attach invoice to the payment
                $payment->invoices()->attach($invoice->invoice_number, [
                    'payment_number'    => $payment->payment_number,
                    'amount_paid'       => $paymentData['invoice_amount'],
                    'invoice_balance'   => $invoiceBalance,
                ]);

                // Update invoice status
                $invoice->update([
                    'status' => $invoiceBalance == 0 ? 'payment_complete' : 'partially_paid',
                ]);
            }
        }

        $this->reset();

        Alert::toast('Payments processed successfully.', 'success');
        return redirect()->route('cart');
    }


    // public function processPayments()
    // {
    //     // Validate the input data
    //     $validatedData = $this->validate();

    //     // Create the main payment record
    //     $payment = Payment::create([
    //         'payment_number'    => $this->payment_number,
    //         'payment_date'      => $validatedData['payment_date'],
    //         'payed_by'          => $validatedData['payed_by'],
    //         'amount_paid'       => $this->totalPaymentAmount,
    //         'payment_method'    => $this->payment_method,
    //         'description'       => $validatedData['description'],
    //     ]);


    //     // Process each invoice
    //     foreach ($this->selectedInvoices as $invoiceNumber => $paymentAmount) {
    //         // $invoice = Invoice::where('invoice_number', $invoiceNumber)->first();
    //         // dd($invoice);
    //         foreach ($this->selectedInvoices as $id) {
    //             $invoice = $this->invoices->find($id);
    //         }

    //         if ($invoice) {
    //             // Calculate remaining balance on the invoice
    //             // $currentPaidAmount = $invoice->payments()->sum('amount_paid');
    //             // $invoiceBalance = $invoice->total_amount - ($currentPaidAmount + $paymentAmount);
    //             $invoiceBalance = $invoice->total_amount - $paymentAmount;

    //             // Attach the payment to the invoice with pivot data
    //             $payment->invoices()->attach($invoice->invoice_number, [
    //                 'payment_number'  => $payment->payment_number,
    //                 'amount_paid'     => $paymentAmount,
    //                 'balance'         => $invoiceBalance,
    //             ]);

    //             // Update the invoice status
    //             if ($invoiceBalance <= 0) {
    //                 $invoice->update(['status' => 'payment_complete']);
    //             } else {
    //                 $invoice->update(['status' => 'partial_payment']);
    //             }
    //         }
    //     }

    //     // Reset the form and display success message
    //     $this->reset();

    //     Alert::toast('Payments processed successfully.', 'success');
    //     return redirect()->route('cart');
    // }




    public function render()
    {
        $this->invoices = Invoice::where('added_to_cart', true)->get();

        $users = User::all();
        $paymentMethods = PaymentMethod::all();

        return view('livewire.payments.cart', [
            'invoices' => $this->invoices,
            'users' => $users,
            'paymentMethods' => $paymentMethods,
        ]);
    }
}
