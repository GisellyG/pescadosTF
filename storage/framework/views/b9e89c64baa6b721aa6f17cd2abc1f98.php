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
            <div class="alert-box inline-flex max-w-sm w-full bg-white shadow-md rounded-lg overflow-hidden absolute top-1 left-1/2 transform -translate-x-1/2 z-50">
                <div class="flex justify-center items-center w-12 bg-green-500">
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
                <button onclick="this.closest('.alert-box').remove()" 
                    class="text-gray-400 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200 rounded-full p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        <?php endif; ?>
    </div>

    <h3 class="text-gray-700 text-3xl font-medium">Controle de Estoque</h3>
<div class="text-right ">
    <a class="" href="<?php echo e(route('products.create')); ?>">
        <button class="px-4 py-2 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Cadastrar</button>
    </a>
</div>
<?php if($products->isNotEmpty()): ?>
    <div class="bg-white shadow rounded-md overflow-hidden my-6">
        <div class="overflow-x-auto"> 
            <table class="text-left w-full border-collapse">
                <thead class="border-b">
                    <tr>
                        <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">Produto</th>
                        <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">Quantidade</th>
                        <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">Lote</th>
                        <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">Data de Validade</th>
                        <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-gray-200">
                            <td class="py-4 px-6 border-b text-gray-800 text-lg"><?php echo e($p->name); ?></td>
                            <td class="py-4 px-6 border-b text-gray-600"><?php echo e($p->quantity); ?></td>
                            <td class="py-4 px-6 border-b text-gray-600"><?php echo e(date('d/m/Y', strtotime($p->lot ))); ?></td>
                            <td class="py-4 px-6 border-b text-gray-600"><?php echo e(date('d/m/Y', strtotime($p->validity ))); ?></td>
                            <td class="py-4 px- border-b whitespace-nowrap">
                                <a class="text-blue-600 hover:text-blue-800 mr-4" href="<?php echo e(route('products.edit', ['product' => $p->id])); ?>">Editar</a> 
                                <form class="inline" action="<?php echo e(route('products.destroy', ['product' => $p->id])); ?>" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="text-red-600 hover:text-red-800">Excluir</button>
                                </form>
                            </td>                            
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php else: ?>
        <div class="flex items-center justify-center h-64">
            <p class="text-gray-500 text-3xl text-center">Nenhum produto cadastrado no estoque.</p>
        </div>
    <?php endif; ?>
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
<?php /**PATH C:\Users\gisel\Documents\Laravel\pescadosTF\resources\views/product/index.blade.php ENDPATH**/ ?>