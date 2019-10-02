<div class="container">
        <div class="animated fadeIn">
            <div class="card col-md-12">
                <div class="card-header">
                    Add New {{ucfirst($main_page)}}
                </div>
                <div class="card-body">
                    <form class="form" method="POST" action="{{ route($main_page.'.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @foreach($fields as $field)
                            <div class="form-group">
                                <label for="{{$field}}">{{ ucfirst(str_replace('_',' ',$replace($field)))}}</label>
                                @if($contain($field,'_id'))
                                    <select name="{{$replace($field)}}" id="{{$replace($field)}}" class="form-control">
                                        <option value={{NULL}}>select {{ ucfirst(str_replace('_',' ',$replace($field)))}}</option>
                                        @php($variables = str_replace('',' ',$replace($field)).'s')
                                        @foreach($$variables as $d)
                                            <option value="{{$d->id}}">{{$d->name}}</option>
                                        @endforeach
                                    </select>
                                    {!! "@if ($errors->has('".$replace($field)."'))" !!}
                                        <small class="form-text text-danger">{!! "{{$errors->first('".$replace($field).")}}" !!}</small>
                                    {!! "@endif" !!}
                                @elseif($contain_desc($field))
                                    <textarea  name="{{$field}}" id="{{$field}}" class="form-control" placeholder="Enter {{ ucfirst(str_replace('_',' ',$replace($field,'_id')))}}" ></textarea>
                                @elseif($contain($field,'_image'))
                                    <input type="file" name="{{$field}}" id="{{$field}}" class="form-control" placeholder="choose {{ ucfirst(str_replace('_',' ',$replace($field,'_image')))}}" />
                                @elseif($contain($field,'_date'))
                                    <input type="date" name="{{$field}}" id="{{$field}}" class="form-control" placeholder="choose {{ ucfirst(str_replace('_',' ',$replace($field,'_date')))}}" />
                                @else
                                    <input type="text" multiple name="{{$field}}" id="{{$field}}" class="form-control" placeholder="Enter {{ ucfirst(str_replace('_',' ',$replace($field)))}}" />
                                @endif
                                {!! "@if ($errors->has('".$field."'))" !!}
                                    <small class="form-text text-danger">{!! "{{$errors->first('".$field.")}}" !!}</small>
                                {!! "@endif" !!}
                            </div>
                        @endforeach
                        <input type="submit" class="btn btn-primary pull-right" value="Create">
                    </form>
                </div>
            </div>
        </div>
    </div>