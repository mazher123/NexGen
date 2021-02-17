  @extends('layouts.layout')

  @section('main')
  <section>
      <div class="container">
          <div class="row justify-content-md-center ">
              <div class="col header">
                  <h3>Top 10 top up users list on <?php
                                                    date_default_timezone_set('Asia/Dhaka');
                                                    $startDate = date("Y-m-d", strtotime("yesterday"));
                                                    echo $startDate;
                                                    ?> </h3>
              </div>
          </div>
          @if($data)
          <div class="row">
              <form method="post" action="{{Route('search')}}">
                  {!! csrf_field() !!}
                  <label>Search User</label>
                  <input class="form-control" type="text" name="username">

                  <button type="submit" class="btn btn-success"> Search</button>
              </form>
          </div>
          <div class="row">
              <table class="table">
                  <tr>
                      <th>Sl no</th>
                      <th> Username</td>
                      <th> Email</td>
                      <th> Total Topup</td>
                  </tr>
                  @foreach($data as $key=> $user)
                  <tr>
                      <td>{{$key +1}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td> {{$user->count}}</td>

                  </tr>
                  @endforeach
              </table>
              {!! $data->render() !!}
          </div>
          @else
          <div class="row">
              <div class="col col-sm-12">
                  <a class="btn btn-primary" href="{{Route('fetchUser')}}"> Initiate the process</a>
              </div>
          </div>
          @endif
      </div>
  </section>
  @endsection