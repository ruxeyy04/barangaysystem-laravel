@extends('layout.layout')

@section('content')
  <div class="content container mt-3">
    @include('shared.guest.navigation')
    <h6>If you have a concern/report/request, fill the inputs below.</h6>
    <div class="forms">
      <input type="text" class="form-control" placeholder="Subject" />
      <textarea name="" class="form-control mt-3" id="" cols="30" rows="10"></textarea>
      <div class="text-right mt-3">
        <button class="btn btn-warning">Send</button>
      </div>
    </div>
    <h6 class="mt-3 text-warning font-weight-bold">Baranggay Hotline:</h6>
    <div class="row">
      <div class="col-md-6">
        <div class="d-flex align-items-center justify-content-center">
          <i class="fa-solid fa-message"></i>
          <p class="pl-2 mt-3">barangay@gmail.com | barngy@gmail.com</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="d-flex align-items-center justify-content-center">
          <i class="fa-solid fa-phone"></i>
          <p class="pl-2 mt-3">+6312 432 9084 | Fax: +6323 321 7480</p>
        </div>
      </div>
      <div class="col-md-12 text-center">
        <img class="cret" src="img/pep.jpg" alt="" />
        <h6 class="font-weight-bold">Jansen</h6>
        <p>
          All logos, product and company names are trademarks™ or registered®
          trademarks of their respective holders. Use of them does not imply
          any affiliation with or endorsement by them. This site and the
          products and services offered on this site are not associated,
          affiliated, endorsed, or sponsored by any business listed on this
          page nor have they been reviewed tested or certified by any other
          company listed on this page.
        </p>
      </div>
    </div>
  </div>
  <footer></footer>
  <!-- login -->
  <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{ route('authenticate') }}" method="GET">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            @csrf
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" />
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" />
            <h6 class="mt-2">
              No account yet? Go to your Baranggay Hall and ask for an account.
            </h6>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
