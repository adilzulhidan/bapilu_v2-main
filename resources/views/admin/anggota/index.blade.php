@extends('components.layoutmaster')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                    <h6 class="text-white text-capitalize ps-3">Data Keanggotaan Bapilu</h6>
                    <a href="#" class="btn btn-sm btn-light me-3 mb-0">
                        <i class="material-symbols-rounded text-sm">add</i> Tambah Anggota
                    </a>
                </div>
            </div>

            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center" width="5%">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Anggota</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIK</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alamat</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data_anggota as $anggota)
                            <tr>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration + ($data_anggota->currentPage() - 1) * $data_anggota->perPage() }}</span>
                                </td>

                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $anggota->nama }}</h6>
                                            <p class="text-xs text-secondary mb-0">Anggota</p>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <p class="text-xs font-weight-bold mb-0 text-dark">{{ $anggota->nik }}</p>
                                </td>

                                <td class="text-wrap" style="max-width: 300px;">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $anggota->alamat }}</span>
                                </td>

                                <td class="align-middle text-center">
                                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        <i class="material-symbols-rounded text-sm">edit</i> Edit
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    <h6 class="text-secondary text-sm">Belum ada data anggota.</h6>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer py-3 d-flex justify-content-end">
                {{ $data_anggota->links() }}
            </div>
        </div>
    </div>
</div>
@endsection