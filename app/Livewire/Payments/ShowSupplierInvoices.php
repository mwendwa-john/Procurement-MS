<?php

namespace App\Livewire\Payments;

use App\Models\Hotel;
use App\Models\Invoice;
use Livewire\Component;
use App\Models\Supplier;
use Livewire\WithPagination;
use App\Helpers\GlobalHelpers;

class ShowSupplierInvoices extends Component
{
    use WithPagination;

    public $supplier;
    public $supplierId;
    public $search = '';
    public $hotel_id = null;

    protected $queryString = ['search', 'hotel_id'];


    public function mount($supplierId)
    {
        $this->supplier = Supplier::findOrFail($supplierId);

        $this->supplierId = $supplierId;
    }
    
    public function render()
    {

        $perPage = GlobalHelpers::getPerPage();

        $suplierInvoices = Supplier::find($this->supplierId)->invoices;

        $suplierInvoices = Invoice::with(['hotel', 'supplier'])
            ->where('supplier_id', $this->supplierId)
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->whereHas('hotel', function ($query) {
                        $query->where('hotel_name', 'like', '%' . $this->search . '%');
                    })
                        ->orWhereHas('lpo', function ($query) {
                            $query->where('lpo_order_number', 'like', '%' . $this->search . '%');
                        })
                        ->orWhere('invoice_number', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->hotel_id, function ($query) {
                $query->where('hotel_id', $this->hotel_id);
            })
            ->where('added_to_cart', false)
            ->latest()
            ->paginate($perPage ?? 15);


        $hotels     = Hotel::all();

        return view('livewire.payments.show-supplier-invoices', [
            'hotels' => $hotels,
            'suplierInvoices' => $suplierInvoices,
        ]);
    }
}
