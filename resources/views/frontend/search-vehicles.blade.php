<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link href="{{ asset('css/tailwind.min.css') }}" rel="stylesheet">
    <title>Βοηθός αναζήτησης οχημάτων</title>
    <style rel="stylesheet">
        .spinning-image {
            animation: spin 4s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body class="bg-gray-50 text-white text-center font-sans">
<div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
        <div class="">
            <a href="{{ url('/') }}">
                <img class="mx-auto h-12 w-auto" src="{{ asset('openai.svg') }}"
                     alt="OpenAI">
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">
                    Βοηθός αναζήτησης οχημάτων</h2>
            </a>
            <p class="mt-2 text-center text-sm text-gray-600">
                Μια έμπνευση από το <a target="_blank" href="https://apofasizo.gr/"
                                                       class="font-medium text-indigo-600 hover:text-indigo-500">ΑποφασίΖΩ</a>.
            </p>
            <p class="mt-2 text-center text-sm text-gray-600">
                Με την απαράμιλλη βοήθεια του <a target="_blank" href="https://openai.com/"
                                                 class="font-medium text-indigo-600 hover:text-indigo-500">OpenAI</a>.
            </p>
        </div>
        <form method="POST" action="{{ route('search') }}">
            @csrf
            <div class="flex items-center p-2">
                <div class="text-left text-gray-900">
                    <label class="text-grey-900 text-left ml-1" for="1">Οχήματα κάλυψης</label>
                    <select class="p-2 border bg-gray-100 border-gray-400 rounded-lg" name="need" id="need">
                        <option
                            value="Certainty & Comfort" {{ request('need') === 'Certainty & Comfort' ? 'selected' : '' }}>
                            Βεβαιότητας
                        </option>
                        <option
                            value="Variety & Stimulation" {{ request('need') === 'Variety & Stimulation' ? 'selected' : '' }}>
                            Αβεβαιότητας
                        </option>
                        <option
                            value="Significance & Esteem" {{ request('need') === 'Significance & Esteem' ? 'selected' : '' }}>
                            Σημαντικότητας
                        </option>
                        <option value="Love & Connection" {{ request('need') === 'Love & Connection' ? 'selected' : '' }}>
                            Σύνδεσης/Αγάπης
                        </option>
                        <option value="Growth & Expansion" {{ request('need') === 'Growth & Expansion' ? 'selected' : '' }}>
                            Εξέλιξης
                        </option>
                        <option
                            value="Contribution & Giving back" {{ request('need') === 'Contribution & Giving back' ? 'selected' : '' }}>
                            Συνεισφοράς
                        </option>
                    </select>
                </div>
                <div class="text-left text-gray-900">
                    <label class="text-grey-900 text-left ml-5" for="1">(+/-)</label>
                    <select class="p-2 border bg-gray-100 border-gray-400 rounded-lg ml-4 " name="sign" id="sign">
                        <option value="positive" {{ request('sign') === 'positive' ? 'selected' : '' }}>Θετικά</option>
                        <option value="negative" {{ request('sign') === 'negative' ? 'selected' : '' }}>Αρνητικά
                        </option>
                    </select>
                </div>
            </div>
            <div>
                <button type="submit"
                        class="mt-5 group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
              <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
              </span>
                    Throw a virtual dart
                </button>
            </div>
        </form>
        <div class="text-base text-gray-800 text-left">
            <img class="mx-auto h-12 w-auto m-5 spinning-image" src="{{ asset('openai.svg') }}"
                 alt="OpenAI">
            <label for="response">
                <textarea readonly name="response" rows="10" class="w-full p-2 border border-gray-400 rounded-lg">{{ $response ?? '' }}</textarea>
            </label>
        </div>
    </div>
</div>
</body>
</html>
