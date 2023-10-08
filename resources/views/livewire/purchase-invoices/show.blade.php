<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Purchase Invoice') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a class="inline-flex items-center px-4 py-4  bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 "
                href="{{ route('purchase_invoices.edit', ['purchase' => $purchaseInvoices[0]->slug]) }}"
                wire:navigate>{{ __('Edit Purchase Invoice') }}</a>
            <div class="bg-white mt-10 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto w-full">
                        <thead>
                            <tr class="border">
                                <th class="px-4 py-2 border">Customer</th>
                                <th class="px-4 py-2 border">{{ $purchaseInvoices[0]->customer }}</th>
                            </tr>
                            <tr class="border text-center">
                                <th class="px-4 py-2 border">No.</th>
                                <th class="px-4 py-2 border">{{ __('Category') }}</th>
                                <th class="px-4 py-2 border">{{ __('Fruit') }}</th>
                                <th class="px-4 py-2 border">{{ __('Unit') }}</th>
                                <th class="px-4 py-2 border">{{ __('Price') }}</th>
                                <th class="px-4 py-2 border">{{ __('Quantity') }}</th>
                                <th class="px-4 py-2 border">{{ __('Amount') }}</th>
                            </tr>
                        </thead>
                        @php
                            $qty = 0;
                            $amount = 0;
                        @endphp
                        <tbody>
                            @foreach ($purchaseInvoices as $invoice)
                                <tr class="border text-center">
                                    <td class="border px-12 py-2">{{ $loop->iteration }}</td>
                                    <td class="border px-12 py-2">{{ $invoice->fruitItem->fruitCategory->name }}</td>
                                    <td class="border px-12 py-2">{{ $invoice->fruitItem->name }}</td>
                                    <td class="border px-12 py-2">{{ $invoice->fruitItem->unit }}</td>
                                    <td class="border px-12 py-2">{{ $invoice->fruitItem->price }}</td>
                                    <td class="border px-12 py-2">{{ $invoice->qty }}</td>
                                    <td class="border px-12 py-2">{{ $invoice->amount }}</td>
                                </tr>
                                @php
                                    $qty += $invoice->qty;
                                    $amount += $invoice->amount;
                                @endphp
                            @endforeach
                        </tbody>
                        <tfoot class="border">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th class="border px-4 py-2">{{ $qty }}</th>
                                <th class="border px-4 py-2">{{ $amount }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
