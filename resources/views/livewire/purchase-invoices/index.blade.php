<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Purchase Invoice') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-flash-message status="{{ session()->get('message') }}" />
            <a class="inline-flex mt-4 items-center px-4 py-4  bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 "
                href="{{ route('purchase_invoices.create') }}" wire:navigate>{{ __('New Purchase') }}</a>
            <div class="bg-white mt-10 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto w-full">
                        <thead>
                            <tr class="border text-center">
                                <th class="px-4 py-2 border">No.</th>
                                <th class="px-4 py-2 border">{{ __('Name') }}</th>
                                <th class="px-4 py-2 border">{{ __('Action') }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($purchaseInvoices as $invoice)
                                <tr class="border text-center">
                                    <td class="border px-12 py-2">{{ $loop->iteration }}</td>
                                    <td class="border px-12 py-2">{{ $invoice->customer }}</td>
                                    <td class="border px-12 py-2">
                                        <div class="grid grid-cols-3 gap-1 px-0">

                                            <a href="{{ route('purchase_invoices.show', ['purchase' => $invoice->slug]) }}"
                                                class="text-blue-500 underline">{{ __('View Detail') }}</a>
                                            <button class="text-red-500 underline uppercase"
                                                wire:click.prevent="destroy('{{ $invoice->slug }}')">delete</button>
                                            <a target="_blank" class="text-purple-500 underline uppercase"
                                                href="{{ route('purchase_invoices.print', ['purchase' => $invoice->slug]) }}">print</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="border px-12 py-2 text-center">{{ __('No records.') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
