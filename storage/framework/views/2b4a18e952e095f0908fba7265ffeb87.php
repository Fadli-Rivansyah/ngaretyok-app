<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="mx-auto my-[1em]">
        <div class="w-full mx-auto">
          
            <div class="lg:w-2/3">   
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="default-search" wire:model.live="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari lapak..." required />
                    
                </div>
            </div>
        </div>
    </div>
    <div class="mt-[3em] lg:w-2/3 flex flex-wrap gap-5 ">
        <!--[if BLOCK]><![endif]--><?php if($searchLapak->count() == 0): ?>
            <p>Tidak ditemukan</p>
        <?php else: ?>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $searchLapak; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div wire:key="<?php echo e($item->id); ?>" class="w-full h-auto flex flex-col border-b gap-5 md:gap-8  py-2 border-gray-300 md:flex-row   dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="object-cover w-full rounded-lg max-h-32 md:w-1/4 min-h-20 " src="<?php echo e(Storage::url($item->images()->get()->first()->path)); ?>"  alt="hiro-lapak" />       
                <div class="w-full flex flex-col gap-3 leading-normal">
                    <div class="flex justify-between">
                        <a wire:navigate href="<?php echo e(route('view.lapak',['idlapak' => $item->id])); ?>"  class="underline capitalize decoration-indigo-500 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo e(Str::limit($item->nama_lapak, 50, '...')); ?></a>
                    </div>
                    <div class="flex items-center">
                        <div class="flex items-center gap-2">
                            <svg class="w-6 h-6 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <span class="bg-indigo-100 text-indigo-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300"><?php echo e(date('d F Y', strtotime($item->created_at))); ?></span>
                        </div>
                        <hr class="h-full w-1 mx-4 bg-gray-300 border-0 rounded">
                        <div class="flex items-center gap-2">
                            <!--[if BLOCK]><![endif]--><?php if(date('Y-m-d') >= date('Y-m-d', strtotime($item->tanggal_lapak))): ?>
                                <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Siap Panen</span>
                            <?php else: ?>
                                <span class="bg-red-100 text-red-800  text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300"><?php echo e(date('d F Y', strtotime($item->tanggal_lapak))); ?></span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                    <p class="mb-3 font-normal  break-words text-gray-700 dark:text-gray-400"><?php echo e(Str::limit($item->deskripsi_lapak, 100, '...')); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        <?php endif; ?><!--[if ENDBLOCK]><![endif]--> 
    </div>                
</div>
<?php /**PATH C:\Users\DELL\Documents\ngaretyok-app\resources\views/find.blade.php ENDPATH**/ ?>