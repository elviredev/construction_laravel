@extends('admin.layouts.master')
@section('content')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <div class="page-heading mb-0">
      <h1>Testimonials</h1>
    </div>
    <a href="" class="btn-admin-primary" data-bs-toggle="modal" data-bs-target="#modal_add">
      <i class="fa-solid fa-plus me-1"></i>Add Item
    </a>
  </div>

  <!-- Add Modal -->
  <div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content modal-content-custom">
        <div class="modal-header modal-header-custom">
          <h5 class="modal-title fw-semibold" id="modalAddLabel">Add Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body modal-body-custom">
          <form action="{{ route('admin_testimonial_store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
              <label class="label-custom">Select Image *</label>
              <input type="file" name="image" class="form-control-custom">
            </div>
            <div class="mb-3">
              <label class="label-custom">Name *</label>
              <input type="text" name="name" class="form-control-custom" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
              <label class="label-custom">Designation *</label>
              <input type="text" name="designation" class="form-control-custom" value="{{ old('designation') }}">
            </div>
            <div class="mb-3">
              <label class="label-custom">Comment *</label>
              <textarea class="form-control-custom" name="comment" rows="4">{{ old('comment') }}</textarea>
            </div>
            <div class="mb-3">
              <button type="submit" class="btn-admin-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- // Add Modal -->

  <div class="card-custom-p5">
    <table id="dataTable" class="table-dt stripe hover ">
      <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Designation</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($testimonials as $testimonial)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>
            <img src="{{ asset('uploads/admin/'.$testimonial->image) }}" alt="image slider" class="w_80">
          </td>
          <td>{{ $testimonial->name }}</td>
          <td>{{ $testimonial->designation }}</td>
          <td>
            <div class="d-flex align-items-center gap-1">
              <a class="btn-icon btn-icon-edit btn-edit-row" data-bs-toggle="modal" data-bs-target="#modal_edit_{{ $testimonial->id }}">
                <i class="fa-solid fa-pen-to-square text-xs"></i>
              </a>
              <a class="btn-icon btn-icon-delete" data-bs-toggle="modal" data-bs-target="#modal_delete_{{ $testimonial->id }}">
                <i class="fa-solid fa-trash text-xs"></i>
              </a>
            </div>
          </td>
        </tr>

        <!-- Edit Modal -->
        <div class="modal fade" id="modal_edit_{{ $testimonial->id }}" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-content-custom">
              <div class="modal-header modal-header-custom">
                <h5 class="modal-title fw-semibold" id="modalEditLabel">Edit Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body modal-body-custom">
                <form action="{{ route('admin_testimonial_update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                  <div class="mb-3">
                    <label class="label-custom">Existing Image</label>
                    <div>
                      <img src="{{ asset('uploads/admin/' . $testimonial->image) }}" alt="slider image" class="w_150">
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="label-custom">Change Image</label>
                    <input type="file" name="image" class="form-control-custom">
                  </div>
                  <div class="mb-3">
                    <label class="label-custom">Name *</label>
                    <input type="text" name="name" class="form-control-custom" value="{{ $testimonial->name }}">
                  </div>
                  <div class="mb-3">
                    <label class="label-custom">Designation *</label>
                    <input type="text" name="designation" class="form-control-custom" value="{{ $testimonial->designation }}">
                  </div>
                  <div class="mb-3">
                    <label class="label-custom">Comment *</label>
                    <textarea class="form-control-custom" name="comment" rows="4">{{ $testimonial->comment }}</textarea>
                  </div>
                  <div class="mb-3">
                    <button type="submit" class="btn-admin-primary">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- // Edit Modal -->

        <!-- Delete Modal -->
        <div class="modal fade" id="modal_delete_{{ $testimonial->id }}" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-content-custom">
              <div class="modal-header modal-header-custom">
                <h5 class="modal-title fw-semibold" id="modalDeleteLabel">Delete Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body modal-body-custom">
                <form action="{{ route('admin_testimonial_delete', $testimonial->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <div class="mb-3">
                    <p>
                      Are you sure you want to delete this item <b>{{ $testimonial->title }}</b>?
                    </p>
                  </div>
                  <div class="mb-3">
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- // Delete Modal -->
      @endforeach
      </tbody>
    </table>
  </div>
@endsection
