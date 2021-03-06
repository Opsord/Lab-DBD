<?php

namespace App\Http\Controllers;

use App\Models\Genre;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $genres = Genre::all();
        if (empty($genres)) {
            return response()->json(['message' => 'No genres found'], 404);
        }
        return view('genre')->with('genres', $genres);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make(
            $request->all(),[
                'name_genre' => 'required',
            ]
        );

        $newgenre = new Genre();
        $newgenre->name_genre = $request->name_genre;
        $newgenre->save();
        
        return back();
    }

    public function archive()
    {
        //
        $genres = Genre::onlyTrashed()->get();
        if (empty($genres)) {
            return response()->json(['message' => 'No archived genres found'], 404);
        } else {
            return response($genres, 200);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $genre = Genre::find($id);
        if (empty($genre)) {
            return response()->json(['message' => 'Genre not found'], 404);
        }
        return response($genre, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        $validator = Validator::make(
            $request->all(),[
                'name_genre' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => 'Error validating request'], 400);
        }

        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json(['message' => errors()], 404);
        }

        $genre->name_genre = $request->name_genre;
        $genre->save();

        return response()->json([
            'respuesta' => 'Genre updated',
            'id' => $genre->id_genre
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $genre = Genre::withTrashed() -> find($id);

        if (empty($genre)) {
            return response()->json(['message' => 'Genre not found'], 404);
        }

        if ($genre -> trashed()) {
            $genre -> forceDelete();
            return response()->json([
                'message' => 'Genre hard deleted',
                'id' => $genre->id_genre
            ], 200);
        } else {
            $genre -> delete();
            return back();
        }
    }

    public function restore($id)
    {
        //
        $genre = Genre::onlyTrashed() -> find($id);

        if (empty($genre)) {
            return response()->json(['message' => 'Genre not found'], 404);
        }
        
        $genre -> restore();
        return response()->json([
            'message' => 'Genre restored',
            'id' => $genre->id_genre
        ], 200);
        
        }

    public function restoreAll()
    {
        //
        $genres = Genre::onlyTrashed() -> get();

        if (empty($genres)) {
            return response()->json(['message' => 'No genres found'], 404);
        }

        foreach ($genres as $genre) {
            $genre -> restore();
        }

        return response()->json([
            'message' => 'All genres restored',
            'genres' => $genres
        ], 200);
    }
}
