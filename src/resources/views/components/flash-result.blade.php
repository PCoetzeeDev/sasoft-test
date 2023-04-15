@if (flash()->message)
    <div class="flex flex-wrap p-4 mb-4 text-sm rounded-lg {{ flash()->class }}" role="alert">
        <div class="w-3/4 font-medium">{{ flash()->message }}</div>
        <div class="w-1/4 font-bold text-right cursor-pointer" onclick="this.parentElement.remove();">X</div>
    </div>
@endif