@extends('layouts.main')
@section('content')

<div class="pg-heading">

    <div class="pg-title">All Brands</div>
</div>

@if(session('message'))
<div class="message">
    <div class="message-success">
        <i class="far fa-check-circle message-icon"></i>
        <span class="message-text">Success!</span>
        <span class="message-text-sub">You're awesome!!!</span>
    </div>
</div>
{{ Session::forget('message') }}
@endif
<div class="section"> {{-- Start of Section--}}

    <div class="section-content"> {{-- Start of sectionContent--}}

        <table id="myTable" class="table hover table-striped table-borderless table-hover all-table">
            <div class="add-btn">
                <a href="{{ route('brand.report') }}" target="_blank">Export Brand</a>
            </div>
            <div class="add-btn"> {{-- Add button --}}
                <a href="{{ route('brand.create') }}">Add Brand</a> {{-- Enter the name of the add btn --}}
            </div>
            <thead class="table-head">

                <tr>
                    <th>Brand Name</th>
                    <th style="max-width: 600px; width: 600px">Brand Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brand as $i)
                <tr>

                    <td>{{$i->name}}</td>
                    <td>{{$i->description}}</td>

                    <td class="action-icon">
                        <a href="{{route('brand.edit',$i->id)}}"><i class="fas fa-pen"></i></a> {{-- Edit icon --}}
                        <button type="submit" class="dlt-btn" id="dlt-btn{{ $i->id }}"><i class="fas fa-trash-alt"></i></button>
                        <form method="POST" class="dlt-form" id="dlt-form{{ $i->id }}" action="{{ route('brand.destroy',$i->id)}}">
                            @method('DELETE')
                            @csrf

                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div> {{-- End  of sectionContent--}}
</div> {{-- End  of section--}}

@endsection
