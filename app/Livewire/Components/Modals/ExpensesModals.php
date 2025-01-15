<?php

namespace App\Livewire\Components\Modals;

use App\Models\Expense;
use Livewire\Component;
use App\Models\Supplier;
use Livewire\Attributes\On;
use App\Models\ExpenseCategory;
use Livewire\Attributes\Validate;
use RealRashid\SweetAlert\Facades\Alert;

class ExpensesModals extends Component
{
    public $expense;
    public $restoreExpenseId;

    #[Validate()]
    public $item_name;

    #[Validate()]
    public $amount;

    #[Validate()]
    public $description;

    #[Validate()]
    public $unit_of_measure;

    #[Validate()]
    public $quantity;

    #[Validate()]
    public $supplier_number;

    #[Validate()]
    public $expense_category_code;

    protected $rules = [
        'item_name'         => 'required|string|max:255',
        'amount'            => 'required|numeric|min:0|max:99999999.99',
        'description'       => 'nullable|string',
        'unit_of_measure'   => 'nullable|string|max:255',
        'quantity'          => 'nullable|integer|min:0',
        'supplier_number' => [
            'required',
            'string',
            'exists:suppliers,supplier_number', // Ensures the supplier_number exists in the suppliers table
        ],
        'expense_category_code' => [
            'required',
            'string',
            'exists:expense_categories,category_code', // Ensures the category code exists in the expense_categories table
        ],
    ];


    #[On('pass-expense-id')]
    public function bindExpense($id)
    {
        // Fetch the existing expense record
        $this->expense = Expense::findOrFail($id);
    }

    #[On('pass-edit-expense-id')]
    public function bindEditExpense($id)
    {
        // Fetch the existing expense record
        $this->expense = Expense::findOrFail($id);

        $this->fill($this->expense->only(
            'item_name',
            'amount',
            'description',
            'unit_of_measure',
            'quantity',
            'supplier_number',
            'expense_category_code',
        ));
    }


    public function editExpense()
    {

        // Validate the updated data
        $validatedData = $this->validate();

        try {
            // Update the expense record
            $this->expense->update([
                'item_name'                 => $validatedData['item_name'],
                'amount'                    => $validatedData['amount'],
                'description'               => $validatedData['description'],
                'unit_of_measure'           => $validatedData['unit_of_measure'],
                'quantity'                  => $validatedData['quantity'],
                'supplier_number'           => $validatedData['supplier_number'],
                'expense_category_code'     => $validatedData['expense_category_code'],
            ]);

            Alert::toast('Expense updated successfully!', 'success');
            return redirect()->route('expenses.show');
        } catch (\Exception $e) {
            Alert::toast('Failed to update expense: ' . $e->getMessage(), 'error');
            return redirect()->route('expenses.show');
        }
    }


    public function deleteExpense()
    {
        try {
            $expenseToDelete = $this->expense;

            // Check if expense is paid partially or fully
            // if ($hotelToDelete->users->isNotEmpty()) {
            //     Alert::toast('Cannot delete ' . $hotelToDelete->hotel_name . ' ' . ', users are assigned to it.', 'error');
            //     return redirect()->route('expenses.show');
            // }

            // Delete the hotel
            $expenseToDelete->delete();

            Alert::toast($expenseToDelete->item_name . ' ' . 'deleted successfully', 'success');
            return redirect()->route('expenses.show');
        } catch (\Exception $e) {

            Alert::toast('Failed to delete hotel: ' . $e->getMessage(), 'error');
            return redirect()->route('expenses.show');
        }
    }

    #[On('pass-restore-expense-id')]
    public function bindRestoreId($id)
    {
        $this->restoreExpenseId = $id;
    }

    public function restoreExpense()
    {
        try {
            // Find the expense
            $expenseToRestore = Expense::onlyTrashed()->findOrFail($this->restoreExpenseId);

            // Restore the hotel
            $expenseToRestore->restore();

            Alert::toast($expenseToRestore->item_name.''.'restored successfully', 'success');
            return redirect()->route('expenses.trashed');
        } catch (\Exception $e) {

            Alert::toast('Failed to restore expense: '. $e->getMessage(), 'error');
            return redirect()->route('expenses.trashed');
        }
    }


    public function render()
    {
        $suppliers = Supplier::all();
        $categories = ExpenseCategory::all();

        return view('livewire.components.modals.expenses-modals', compact('suppliers', 'categories'));
    }
}
