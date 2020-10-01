<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateabcRequest;
use App\Http\Requests\UpdateabcRequest;
use App\Repositories\abcRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class abcController extends AppBaseController
{
    /** @var  abcRepository */
    private $abcRepository;

    public function __construct(abcRepository $abcRepo)
    {
        $this->abcRepository = $abcRepo;
    }

    /**
     * Display a listing of the abc.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $abcs = $this->abcRepository->paginate(10);

        return view('abcs.index')
            ->with('abcs', $abcs);
    }

    /**
     * Show the form for creating a new abc.
     *
     * @return Response
     */
    public function create()
    {
        return view('abcs.create');
    }

    /**
     * Store a newly created abc in storage.
     *
     * @param CreateabcRequest $request
     *
     * @return Response
     */
    public function store(CreateabcRequest $request)
    {
        $input = $request->all();

        $abc = $this->abcRepository->create($input);

        Flash::success('Abc saved successfully.');

        return redirect(route('abcs.index'));
    }

    /**
     * Display the specified abc.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $abc = $this->abcRepository->find($id);

        if (empty($abc)) {
            Flash::error('Abc not found');

            return redirect(route('abcs.index'));
        }

        return view('abcs.show')->with('abc', $abc);
    }

    /**
     * Show the form for editing the specified abc.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $abc = $this->abcRepository->find($id);

        if (empty($abc)) {
            Flash::error('Abc not found');

            return redirect(route('abcs.index'));
        }

        return view('abcs.edit')->with('abc', $abc);
    }

    /**
     * Update the specified abc in storage.
     *
     * @param int $id
     * @param UpdateabcRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateabcRequest $request)
    {
        $abc = $this->abcRepository->find($id);

        if (empty($abc)) {
            Flash::error('Abc not found');

            return redirect(route('abcs.index'));
        }

        $abc = $this->abcRepository->update($request->all(), $id);

        Flash::success('Abc updated successfully.');

        return redirect(route('abcs.index'));
    }

    /**
     * Remove the specified abc from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $abc = $this->abcRepository->find($id);

        if (empty($abc)) {
            Flash::error('Abc not found');

            return redirect(route('abcs.index'));
        }

        $this->abcRepository->delete($id);

        Flash::success('Abc deleted successfully.');

        return redirect(route('abcs.index'));
    }
}
