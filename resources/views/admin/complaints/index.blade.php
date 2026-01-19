@extends('admin.layouts.main')
@section('title','Pengaduan | Public Pengaduan')

@section('css')
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Pengaduan</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Pengaduan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
        <br>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            {{$message}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <br>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Tanggal Pengaduan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($complaints as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        @if($row->photo)
                                            <img src="{{url('avatar_complaint/',$row->photo)}}" width="100px">
                                        @else
                                            Tidak ada foto
                                        @endif
                                    </td>
                                    <td>{{$row->Society->name ?? 'User Terhapus'}}</td>
                                    <td>{{date('d F Y H:i:s',strtotime($row->created_at))}}</td>
                                    <td>
                                        @if ($row->status == "0")
                                            <span class="badge rounded-pill bg-danger">Belum Diproses</span>
                                        @elseif($row->status == 'process')
                                            <span class="badge rounded-pill bg-primary">Proses</span>
                                        @else 
                                            <span class="badge rounded-pill bg-success">Selesai</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('admin/complaints/show/'.$row->id)}}" class="btn btn-info btn-rounded waves-effect waves-light">
                                            <i class="bx bx-show font-size-16 align-middle"></i>
                                        </a>

                                        <button type="button" class="btn btn-warning btn-rounded waves-effect waves-light btn-delete" data-id="{{$row->id}}">
    <i class="bx bx-trash-alt font-size-16 align-middle"></i>
</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

@push('script')
<script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script> 

<script>
    $(document).ready(function() {
        // Event listener delete
        $('body').on('click', '.btn-delete', function(e){
            e.preventDefault();
            var id = $(this).data('id'); // Mengambil ID Pengaduan
            
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data pengaduan ini akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#34c38f',
                cancelButtonColor: '#f46a6a',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Arahkan ke URL delete pengaduan
                    window.location.href = "{{ url('admin/complaints/delete') }}/" + id;
                }
            });
        });
    });
</script>
@endpush