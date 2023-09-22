<div class="w-full" x-data="{ needEmail: @entangle('needEmail') }">
    <div class="max-w-sm w-full mx-auto rounded-lg bg-white px-4 pt-4 pb-6 shadow-md">
        <x-logo class="w-auto h-12 mx-auto text-indigo-600"/>

        <form wire:submit.prevent="submit" class="mt-6">
            <div class="mt-6 mb-8"
                 x-show="!needEmail">
                <x-form.input
                        model='phone'
                        label="Phone Number"
                        error="{{ $errors->first('phone') ?: '' }}"
                        placeholder="+7(000)00-00-00"
                />
            </div>

            <div x-show="needEmail">
                <div class="mb-2 text-xs text-red-700">Additional information is required to continue</div>
                <x-form.input
                        model='email'
                        label="Email"
                        error="{{ $errors->first('email') ?: '' }}"
                        placeholder="your@email.com"
                />
            </div>

            <x-form.error-with-icon message="{{ $errors->first('general') }}"/>

            <div class="col-span-full mt-4">
                <x-form.button text="Pay {{ $formattedAmount}}"/>
            </div>
        </form>
    </div>
</div>