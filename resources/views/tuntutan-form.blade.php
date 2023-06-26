@extends('navigation')

@section('navigation')


<form action="{{ route('tuntutan.store') }}" method="POST">

    @csrf
    <input type="hidden" name="pemohon" value="{{ $pemohon }}">
    <input type="hidden" name="tahun" value="{{ $tahun }}">
    <input type="hidden" name="nokp" value="{{ $nokp }}">
    <input type="hidden" name="musimini" value="{{ $musimini }}">
    <input type="hidden" name="pohonid" value="{{ $pohonid }}">
    <input type="hidden" name="details" value="{{ $details }}">

    <label for="luas">Luas:</label>
    <input type="text" name="luas" id="luas">

    <label for="bayaran">Bayaran:</label>
    <input type="text" name="bayaran" id="bayaran">

    <label for="akaun">Akaun:</label>
    <input type="text" name="akaun" id="akaun">

    <label for="bank">Bank:</label>
    <select name="bank" id="bank">
        <option value="Bank A">Bank A</option>
        <option value="Bank B">Bank B</option>
        <option value="Bank C">Bank C</option>
    </select>

    <label for="tuntutan">Tuntutan:</label>
    <input type="text" name="tuntutan" id="tuntutan">

    <input type="hidden" name="subsidi" value="{{ $subsidi }}">
    <input type="hidden" name="bilnya" value="{{ $bilnya }}">

    <button type="submit">Submit</button>

</form>

@endsection
