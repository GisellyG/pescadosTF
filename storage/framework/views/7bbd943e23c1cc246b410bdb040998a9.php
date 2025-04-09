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
    <h3 class="text-gray-700 text-3xl font-medium">Painel de Controle</h3>
    <div class="px-4 pt-6">
        <div class="grid gap-4 xl:grid-cols-2 2xl:grid-cols-3">
          <!-- Main widget -->
          <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="flex items-center justify-between mb-4">
              <div class="flex-shrink-0">
                <span class="text-xl font-bold leading-none text-gray-900 sm:text-2xl dark:text-white">Produtos</span>
                <h3 class="text-base font-light text-gray-500 dark:text-gray-400">Baixa Quantidade</h3>
              </div>
                  <a href="<?php echo e(route("products.index")); ?>" class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-primary-700 sm:text-sm hover:bg-gray-100 dark:text-blue-500 dark:hover:bg-gray-700">
                Atualizar Produtos
                 <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
               </a>
            </div>
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
              <?php if($lowestQuantityProducts->isEmpty()): ?>
                  <li class="py-3 sm:py-4">
                    <div class="text-center text-gray-500 font-semibold dark:text-gray-400">
                      Nenhum produto cadastrado.
                  </div>                  
                  </li>
              <?php else: ?>
                  <?php $__currentLoopData = $lowestQuantityProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li class="py-3 sm:py-4">
                          <div class="flex items-center justify-between">
                              <div class="flex items-center min-w-0">
                                  <div class="ml-3">
                                      <p class="font-medium text-gray-900 truncate dark:text-white">
                                          <?php echo e($p->name); ?>

                                      </p>
                                  </div>
                              </div>
                              <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                  <?php echo e($p->quantity); ?>

                              </div>
                          </div>
                      </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
          </ul>
          
          </div>
          <!--Tabs widget -->
          <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-900 dark:text-white">Informações dos Viveiros
            <button data-popover-target="popover-description" data-popover-placement="bottom-end" type="button"><svg class="w-4 h-4 ml-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="sr-only">Show information</span></button>
            </h3>
            <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400" id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                <a href="<?php echo e(route("viveiros.index")); ?>" class="w-full">
                    <button id="faq-tab" data-tabs-target="#faq" type="button" role="tab" aria-controls="faq" aria-selected="true" class=" text-white inline-block w-full p-4 rounded-tl-lg bg-gray-50 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600 ">Gramaturas</button>
                </a>
            </ul>
            <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
                <div class="hidden pt-4" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                  <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    <?php $__currentLoopData = $viveiros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="py-3 sm:py-4">
                      <div class="flex items-center justify-between">
                        <div class="flex items-center min-w-0">
                          <div class="ml-3">
                            <p class="font-medium text-gray-900 truncate dark:text-white">
                              Viveiro <?php echo e($v->name); ?>

                            </p>
                          </div>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                          <?php if( $v->gramatura == 0): ?>
                                    Sem biometria
                                <?php else: ?> 
                                    <?php echo e($v->gramatura); ?>g
                                <?php endif; ?>
                        </div>
                      </div>
                    </li>       
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
                  </ul>
                </div>
            </div>
          </div>
        </div>
        <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">
          <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="w-full">
              <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Quantidade de Produtos</h3>
              <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white"><?php echo e($totalProducts); ?></span>
            </div>
            <div class="w-full" id="new-products-chart"></div>
          </div>
          <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="w-full">
              <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Quantidade de Viveiros</h3>
              <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white"><?php echo e($totalViveiros); ?></span>
            </div>
        </div>
          <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="w-full">
              <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Quantidade de Biometrias</h3>
              <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white"><?php echo e($totalBiometrias); ?></span>
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
<?php /**PATH C:\Users\gisel\Documents\Laravel\pescadosTF\resources\views/dashboard.blade.php ENDPATH**/ ?>