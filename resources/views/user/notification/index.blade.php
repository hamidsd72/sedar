@extends('user.master')
@section('content')
    <section class="mt-5 pt-3">
        <div class="card res_table mt-3" style="background: transparent;">
            <div class="card-header">
                <h3 class="card-title float-right">{{$title2}}</h3>
            </div>
            @foreach($items as $item)
                <div class="redu30 bg-white card-body res_table_in m-3 p-3">
                    {{$item->subject}}@if($item->status=="pending")<i class="fa fa-eye-slash"></i> @else <i class="fa fa-eye"></i> @endif
                    <a href="{{route('user.notification.show',$item->id)}}" class="btn btn-danger col-12 mt-3">دیدن پیام</a>
                </div>
            @endforeach
        </div>
        <div class="pag_ul">
            {{ $items->links() }}
        </div>
    </section>
@endsection
