<?php

namespace App\Livewire\Billing;

use App\Models\BillingInvoice;
use App\Models\BillingSubscription;
use Livewire\Attributes\Computed;
use Livewire\Component;

class BillingOverview extends Component
{
    #[Computed]
    public function subscription(): ?BillingSubscription
    {
        return auth()->user()->currentTeam->subscription()->with('plan')->first();
    }

    #[Computed]
    public function nextInvoice(): ?BillingInvoice
    {
        return BillingInvoice::where('team_id', auth()->user()->currentTeam->id)
            ->where('status', 'open')
            ->orderBy('due_date')
            ->first();
    }

    public function render()
    {
        return view('livewire.billing.billing-overview');
    }
}
