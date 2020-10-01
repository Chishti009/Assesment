<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateabcAPIRequest;
use App\Http\Requests\API\UpdateabcAPIRequest;
use App\Models\abc;
use App\Repositories\abcRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class abcController
 * @package App\Http\Controllers\API
 */

class abcAPIController extends AppBaseController
{
    /** @var  abcRepository */
    private $abcRepository;

    public function __construct(abcRepository $abcRepo)
    {
        $this->abcRepository = $abcRepo;
    }

    /**
     * Display a listing of the abc.
     * GET|HEAD /abcs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $abcs = $this->abcRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($abcs->toArray(), 'Abcs retrieved successfully');
    }

    /**
     * Store a newly created abc in storage.
     * POST /abcs
     *
     * @param CreateabcAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateabcAPIRequest $request)
    {
        $input = $request->all();

        $abc = $this->abcRepository->create($input);

        return $this->sendResponse($abc->toArray(), 'Abc saved successfully');
    }

    /**
     * Display the specified abc.
     * GET|HEAD /abcs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var abc $abc */
        $abc = $this->abcRepository->find($id);

        if (empty($abc)) {
            return $this->sendError('Abc not found');
        }

        return $this->sendResponse($abc->toArray(), 'Abc retrieved successfully');
    }

    /**
     * Update the specified abc in storage.
     * PUT/PATCH /abcs/{id}
     *
     * @param int $id
     * @param UpdateabcAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateabcAPIRequest $request)
    {
        $input = $request->all();

        /** @var abc $abc */
        $abc = $this->abcRepository->find($id);

        if (empty($abc)) {
            return $this->sendError('Abc not found');
        }

        $abc = $this->abcRepository->update($input, $id);

        return $this->sendResponse($abc->toArray(), 'abc updated successfully');
    }

    /**
     * Remove the specified abc from storage.
     * DELETE /abcs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var abc $abc */
        $abc = $this->abcRepository->find($id);

        if (empty($abc)) {
            return $this->sendError('Abc not found');
        }

        $abc->delete();

        return $this->sendSuccess('Abc deleted successfully');
    }
}
