@extends('app-layouts.admin.index')

@section('content')
<iframe height="500px"  width="100%" src="/assets/{{$data->file}}"></iframe>
@endsection