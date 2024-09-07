<?php

namespace App\Livewire\Lpos;

use App\Models\Lpo;
use App\Models\LpoItem;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('View Lpo')]
class ViewLpo extends Component
{
    public $lpo;
    public $lpoItems;

    public $generatedBy;
    public $postedBy;
    public $addedToDailyLpoBy;
    public $approvedBy;

    public function mount($id)
    {
        $this->lpo = Lpo::with(['lpoItems', 'supplier', 'hotel'])->findOrFail($id);

        $this->lpoItems = LpoItem::findOrFail($id);

        $this->loadUserNames();
    }

    public function formatUserName($userId)
    {
        $user = User::findOrFail($userId);
        return trim("{$user->first_name} {$user->middle_name} {$user->last_name}");
    }

    public function loadUserNames()
    {
        if ($this->lpo->generated_by) {
            $this->generatedBy = $this->formatUserName($this->lpo->generated_by);
        }
        
        if ($this->lpo->posted_by) {
            $this->postedBy = $this->formatUserName($this->lpo->posted_by);
        }
        
        if ($this->lpo->added_to_daily_lpos_by) {
            $this->addedToDailyLpoBy = $this->formatUserName($this->lpo->added_to_daily_lpos_by);
        }
        
        if ($this->lpo->approved_by) {
            $this->approvedBy = $this->formatUserName($this->lpo->approved_by);
        }
        
    }

    public function render()
    {
        return view('livewire.lpos.view-lpo');
    }
}
