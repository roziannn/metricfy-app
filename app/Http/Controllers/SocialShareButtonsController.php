<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Jorenvh\Share\Share;
use Illuminate\Http\Request;

class SocialShareController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $share = new Share();

        $shareButtons = $share->page(
            'https://www.metricfy.id',
            'Your share text comes here',
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->reddit();


        return view('socialshare', compact('shareButtons', 'posts'));
    }
}
