@props(['name', 'type'=>'text', 'label'=>$name])

<div class="form-group mb-5 form-control-custom">
    <label for="{{ $name }}">{{ ucwords($label) }}</label>
    <input name="{{ $name }}" type="{{ $type }}"  id="{{ $name }}">
</div>