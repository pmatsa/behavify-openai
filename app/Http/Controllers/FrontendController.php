<?php

namespace App\Http\Controllers;


use App\Models\Prompt;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;


class FrontendController extends Controller
{
    public function search(Request $request)
    {
        $content = Prompt::get()->first()->prompt_request;
        $need = $request->get('need');
        $sign = $request->get('sign');

        $content = str_replace('{{need}}', $need, $content);
        $content = str_replace('{{sign}}', $sign, $content);

        $openaiClient = \Tectalic\OpenAi\Manager::build(
            new \GuzzleHttp\Client(),
            new \Tectalic\OpenAi\Authentication(getenv('OPENAI_API_KEY'))
        );

        /** @var \Tectalic\OpenAi\Models\ChatCompletions\CreateResponse $response */
        $response = $openaiClient->chatCompletions()->create(
            new \Tectalic\OpenAi\Models\ChatCompletions\CreateRequest([
                'model'    => 'gpt-4',
                'messages' => [
                    [
                        'role'    => 'user',
                        'content' => $content,
                    ],
                ],
            ])
        )->toModel();

        $response = $response->choices[0]->message->content;

        return view('frontend.search-vehicles', compact('response', 'need', 'sign'));
    }
}
