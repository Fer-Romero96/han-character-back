<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CharactersController extends Controller
{
    // Test values:  胃
    public function search($char) {
        $url = 'https://kanjialive-api.p.rapidapi.com/api/public/kanji/';
        $url .= $char;

        // $response = Http::dd()->withHeaders([
        $response = Http::withHeaders([
            'x-rapidapi-key' => env('RAPID_API_KEY'),
	        'x-rapidapi-host' => 'kanjialive-api.p.rapidapi.com'
        ])->get($url)->json();

        $data['kanji']['character'] = $response['kanji']['character'];
        $data['kanji']['strokes'] = $response['kanji']['strokes'];
        unset($data['kanji']['strokes']['timings']);
        $data['kanji']['onyomi'] = $response['kanji']['onyomi'];
        $data['kanji']['kunyomi'] = $response['kanji']['kunyomi'];
        $data['radical'] = $response['radical'];
        $data['examples'] = $response['examples'];

        return response()->json($data);
    }
}
