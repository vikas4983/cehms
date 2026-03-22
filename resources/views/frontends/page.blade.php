@extends('layouts.frontend')
@section('title', $page?->meta_title ?? 'CEHMS - News')
@section('content')
    {!! $content !!}

@endsection
