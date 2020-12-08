<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
Use App\Models\Category;
Use App\Models\Tag;
use Session;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //variable and store all post in it from the database
       // $posts=Post::all();
       $posts=Post::orderBy('id','desc')->paginate(3);
        return view('posts.index')->withPosts($posts);
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        //validate the data
        $this->validate($request,array('title'=>'required|max:255',
                                        'slug'=>'required|min:5|max:255|unique:posts,slug',
                                        'category_id'=>'required|integer',
                                        'body'=>'required' ));
        //store in database
        //create instance
        $post=new Post;
        $post->title=$request->title; 
        $post->slug=$request->slug;
        $post->category_id=$request->category_id;
        $post->body=$request->body;
        $post->save();


        $post->tags()->sync($request->tags, false); 
        //flash temp
        //put permanent
        Session::flash('success','The blog post was successfully save');

        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post from the database and save as variable
        $post=Post::find($id);
       // return the view  and pass the variable that  we previously created


       //edit category field
       $categories=Category::all();
       $cat=array();
       foreach($categories as $category){
           $cat[$category->id]=$category->name;
       }

       $tags=Tag::all();
       $tag1=array();
       foreach($tags as $tag){
           $tag1[$tag->id]=$tag->name;
       }


       return view('posts.edit')->withPost($post)->withCategories($cat)->withTags($tag1);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,array('title'=>'required|max:255|unique:posts,slug',
        'body'=>'required' ));
 //store in database
//create instance
   $post=Post::find($id);
   $post->title=$request->input('title') ;
   $post->slug=$request->input('slug');
   $post->body=$request->input('body');
  $post->save();

   if(isset($request->tags)){
    $post->tags()->sync($request->tags,true); 
    
   }else{
       //sync empty array
    $post->tags()->sync([]);   
   }
 
   //flash temp
//put permanent
Session::flash('success','The blog post was updated successfully save');
        
return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        //detach delete  refences(relation )
        $post->tags()->detach();
        Session::flash('success','The post was deleted successfully ');
        return redirect()->route('posts.index');
    }
}
