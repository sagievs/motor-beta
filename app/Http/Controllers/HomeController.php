<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Mail\Contact;
use App\Post;
use App\Feedback;
use App\Slide;
use App\Page;
use App\Action;
use App\Detail;

class HomeController extends Controller
{
    public function getHome() {

        $page = Page::where('slug', 'home')->first();
        $hitProducts = Product::active()->where('ishit', 1)->limit(4)->get();
        $recProducts = Product::active()->where('ismain', 1)->limit(4)->get();
        $homeSlides = Slide::where('type', 'slide')
                            ->active()
        ->get();

        return view('home', compact('hitProducts', 'recProducts', 'homeSlides', 'page'));

    }

    public function getAbout() {

        $page = Page::where('slug', 'about')->first();
        
        return view('page', compact('page'));

    }

    public function getServices() {

        $page = Page::where('slug', 'services')->first();
        
        return view('page', compact('page'));

    }

    public function getCatalog() {

        $page = Page::where('slug', 'catalog')->first();

        $mainCategories = Category::where('parent_id', 0)->get();
        
        return view('catalog', compact('page', 'mainCategories'));

    }

    public function getGallery() {

        $page = Page::where('slug', 'gallery')->first();

        $albums = Page::where('type', 'gallery')->get();
        
        return view('gallery', compact('page', 'albums'));

    }

    public function getMagazinGallery() {

        $page = Page::where('slug', 'magazin')->first();
		
		$photos = Slide::where('type', 'Магазин')->get();
        
        return view('gallery_magazin', compact('page', 'photos'));

    }

    public function getSkladGallery() {

        $page = Page::where('slug', 'sklad')->first();
		
		$photos = Slide::where('type', 'Склад')->get();
        
        return view('gallery_sklad', compact('page', 'photos'));

    }

    public function getContactForm() {


        return view('contact-form');

    }

    public function postContactForm()
    {
        $siteemail = '010@i-marketing.kz';

        $input = request()->all();

        $this->validate(request(), [
            'name' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);

        $subject = 'Заявка с сайта Motor-m.kz';
		$message = "Имя: ".$input['name']."\nТелефон: ".$input['phone']."\nE-mail: ".$input['email']."\nСообщение: ".$input['message'];
		$headers = 'From: info@motor-m.kz' . "\r\n" .
            'Reply-To: info@motor-m.kz' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
		
		mail($siteemail, $subject, $message, $headers);
        session()->flash('flash_message', 'Спасибо, ваша заявка успешно отправлена!');

        return back();
    }

    public function getNews() {

        $page = Page::where('slug', 'news')->first();
        
        $articles = Post::active()->get();

        return view('news', compact('page', 'articles'));

    }

    public function getArticle(Post $post)
    {
        $page = $post;

        return view('page', compact('page'));
    }

    public function getPromo() {

        $page = Page::where('slug', 'promo')->first();
        
        return view('page', compact('page'));

    }

    public function getSinglePromo(Action $action) {

        $page = $action;
        
        return view('about', compact('page'));

    }

    public function getContacts() {

        $page = Page::where('slug', 'contact')->first();

        return view('page', compact('page'));

    }

    public function getDelivery() {

        $page = Page::where('slug', 'delivery')->first();
        
        return view('about', compact('page'));

    }

    public function getFaq() {

        $page = Page::where('slug', 'faq')->first();

        $faqs = Detail::where('id', '>', 11)->get();
        
        return view('faq', compact('page', 'faqs'));

    }

    public function postForm()
    {
        $siteemail = '010@i-marketing.kz';
        $siteemail2 = '009@i-marketing.kz';

        $input = request()->all();

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'g-recaptcha-response' => 'required|recaptcha'
        ]);

        if (request()->file('file') == null) 
        {
            $file = "";
        }else
        {
           $file = request()->file('file')->store('public/uploads');
        }
        if(!empty(request('file')))
        {
            $input['file'] = $file;
        }

        // dd($input['file']);


        \Mail::to($siteemail)
        ->send(new Contact($input));

        return response()->json(['msg' => request('name')]);
    }

    public function postSearch()
    {
        $q = request('q');

        $products = Product::active()
            ->filter(request('q'))
            ->paginate(8);

        $categories = Category::
        filter(request('q'))
        ->paginate(10);
        
        return view('search', compact('q', 'products', 'categories'));
    }

}
