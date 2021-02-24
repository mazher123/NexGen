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
              <div class="">
                  <a class="btn btn-primary" href="{{Route('fetchUser')}}"> Initiate the process</a>
              </div>
          </div>
          </br>

          @if($data)
          <div class="row">
              <form method="get" action="{{ route('search') }}">

                  <label>Search User</label>

                  <div class="row">


                      <div class="col-sm-3">
                          <input class="form-control" type="text" name="username" value="{{ $name }}" placeholder="Enter User Name">
                      </div>
                      <div class="col-sm-3">
                          <input class="form-control" type="text" name="email" value="{{ $email }}" placeholder="Enter Email">
                      </div>
                      <div class=" col-sm-3">
                          <input class="form-control" type="number" min="0" name="minuser" value="{{ $minuser }}" placeholder="Enter  min vlaue">
                      </div>

                      <div class=" col-sm-3">
                          <input class="form-control" type="number" min="0" name="maxuser" value="{{ $maxuser }}" placeholder="Enter max value">
                      </div>

                  </div>
                  <br>

                  <div class="col-sm-12">
                      <button type="submit" class="btn btn-success"> Search</button>
                  </div>

              </form>
          </div>

          </br>

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
                      <td> {{$key + $data->firstItem()}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td> {{ $user->count }}</td>

                  </tr>
                  @endforeach
              </table>
              {!! $data->appends([
              'username' => $name,
              'email'=> $email,
              'minuser' =>$minuser,
              'maxuser'=>$maxuser
              ])->render() !!}
          </div>
          @endif
      </div>
  </section>
  @endsection