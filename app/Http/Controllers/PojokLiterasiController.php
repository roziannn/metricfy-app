<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Client\RequestException;

class PojokLiterasiController extends Controller
{
    private $wikiUrl;

    public function __construct()
    {

        $this->wikiUrl = 'https://en.wikipedia.org/w/api.php';
    }

    public function wikiSearch(Request $request)
    {
        $query = $request->input('query');

        $client = new Client();

        try {
            $response = $client->get($this->wikiUrl, [
                'query' => [
                    'action' => 'query',
                    'format' => 'json',
                    'list' => 'search',
                    'srsearch' => $query,
                ],
                'verify' => false,
            ]);

            $data = json_decode($response->getBody(), true);
            

        //     return response()->json($data['query']['search']);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => $e->getMessage()], 500);
        // }
        return view('user.pojok-literasi.wikimedia', ['results' => $data['query']['search']]);
        } catch (RequestException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function wikiIndex(){
        return view('user.pojok-literasi.wikimedia');
    }
}
