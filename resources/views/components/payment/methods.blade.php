<div class="flex-2 px-4 pt-4 pb-6 mr-4">
    <div class="methods">
        <div class="text-gray-400 font-semibold px-2 pb-2">
            Payment methods
        </div>

        <x-payment.method-wrap :type="'BANK_CARD'" :typeName="'Bank card'"/>

        <x-payment.method-wrap :type="'QIWI'" :typeName="'Qiwi'"/>

        <x-payment.method-wrap :type="'YOOMONEY'" :typeName="'Yoomoney'"/>

    </div>
</div>