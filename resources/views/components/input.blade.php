@props(['id', 'value' => '', 'type' => 'text'])

<div class="text-md text-gray-600 mt-2">
    <label for="{{ $id }}" class="font-semibold  uppercase">{{ $slot }}</label>
    <input
        id="{{ $id }}"
        name="{{ $id }}"
        type="{{ $type }}"
        placeholder="{{ $slot }}..."
        value="{!! old($id, $value) !!}"
        {{$attributes->class(['select-text text-xs sm:text-sm md:text-base lg:text-lg px-2.5 py-2.5 w-full rounded border-2 border-gray-400 focus:border-gray-400 text-gray-600 focus:ring-0'])}}
    />
    @error($id)
    <span class="text-red-600">{{ $message }}</span>
    @enderror
</div>
