@extends('category::default.layout')


@section('body')

    <div class="container-fluid pl25 pr20">
        <div class="row mb20 mt20">
            <div class="col-md-9">
                <form action="" class="form-inline" method="get">
                    <div class="form-group">
                        <input type="text" name="title" placeholder="搜索标题" class="form-control input-sm" />
                    </div>
                    <div class="form-group">
                        <select name="status" class="form-control input-sm">
                            <option value="">类别</option>
                            <option value="21">

                                abcdea
                            </option>
                            <option value="16">

                                fda
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="status" class="form-control input-sm">
                            <option value="">状态</option>
                            <option value="1">开启</option>
                            <option value="2">隐藏</option>
                            <option value="3">禁止</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-sm btn-success">搜索</button>
                    <a class="btn btn-sm btn-primary" href="http://localhost/3.1/public/manage/category/create">新增分类</a>
                </form>
            </div>
            <div class="col-md-3 text-right">
                <form class="form-inline">
                    <div class="form-group">
                        <select name="" id="" class="form-control input-sm">
                            <option value="">选择批量操作</option>
                            <option value="destroy" ajax-url="http://localhost/3.1/public/manage/category/destroy">删除</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-sm btn-default btn-execute">执行</button>
                </form>
            </div>
        </div>
        <table class="table table-hover table-striped">
            <tr>
                <th><input type="checkbox" name="ids" class="allElection" /></th>
                <th>名称</th>
                <th>状态</th>
            </tr>
            <tr>
                <td><input type="checkbox" name="id[]" value="21" /></td>
                <td>
                    <div class="pull-left" style="width: auto;">

                    </div>
                    <div class="pull-left" style="width: auto;">
                        <p class="mb0">abcdea&nbsp;&lt;aaaaaa&gt;</p>
                        <p class="mb0">
                            <a href="http://localhost/3.1/public/manage/category/edit/21" class="fs12">编辑</a>
                            <a href="###" class="ml5 fs12 destroy-value" ajax-tip="是否确定要删除？" value="21" ajax-url="http://localhost/3.1/public/manage/category/destroy">删除</a>
                            <a href="###" class="ml5 fs12">查看</a>
                        </p>
                    </div>
                </td>
                <td>开启</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="id[]" value="16" /></td>
                <td>
                    <div class="pull-left" style="width: auto;">

                    </div>
                    <div class="pull-left" style="width: auto;">
                        <p class="mb0">fda&nbsp;&lt;22&gt;</p>
                        <p class="mb0">
                            <a href="http://localhost/3.1/public/manage/category/edit/16" class="fs12">编辑</a>
                            <a href="###" class="ml5 fs12 destroy-value" ajax-tip="是否确定要删除？" value="16" ajax-url="http://localhost/3.1/public/manage/category/destroy">删除</a>
                            <a href="###" class="ml5 fs12">查看</a>
                        </p>
                    </div>
                </td>
                <td>开启</td>
            </tr>
        </table>
        <div>
            <div class="page-container pull-left"></div>
            <div class="election-operation pull-right">
                <form class="form-inline">
                    <div class="form-group">
                        <select name="" id="" class="form-control input-sm">
                            <option value="">选择批量操作</option>
                            <option value="destroy" ajax-url="http://localhost/3.1/public/manage/category/destroy">删除</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-sm btn-default btn-execute">Execute</button>
                </form>
            </div>
        </div>
    </div>

@endsection