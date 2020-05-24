@extends('app')

@section('konten')

<br><br><br><br><br><br>
<div class="col-md-12 grid-margin stretch-card" id="review">
        <div class="card">
          <div class="card-body">
                
                <h4>Notifikasi</h4>
                <div class="table-responsive">
                    <table class="table">
                        <tr>     
                            <th>Message</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                        @foreach (auth()->user()->Notifications as $notification)
                            @if ($notification->type != "App\Notifications\NotifyUserRespon" && isset($notification->read_at) )
                                <tr>
                                    <td>{{$notification->data['content']}} {{$notification->data['notrans']}} {{$notification->data['status']}}</td>
                                    <td>{{$notification->created_at}}</td>
                                </tr>
                            @elseif($notification->type != "App\Notifications\NotifyUserRespon" && !isset($notification->read_at))
                                <tr>
                                    <td>{{$notification->data['content']}} {{$notification->data['notrans']}} {{$notification->data['status']}}</td>
                                    <td>{{$notification->created_at}}</td>
                                    <td><a href='/mark/{{$notification->id}}'>Mark As Read</a></td>
                                </tr>
                            @elseif($notification->type = "App\Notifications\NotifyUserRespon" && !isset($notification->read_at) )
                                <tr>
                                    <td>{{$notification->data['content']}} {{$notification->data['status']}}</td>
                                    <td>{{$notification->created_at}}</td>
                                    <td><a href='/mark/{{$notification->id}}'>Mark As Read</a></td>
                                <tr>
                            @elseif($notification->type = "App\Notifications\NotifyUserRespon" && isset($notification->read_at) )
                                <tr>
                                    <td>{{$notification->data['content']}} {{$notification->data['status']}}</td>
                                    <td>{{$notification->created_at}}</td>
                                <tr>
                            @endif
                        @endforeach
                        <tr>
                            <td><a href="/mark/all"><button class="btn btn-primary btn-rounded" id="readall"> <h6>Mark All As Read</h6></button></a></td>
                        </tr>
                    </table>
                </div>
          </div>
        </div>
</div>
<br><br><br><br><br><br><br>                     
                                    
@endsection