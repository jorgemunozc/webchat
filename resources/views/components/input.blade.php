@props(['name', 'type', 'label'])
<div class="flex flex-col">
    <label for="{{$name}}" class="text-gray-500 font-semibold">{{$label}}</label>
    <input type="{{$type ?? 'text' }}"
        class="h-12 border outline-none px-2 focus:border-1 focus:border-blue-900 @error($name) border-red-500 @enderror"
        {{$attributes}}>
</div>