<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::orderBy('id','desc')->paginate(5);
        return view('posts.index',compact('posts'));
    }

    public function index1($id){
        $posts=Post::where('category_id',$id)->orderBy('id','DESC')->paginate(4);
        $flag=true;
        return view('posts.index',compact('posts','flag','id'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Category::orderBy('nombre')->get();
        return view('posts.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Hacemos las validaciones
        $request->validate([
            'titulo'=>['required','string','min:3','max:40','unique:posts,titulo'],
            'resumen'=>['required','string','min:5'],
            'contenido'=>['required','string','min:10']
        ]);
        //guardamos los datos
        Post::create($request->all());
        //muestro un mensaje
        return redirect()->route('posts.index')->with("mensaje",'Post creado');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categorias=Category::orderBy('nombre')->get();
        return view('posts.edit',compact('post','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'titulo'=>['required','string','min:3','max:40','unique:posts,titulo,'.$post->id],
            'resumen'=>['required','string','min:5'],
            'contenido'=>['required','string','min:10']
        ]);
        //actualizamos el registro
        $post->update($request->all());
        //mensaje y redireccion a index
        return redirect()->route('posts.index')->with("mensaje",'post editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with("mensaje",'post borrado');
    }
}
