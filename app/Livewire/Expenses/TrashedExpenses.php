<?php

namespace App\Livewire\Expenses;

use App\Models\Expense;
use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\GlobalHelpers;

class TrashedExpenses extends Component
{
    use WithPagination;
    
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        $perPage = GlobalHelpers::getPerPage();

        $trashedExpenses = Expense::onlyTrashed()
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('item_name', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%')
                        ->orWhere('unit_of_measure', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate($perPage ?? 15);

        return view('livewire.expenses.trashed-expenses', compact('trashedExpenses'));
    }
}
