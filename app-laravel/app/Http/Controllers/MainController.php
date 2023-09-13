<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accessToken = 'ro2a8g4lgt4i08zp'; // Замените на свой токен доступа Bitrix24
        $bitrix24ApiUrl = 'https://b24-5fhs31.bitrix24.ru/rest/1/ro2a8g4lgt4i08zp'; // Замените на URL вашего Bitrix24
    
        $client = new Client();
        $response = $client->get("$bitrix24ApiUrl/crm.deal.list", [
            'query' => [
                'auth' => "",
            ],
        ]);
    
        $deals = json_decode($response->getBody()->getContents(), true);
    
        return view('home', compact('deals'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // Ваши данные для создания сделки
        $dealData = [
            'fields' => [
                'TITLE' => $request->input('deal_name'), // Название сделки, можете использовать данные из формы
                'OPPORTUNITY' => $request->input('deal_amount'), // Сумма сделки
                'DESCRIPTION' => $request->input('deal_description'), // Описание сделки
                'CONTACT_ID' => $request->input('client_id'), // ID клиента
                // Другие поля сделки
                // ...
            ]
        ];
    
        // Преобразуйте данные в JSON
        $dealDataJson = json_encode($dealData);
    
        $accessToken = ''; // Замените на свой токен доступа Bitrix24
        $bitrix24ApiUrl = 'https://b24-5fhs31.bitrix24.ru/rest/1/ro2a8g4lgt4i08zp'; // Замените на URL вашего Bitrix24
    
        $client = new Client();
    
        // Отправьте POST-запрос к API Bitrix24 для создания сделки
        $response = $client->post("$bitrix24ApiUrl/crm.deal.add", [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'query' => [
                'auth' => $accessToken,
            ],
            'body' => $dealDataJson,
        ]);
    
        // Проверьте ответ на успешное создание сделки
        if ($response->getStatusCode() == 200) {
            // Сделка успешно создана
            return redirect('/')->with('success', 'Сделка успешно создана в Bitrix24');
        } else {
            // Обработайте ошибку создания сделки
            return redirect('/')->with('error', 'Произошла ошибка при создании сделки');
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
