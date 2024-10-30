<div class="m-4 inline-flex rounded-lg shadow-sm">
    <a href="{{ route('lpo.view', ['id' => $lpo->id]) }}">
        <button type="button"
            class="py-2 px-3 inline-flex justify-center items-center gap-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 shadow-sm hover:bg-green-200 focus:outline-none disabled:opacity-50 disabled:pointer-events-none
                {{ request()->routeIs('lpo.view') ? 'bg-green-500 text-white' : 'bg-white text-gray-800' }}">
            LPO
        </button>
    </a>

    @foreach ($lpo->invoices as $invoice)
    <a href="{{ route('invoice.view', ['invoiceNumber' => $invoice->invoice_number]) }}">
        <button type="button"
            class="py-2 px-3 inline-flex justify-center items-center gap-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 shadow-sm hover:bg-green-200 focus:outline-none disabled:opacity-50 disabled:pointer-events-none
                {{ request()->routeIs('invoice.view') && request('invoiceNumber') == $invoice->invoice_number ? 'bg-green-500 text-white' : 'bg-white text-gray-800' }}">
            Invoice
        </button>
    </a>
    @endforeach
</div>
