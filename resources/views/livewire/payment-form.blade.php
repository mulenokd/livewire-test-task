<div wire:init="componentInit" class="w-full">
    <div class="max-w-sm w-full mx-auto rounded-lg bg-white px-4 pt-4 pb-6 shadow-md">
        <x-logo class="w-auto h-12 mx-auto text-indigo-600" />

        <form wire:submit.prevent="submit" class="grid grid-cols-12 gap-4 mt-6">
            <div class="col-span-full">
                <x-form.input
                    model='card'
                    :defer="false"
                    label="Card Number"
                    error="{{ $errors->first('card') ?: '' }}"
                    placeholder="4200 0000 0000 0000"
                />
            </div>

            <div class="col-span-full sm:col-span-6">
                <x-form.input
                    model='exp'
                    :defer="false"
                    label="Expiration Date"
                    error="{{ $errors->first('exp') ?: '' }}"
                    placeholder="10/29"
                />
            </div>

            <div class="col-span-full sm:col-span-6">
                <x-form.input
                    model='cvc'
                    type='password'
                    label="CVC"
                    error="{{ $errors->first('cvc') ?: '' }}"
                    placeholder="···"
                />
            </div>

            <x-form.error-with-icon message="{{ $errors->first('general') }}"/>
            
            <div class="col-span-full mt-4">
                <x-form.button text="Pay {{ $formattedAmount}}"/>
            </div>
        </form>
    </div>

    @if ($componentInit)
        <x-scripts.payment-form-mask/>
    @endif
</div>