<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/7
 * Time: 10:14
 */

namespace CrCms\Category\Http\Controllers\Manage;


use CrCms\Category\Repositories\Interfaces\CategoryRepositoryInterface;
use CrCms\Kernel\Http\Controllers\Controller;

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
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $models = $this->repository->findAllPaginate();

        return $this->view('index',compact('models'));
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
    public function store()
    {
        $model = $this->repository->create($this->input);

        return $this->response(['success'],compact($model));
    }


    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $model = $this->repository->findById($id);

        return $this->view('edit',compact($model));
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     */
    public function update(int $id)
    {
        $model = $this->repository->update($this->input,$id);

        return $this->response(['success'],compact($model));
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