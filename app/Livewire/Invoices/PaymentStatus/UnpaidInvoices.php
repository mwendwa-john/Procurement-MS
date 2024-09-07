<?php

namespace App\Livewire\Invoices\PaymentStatus;

use App\Models\Lpo;
use App\Models\Hotel;
use App\Models\Invoice;
use Livewire\Component;
use App\Models\Supplier;
use Livewire\WithPagination;
use App\Helpers\GlobalHelpers;
use Livewire\Attributes\Title;

#[Title('Unpaid Invoices')]
class UnpaidInvoices extends Component
{
    use WithPagination;

    public $search = '';
    public $supplier_id = null;
    public $hotel_id = null;

    protected $queryString = ['search', 'supplier_id', 'hotel_id'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSupplierId()
    {
        $this->resetPage();
    }

    public function updatingHotelId()
    {
        $this->resetPage();
    }

    public function render()
    {
        $perPage = GlobalHelpers::getPerPage();
        
        $invoices = Invoice::with(['hotel', 'supplier'])
            ->where('status', 'unpaid')
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->whereHas('hotel', function ($query) {
                        $query->where('hotel_name', 'like', '%' . $this->search . '%');
                    })
                        ->orWhereHas('supplier', function ($query) {
                            $query->where('supplier_name', 'like', '%' . $this->search . '%');
                        })
                        ->orWhereHas('lpo', function ($query) {
                            $query->where('order_number', 'like', '%' . $this->search . '%');
                        })
                        ->orWhere('invoice_number', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->supplier_id, function ($query) {
                $query->where('supplier_id', $this->supplier_id);
            })
            ->when($this->hotel_id, function ($query) {
                $query->where('hotel_id', $this->hotel_id);
            })
            ->latest()
            ->paginate($perPage ?? 15);


        $suppliers = Supplier::all();
        $hotels = Hotel::all();


        return view('livewire.invoices.payment-status.unpaid-invoices', [
            'invoices' => $invoices,
            'suppliers' => $suppliers,
            'hotels' => $hotels,
        ]);
    }
}
