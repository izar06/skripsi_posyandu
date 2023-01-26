@extends('app-layouts.admin.index')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="d-sm-flex justify-content-start my-3">
            <a href="/dashboard/checkup/create" class="btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Check Up Balita</a>
            <a href="/export-kader" class="btn-sm btn-primary shadow-sm mx-3">
            <i class="fas fa-plus fa-sm text-white-50"></i> Unduh Data</a>
        </div>
        @include('includes.admin.alert')
          <div class="card mt-3">
            <div class="card-header">
              <h3 class="card-title">Data Balita</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive p-3">
                <table id="example1" class="table align-items-center table-flush table-hover table-bordered table-striped ">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Balita</th>
                    <th>Berat Badan</th>
                    <th>Vitamin</th>
                    <th>Imunisasi</th>
                    <th>Status Gizi</th>
                    <th>Tanggal Imunisasi</th>
                    <th>Check up Ke</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @forelse ($data as $item)
                    <tr>
                      <th>{{ $loop->iteration}}</th>
                      <th>{{ $item->balita->nama_balita }}</th>
                      <th>{{ $item->berat_badan }}</th>
                      <th>{{ $item->vitamin->jenis_vitamin }}</th>
                      <th>{{ $item->imunisasi->jenis_imunisasi }}</th>
                      <th>{{ $item->status_gizi }}</th>
                      <th>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</th>
                      <th>{{ $item->checkup_ke }}</th>
                      <td>
                          <a href="/dashboard/checkup/{{ $item->id }}/edit" class="btn btn-info">
                          <i class="fa fa-pencil-alt"></i>
                          </a>
                          <form action="/dashboard/checkup/{{ $item->id }}" method="POST" class="d-inline">
                          @csrf
                          @method('delete')
                          <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                              <i class="fa fa-trash"></i>
                          </button>
                          </form>
                      </td>
                  </tr>
                  @empty
                      <tr>
                        <td colspan="8" class="text-center">
                            No data avaliable in table
                        </td>
                      </tr>
                    @endforelse
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama Balita</th>
                    <th>Berat Badan</th>
                    <th>Vitamin</th>
                    <th>Imunisasi</th>
                    <th>Status Gizi</th>
                    <th>Tanggal Imunisasi</th>
                    <th>Check up Ke</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection

@push('add-style')
    <!-- DataTables -->
<link rel="stylesheet" href="{{ asset('backend/plugins') }}/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('backend/plugins') }}/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('backend/plugins') }}/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@push('add-script')
    <!-- DataTables  & Plugins -->
<script src="{{ asset('backend/plugins') }}/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend/plugins') }}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('backend/plugins') }}/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('backend/plugins') }}/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('backend/plugins') }}/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('backend/plugins') }}/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('backend/plugins') }}/jszip/jszip.min.js"></script>
<script src="{{ asset('backend/plugins') }}/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('backend/plugins') }}/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('backend/plugins') }}/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('backend/plugins') }}/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('backend/plugins') }}/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush