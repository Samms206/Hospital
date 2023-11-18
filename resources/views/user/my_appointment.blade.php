<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.css')
</head>
<body>
@include('user.navbar')
{{--  --}}
@if (session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{session()->get('message')}}
    </div>
@endif
<div class="container">
    <table class="table">
        <tr>
            <th>Doctor Name</th>
            <th>Date</th>
            <th>Message</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach ($appointment as $ap)
        <tr>
            <td>{{$ap->doctor}}</td>
            <td>{{$ap->date}}</td>
            <td>{{$ap->message}}</td>
            <td>{{$ap->status}}</td>
            @if ($ap->status == 'Approved')
                <td><a style="background-color: gray; color: white;" @disabled(true) class="btn btn-secondary">Cancel</a></td>
            @else
                <td><a href="{{url('cancel_appoint/'.$ap->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Cancel</a></td>
            @endif
        </tr>
        @endforeach
    </table>
</div>

{{--  --}}
@include('user.script')
</body>
</html>
