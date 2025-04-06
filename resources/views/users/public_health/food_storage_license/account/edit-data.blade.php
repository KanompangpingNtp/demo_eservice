@extends('users.layout.layout')
@section('pages_content')

@if ($message = Session::get('success'))
<script>
    Swal.fire({
        icon: 'success'
        , title: '{{ $message }}'
    , })

</script>
@endif

<div class="container">
    <a href="#">กลับ</a><br>
    <h2 class="text-center">แก้ไขฟอร์ม</h2><br>

</div>

@endsection
