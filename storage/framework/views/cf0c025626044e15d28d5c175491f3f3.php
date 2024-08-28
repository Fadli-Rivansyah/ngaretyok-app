<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
    <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $attributes = $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $component = $__componentOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
    <div class="mb-3 w-full flex flex-col md:flex-row md:items-start md:justify-between items-end ">
        <?php if (isset($component)) { $__componentOriginal5a94ef8b388dd14c079478b029d5d8c7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5a94ef8b388dd14c079478b029d5d8c7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link','data' => ['class' => 'mb-3','link' => route('create.lapak')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-3','link' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('create.lapak'))]); ?>
            <?php $__env->slot('icon'); ?>
            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
            </svg>
            <?php $__env->endSlot(); ?>
              Create Lapak
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5a94ef8b388dd14c079478b029d5d8c7)): ?>
<?php $attributes = $__attributesOriginal5a94ef8b388dd14c079478b029d5d8c7; ?>
<?php unset($__attributesOriginal5a94ef8b388dd14c079478b029d5d8c7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5a94ef8b388dd14c079478b029d5d8c7)): ?>
<?php $component = $__componentOriginal5a94ef8b388dd14c079478b029d5d8c7; ?>
<?php unset($__componentOriginal5a94ef8b388dd14c079478b029d5d8c7); ?>
<?php endif; ?>
        <div class="w-full md:w-2/6">   
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
    
    <table class="hidden md:table flex-col w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Lapak
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal
                </th>
                <th scope="col" class="px-6 py-3">
                    Deskripsi
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <!--[if BLOCK]><![endif]--><?php if($searchLapak->count() == 0): ?>
            <tbody class="w-full h-full flex  justify-start items-center bg-red-500" >
                <div>
                    <p>Tidak di temukan</p>
                </div>
            </tbody>
        <?php else: ?>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $searchLapak; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class=" bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th wire:key="<?php echo e($item->id); ?>" scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?php echo e($item->id); ?>

                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 capitalize whitespace-nowrap dark:text-white">
                            <?php echo e(Str::limit($item->nama_lapak, 40, '...')); ?>

                        </th>
                        <td class="px-6 py-4">
                            <!--[if BLOCK]><![endif]--><?php if($item->tanggal_lapak == 'siap panen'): ?>
                                Siap Panen
                            <?php else: ?>
                                <?php echo e(date('d F Y', strtotime($item->tanggal_lapak))); ?>

                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="px-6 py-4">
                            <?php echo e(Str::limit($item->deskripsi_lapak, 50, '...')); ?>

                        </td>
                        <td class="px-6 py-4 flex space-x-4 items-center">
                            <button wire:navigate.hover wire:click="editLapak(<?php echo e($item->id); ?>)" class="btn btn-danger">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                </svg>
                            </button>
                            <button wire:navigate.hover wire:confirm="Apakah lapak ini mau dihapus?" wire:click="deleteLapak(<?php echo e($item->id); ?>)"  type="button">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                </svg>    
                            </button>
                            <button  id="dropdownTable<?php echo e($item->id); ?>" data-dropdown-toggle="dropdownTable_toggle_<?php echo e($item->id); ?>">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M6 12h.01m6 0h.01m5.99 0h.01"/>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownTable_toggle_<?php echo e($item->id); ?>" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownTable<?php echo e($item->id); ?>">
                                    <li>
                                        <a href="#" wire:navigate.hover wire:click="viewLapak(<?php echo e($item->id); ?>)" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View</a>
                                    </li>
                                    <li>
                                        <button id="dropdownTabel_child_<?php echo e($item->id); ?>" data-dropdown-toggle="dropdownTable_child_toggle_<?php echo e($item->id); ?>" data-dropdown-placement="right-start" type="button" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Atur jadwal
                                            <svg class="w-2.5 h-2.5 ms-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                            </svg>
                                        </button>
                                        <div id="dropdownTable_child_toggle_<?php echo e($item->id); ?>" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownTabel_child_<?php echo e($item->id); ?>">
                                                <li>
                                                    <span wire:click="aturWaktu('Seminggu', <?php echo e($item->id); ?>)" class="block px-4 py-2 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Seminggu</span>
                                                </li>
                                                <li>
                                                    <span wire:click="aturWaktu('Dua minggu', <?php echo e($item->id); ?>)" class="block px-4 py-2 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dua minggu</span>
                                                </li>
                                                <li>
                                                    <span wire:click="aturWaktu('Tiga minggu', <?php echo e($item->id); ?>)" class="block px-4 py-2 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tiga minggu</span>
                                                </li>
                                                <li>
                                                    <span wire:click="aturWaktu('Sebulan', <?php echo e($item->id); ?>)" class="block px-4 py-2 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sebulan</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </table>
    <div class="w-full md:hidden flex flex-col gap-4">
        <!--[if BLOCK]><![endif]--><?php if($searchLapak->count() == 0): ?>
            <p>Tidak ditemukan..</p>
        <?php else: ?>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $searchLapak; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div wire:key="<?php echo e($item->id); ?>" class="w-full h-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo e($item->nama_lapak); ?></h5>
                        <div>                         
                            <button id="dropdownMobile_<?php echo e($item->id); ?>" data-dropdown-toggle="dropdownMobile_toogle_<?php echo e($item->id); ?>" class="bg-gray-200 hover:bg-gray-200 focus:ring-1 focus:outline-none focus:ring-gray-200 font-medium rounded-full text-sm px-1 py-1 text-center inline-flex items-center dark:bg-gray-200 dark:hover:bg-gray-200" type="button"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M6 12h.01m6 0h.01m5.99 0h.01"/>
                            </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownMobile_toogle_<?php echo e($item->id); ?>" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMobile_<?php echo e($item->id); ?>">
                                    <li>
                                        <button wire:navigate.hover wire:click="editLapak(<?php echo e($item->id); ?>)" class="w-full flex  items-center gap-3 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-width="1" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                <path stroke="currentColor" stroke-width="1" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                            </svg>
                                            Lihat
                                        </button>
                                    </li>
                                    <li>
                                        <button wire:navigate.hover wire:click="editLapak(<?php echo e($item->id); ?>)" class="w-full flex  items-center gap-3 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                            </svg> Edit
                                        </button>
                                    </li>
                                    <li>
                                        <button wire:navigate.hover wire:confirm="Apakah lapak ini mau dihapus?" wire:click="deleteLapak(<?php echo e($item->id); ?>)" class="w-full px-4 py-2 flex items-center  gap-3  hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" type="button">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                            </svg> Delete
                                        </button>
                                    </li>
                                    <li>
                                        <button id="dropdownMobile_child_<?php echo e($item->id); ?>" data-dropdown-toggle="dropdownMobile_child_toggle_<?php echo e($item->id); ?>" data-dropdown-placement="right-start" type="button" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/>
                                            </svg>
                                            Atur jadwal
                                            <svg class="w-2.5 h-2.5 ms-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                            </svg>
                                        </button>
                                        <div id="dropdownMobile_child_toggle_<?php echo e($item->id); ?>" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMobile_child_<?php echo e($item->id); ?>">
                                                <li>
                                                    <span wire:click="aturWaktu('Seminggu', <?php echo e($item->id); ?>)" class="block px-4 py-2 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Seminggu</span>
                                                </li>
                                                <li>
                                                    <span wire:click="aturWaktu('Dua minggu', <?php echo e($item->id); ?>)" class="block px-4 py-2 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dua minggu</span>
                                                </li>
                                                <li>
                                                    <span wire:click="aturWaktu('Tiga minggu', <?php echo e($item->id); ?>)" class="block px-4 py-2 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tiga minggu</span>
                                                </li>
                                                <li>
                                                    <span wire:click="aturWaktu('Sebulan', <?php echo e($item->id); ?>)" class="block px-4 py-2 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sebulan</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        </div>
                    <div class="mb-3">
                        <!--[if BLOCK]><![endif]--><?php if($item->tanggal_lapak == 'siap panen'): ?>
                            <span class="bg-green-100 text-green-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Siap Panen</span>
                        <?php else: ?>
                            <span class="bg-red-100 text-red-800  text-sm font-medium px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300"><?php echo e(date('d F Y', strtotime($item->tanggal_lapak))); ?></span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo e(Str::limit($item->deskripsi_lapak, 50, '...')); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        <?php endif; ?><!--[if ENDBLOCK]><![endif]--> 
    </div>
</div>
<?php /**PATH C:\Users\DELL\Documents\ngaretyok-app\resources\views/lapak.blade.php ENDPATH**/ ?>