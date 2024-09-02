<?php

namespace App\Livewire\Payments;

use App\Models\User;
use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\GlobalHelpers;

class ShowPayments extends Component
{
    use WithPagination;

    public $payedBy;

    public function render()
    {
        $perPage = GlobalHelpers::getPerPage();

        $payments = Payment::latest('payment_date')->paginate($perPage ?? 15);

        foreach ($payments as $payment) {
            $user = User::findOrFail($payment->payed_by);
            $this->payedBy = trim("{$user->first_name} {$user->middle_name} {$user->last_name}");
        }

        return view('livewire.payments.show-payments', compact('payments'));
    }
}
