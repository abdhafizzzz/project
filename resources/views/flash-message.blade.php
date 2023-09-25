@if ($message = Session::get('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert">

  <strong>Pendaftaran berjaya !. Sila log masuk.</strong>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>

@endif



@if ($message = Session::get('error'))

<div class="alert alert-danger alert-dismissible fade show" role="alert">

  <strong>Ralat! Sila masukkan info yang betul..</strong>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>

@endif



@if ($message = Session::get('warning'))

<div class="alert alert-warning alert-dismissible fade show" role="alert">

  <strong>Pernyataan tidak lengkap. Sila isi semua maklumat yang diperlukan.</strong>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>

@endif



@if ($message = Session::get('info'))

<div class="alert alert-info alert-dismissible fade show" role="alert">

  <strong>Info berjaya dicipta. Sila teruskan dengan langkah seterusnya.</strong>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>

@endif



@if ($errors->any())

<div class="alert alert-danger alert-dismissible fade show" role="alert">

  <strong>Sila semak semula ralat di bawah.</strong>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>

@endif
