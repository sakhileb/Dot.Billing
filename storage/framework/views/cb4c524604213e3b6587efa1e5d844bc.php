<div class="dot-card" style="padding:1.5rem;">
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.25rem;flex-wrap:wrap;gap:0.75rem;">
        <h3 style="font-family:'Syne',sans-serif;font-size:0.875rem;font-weight:700;color:#f4f4f5;margin:0;">Platform Usage</h3>
        <button wire:click="analyzeSpend" class="dot-btn dot-btn-ghost" style="font-size:12px;padding:5px 12px;">
            <span class="material-symbols-rounded" style="font-size:14px;">auto_awesome</span>
            AI Spend Analysis
        </button>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($aiInsights)): ?>
    <div style="background:rgba(129,140,248,0.06);border:1px solid rgba(129,140,248,0.2);border-radius:8px;padding:1rem;margin-bottom:1.25rem;">
        <div style="font-size:11px;font-weight:600;color:#818cf8;margin-bottom:0.5rem;text-transform:uppercase;letter-spacing:0.08em;">AI Insights</div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $aiInsights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div style="font-size:12px;color:#a1a1aa;margin-bottom:4px;">· <?php echo e($insight); ?></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(empty($this->usageByPlatform)): ?>
        <div style="text-align:center;padding:2rem 0;">
            <span class="material-symbols-rounded" style="font-size:36px;color:#3f3f46;display:block;margin-bottom:0.75rem;">bar_chart</span>
            <p style="font-size:0.8rem;color:#52525b;margin:0;">No usage data recorded yet.</p>
        </div>
    <?php else: ?>
        <div style="display:grid;gap:0.5rem;">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $this->usageByPlatform; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $platform => $metrics): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div style="display:flex;align-items:center;justify-content:space-between;padding:0.65rem 0.75rem;background:rgba(255,255,255,0.03);border-radius:8px;">
                <div style="font-size:12px;font-weight:600;color:#d4d4d8;"><?php echo e($platform); ?></div>
                <div style="display:flex;gap:0.75rem;">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $metrics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span style="font-size:11px;color:#71717a;font-family:'JetBrains Mono',monospace;"><?php echo e($m['metric']); ?>: <span style="color:#818cf8;"><?php echo e(number_format($m['total'], 0)); ?></span></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /workspaces/Dot.Billing/resources/views/livewire/billing/usage-dashboard.blade.php ENDPATH**/ ?>