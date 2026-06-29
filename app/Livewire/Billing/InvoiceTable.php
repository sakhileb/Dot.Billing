<?php

namespace App\Livewire\Billing;

use App\Models\BillingInvoice;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class InvoiceTable extends Component
{
    use WithPagination;

    public string $filterStatus = '';

    #[Computed]
    public function invoices()
    {
        return BillingInvoice::where('team_id', auth()->user()->currentTeam->id)
            ->when($this->filterStatus, fn ($q) => $q->where('status', $this->filterStatus))
            ->orderByDesc('created_at')
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.billing.invoice-table');
    }
}
