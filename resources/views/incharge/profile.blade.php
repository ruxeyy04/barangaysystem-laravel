@extends('layout.layout')

@section('current_page')
  <h5>// My profile</h5>
@endsection

@section('content')
  <section class="content container mt-3">
    @include('shared.incharge.navigation')
    <button class="btn btn-primary" data-target="#uprof" data-toggle="modal">Update profile</button>
    <button class="btn btn-warning" data-target="#cpass" data-toggle="modal">Change password</button>
    <div class="profd text row d-flex align-items-center">
      <div class="col-md-12 text-center">
        <img src="{{ $user->imgURL() }}" alt="" />
      </div>
      <div class="col-md-4 text-center mt-3">
        <h6>Full name:</h6>
        <p>{{ $user->first_name . ' ' . $user->last_name }}</p>
      </div>
      <div class="col-md-4 text-center mt-3">
        <h6>Address:</h6>
        <p>{{ $user->address }}</p>
      </div>
      <div class="col-md-4 text-center mt-3">
        <h6>Gender:</h6>
        <p>{{ $user->gender }}</p>
      </div>
      <div class="col-md-4 text-center mt-3">
        <h6>Email:</h6>
        <p>{{ $user->email }}</p>
      </div>
      <div class="col-md-4 text-center mt-3">
        <h6>Contact number:</h6>
        <p>{{ $user->contact_number }}</p>
      </div>
    </div>
  </section>
  <footer></footer>
  <!-- Change password -->
  <div class="modal fade" id="cpass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{ route('users.update', Auth::user()->id) }}" method="POST">
          @csrf
          @method('put')
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Change password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <label for="password">New password</label>
            <input type="text" class="form-control" name="password" id="password">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn btn-warning">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- uUpdate profile -->
  <div class="modal fade" id="uprof" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{ route('users.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <label for="profile_image">Profile picture:</label>
            <input type="file" class="form-control" name="profile_image" id="profile_image">
            <label for="first_name">First name:</label>
            <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $user->first_name }}">
            <label for="last_name">Last name:</label>
            <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $user->last_name }}">
            <label for="address">Address:</label>
            <input type="text" class="form-control" name="address" id="address" value="{{ $user->address }}">
            <label for="gender">Gender:</label>
            <input type="text" class="form-control" name="gender" id="gender" value="{{ $user->gender }}">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
            <label for="contact_number">Contact number:</label>
            <input type="text" class="form-control" name="contact_number" id="contact_number" value="{{ $user->contact_number }}">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn btn-warning">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
