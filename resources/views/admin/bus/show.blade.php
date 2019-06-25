<option>--- Select State ---</option>
@if(!empty($opDrivers))
  @foreach($opDrivers as $id => $driver_number)
    <option value="{{ $id }}">{{ $driver_number }}</option>
  @endforeach
@endif