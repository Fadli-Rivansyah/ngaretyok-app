<div>
    <a href="{{$link}}"  wire:navigate.hover class=" w-max pl-2 space-x-4 items-center flex py-2.5 px-5 me-2 mb-2 rounded-md text-sm font-medium bg-indigo-500 hover:bg-indigo-700 text-white" >
        <div class="px-2">
            {{$icon}}
        </div>
         {{$slot}}
    </a>
</div>