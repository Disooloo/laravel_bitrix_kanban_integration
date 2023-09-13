@extends('layout.main')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Стоимость</th>
                <th scope="col">Клиент</th>
                <th scope="col">Статус</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deals['result'] as $deal)
                <tr>
                    <th scope="row">{{ $deal['ID'] }}</th>
                    <td>{{ $deal['TITLE'] }}</td>
                    <td>{{ $deal['OPPORTUNITY'] }}</td>
                    <td>{{ $deal['CONTACT_ID'] }}</td>
                    <td>{{ $deal['STAGE_ID'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection