<?php

namespace App\Http\Controllers;


use App\Models\Prompt;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;


class FrontendController extends Controller
{
    public function search(Request $request)
    {
        $response = Prompt::get()->first()->prompt_request;
        //$variables = Prompt::get()->first()->variables;

        $need = $request->get('need');
        $sign = $request->get('sign');

        $response = str_replace('{{need}}', $need, $response);
        $response = str_replace('{{sign}}', $sign, $response);

        $result = OpenAI::completions()->create([
            'prompt' => $response,
            'model' => 'gpt-4-1106-preview',
            'temperature' => 1,
            'max_tokens' => 1500
        ]);

        $response = preg_replace("/\n(?=.*\n)/", "", $result['choices'][0]['text'], 2);

        return view('frontend.search-vehicles', compact('response', 'need', 'sign'));
    }
}
