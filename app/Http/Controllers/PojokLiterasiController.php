<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Client\RequestException;

class PojokLiterasiController extends Controller
{
    private $wikiUrl;
    private $kamusUrl;

    public function __construct()
    {
        $this->wikiUrl = 'https://id.wikipedia.org/w/api.php';
        $this->kamusUrl = 'https://id.wiktionary.org/w/api.php';
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

    public function kamusSearch(Request $request){
        $query = $request->input('query');

        $client = new Client();

        try {
            $response = $client->get($this->kamusUrl, [
                'query' => [
                    'action' => 'query',
                    'format' => 'json',
                    'list' => 'search',
                    'srsearch' => $query,
                ],
                'verify' => false,
            ]);

            $data = json_decode($response->getBody(), true);

        return view('user.pojok-literasi.kamus', ['results' => $data['query']['search']]);
        } catch (RequestException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function kamusIndex(){
        return view('user.pojok-literasi.kamus');
    }

    // public function sastraIndex(){

    // }
}
