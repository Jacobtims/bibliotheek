@extends('emails.layouts.layout')

@section('content')
    <div class="bg-white rounded-lg py-3 px-5">
        <p class="mb-8">Beste {{ $user->name }},</p>

        <div class="mb-8">
            <p>Jouw gereserveerde boek ligt klaar in de bibliotheek!</p>
            <p>Boek: {{ $book->title }}</p>
        </div>

        <p>Met vriendelijke groet,</p>
        <p>Jouw bibliotheek</p>
    </div>
@endsection
