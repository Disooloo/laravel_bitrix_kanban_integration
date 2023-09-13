@extends('layout.main')

@section('content')
<div class="container">

    <span>
        <h1>Данные из CRM</h1>
        <a href="" class="btn btn-succses">Пользователи</a>
    </span>

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
    <section>
      <!-- Кнопка для открытия модального окна -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDealModal">
    Добавить
</button>
    <!-- Модальное окно для добавления сделки -->
    <div class="modal fade" id="addDealModal" tabindex="100" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавить сделку</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Форма для ввода данных сделки -->
                <form method="POST" action="{{ route('deals.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="deal_name">Название сделки</label>
                        <input type="text" class="form-control" id="deal_name" name="deal_name" required>
                    </div>
                    <div class="form-group">
                        <label for="deal_amount">Сумма сделки</label>
                        <input type="text" class="form-control" id="deal_amount" name="deal_amount">
                    </div>
                    <div class="form-group">
                        <label for="deal_description">Описание сделки</label>
                        <textarea class="form-control" id="deal_description" name="deal_description" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="client_id">ID клиента</label>
                        <input type="text" class="form-control" id="client_id" name="client_id">
                    </div>
                    <!-- Другие поля для ввода данных сделки -->
                    <!-- ... -->
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>
                
            </div>
        </div>
    </div>
    </div>
    </section>
</div>
@endsection