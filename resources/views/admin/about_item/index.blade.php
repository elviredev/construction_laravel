@extends('admin.layouts.master')
@section('content')
  <div class="page-heading">
    <h1>About Item</h1>
    <p>Manage your about page information.</p>
  </div>

  <form action="{{ route('admin_about_item_update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row g-4">
      <div class="col-12 col-xl-12">
        <div class="card-custom-p">
          <div class="mb-3">
            <label class="label-custom">Existing Image</label>
            <div>
              @if ($aboutItem?->image)
                <img src="{{ asset('uploads/admin/'.$aboutItem->image) }}" alt="About image" class="w_150">
              @endif
            </div>
          </div>
          <div class="mb-3">
            <label class="label-custom">Change Image</label>
            <div>
              <input type="file" name="image" class="form-control-custom">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="label-custom">Title *</label>
              <textarea name="title" class="form-control-custom">{{ $aboutItem?->title }}</textarea>
            </div>
            <div class="col-md-6 mb-3">
              <label class="label-custom">Subtitle *</label>
              <input type="text" name="subtitle" value="{{ $aboutItem?->subtitle }}" class="form-control-custom">
            </div>
          </div>

          <div class="mb-3">
            <label class="label-custom">Text *</label>
            <textarea name="text" class="form-control-custom h_150">{{ $aboutItem?->text }}</textarea>
          </div>
          <hr class="text-primary-700 my-4">
          <div class="row">
            <div class="col-md-4 mb-3">
              <label class="label-custom">Experience Year</label>
              <input type="text" name="experience_year" value="{{ $aboutItem?->experience_year }}" class="form-control-custom">
            </div>
            <div class="col-md-4 mb-3">
              <label class="label-custom">Experience Text</label>
              <input type="text" name="experience_text" value="{{ $aboutItem?->experience_text }}" class="form-control-custom">
            </div>
            <div class="col-md-4 mb-3">
              <label class="label-custom">Youtube ID</label>
              <input type="text" name="youtube_id" value="{{ $aboutItem?->youtube_id }}" class="form-control-custom">
            </div>
          </div>
          <hr class="text-primary-700 my-4">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="label-custom">Phone Number</label>
              <input type="text" name="phone_number" value="{{ $aboutItem?->phone_number }}" class="form-control-custom">
            </div>
            <div class="col-md-6 mb-3">
              <label class="label-custom">Phone Text</label>
              <input type="text" name="phone_text" value="{{ $aboutItem?->phone_text }}" class="form-control-custom">
            </div>
          </div>
          <hr class="text-primary-700 my-4">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="label-custom">Button Text</label>
              <input type="text" name="button_text" value="{{ $aboutItem?->button_text }}" class="form-control-custom">
            </div>
            <div class="col-md-6 mb-3">
              <label class="label-custom">Button Link</label>
              <input type="text" name="button_link" value="{{ $aboutItem?->button_link }}" class="form-control-custom">
            </div>
          </div>
          <button type="submit" class="btn-admin-primary">
            Update
          </button>
        </div>
      </div>
    </div>
  </form>
@endsection


