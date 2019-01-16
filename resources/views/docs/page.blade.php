@extends('_page')

@section('content')

    <div class="docs-wrapper">
        <div class="docs-sidebar">
            {!! $menu !!}
        </div>

        <div class="docs-main">
        	{!! $content !!}
        </div>
    </div>
@endsection
