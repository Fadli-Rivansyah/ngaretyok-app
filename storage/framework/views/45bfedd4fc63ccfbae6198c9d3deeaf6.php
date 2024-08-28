<div class="max-w-7xl mx-auto py-2">
  <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
    <div class="flex items-center rounded-lg p-4 mb-1 text-sm text-white  bg-indigo-500 dark:bg-gray-800 dark:text-green-400" role="alert">
      <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
      </svg>
      <div>
          <?php echo e(session('message')); ?>

      </div>
    </div>
  <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

</div>
<?php /**PATH C:\Users\DELL\Documents\ngaretyok-app\resources\views/components/alert.blade.php ENDPATH**/ ?>