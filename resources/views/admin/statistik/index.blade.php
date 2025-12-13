@extends('components.layoutmaster')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card my-4">
      
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
          <h6 class="text-white text-capitalize ps-3">Data Statistik TPS</h6>
        </div>
      </div>

      <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">No</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama TPS</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Desa / Kelurahan</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Jumlah Suara</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Keterangan</th>
              </tr>
            </thead>
            <tbody>
              @forelse($data_tps as $tps)
              <tr>
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">
                        {{ $loop->iteration + ($data_tps->currentPage() - 1) * $data_tps->perPage() }}
                    </span>
                </td>
                
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{ $tps->nama_tps }}</h6> 
                    </div>
                  </div>
                </td>

                <td>
                  {{-- Coba panggil nama desa, jika error ganti jadi $tps->desa_id --}}
                  <p class="text-xs font-weight-bold mb-0">{{ $tps->desa->nama_desa ?? 'Desa ID: ' . $tps->desa_id }}</p>
                </td>

                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $tps->jumlah_suara }}</span>
                </td>

                <td>
                    <span class="text-xs text-secondary mb-0">{{ $tps->keterangan ?? '-' }}</span>
                </td>
              </tr>
              @empty
              <tr>
                  <td colspan="5" class="text-center py-4">Belum ada data TPS.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      <div class="card-footer py-3 d-flex justify-content-end">
         {{ $data_tps->links() }}
      </div>
      
    </div>
  </div>
</div>
@endsection