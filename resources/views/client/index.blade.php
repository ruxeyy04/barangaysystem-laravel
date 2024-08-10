@extends('layout.layout')

@section('current_page')
  <h5>// Service</h5>
@endsection

@section('content')
  <div class="content container mt-3">
    @include('shared.client.navigation')
    <h6>If you have a concern/report/request, fill the inputs below.</h6>
    <div class="forms">
      <form action="{{ route('messages.store') }}" method="POST">
        @csrf
        <input type="text" name="subject" class="form-control" placeholder="Subject" />
        <textarea name="message" class="form-control mt-3" id="" cols="30" rows="10" placeholder="Message"></textarea>
        <div class="text-right mt-3">
          <button type="submit" class="btn btn-warning">Send</button>
        </div>
      </form>
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
        <img class="cret" src="../img/pep.jpg" alt="" />
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
@endsection
