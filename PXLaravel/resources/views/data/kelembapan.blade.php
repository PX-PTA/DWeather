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
    <script type="text/javascript">$(function(){window.LaravelDataTables=window.LaravelDataTables||{};window.LaravelDataTables["datahasil-table"]=$("#datahasil-table").DataTable({"serverSide":true,"processing":true,"ajax":{"url":"http:\/\/127.0.0.1:8000\/data\/hasil","type":"GET","data":function(data) {
            for (var i = 0, len = data.columns.length; i < len; i++) {
                if (!data.columns[i].search.value) delete data.columns[i].search;
                if (data.columns[i].searchable === true) delete data.columns[i].searchable;
                if (data.columns[i].orderable === true) delete data.columns[i].orderable;
                if (data.columns[i].data === data.columns[i].name) delete data.columns[i].name;
            }
            delete data.search.regex;}},"columns":[{"data":"action","name":"action","title":"Action","orderable":false,"searchable":false,"width":60,"className":"text-center"},{"data":"id","name":"id","title":"Id","orderable":true,"searchable":true},{"data":"add your columns","name":"add your columns","title":"Add Your Columns","orderable":true,"searchable":true},{"data":"created_at","name":"created_at","title":"Created At","orderable":true,"searchable":true},{"data":"updated_at","name":"updated_at","title":"Updated At","orderable":true,"searchable":true}],"dom":"Bfrtip","order":[[1,"desc"]],"buttons":[]});});
        </script>
    @endpush
</x-app-layout>