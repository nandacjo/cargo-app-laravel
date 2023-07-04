@extends('layouts.master')

<style>
    .preview-image {
        width: 200px;
        border-radius: 6px
    }
</style>
@section('content')
  <h1 class="h3 mb-3"><strong>Form</strong> Armada </h1>

  <div class="row">
    <div class="col-6">
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="card-title mb-0">{{ $model->id != null ? 'Edit Data' : 'Tambah Data' }}</h6>
        </div>
        <div class="card-body">

          {!! Form::model($model, [
              'route' => $model->id !== null ? ['armadas.update', ['id' => $model->id]] : 'armadas',
              'method' => $model->id !== null ? 'PUT' : 'POST',
              'enctype' => 'multipart/form-data',
          ]) !!}

          <div class="mb-3">
            {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
            {!! Form::text('name', $model->name ?? null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
            @error('name')
              <span class="text-danger text-xs mx-2">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            {!! Form::label('max_weight', 'Max Weight', ['class' => 'form-label']) !!}
            {!! Form::number('max_weight', null, ['class' => 'form-control', 'placeholder' => 'max_weight']) !!}
            @error('max_weight')
              <span class="text-danger text-xs mx-2">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            {!! Form::label('length', 'Length', ['class' => 'form-label']) !!}
            {!! Form::number('length', null, ['class' => 'form-control', 'placeholder' => 'length']) !!}
            @error('length')
              <span class="text-danger text-xs mx-2">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            {!! Form::label('width', 'Width', ['class' => 'form-label']) !!}
            {!! Form::number('width', null, ['class' => 'form-control', 'placeholder' => 'width']) !!}
            @error('width')
              <span class="text-danger text-xs mx-2">{{ $message }}</span>
            @enderror
          </div>


          <div class="mb-3">
            {!! Form::label('height', 'Height', ['class' => 'form-label']) !!}
            {!! Form::number('height', null, ['class' => 'form-control', 'placeholder' => 'height']) !!}
            @error('height')
              <span class="text-danger text-xs mx-2">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            {!! Form::label('files', 'Unggah File:', ['class' => 'form-label']) !!}
            {!! Form::file('files[]', ['class' => 'form-control', 'multiple' => true, 'id' => 'fileInput']) !!}
            @error('files')
              <span class="text-danger text-xs mx-2">{{ $message }}</span>
            @enderror
          </div>
          <button type="submit" class="fw-bold btn btn-primary btn-sm"><i class="align-middle" data-feather="save"></i>
            Submit</button>
          <a href="/customers" class="fw-bold btn btn-sm btn-secondary mx-2"><i class="align-middle"
              data-feather="arrow-left-circle"></i> Back</a>

          {!! Form::close() !!}
        </div>
      </div>
    </div>

    <div class="col-6">
        <div class="mb-3">
            <div id="imagePreviewContainer">
            </div>
          </div>
    </div>
  </div>


  <script>
    // JavaScript
    const fileInput = document.getElementById('fileInput');
    const previewImage = document.getElementById('previewImage');

    const imagePreviewContainer = document.getElementById('imagePreviewContainer');

    fileInput.addEventListener('change', function(event) {
    const files = event.target.files;

    for (let i = 0; i < files.length; i++) {
      const file = files[i];
      const reader = new FileReader();

      reader.onload = function(e) {
        const previewImage = document.createElement('img');
        previewImage.src = e.target.result;
        previewImage.classList.add('preview-image');
        imagePreviewContainer.appendChild(previewImage);
      };

      reader.readAsDataURL(file);
    }
    });

    // fileInput.addEventListener('change', function(event) {
    //     const file = event.target.files[0];
    //     const reader = new FileReader();

    //     reader.onload = function(e) {
    //         previewImage.src = e.target.result;
    //         previewImage.style.display = 'block';
    //     };

    //     reader.readAsDataURL(file);
    // });
  </script>
@endsection
