@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <some-app></some-app>
    </div>1
@endsection

@section('script')
    <script>window.APP_URL = '{!! env('APP_URL') !!}'</script>
@endsection