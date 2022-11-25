@extends('emails.layouts.layout')

@section('content')
    <div class="bg-white rounded-lg py-3 px-5">
        <p class="mb-8">Beste {{ $lentBook->user->name }},</p>

        <div class="mb-8">
            <p>
                Jouw boek is <span class="text-red">{{ $lentBook->days_overdue }} dagen</span> te laat.<br/>
                Breng hem zo snel mogelijk terug!
            </p>
            <p>
                Boek: {{ $lentBook->book->title }}<br/>
                Huidige boete: &euro; {{ number_format((float)($lentBook->days_overdue * 0.50 ), 2, ',', '')}}
            </p>
        </div>

        <p>Met vriendelijke groet,</p>
        <p>Jouw bibliotheek</p>
    </div>
@endsection
