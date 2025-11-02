@extends('layouts.app')

@section('title', $page->meta_title ?? $page->title)
@section('description', $page->meta_description)

@section('content')
<article class="prose max-w-none">
    <h1>{{ $page->title }}</h1>
    <div>{!! $page->content !!}</div>
@endsection






