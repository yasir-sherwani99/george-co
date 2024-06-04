<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR with multi
// use Artesaos\SEOTools\Facades\JsonLdMulti;
// OR
// use Artesaos\SEOTools\Facades\SEOTools;

use App\Models\Slider;
use App\Models\Service;
use App\Models\Category;
use App\Models\Project;
use App\Models\MetaTag;
use App\Http\Requests\ContactStoreRequest;
use App\Models\Contact;

class PageController extends Controller
{
    public function aboutIndex()
    {
        // get home page meta tags data
        $meta = MetaTag::page('About')->first();

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

        $pagePath = 'about';
        view()->share('pagePath', $pagePath);

        // get all sliders
        $slides = Slider::active()->sort('asc')->get();

        return view('guest.about', compact('slides'));
    }

    public function projectsIndex()
    {
        // get home page meta tags data
        $meta = MetaTag::page('Projects')->first();

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
        // get all categories
        $categories = Category::active()->get();
        // get all projects
        $projects = Project::active()->get();
    
        $pagePath = 'projects';
        view()->share('pagePath', $pagePath);

        return view('guest.projects', compact('slides', 'categories', 'projects'));
    }

    public function servicesIndex()
    {
        // get home page meta tags data
        $meta = MetaTag::page('Services')->first();

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

        $pagePath = 'services';
        view()->share('pagePath', $pagePath);

        return view('guest.services', compact('slides', 'services'));
    }

    public function contactIndex()
    {
        // get home page meta tags data
        $meta = MetaTag::page('Contact')->first();

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

        $pagePath = 'contact';
        view()->share('pagePath', $pagePath);

        return view('guest.contact');
    }

    public function contactStore(ContactStoreRequest $request)
    {
        $contact = new Contact;

        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;

        $contact->save();

        return redirect()->route('contact')
                         ->with('success', 'Your message has been submitted successfully.');
    }
}
