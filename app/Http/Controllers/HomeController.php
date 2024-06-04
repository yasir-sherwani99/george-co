<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR with multi
// use Artesaos\SEOTools\Facades\JsonLdMulti;

use App\Models\Service;
use App\Models\MetaTag;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        // get home page meta tags data
        $meta = MetaTag::page('Home')->first();

        SEOMeta::setTitle($meta->title);
        SEOMeta::setDescription($meta->description);
        SEOMeta::setCanonical('https://georgia.com.pk');
        SEOMeta::addKeyword($meta->keywords);

        OpenGraph::setDescription($meta->description);
        OpenGraph::setTitle($meta->title);
        OpenGraph::setUrl('https://georgia.com.pk');
        OpenGraph::addProperty('type', 'company');
        OpenGraph::addProperty('locale', 'en-US');

        TwitterCard::setTitle($meta->title);
    //    TwitterCard::setSite('@LuizVinicius73');

        JsonLd::setTitle($meta->title);
        JsonLd::setDescription($meta->description);
        JsonLd::setType('Company');
        JsonLd::addImage('https://georgia.com.pk/admin-assets/images/logos/logoo.svg');

        // get all sliders
        $slides = Slider::active()->sort('asc')->get();
        // get all services
        $services = Service::active()->get();

        $pagePath = 'home';
        view()->share('pagePath', $pagePath);

        return view('guest.index', compact('slides', 'services'));
    }   
}
