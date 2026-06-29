<div class="dot-card" style="padding:1.5rem;">
    <h3 style="font-family:'Syne',sans-serif;font-size:0.875rem;font-weight:700;color:#f4f4f5;margin:0 0 1.25rem;">Current Plan</h3>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($this->subscription): ?>
        <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;">
            <div>
                <div style="font-family:'Syne',sans-serif;font-size:1.5rem;font-weight:700;color:#818cf8;"><?php echo e($this->subscription->plan->name ?? 'Unknown'); ?></div>
                <div style="font-size:11px;color:#71717a;margin-top:4px;"><?php echo e(ucfirst($this->subscription->billing_cycle)); ?> billing · <?php echo e(ucfirst($this->subscription->status)); ?></div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($this->subscription->isTrialing()): ?>
                    <div style="margin-top:6px;font-size:11px;color:#f59e0b;">Trial ends <?php echo e($this->subscription->trial_ends_at->format('M d, Y')); ?></div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($this->nextInvoice): ?>
            <div style="text-align:right;">
                <div style="font-size:10px;color:#52525b;text-transform:uppercase;letter-spacing:0.08em;">Next Invoice</div>
                <div class="metric-val" style="font-size:1.5rem;font-weight:600;color:#f4f4f5;margin-top:2px;"><?php echo e($this->nextInvoice->currency); ?> <?php echo e(number_format($this->nextInvoice->total, 2)); ?></div>
                <div style="font-size:11px;color:#71717a;">Due <?php echo e($this->nextInvoice->due_date?->format('M d, Y') ?? 'TBD'); ?></div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    <?php else: ?>
        <div style="text-align:center;padding:2rem 0;">
            <span class="material-symbols-rounded" style="font-size:36px;color:#3f3f46;display:block;margin-bottom:0.75rem;">receipt_long</span>
            <p style="font-size:0.8rem;color:#52525b;margin:0;">No active subscription. Choose a plan to get started.</p>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /workspaces/Dot.Billing/resources/views/livewire/billing/billing-overview.blade.php ENDPATH**/ ?>