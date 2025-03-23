<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="relative">
        <?php if(session()->has('success')): ?>
            <div class="inline-flex max-w-sm w-full bg-white shadow-xl rounded-lg overflow-hidden absolute top-1 left-1/2 transform -translate-x-1/2 z-50 transition-all duration-300 ease-in-out">
                <div class="flex justify-center items-center w-12 bg-green-500 rounded-l-lg">
                    <svg class="h-6 w-6 fill-current text-white" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
                    </svg>
                </div>
                <div class="-mx-3 py-2 px-4">
                    <div class="mx-3">
                        <span class="text-green-500 font-semibold">Sucesso</span>
                        <p class="text-gray-600 text-sm"><?php echo e(session()->get("success")); ?></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="shadow-lg p-8">
        <div class="mb-4">
            <a href="<?php echo e(route('biometrias.index')); ?>" class="text-blue-600 hover:text-blue-800 transition-colors duration-300">
                ← Voltar para a lista de biometrias
            </a>
        </div>
        <h2 class="text-3xl font-semibold mb-4 text-gray-800">Detalhes da Biometria</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex flex-col">
                <h3 class="text-lg font-medium text-gray-700">Viveiro</h3>
                <p class="text-gray-900 ml-1"><?php echo e($biometria->viveiro->name); ?></p>
            </div>
    
            <div class="flex flex-col">
                <h3 class="text-lg font-medium text-gray-700">Data da Biometria</h3>
                <p class="text-gray-900 ml-1"><?php echo e(date('d/m/Y', strtotime($biometria->date ))); ?></p>
            </div>
    
            <div class="flex flex-col">
                <h3 class="text-lg font-medium text-gray-700">Peso do Camarão</h3>
                <p class="text-gray-900 ml-1"><?php echo e(number_format($biometria->shrimp_weight, 2)); ?>g</p>
            </div>
    
            <div class="flex flex-col">
                <h3 class="text-lg font-medium text-gray-700">Observações</h3>
                <p class="text-gray-900 ml-1 break-words"><?php echo e($biometria->description); ?></p>
            </div>
    
            <?php if($biometria->image): ?>
            <div class="flex flex-col col-span-2">
                <h3 class="text-lg font-medium text-gray-700">Imagem da Biometria</h3>
                <img src="<?php echo e(asset('storage/' . $biometria->image)); ?>" alt="Imagem da Biometria" class="w-96 mt-2 rounded-xl shadow-lg" />
            </div>
            <?php endif; ?>
        </div>
    
        <div class="mt-6 flex justify-end space-x-4">
            <form action="<?php echo e(route('biometrias.destroy', $biometria->id)); ?>" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta biometria?');">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="text-red-600 hover:text-red-800 px-4 py-2 border border-red-500 rounded-lg transition-colors duration-300">
                    Excluir
                </button>
            </form>
            <a href="<?php echo e(route('biometrias.edit', $biometria->id)); ?>" class="text-blue-600 hover:text-blue-800 px-4 py-2 border border-blue-500 rounded-lg transition-colors duration-300">
                Editar
            </a>
        </div>
    </div>
    
</div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Laravel\pescadosTF\resources\views/biometrias/show.blade.php ENDPATH**/ ?>