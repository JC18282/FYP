<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use Auth;

class TopicsController extends Controller
{
	public function __construct() {

		$this->middleware('auth');

	}

	//Displays all topics in the LMS.
	public function index() {

		$topics = Topic::all();

	    return view('topic.index', compact('topics'));
	}

	//Finds topic specified in GET request.
	public function show(Topic $topic) {

    	return view('topic.show', compact('topic'));
    	
	}

	//Displays topic create form
	public function create() {

		if (Auth::user()->user_type == 'admin') {

			return view('topic.create');

		}
		else {

			return redirect('/home');

		}
	
	}

	//Stores new topic in db.
	public function store(Request $request) {
	
		//Validate the request.
		$this->validate(request(), [
			'title' => 'required',
			'description' => 'required',
			'content' => 'required'

		]);

		//Get content from summernote form.
		$detail=$request->content;
		//dd($detail);

		//Store topic heading picture.
		$picName = time().'.'.$request->topicImage->getClientOriginalExtension();
		$request->topicImage->move(base_path('public/images'), $picName);
 
        $dom = new \domdocument();
        $dom->loadHtml('<html>' . $detail .'</html>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);//HTML tags to nest code parsed from summernote
 
        $images = $dom->getelementsbytagname('img');
 
        foreach($images as $k => $img){
            $data = $img->getattribute('src');
 
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
 
            $data = base64_decode($data);
            $image_name= time().$k.'.png';
            $path = public_path() .'/images/content/'. $image_name;
            $f = file_put_contents($path, $data);
 
            $img->removeattribute('src');
            $img->setattribute('src', '/images/content/' . $image_name);
        }

        $detail = str_replace(array('<html>','</html>') , '' , $dom->saveHTML());//Fix bugged HTML parsing

		$newTopic = Topic::create([

			'title' => request('title'),
			'description' =>request('description'),
			'content' => $detail,
			'image' => $picName
		]);

		//Redirect to quiz creation
		$url = '/topic/' . $newTopic->id . '/quiz/create';
		return redirect($url);
    	
	}
}