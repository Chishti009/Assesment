<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Repositories\MovieRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MovieController extends AppBaseController
{
    /** @var  MovieRepository */
    private $movieRepository;

    public function __construct(MovieRepository $movieRepo)
    {
        $this->movieRepository = $movieRepo;
    }

    /**
     * Display a listing of the Movie.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $movies = $this->movieRepository->paginate(10);

        return view('movies.index')
            ->with('movies', $movies);
    }

    /**
     * Show the form for creating a new Movie.
     *
     * @return Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created Movie in storage.
     *
     * @param CreateMovieRequest $request
     *
     * @return Response
     */
    public function store(CreateMovieRequest $request)
    {
        $input = $request->all();
        $addMovie = $input;

        if(isset($input['photo'])){
            if ($request->hasFile('photo')){
                $Validation = $request->validate([
                    'photo' => 'required|max:10000|mimes:jpeg,jpg,png'
                ]);
                $file = $Validation['photo'];
                $filename = 'UploadImage-' . time() . '.' . $file->getClientOriginalExtension();
                $FileNameForAdd = $file->storeAs('movie', $filename);
                $path = public_path('app/uploads/movie/');
                $file->move($path, $filename);
                $addMovie['photo'] = $FileNameForAdd;
            }
        }
        $addMovie['slug'] = str_replace(' ','-',$input['name']).'-'.uniqid();
        $movie = $this->movieRepository->create($addMovie);

        Flash::success('Movie saved successfully.');

        return redirect(route('movies.index'));
    }

    /**
     * Display the specified Movie.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $movie = $this->movieRepository->find($id);

        if (empty($movie)) {
            Flash::error('Movie not found');

            return redirect(route('movies.index'));
        }

        return view('movies.show')->with('movie', $movie);
    }

    /**
     * Show the form for editing the specified Movie.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $movie = $this->movieRepository->find($id);

        if (empty($movie)) {
            Flash::error('Movie not found');

            return redirect(route('movies.index'));
        }

        return view('movies.edit')->with('movie', $movie);
    }

    /**
     * Update the specified Movie in storage.
     *
     * @param int $id
     * @param UpdateMovieRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMovieRequest $request)
    {
        $movie = $this->movieRepository->find($id);

        if (empty($movie)) {
            Flash::error('Movie not found');

            return redirect(route('movies.index'));
        }
        $updateMovie = $request->all();
        if(isset($updateMovie['photo'])){
            if ($request->hasFile('photo')){
                $Validation = $request->validate([
                    'photo' => 'required|max:10000|mimes:jpeg,jpg,png'
                ]);
                $file = $Validation['photo'];
                $filename = 'UploadImage-' . time() . '.' . $file->getClientOriginalExtension();
                $FileNameForAdd = $file->storeAs('movie', $filename);
                $path = public_path('app/uploads/movie/');
                $file->move($path, $filename);
                $updateMovie['photo'] = $FileNameForAdd;
            }
        }
        $updateMovie['slug'] = str_replace(' ','-',$updateMovie['name']).'-'.uniqid();
        $movie = $this->movieRepository->update($updateMovie, $id);

        Flash::success('Movie updated successfully.');

        return redirect(route('movies.index'));
    }

    /**
     * Remove the specified Movie from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $movie = $this->movieRepository->find($id);

        if (empty($movie)) {
            Flash::error('Movie not found');

            return redirect(route('movies.index'));
        }

        $this->movieRepository->delete($id);

        Flash::success('Movie deleted successfully.');

        return redirect(route('movies.index'));
    }


    public function moviesList(Request $request){
        $movies = $this->movieRepository->paginate(10);
        return view('website.movies.index')->with('movies', $movies);
    }


    public function detail($slug){
        $detail = $this->movieRepository->getMovieDetail($slug); 
        return view('website.movies.detail')->with('detail', $detail);
    }
}
