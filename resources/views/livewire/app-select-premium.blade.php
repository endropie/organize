<div class="relativex">
    <input type="text" list="appselect-{{$model}}" autocomplete="off"
        name="{{$model}}"
        class="{{$class ?: ''}}" style="{{$style ?: ''}}"
        wire:model.lazy="search"
    >
    @if ($show)
    <datalist id="appselect-{{$model}}">
        @foreach ($options as $option)
            <option value="{{$option['value']}}"
            >
                <div class="whitespace-normal">{{$option['label']}}</div>
            </option>
        @endforeach
    @endif
</div>
