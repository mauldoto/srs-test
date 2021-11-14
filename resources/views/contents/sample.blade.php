@extends('layouts.app')

@section('content')
<section>
  <div class="container py-1">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12">
          @if ($errors->any())
          <div class="alert alert-danger d-flex align-items-center" role="alert">
              <div>
                  @foreach ($errors->all() as $err)
                      - {{ $err }} <br>
                  @endforeach
              </div>
          </div>
          @endif

          @if ($loginInfo)
          <div class="alert alert-success d-flex align-items-center" role="alert">
              <div>
                  Login Berhasil
              </div>
          </div>
          @endif
        </div>
    </div>
  </div>

  <div class="container py-2">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-5 text-center">
        <form action="{{ url('/data-sample') }}" method="post">
          @csrf
          <div class="mb-3 text-center">
            <label for="exampleFormControlInput1" class="form-label"><strong>Masukan Sample ID</strong></label>
            <input type="text" name="sample_id" class="form-control" id="exampleFormControlInput1" placeholder="Input sample id here" value="">
          </div>
          <button class="btn btn-primary" type="submit">Submit</button>
        </form>
      </div>

    </div>
  </div>

  <div class="container py-5">
      <div class="row d-flex justify-content-center align-items-center">
          <div class="col-12">

            @if (count($dataSample)>0)
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
              <div class="card-body p-5 shadow" style="border-radius: 1rem;">

                  <div class="table-responsive">
                      <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Sample ID</th>
                              <th scope="col">Tahun (Symbol)</th>
                              <th scope="col">No Lab</th>
                              <th scope="col">Parameters ID(s)</th>
                              <th scope="col">Kode Contoh</th>
                              <th scope="col">Batch</th>
                              <th scope="col">Hasil</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">{{ $dataSample['data_sample_id'] }}</th>
                              <td>{{ $dataSample['tahun'] }} ({{ $dataSample['simbol'] }})</td>
                              <td>{{ $dataSample['no_lab'] }}</td>
                              <td>{{ $dataSample['parameters_id_s'] }}</td>
                              <td>{{ $dataSample['kode_contoh'] }}</td>
                              <td>{{ $dataSample['batch'] }}</td>
                              <td>{{ $dataSample['hasil'] }}</td>
                            </tr>
                          </tbody>
                        </table>
                  </div>

                </div>
            </div>
            @endif
          </div>
      </div>
  </div>
</section>
@endsection