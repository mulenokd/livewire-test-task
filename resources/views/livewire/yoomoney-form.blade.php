<div class="w-full">
    <div class="max-w-sm w-full mx-auto rounded-lg bg-white px-4 pt-4 pb-6 shadow-md">
        <x-logo class="w-auto h-12 mx-auto text-indigo-600"/>

        <form wire:submit.prevent="submit">
            <div class="mt-6 mb-8">
                <x-form.input
                        model='yooNumber'
                        label="Account Number"
                        error="{{ $errors->first('yooNumber') ?: '' }}"
                        placeholder="1234 0000 0000 0000"
                />
            </div>

            <x-form.error-with-icon message="{{ $errors->first('general') }}"/>

            <div class="col-span-full mt-4">
                <x-form.button text="Pay {{ $formattedAmount}}"/>
            </div>
        </form>
    </div>
</div>