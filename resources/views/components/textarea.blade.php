@props(['disabled' => false, 'name'])

<textarea name="{{ $name }}" placeholder="Share bacotanmu disini.. 😁" {{ $disabled ? 'disabled' : '' }} {!!
    $attributes->merge(['class' => "border-black border-2
    focus:border-secondary-500 rounded-md shadow-sm text-md flex min-h-[120px] w-full md:w-3/4 lg:w-1/2 resize-none bg-card py-4 px-4 placeholder:text-muted-foreground focus-visible:outline-none  disabled:cursor-not-allowed disabled:opacity-50 focus:ring-0 focus:ring-offset-0". ($errors->has($name) ? 'is-invalid' : '')]) !!}
></textarea>

@error($name)
<div class="block text-red-600 mt-2 w-full md:w-3/4 lg:w-1/2">
    {{ $message }}
</div>
@enderror