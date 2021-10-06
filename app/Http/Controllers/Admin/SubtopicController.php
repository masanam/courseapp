<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\SubtopicDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateSubtopicRequest;
use App\Http\Requests\Admin\UpdateSubtopicRequest;
use App\Repositories\Admin\SubtopicRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SubtopicController extends AppBaseController
{
    /** @var  SubtopicRepository */
    private $subtopicRepository;

    public function __construct(SubtopicRepository $subtopicRepo)
    {
        $this->subtopicRepository = $subtopicRepo;
    }

    /**
     * Display a listing of the Subtopic.
     *
     * @param SubtopicDataTable $subtopicDataTable
     * @return Response
     */
    public function index(SubtopicDataTable $subtopicDataTable)
    {
        return $subtopicDataTable->render('admin.subtopics.index');
    }

    /**
     * Show the form for creating a new Subtopic.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.subtopics.create');
    }

    /**
     * Store a newly created Subtopic in storage.
     *
     * @param CreateSubtopicRequest $request
     *
     * @return Response
     */
    public function store(CreateSubtopicRequest $request)
    {
        $input = $request->all();

        $subtopic = $this->subtopicRepository->create($input);

        Flash::success('Subtopic saved successfully.');

        return redirect(route('admin.subtopics.index'));
    }

    /**
     * Display the specified Subtopic.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subtopic = $this->subtopicRepository->find($id);

        if (empty($subtopic)) {
            Flash::error('Subtopic not found');

            return redirect(route('admin.subtopics.index'));
        }

        return view('admin.subtopics.show')->with('subtopic', $subtopic);
    }

    /**
     * Show the form for editing the specified Subtopic.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subtopic = $this->subtopicRepository->find($id);

        if (empty($subtopic)) {
            Flash::error('Subtopic not found');

            return redirect(route('admin.subtopics.index'));
        }

        return view('admin.subtopics.edit')->with('subtopic', $subtopic);
    }

    /**
     * Update the specified Subtopic in storage.
     *
     * @param  int              $id
     * @param UpdateSubtopicRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubtopicRequest $request)
    {
        $subtopic = $this->subtopicRepository->find($id);

        if (empty($subtopic)) {
            Flash::error('Subtopic not found');

            return redirect(route('admin.subtopics.index'));
        }

        $subtopic = $this->subtopicRepository->update($request->all(), $id);

        Flash::success('Subtopic updated successfully.');

        return redirect(route('admin.subtopics.index'));
    }

    /**
     * Remove the specified Subtopic from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subtopic = $this->subtopicRepository->find($id);

        if (empty($subtopic)) {
            Flash::error('Subtopic not found');

            return redirect(route('admin.subtopics.index'));
        }

        $this->subtopicRepository->delete($id);

        Flash::success('Subtopic deleted successfully.');

        return redirect(route('admin.subtopics.index'));
    }
}
