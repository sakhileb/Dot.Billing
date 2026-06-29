<?php

namespace App\Livewire\Billing;

use App\Models\BillingUsageRecord;
use App\Services\AiBillingService;
use Livewire\Attributes\Computed;
use Livewire\Component;

class UsageDashboard extends Component
{
    public string $selectedPeriod = 'this_month';
    public array $aiInsights = [];

    #[Computed]
    public function usageByPlatform(): array
    {
        $teamId = auth()->user()->currentTeam->id;
        return BillingUsageRecord::where('team_id', $teamId)
            ->selectRaw('platform, metric, SUM(quantity) as total')
            ->groupBy('platform', 'metric')
            ->get()
            ->groupBy('platform')
            ->toArray();
    }

    public function analyzeSpend(): void
    {
        $service = new AiBillingService();
        $result  = $service->analyzeSpend(auth()->user()->currentTeam, $this->usageByPlatform);
        $this->aiInsights = $result['insights'];
    }

    public function render()
    {
        return view('livewire.billing.usage-dashboard');
    }
}
