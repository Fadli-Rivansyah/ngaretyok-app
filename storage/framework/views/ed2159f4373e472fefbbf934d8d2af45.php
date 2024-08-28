<div class="max-w-3xl flex flex-col mx-auto sm:px-6 lg:px-8 space-y-4">
    <h1 class="text-5xl capitalize font-extrabold break-words tracking-tight text-gray-900 dark:text-white"><?php echo e($lapak->nama_lapak); ?></h1>
    <div class="flex items-center">
        <div class="flex items-center gap-2">
            <svg class="w-6 h-6 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
            <span class="bg-indigo-100 text-indigo-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300"><?php echo e(date('d F Y', strtotime($lapak->created_at))); ?></span>
        </div>
        <hr class="h-full w-1 mx-4 bg-red-300 border-0 rounded"/>
        <div class="flex items-center gap-2">
            <!--[if BLOCK]><![endif]--><?php if(date('Y-m-d') >= date('Y-m-d', strtotime($lapak->tanggal_lapak))): ?>
                <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Siap Panen</span>
            <?php else: ?>
                <span class="bg-red-100 text-red-800  text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300"><?php echo e(date('d F Y', strtotime($lapak->tanggal_lapak))); ?></span>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>
    <img class="object-cover w-full rounded-lg" src="<?php echo e(Storage::url($hiro)); ?>" alt="belum-tampil">
    <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400"><?php echo e($lapak->deskripsi_lapak); ?></p>
    <div class="flex flex-col mt-[5em] ">
        <h5 class="mb-3 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">Gambar lapak</h5>
        <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, voluptas quisquam est sit incidunt quaerat?</p>
        <div class="grid lg:grid-cols-2 gap-4 my-5">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <img class="h-auto w-full rounded-lg" src="<?php echo e(Storage::url($item->path)); ?>"  alt="gambar">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            <div wire:click="openModal" wire:transition.scale.origin.topclass ="flex items-center justify-center w-full h-auto">
                <div class="flex flex-col items-center justify-center w-full h-full border-2 py-5 border-gray-300 border-dashed rounded-lg ">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v9m-5 0H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2M8 9l4-5 4 5m1 8h.01"/>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG (MAX. 800x400px)</p>
                </div>
            </div> 
            
            <div <?php if(!$isOpen): ?> inert <?php endif; ?> class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <!--[if BLOCK]><![endif]--><?php if($isOpen): ?>
            <div class="fixed top-0 right-0 left-0  w-screen h-screen backdrop-blur-sm bg-black/50">
                <div tabindex="-1" class="flex fixed top-0 right-0 left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Upload Gambar
                                </h3>
                                <button wire:click="closeModal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="space-y-4">
                                <form wire:submit.prevent="uploadGambar" class="w-full px-8 pt-6 pb-8 mb-4">
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="foto_lapak">
                                            Foto Lapak
                                        </label>
                                        <input type="file" multiple wire:model.blur="foto_lapak" name="foto_lapak" class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="foto_lapak">
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['foto_lapak.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                        <!--[if BLOCK]><![endif]--><?php if($foto_lapak): ?>
                                            <div class="flex flex-wrap gap-2 ">
                                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $foto_lapak; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <!--[if BLOCK]><![endif]--><?php if($photo->temporaryUrl()): ?> <!-- Periksa jika URL sementara ada -->
                                                    <div class="flex items-center w-max max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800">
                                                        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
                                                            <img src="<?php echo e($photo->temporaryUrl()); ?>" class="max-w-11" alt="preview-img">
                                                        </div>
                                                        <button wire:click="deletePreview(<?php echo e($index); ?>)" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">
                                                            <svg class="w-3 h-3"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                            </div>
                                        <?php elseif($images): ?>
                                            <div class="flex flex-wrap gap-2 ">
                                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div  class="flex flex-row items-center w-max max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800">
                                                    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
                                                        <img src="<?php echo e(Storage::url($item->path)); ?>" class="max-w-11" alt="preview-img">
                                                    </div>
                                                    <button wire:click="deleteImage(<?php echo e($index); ?>)" type="button" id="delete-lapak" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" >
                                                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                            </div>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        <div wire:loading wire:target="foto_lapak">
                                            Uploading...
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <button  class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                            Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>
</div>


<?php /**PATH C:\Users\DELL\Documents\ngaretyok-app\resources\views/livewire/lapak/view-lapak.blade.php ENDPATH**/ ?>