<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report') }}
        </h2>
    </x-slot>
    <div class="py-6 ">
        <div class="max-w-7xl sm:px-6 lg:px-8 " >
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <table class="w-full text-md mb-4 border">
                                <thead>
                                <tr>
                                    <th class="px-2 py-4">#</th>
                                    <th class="px-6 py-4">Pelanggan</th>
                                    <th class="px-6 py-4">Subtotal</th>
                                    <th class="px-6 py-4">Tanggal</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @forelse ($transaction as $row )
                                        <tr>
                                            <td class="border px-6 py-4"></td>
                                            <td class="border px-6 py-4">{{ $row->user->name }} </td>
                                            <td class="border px-6 py-4">Rp. {{number_format($row->total_price) }}</td>
                                            <td class="border px-6 py-4">{{ $row->created_at->format('j F Y') }} </td>
                                            
                                        </tr>
                                        @php $total += $row->total_price @endphp
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">TOTAL</td>
                                        <td>Rp {{number_format($total)}}</td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>