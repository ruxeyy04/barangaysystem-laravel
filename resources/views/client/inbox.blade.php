@extends('layout.layout')

@section('current_page')
  <h5>// Inbox</h5>
@endsection

@section('content')
  <section class="content container mt-3">
    @include('shared.client.navigation')
    <div>
      <h6>This is were you see the response of the Baranggay</h6>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Subject</th>
            <th scope="col">Description</th>
            <th scope="col">Time</th>
            <th scope="col">Response</th>
            <th scope="col">Date response</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($messages as $message)
            <tr>
              <th scope="row">{{ $message->subject }}</th>
              <td>{{ $message->message }}</td>
              <td>{{ $message->created_at->diffForHumans() }}</td>

              <td>
                <button class="btn btn-warning" class="btn btn-warning" data-toggle="modal" data-target="#vrps"
                  {{ optional($message->response)->response ? '' : 'disabled' }}>
                  View
                </button>
              </td>
              <td>{{ optional($message->response)->created_at ? optional($message->response)->created_at->format('l, F j, Y, h:i A') : 'No response' }}</td>
              <td>{{ $message->status }}</td>
            </tr>

            <!-- view response -->
            <div class="modal fade" id="vrps" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Response</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    {{ optional($message->response)->response }}
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                      Close
                    </button>
                  </div>
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
      {{ $messages->links() }}
    </div>
  </section>
  <footer></footer>
@endsection