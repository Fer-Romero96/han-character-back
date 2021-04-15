<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CharactersController extends Controller
{
    // Test values:  胃
    public function info($char) {
        $url = 'https://kanjialive-api.p.rapidapi.com/api/public/kanji/';
        $url .= $char;
        $url_audio = 'https://api.voicerss.org';

        // Rapid API call, it gets most of the information
        $response = Http::withHeaders([
            'x-rapidapi-key' => env('RAPID_API_KEY'),
	        'x-rapidapi-host' => 'kanjialive-api.p.rapidapi.com'
            ])->get($url)->json();

        if (array_key_exists('kanji', $response)) {

            $data['kanji']['character'] = $response['kanji']['character'];
            $data['kanji']['strokes'] = $response['kanji']['strokes'];
            unset($data['kanji']['strokes']['timings']);
            $data['kanji']['onyomi'] = $response['kanji']['onyomi'];
            $data['kanji']['kunyomi'] = $response['kanji']['kunyomi'];
            $data['radical'] = $response['radical'];
            $data['examples'] = $response['examples'];

            // Request mp3 file for onyomi
            if ($data['kanji']['onyomi']['romaji'] != 'n/a')
            {
                $mp3_onyomi = Http::asForm()->post($url_audio, [
                    'key' => env('VOICERSS_API_KEY'),
                    'hl' => 'ja-jp',
                    'v' => 'Humi',
                    'c' => 'mp3',
                    'src' => $data['kanji']['onyomi']['romaji']
                ]);

                $data['kanji']['onyomi']['mp3_base64'] = base64_encode($mp3_onyomi);
            }

            // Request mp3 file for kunyomi
            if ($data['kanji']['kunyomi']['romaji'] != 'n/a')
            {
                $mp3_kunyomi = Http::asForm()->post($url_audio, [
                    'key' => env('VOICERSS_API_KEY'),
                    'hl' => 'ja-jp',
                    'v' => 'Humi',
                    'c' => 'mp3',
                    'src' => $data['kanji']['kunyomi']['romaji']
                ]);

                $data['kanji']['kunyomi']['mp3_base64'] = base64_encode($mp3_kunyomi);
            }

            return response()->json($data);
        } else {
            return ['message' => 'No kanji found.'];
        }
    }

    public function search(Request $request) {
        $data['character'] = [
            'option_1' => '胃',
            'option_2' => '冑',
            'option_3' => '写',
            'option_4' => '昌',
            'option_5' => '骨',
            'option_6' => '冒',
            'option_7' => '男',
            'option_8' => '胄',
        ];

        return response()->json($data);
    }
}
