<?php

namespace App\Livewire\Expenses;

use App\Models\Expense;
use Livewire\Component;
use App\Models\Supplier;
use App\Models\ExpenseCategory;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CreateExpense extends Component
{
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

    public function createExpense()
    {
        $validatedData = $this->validate();

        try {
            // Begin the database transaction
            DB::beginTransaction();

            // Create the expense
            Expense::create([
                'item_name'             => $validatedData['item_name'],
                'amount'                => $validatedData['amount'],
                'description'           => $validatedData['description'] ?? null,
                'unit_of_measure'       => $validatedData['unit_of_measure'] ?? null,
                'quantity'              => $validatedData['quantity'],
                'supplier_number'       => $validatedData['supplier_number'],
                'expense_category_code' => $validatedData['expense_category_code'],
            ]);

            // Commit the transaction
            DB::commit();

            // Notify success and redirect
            Alert::toast('Expense created successfully.', 'success');
            return redirect()->route('expenses.show');
        } catch (\Exception $e) {
            // Rollback the transaction in case of any error
            DB::rollBack();

            // Notify failure and redirect
            Alert::toast('Failed to create expense, try again', 'error');
            return redirect()->route('expenses.show');
        }
    }


    public function render()
    {

        $suppliers = Supplier::all();
        $categories = ExpenseCategory::all();

        return view('livewire.expenses.create-expense', compact('categories', 'suppliers'));
    }
}
