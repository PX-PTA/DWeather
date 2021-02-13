<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow bg-light">
                <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                    <h3 class="h3 my-4">
                        Welcome to Data Center
                    </h3>

                    <div class="text-muted">
                        Data Center
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-md-12 pr-0">
                        <div class="card-body border-right border-bottom p-3 h-100">              
                                {{$dataTable->table()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    {{$dataTable->scripts()}}
    @endpush
</x-app-layout>