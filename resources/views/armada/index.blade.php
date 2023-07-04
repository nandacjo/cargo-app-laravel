@extends('layouts.master')

@section('content')
  <h1 class="h3 mb-3"><strong>Daftar</strong> Armada </h1>

  @if (Session::has('success'))
    <div class="row">
      <div class="col">
        <div class="alert alert-success d-flex align-items-center fw-bold  alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    </div>
  @endif

  <div class="row">
    <div class="col">
      <div class="card mb-4">
        <div class="card-header pb-1">
          <h6 class="card-title">{{ $title }}</h6>
          <div class="d-flex justify-content-start align-items-center">
            <a href="/armadas/create" class="d-block btn btn-primary btn-sm rounded"><i class="align-middle"
                data-feather="plus-circle"></i></a>
            <a href="/armadas/create"
              class="fw-bold d-block d-flex justify-content-center align-items-center btn btn-danger btn-sm rounded mx-1"
              style="text-decoration: none;">
              <i class="align-middle me-1" data-feather="file-text"></i>
              <span class="align-middle">PDF</span>
            </a>

            <a href="/armadas/create"
              class="fw-bold d-block d-flex justify-content-center align-items-center btn btn-success btn-sm rounded mx-1"
              style="text-decoration: none;">
              <i class="align-middle me-1" data-feather="file-text"></i>
              <span class="align-middle">EXCEL</span>
            </a>
          </div>
        </div>

        <div class="card-body 2 pt-2 pb-2">
          <div class="table-responsive p-0">
            <table class="table table-sm table-bordered">
              <thead>
                <tr>
                  <th width="1%" align="center"
                    class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">No.
                  </th>
                  <th class="text-uppercase text-secondary font-weight-bolder opacity-7">Name
                  </th>
                  <th class="text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">
                    Max Weight</th>
                  <th class="text-uppercase text-secondary font-weight-bolder opacity-7">
                    Dimension</th>
                  <th class="text-center text-secondary opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($model as $item)
                  <tr>
                    <td align="center">{{ $loop->iteration }}</td>
                    <td class="text-sm">
                        @if ($item->pictures->isNotEmpty())
                        <img src="/uploads/{{ $item->pictures->first()->file_name }}" alt=" {{ $item->name }}" width="100px" class="img-thumbnail">
                        @endif
                        {{ $item->name }}</td>
                    <td class="text-sm">{{ $item->max_weight }} KG</td>
                    <td class="text-sm">
                      L{{ $item->length . 'cm' }} x W{{ $item->width . 'cm' }} x H{{ $item->height . 'cm' }}
                    </td>
                    <td align="center">

                      <form action="/armadas/{{ $item->id }}/destroy" method="POST">
                        @method('DELETE')
                        @csrf
                        <div>
                          <a href="/armadas/{{ $item->id }}/edit" class="btn btn-sm btn-success rounded"><i
                              class="align-middle" data-feather='edit'></i></a>
                          <button class="btn btn-sm btn-danger" type="submit"><i class="align-middle"
                              data-feather='trash'></i></button>
                        </div>
                      </form>
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
@endsection
