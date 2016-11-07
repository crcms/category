@extends('category::default.layout')

@section('body')

    <form action="{{route('categories.store')}}" method="post" @submit.prevent="store">
        <div class="form-group">
            <label>分类名称</label>
            <input type="text" v-model="name" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label>分类Key</label>
            <input type="text" v-model="mark" class="form-control" name="mark">
        </div>
        <div class="form-group">
            <div class="form-group">
                @foreach($status as $key=>$value)
                    <label class="radio-inline">
                        <input type="radio" v-model="status" name="status" value="{{$key}}" {{$key==1 ? 'checked' : null}}> {{$value}}
                    </label>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <label>备注</label>
            <textarea name="remark" class="form-control" v-model="remark"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">提交</button>
        </div>
    </form>

@endsection