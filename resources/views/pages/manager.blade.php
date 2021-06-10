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
            <div class="col-sm-12 col-md-7">


                @foreach($categories as $category)




                <div style="display: none;"  id="card_{{$category->id}}" class="card_table card">
                    <div class="card-header">
                        <h5>{{$category->title}}</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Услга</th>
                                <th scope="col">Кол-во часов</th>
                                <th scope="col">Стоимость разработки</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($services as $service)

                                @if($service->category_id === $category->id)
                                    <tr>
                                        <th scope="row">{{$loop->index+1}}</th>
                                        <td>{{$service->title}}</td>
                                        <td>{{$service->time}}</td>
                                        <td data-time="{{$service->time}}" class="td-price">{{$service->time * 20}}</td>
                                        <td class="w-50">
                                            <input  type="checkbox"
                                                    class="addItem"
                                                    id="checkbox_service_id_{{$service->id}}"
                                                    value="{{$service->time * 20}}"
                                                    data-name="{{$service->title}}"
                                                    data-time="{{$service->time}}"
                                                    data-id="{{$service->id}}"
                                            >
                                            <label for="checkbox1"></label>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach
            </div>


            <div class="col-sm-12 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice">
                            <div>
                                <div>
                                    <div class="table-responsive invoice-table" id="table">
                                        <table id="resultTable" class="table table-bordered table-striped  text-center mt-2" style="vertical-align: middle;" >
                                            <tbody>
                                            <tr>
                                                <td></td>
                                                <td class="item">
                                                    <h6 class="p-2 mb-0">Услуга</h6>
                                                </td>
                                                <td class="Hours">
                                                    <h6 class="p-2 mb-0">Часы</h6>
                                                </td>
                                                <td class="Rate">
                                                    <h6 class="p-2 mb-0">Стоимость разработки</h6>
                                                </td>

                                            </tr>

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td>
                                                </td>
                                                <td>
                                                    <b>
                                                        Итого:
                                                    </b>
                                                </td>
                                                <td>
                                                    <p class="itemtext totalHour">0</p>
                                                </td>
                                                <td>
                                                    <p class="itemtext totalPrice">$0</p>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>


{{--                            <!-- Контакты-->--}}
{{--                            <form action="{{route('contact.new')}}"  method="post" style="    display: flex;flex-direction: column;margin: 20px 0;justify-content: space-between;">--}}

{{--                            <div class="col-sm-12 text-center mt-3" id="contactTable">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="text"></label>--}}
{{--                                    <input type="text" class="form-control" id="name" placeholder="Имя ">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="number"></label>--}}
{{--                                     <input class="form-control" type="tel"  id="example-tel-input" placeholder="Телефон">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="email"></label>--}}
{{--                                    <input type="email" class="form-control" id="email" placeholder="Почта">--}}

{{--                                </div>--}}
{{--                                <button class="btn-success col-sm-12 text-center mt-3">Отправить</button>--}}

{{--                            </div>--}}
{{--                            </form>--}}

{{--                            <!-- Конец контактов-->--}}

{{--                            <!-- Начало комментариев-->--}}

{{--                                <form action="{{route('comment.new')}}"  method="post" style="    display: flex;flex-direction: column;margin: 20px 0;justify-content: space-between;">--}}
{{--                                    @csrf--}}
{{--                            <div class="col-sm-12 text-center mt-3" id="commentTable">--}}
{{--                                <div class="form-group purple-border">--}}
{{--                                    <label for="exampleFormControlTextarea4">Комментарии к сделке</label>--}}
{{--                                    <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"></textarea>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                                <button class="btn-success">Save</button>--}}
{{--                                </form>--}}
                            <!-- Конец комментариев-->


                            <div class="col-sm-10 text-center mt-3">
                                <button class="btn btn btn-primary me-2" type="button" >Отправить</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
