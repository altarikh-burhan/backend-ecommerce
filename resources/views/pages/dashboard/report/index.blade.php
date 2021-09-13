<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report Transaction') }}
        </h2>
    </x-slot>
    <div class="py-6 ">
        <div class="max-w-7xl sm:px-6 lg:px-8 " >
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <h2 class="text-xl p-2">Pilih Tanggal Transaksi</h2>
                    <form class="w-full" method="get" enctype="multipart/form-data" action="{{ route('dashboard.report.transaction') }}">

                    <input type="text" id="created_at" name="date" value=""/>
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ">Cari</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <x-slot name="script">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <script>
           $(document).ready(function() {
                let start = moment().startOf('month')
                let end = moment().endOf('month')

                $('#created_at').daterangepicker({
                    startDate: start,
                    endDate: end
                })
           })
        </script>
    </x-slot>
</x-app-layout>