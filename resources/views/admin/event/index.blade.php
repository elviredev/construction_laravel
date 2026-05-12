@extends('admin.layouts.master')
@section('content')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <div class="page-heading mb-0">
      <h1>Events</h1>
    </div>
    <a href="" class="btn-admin-primary" data-bs-toggle="modal" data-bs-target="#modal_add">
      <i class="fa-solid fa-plus me-1"></i>Add Item
    </a>
  </div>

  <!-- Add Modal -->
  <div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content modal-content-custom">
        <div class="modal-header modal-header-custom">
          <h5 class="modal-title fw-semibold" id="modalAddLabel">Add Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body modal-body-custom">
          <form action="{{ route('admin_event_store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
              <label class="label-custom">Select Image *</label>
              <input type="file" name="image" class="form-control-custom">
            </div>
            <div class="mb-3">
              <label class="label-custom">Title *</label>
              <input type="text" name="title" class="form-control-custom" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
              <label class="label-custom">Description *</label>
              <textarea class="form-control-custom tinymce-editor" name="description" rows="4">
                {{ old('description') }}
              </textarea>
            </div>
            <div class="mb-3">
              <label class="label-custom">Show on Home ? *</label>
              <select class="form-control-custom" name="show_on_home">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="label-custom">Event Location *</label>
              <input type="text" name="event_location" class="form-control-custom" value="{{ old('event_location') }}">
            </div>
            <div class="mb-3">
              <label class="label-custom">Event Location Details</label>
              <textarea class="form-control-custom" name="event_location_details" rows="3">{{ old('event_location_details') }}</textarea>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="label-custom">Event Date *</label>
                <input type="text" name="event_date" class="form-control-custom" value="{{ old('event_date') }}">
              </div>
              <div class="col-md-6 mb-3">
                <label class="label-custom">Event Time *</label>
                <input type="text" name="event_time" class="form-control-custom" value="{{ old('event_time') }}">
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="label-custom">Ticket Price *</label>
                <input type="text" name="ticket_price" class="form-control-custom" value="{{ old('ticket_price') }}">
              </div>
              <div class="col-md-6 mb-3">
                <label class="label-custom">Youtube ID</label>
                <input type="text" name="youtube_id" class="form-control-custom" value="{{ old('youtube_id') }}">
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="label-custom">Button Text</label>
                <input type="text" name="button_text" class="form-control-custom" value="{{ old('button_text') }}">
              </div>
              <div class="col-md-6 mb-3">
                <label class="label-custom">Button Link</label>
                <input type="text" name="button_link" class="form-control-custom" value="{{ old('button_link') }}">
              </div>
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
        <th>Title</th>
        <th>Show on Home</th>
        <th>Event Location</th>
        <th>Event Date</th>
        <th>FAQs</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($events as $event)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>
            <img src="{{ asset('uploads/admin/'.$event->image) }}" alt="image event" class="w_100">
          </td>
          <td>{{ $event->title }}</td>
          <td >
            <span class="{{ $event->show_on_home ? 'text-success' : 'text-danger' }} fw-semibold">
              {{ $event->show_on_home == 1 ? "Yes" : "No" }}
            </span>
          </td>
          <td>{{ $event->event_location }}</td>
          <td>{{ $event->event_date }}</td>
          <td>
            <a href="" class="btn btn-sm btn-warning">
              <i class="fa-solid fa-gear text-xs"></i> Manage FAQs
            </a>
          </td>
          <td>
            <div class="d-flex align-items-center gap-1">
              <a class="btn-icon btn-icon-edit btn-edit-row" data-bs-toggle="modal" data-bs-target="#modal_edit_{{ $loop->iteration }}">
                <i class="fa-solid fa-pen-to-square text-xs"></i>
              </a>
              <a class="btn-icon btn-icon-delete" data-bs-toggle="modal" data-bs-target="#modal_delete_{{ $loop->iteration }}">
                <i class="fa-solid fa-trash text-xs"></i>
              </a>
            </div>
          </td>
        </tr>

        <!-- Edit Modal -->
        <div class="modal fade" id="modal_edit_{{ $loop->iteration }}" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content modal-content-custom">
              <div class="modal-header modal-header-custom">
                <h5 class="modal-title fw-semibold" id="modalEditLabel">Edit Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body modal-body-custom">
                <form action="{{ route('admin_event_update', $event) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                  <div class="mb-3">
                    <label class="label-custom">Existing Image</label>
                    <div>
                      <img src="{{ asset('uploads/admin/' . $event->image) }}" alt="event image" class="w_150">
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="label-custom">Change Image</label>
                    <input type="file" name="image" class="form-control-custom">
                  </div>
                  <div class="mb-3">
                    <label class="label-custom">Title *</label>
                    <input type="text" name="title" class="form-control-custom" value="{{ $event->title }}">
                  </div>
                  <div class="mb-3">
                    <label class="label-custom">Description *</label>
                    <textarea class="form-control-custom tinymce-editor" name="description" rows="4">
                      {{ $event->description }}
                    </textarea>
                  </div>
                  <div class="mb-3">
                    <label class="label-custom">Show on Home ? *</label>
                    <select class="form-control-custom" name="show_on_home">
                      <option @selected($event->show_on_home == 1) value="1" >Yes</option>
                      <option @selected($event->show_on_home == 0) value="0" >No</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="label-custom">Event Location *</label>
                    <input type="text" name="event_location" class="form-control-custom" value="{{ $event->event_location }}">
                  </div>
                  <div class="mb-3">
                    <label class="label-custom">Event Location Details</label>
                    <textarea class="form-control-custom" name="event_location_details" rows="4">{{ $event->event_location_details }}</textarea>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label class="label-custom">Event Date *</label>
                      <input type="text" name="event_date" class="form-control-custom" value="{{ $event->event_date }}">
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="label-custom">Event Time *</label>
                      <input type="text" name="event_time" class="form-control-custom" value="{{ $event->event_time }}">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label class="label-custom">Ticket Price *</label>
                      <input type="text" name="ticket_price" class="form-control-custom" value="{{ $event->ticket_price }}">
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="label-custom">Youtube ID</label>
                      <input type="text" name="youtube_id" class="form-control-custom" value="{{ $event->youtube_id }}">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label class="label-custom">Button Text</label>
                      <input type="text" name="button_text" class="form-control-custom" value="{{ $event->button_text }}">
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="label-custom">Button Link</label>
                      <input type="text" name="button_link" class="form-control-custom" value="{{ $event->button_link }}">
                    </div>
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
        <div class="modal fade" id="modal_delete_{{ $loop->iteration }}" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-content-custom">
              <div class="modal-header modal-header-custom">
                <h5 class="modal-title fw-semibold" id="modalDeleteLabel">Delete Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body modal-body-custom">
                <form action="{{ route('admin_event_delete', $event->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <div class="mb-3">
                    <p>
                      Are you sure you want to delete this item <b>{{ $event->title }}</b>?
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
