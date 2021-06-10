@extends('base')
@section("content")
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- tap on top starts-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container-fluid">

        <div class="page-title">
            <div class="row">
                <div class="col-6">
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">

                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts                    -->
    <div class="container-fluid">
        <!-- Table Row Starts-->
        <div class="row">
            <div class="col-sm-12 col-md-8">

                @php($number = 1)
                @foreach($categories as $category)

                    <div style="display: none"  id="card_{{$category->id}}" class="card_table card">
                        <div class="card-header">

                            <input type="text" value="{{$category->title}}" class="form-control" id="catalogTitle-{{$category->id}}">

                            <button  type="submit" id="{{$category->id}}" class="btn btn-primary editCategory">Редактировать название</button>


                            <div class="removeCategory" data-id="1">
                                <a href="{{route('category.destroy',['id'=>$category->id,])}}">
                                    <i data-id="1" class="btnRemove icofont icofont-ui-close ico-red">

                                    </i>
                                </a>
                            </div>


                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Услуга</th>
                                    <th scope="col">Кол-во часов</th>
                                    <th scope="col">Стоимость разработки</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($number = 1)
                                @foreach($services as $service)
                                    @if($service->category_id === $category->id)
                                        <tr>
                                            <th scope="row">{{$number}}</th>
                                            <td>

                                                <input type="text" value="{{$service->title}}" id="serviceTitle-{{$service->id}}" class="form-control">

                                            </td>
                                            <td>
                                                <input type="number" min="0" step="1" value="{{$service->time}}" id="serviceTime-{{$service->id}}" class="form-control">
                                            </td>
                                            <td data-time="2" class="td-price">{{$service->time * 20}}</td>
                                            <td class="w-50">
                                                <div>
                                                    <a type="submit" id="{{$service->id}}" class="btn btn-primary editService" type="button">Редактировать</a>

                                                    <a href="{{route('services.destroy',['id'=>$service->id])}}" class="btn btn-danger" >Удалить</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @php($number++)
                                    @endif
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                        <form action="{{route('services.new')}}" method="post">
                            @csrf
                            <input type="hidden" name="category_id" value="{{$category->id}}">
                            <div class="card-header">
                                <h5>Добавить новую</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Услуга</th>
                                        <th scope="col">Кол-во часов</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <input type="text" placeholder="Уведомления" class="form-control" name="title" required>
                                        </td>
                                        <td>
                                            <input type="number" min="0" step="1" placeholder="2" class="form-control" name="time" required>
                                        </td>
                                        <td class="w-50">
                                            <div>
                                                <button class="btn btn-success btn-lg" type="submit" >Создать</button>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>

                    </div>

                @endforeach
                @php($number++)

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $('.editCategory').on('click', function () {
                let id = $(this).attr('id');
                let title = $('#catalogTitle-' + id).val();


                console.log(id);
                console.log(title);


                let formData = new FormData();
                formData.append('id', id);
                formData.append('title', title);

                $.ajax({
                    type: "POST",
                    url: '{{route('category.edit')}}',
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    success: function (data) {
                        location.reload();
                    },
                    error: function (data) {
                        alert("Произошла ошибка!");
                        console.log(data);
                    }
                });


            });


            $('.editService').on('click', function () {
                let id = $(this).attr('id');
                let title = $('#serviceTitle-' + id).val();
                let time = $('#serviceTime-' + id).val();

                console.log(id);
                console.log(title);
                console.log(time);

                let formData = new FormData();
                formData.append('id', id);
                formData.append('title', title);
                formData.append('time', time);
                $.ajax({
                        type: "POST",
                        url: '{{route('services.update')}}',
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: formData,
                        success: function (data) {
                            location.reload();
                        },
                        error: function (data) {
                            alert("Произошла ошибка!");
                            console.log(data);
                        }
                    });
                });
        });
    </script>
@endsection
