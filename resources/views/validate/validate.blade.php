@if ($errors->any())
<p class="alert alert-danger"  >{{ $errors->first() }} <button class="close" data-dismiss="alert" >&times;</button></p>
 @endif

 @if (Session::has('success'))
<p class="alert alert-success"  >{{ Session::get('success') }} <button class="close" data-dismiss="alert" >&times;</button></p>
 @endif

 @if (Session::has('success-mid'))
 <p class="alert alert-warning"  >{{ Session::get('success-mid') }} <button class="close" data-dismiss="alert" >&times;</button></p>
  @endif

  @if (Session::has('success-note'))
 <p class="alert alert-warning"  >{{ Session::get('success-note') }} <button class="close" data-dismiss="alert" >&times;</button></p>
  @endif

