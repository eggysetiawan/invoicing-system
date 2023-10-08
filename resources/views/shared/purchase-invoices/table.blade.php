<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;

    }
</style>


<div class="bg-white mt-10 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <h1>Invoicing System</h1>
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <table class="table-auto w-full">
            <thead>
                <tr class="border">
                    <th class="px-4 py-2 border">Customer</th>
                    <th class="px-4 py-2 border" colspan="6">{{ $purchaseInvoices[0]->customer }}</th>
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
