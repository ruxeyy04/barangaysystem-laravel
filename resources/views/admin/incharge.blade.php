@extends('layout.layout')

@section('current_page')
  <h5>// Users</h5>
@endsection

@section('content')
  <section class="content container mt-3">
    @include('shared.admin.navigation')
    <div class="text-right pr-5">
      <button class="btn btn-primary" data-target="#addu" data-toggle="modal">
        Add incharge
      </button>
    </div>

    <div>
      <table class="table mt-3">
        <thead>
          <tr>
            <th scope="col">Profile</th>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Gender</th>
            <th scope="col">Email</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($users as $user)
            <tr>
              <th scope="row"><img src="{{ $user->imgURL() }}" alt="" width="80" height="70" /></th>
              <td>{{ $user->id }}</td>
              <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
              <td>{{ $user->address }}</td>
              <td>{{ $user->gender }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->contact_number }}</td>
              <td>
                <button class="btn btn-info" data-toggle="modal" data-target="#uprof_{{ $user->id }}">
                  Update
                </button>
                <button class="btn btn-danger" data-target="#dlt_{{ $user->id }}" data-toggle="modal">
                  Delete
                </button>
              </td>
            </tr>

            <!-- Update user -->
            <div class="modal fade" id="uprof_{{ $user->id }}" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <form action="{{ route('users.diffUpdate', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" name="update_incharge" value="1">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit incharge</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <label for="profile_image">Profile picture:</label>
                      <input type="file" class="form-control" name="profile_image" id="profile_image">
                      <label for="first_name">First name:</label>
                      <input type="text" class="form-control" name="first_name" id="first_name"
                        value="{{ $user->first_name }}">
                      <label for="last_name">Last name:</label>
                      <input type="text" class="form-control" name="last_name" id="last_name"
                        value="{{ $user->last_name }}">
                      <label for="address">Address:</label>
                      <input type="text" class="form-control" name="address" id="address"
                        value="{{ $user->address }}">
                      <label for="gender">Gender:</label>
                      <input type="text" class="form-control" name="gender" id="gender"
                        value="{{ $user->gender }}">
                      <label for="email">Email:</label>
                      <input type="text" class="form-control" name="email" id="email"
                        value="{{ $user->email }}">
                      <label for="contact_number">Contact number:</label>
                      <input type="text" class="form-control" name="contact_number" id="contact_number"
                        value="{{ $user->contact_number }}">
                      <label for="password">New Password</label>
                      <input type="text" class="form-control" name="password" id="password">
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                      </button>
                      <button type="submit" class="btn btn-info">Update</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Delete -->
            <div class="modal fade" id="dlt_{{ $user->id }}" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="delete_incharge" value="1">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <h6>Delete incharge?</h6>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                      </button>
                      <button type="submit" class="btn btn-danger">Yes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          @empty
            <td colspan="6" class="text-center pt-5">
              <h5>You haven't issued a message yet, Go to service and issue now</h5>
            </td>
          @endforelse
        </tbody>
      </table>
      {{ $users->links() }}
    </div>
  </section>
  z
  <footer></footer>
  <!-- Add user -->
  <div class="modal fade" id="addu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="add_incharge" value="1">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add incharge</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <label for="profile_image">Profile picture:</label>
            <input type="file" class="form-control" name="profile_image" id="profile_image" />
            <label for="first_name">First name:</label>
            <input type="text" class="form-control" name="first_name" id="first_name" />
            <label for="last_name">Last name:</label>
            <input type="text" class="form-control" name="last_name" id="last_name" />
            <label for="address">Address:</label>
            <input type="text" class="form-control" name="address" id="address" />
            <label for="gender">Gender:</label>
            <input type="text" class="form-control" name="gender" id="gender" />
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" id="email" />
            <label for="contact_number">Contact number:</label>
            <input type="text" class="form-control" name="contact_number" id="contact_number" />
            <label for="password">Password:</label>
            <input type="text" class="form-control" name="password" id="password" />
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
