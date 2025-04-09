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
            <div class="inline-flex max-w-sm w-full bg-white shadow-md rounded-lg overflow-hidden absolute top-1 left-1/2 transform -translate-x-1/2 z-50">
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
            </div>
        <?php endif; ?>
    </div>
    <h3 class="text-gray-700 text-3xl font-medium mb-6">Biometria</h3>
    <div class="text flex justify-between mb-4">
        <div>
        <h2 class="text-xl font-semibold text-gray-700 leading-tight">Viveiro</h2>
            <div class="mt-2 flex flex-col sm:flex-row">
                <div class="flex">
                    <div class="relative">
                        
                        <select class="appearance-none h-full rounded-l border block w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" onchange="window.location.href=this.value;">
                            <option value="<?php echo e(route('biometrias.index')); ?>">Todos os Viveiros</option>
                            <?php $__currentLoopData = $viveiros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $viveiro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e(route('biometrias.index', ['viveiro_id' => $viveiro->id])); ?>" 
                                        <?php if(request()->viveiro_id == $viveiro->id): ?> selected <?php endif; ?>>
                                    <?php echo e($viveiro->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <a href="<?php echo e(route('biometrias.create')); ?>">
            <button class="mt-8 px-4 py-2 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Nova Biometria</button>
        </a>
    </div>
            <?php
            if (isset($_GET["viveiro_id"])) {
                $biometrias = $biometrias->where('viveiro_id', $_GET["viveiro_id"]);
            }
            ?>
            <?php if(isset($biometrias) && $biometrias->isNotEmpty()): ?>
            <div class="bg-white shadow rounded-md overflow-hidden my-6">
                <div class="overflow-x-auto"> 
                    <table class="text-left w-full border-collapse">
                        <thead class="border-b">
                            <tr>
                                <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">Viveiro</th>
                                <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">Data da Biometria</th>
                                <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100">Gramatura</th>
                                <th class="py-3 px-5 bg-gray-900 font-medium uppercase text-sm text-gray-100"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $biometrias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-gray-200">
                                    <td class="py-4 px-6 border-b text-gray-800"><?php echo e($b->viveiro->name); ?></td>
                                    <td class="py-4 px-6 border-b text-gray-600"><?php echo e(date('d/m/Y', strtotime($b->date ))); ?></td>
                                    <td class="py-4 px-6 border-b text-gray-600"><?php echo e($b->shrimp_weight); ?>g</td>
                                    <td class="py-4 border-b whitespace-nowrap">
                                        <a class="text-blue-600 hover:text-blue-800 mr-4" href="<?php echo e(route('biometrias.show', ['biometria' => $b->id])); ?>">Exibir</a> 
                                    </td>                            
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php else: ?> 
                <p class="text-gray-500 text-3xl text-center">Nenhuma biometria cadastrada.</p>
            <?php endif; ?>
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
<?php /**PATH C:\Users\gisel\Documents\Laravel\pescadosTF\resources\views/biometrias/index.blade.php ENDPATH**/ ?>