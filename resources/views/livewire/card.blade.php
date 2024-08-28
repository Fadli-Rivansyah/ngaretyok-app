<div class="lg:w-2/3 mx-auto flex flex-wrap gap-5 ">
    @foreach($lapak as $item)
    <div class="w-full flex flex-col border-b gap-8 py-2 border-gray-300 md:flex-row   dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        {{-- gambar lapak --}}
        <img class="object-cover w-full rounded-lg h-auto md:h-auto md:w-1/4 " src="{{ Storage::url($item->images()->get()->first()->path) }}"  alt="hiro-lapak" />       
        {{-- content lapak --}}
        <div class="w-full flex flex-col gap-3 leading-normal">
            <a wire:navigate href="{{route('view.lapak',['idlapak' => $item->id])}}"  class="underline decoration-indigo-500 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{Str::limit($item->nama_lapak, 50, '...')}}</a>
            <p class="mb-3 font-normal  break-words text-gray-700 dark:text-gray-400">{{ Str::limit($item->deskripsi_lapak, 100, '...')}}</p>
        </div>
    </div>
    @endforeach
</div>
