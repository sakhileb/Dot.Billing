<div class="dot-card" style="padding:1.5rem;">
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.25rem;">
        <h3 style="font-family:'Syne',sans-serif;font-size:0.875rem;font-weight:700;color:#f4f4f5;margin:0;">Invoices</h3>
        <select wire:model.live="filterStatus" class="dot-input" style="font-size:11px;padding:4px 8px;width:auto;">
            <option value="">All</option>
            <option value="paid">Paid</option>
            <option value="open">Open</option>
            <option value="void">Void</option>
        </select>
    </div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($this->invoices->isEmpty()): ?>
        <div style="text-align:center;padding:2rem 0;">
            <span class="material-symbols-rounded" style="font-size:36px;color:#3f3f46;display:block;margin-bottom:0.75rem;">receipt</span>
            <p style="font-size:0.8rem;color:#52525b;margin:0;">No invoices yet.</p>
        </div>
    <?php else: ?>
        <div style="display:grid;gap:0.5rem;">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $this->invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div style="display:flex;align-items:center;justify-content:space-between;padding:0.75rem 1rem;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:8px;">
                <div>
                    <div style="font-size:12px;font-weight:600;color:#d4d4d8;font-family:'JetBrains Mono',monospace;"><?php echo e($invoice->invoice_number); ?></div>
                    <div style="font-size:11px;color:#52525b;margin-top:2px;"><?php echo e($invoice->created_at->format('M d, Y')); ?></div>
                </div>
                <div style="text-align:right;">
                    <div class="metric-val" style="font-size:13px;font-weight:600;color:#f4f4f5;"><?php echo e($invoice->currency); ?> <?php echo e(number_format($invoice->total, 2)); ?></div>
                    <span style="font-size:10px;font-weight:600;padding:2px 7px;border-radius:100px;<?php echo e($invoice->isPaid() ? 'background:rgba(34,197,94,0.1);color:#22c55e;' : ($invoice->isOverdue() ? 'background:rgba(239,68,68,0.1);color:#ef4444;' : 'background:rgba(245,158,11,0.1);color:#f59e0b;')); ?>">
                        <?php echo e(ucfirst($invoice->status)); ?><?php echo e($invoice->isOverdue() ? ' · Overdue' : ''); ?>

                    </span>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <div style="margin-top:1rem;"><?php echo e($this->invoices->links()); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /workspaces/Dot.Billing/resources/views/livewire/billing/invoice-table.blade.php ENDPATH**/ ?>