<option>--- Select Bus ---</option>
@if(!empty($opBuses))
  @foreach($opBuses as $id => $bus_number)
    <option value="{{ $id }}">{{ $bus_number }}</option>
  @endforeach
@endif