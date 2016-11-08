<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/7
 * Time: 10:14
 */

namespace CrCms\Category\Http\Controllers\Manage;


use CrCms\Category\Http\Requests\CategoryRequest;
use CrCms\Category\Repositories\Interfaces\CategoryRepositoryInterface;
use CrCms\Kernel\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CategoryController extends Controller
{

    /**
     * @var string
     */
    protected $view = 'category::category.';


    /**
     * CategoryController constructor.
     * @param CategoryRepositoryInterface $repository
     */
    public function __construct(CategoryRepositoryInterface $repository)
    {
        parent::__construct();

        $this->repository = $repository;

        View::share([
            'status'=>$this->repository->status(),
            'models'=>$this->repository->all(),
        ]);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->view('index');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return $this->view('create');
    }


    /**
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     */
    public function store(CategoryRequest $request)
    {
        $model = $this->repository->create($this->input);

        return $this->response(['success'],compact('model'));
    }


    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $model = $this->repository->findById($id);

        return $this->view('edit',compact('model'));
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     */
    public function update(int $id)
    {
        $model = $this->repository->update($this->input,$id);

        return $this->response(['success'],compact('model'));
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     */
    public function destroy(int $id)
    {
        $this->repository->delete($id);

        return $this->response(['success']);
    }
}