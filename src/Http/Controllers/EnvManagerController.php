<?php

namespace ll\llenv\Http\Controllers;

use App\Http\Controllers\Controller;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Content;
//use Dcat\Admin\Controllers\HasResourceActions;
use Dcat\Admin\Show;
use ll\llenv\Env;


class EnvManagerController extends Controller
{
//    use HasResourceActions;

    private $model;

    public function __construct()
    {
        $this->model = new Env();
    }


    public function index(Content $content)
    {
        return $content
            ->header('环境变量')
            ->description('用于查看和编辑.env文件')
            ->body($this->grid());
    }


    /**
     * Show interface.
     *
     * @param mixed $key
     * @param Content $content
     * @return Content
     */
    public function show($key, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($key));
    }


    /**
     * Edit interface.
     *
     * @param $key
     * @return Content
     */
    public function edit($key, Content $content)
    {
        $content->header('环境变量');
        $content->description('用于查看和编辑.env文件');
        $content->body($this->form()->edit($key));
        return $content;
    }


    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid($this->model);
        $grid->key();
        $grid->value();
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $key
     * @return Show
     */
    protected function detail($key)
    {
        $show = new Show($this->model->findOrFail($key));

        $show->key('Key');
        $show->value('Value');

        return $show;
    }

    protected function form()
    {
        $form = new Form($this->model);
        $form->text('key', 'Key');
        $form->text('value', 'Value');
        return $form;
    }


    /**
     * Destroy data
     *
     * @param $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        if ($this->model->deleteEnv($id)) {
            $data = [
                'status' => true,
                'message' => trans('admin.delete_succeeded'),
            ];
        } else {

            $data = [
                'status' => false,
                'message' => trans('admin.delete_failed'),
            ];
        }

        return response()->json($data);
    }

}
