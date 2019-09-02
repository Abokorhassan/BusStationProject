<form action="{{ route('admin.realtimers.store') }}" method="POST">
  
  <input type="text" name="content">
  <input type="submit">
  {{ csrf_field() }}
</form>