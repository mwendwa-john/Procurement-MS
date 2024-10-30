<?php

namespace App\Livewire\Lpos\States;

use App\Models\Lpo;
use App\Models\Hotel;
use Livewire\Component;
use App\Models\Supplier;
use Livewire\WithPagination;
use App\Helpers\GlobalHelpers;
use Livewire\Attributes\Title;

#[Title('Created Lpos')]
class CreatedLpos extends Component
{
    use WithPagination;

    public $search = '';
    public $supplier_id = null;
    public $hotel_id = null;
    public $has_invoice = null;

    protected $queryString = ['search', 'supplier_id', 'hotel_id', 'has_invoice'];

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

    public function updatingHasInvoice()
    {
        $this->resetPage();
    }

    public function render()
    {
        $perPage = GlobalHelpers::getPerPage();
        
        $lpos = Lpo::with(['hotel', 'supplier'])
            ->where('status', 'generated')
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->whereHas('hotel', function ($query) {
                        $query->where('hotel_name', 'like', '%' . $this->search . '%');
                    })
                        ->orWhereHas('supplier', function ($query) {
                            $query->where('supplier_name', 'like', '%' . $this->search . '%');
                        })
                        ->orWhere('lpo_order_number', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->supplier_id, function ($query) {
                $query->where('supplier_id', $this->supplier_id);
            })
            ->when($this->hotel_id, function ($query) {
                $query->where('hotel_id', $this->hotel_id);
            })
            ->when($this->has_invoice, function ($query) {
                if ($this->has_invoice === 'with') {
                    $query->whereNotNull('invoice_attached_by');
                } elseif ($this->has_invoice === 'without') {
                    $query->whereNull('invoice_attached_by');
                }
            })
            ->latest()
            ->paginate($perPage ?? 15);



        $suppliers = Supplier::all();
        $hotels = Hotel::all();


        return view('livewire.lpos.states.created-lpos', [
            'lpos' => $lpos,
            'suppliers' => $suppliers,
            'hotels' => $hotels,
        ]);
    }
}
