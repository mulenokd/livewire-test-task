<div class="rounded-xl bg-gray-100 text-gray-900 text-l font-semibold px-2 pt-2 pb-2 mb-6 cursor-pointer border-gray-100 border-2"
     :class="{ 'border-indigo-600': form === '{{ $type }}' }"
     x-on:click="form = '{{ $type }}'">
    {{ $typeName }}
</div>