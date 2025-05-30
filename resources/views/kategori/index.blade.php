@extends('layouts.template')
 @section('content')
 <div class="card card-outline card-primary">
     <div class="card-header">
         <h3 class="card-title">{{ $page->title }}</h3>
         <div class="card-tools">
            <button onclick="modalAction('{{ route('kategori.import') }}')" class="btn btn-sm btn-info mt-1">Import Kategori</button>
            <a href="{{ route('kategori.export_excel') }}" class="btn btn-sm btn-primary mt-1">Export Kategori</a>
            <a href="{{ route('kategori.export_pdf') }}" class="btn btn-sm btn-warning mt-1"><i class="fa fa-file-pdf"></i> Export Kategori PDF</a>
            <button onclick="modalAction('{{url('kategori/create_ajax')}}')" class="btn btn-sm btn-success mt-1">Tambah Ajax</button>
         </div>
     </div>
     <div class="card-body">
         @if(session('success'))
         <div class="alert alert-success alert-dismissible">
             <h5><i class="icon fas fa-check"></i> Success!</h5>
             {{ session('success') }}
         </div>
         @endif
         
         @if(session('error'))
         <div class="alert alert-danger alert-dismissible">
             <h5><i class="icon fas fa-ban"></i> Error!</h5>
             {{ session('error') }}
         </div>
         @endif
         
         <table class="table table-bordered table-striped table-hover table-sm" id="table_kategori">
             <thead>
                 <tr>
                     <th>ID</th>
                     <th>Kode</th>
                     <th>Nama Kategori</th>
                     <th>Aksi</th>
                 </tr>
             </thead>
         </table>
     </div>
 </div>
 <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" databackdrop="static"
          data-keyboard="false" data-width="75%" aria-hidden="true">
 </div>
 @endsection
 @push('css')
 @endpush
 @push('js')
 <script>
    function modalAction(url= '') {
        $('#myModal').load(url, function() {
            $('#myModal').modal('show');
        });
    }
    var dataKategori;
     $(document).ready(function() {
         dataKategori = $('#table_kategori').DataTable({
             serverSide: true,
             ajax: {
                 "url": "{{ url('kategori/list') }}",
                 "dataType": "json",
                 "type": "POST",
                 "data": function(d) {
                     d._token = "{{ csrf_token() }}";
                 }
             },
             columns: [{
                 data: "DT_RowIndex",
                 className: "text-center",
                 orderable: false,
                 searchable: false
             },
             {
                 data: "kategori_kode",
                 className: "",
                 orderable: true,
                 searchable: true
             },
             {
                 data: "kategori_nama",
                 className: "",
                 orderable: true,
                 searchable: true
             },
             {
                 data: "aksi",
                 className: "",
                 orderable: false,
                 searchable: false
             }]
         });
     });
 </script>
 @endpush