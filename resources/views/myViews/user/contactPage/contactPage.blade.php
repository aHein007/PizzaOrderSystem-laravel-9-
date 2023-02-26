@extends('myViews.user.layouts.userMaster')

@section('content')
<div class="row px-xl-5">
    <div class="col">
        <div class="bg-light p-30">



                    <div class="row">

                        <div class="col-md-6">
                            @foreach ($allContacts as $contact)
                            <h4 class="mb-4">1 review is "{{$contact->name}}"</h4>
                            <div class="media mb-4">
                                {{-- <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;"> --}}
                                <div class="media-body">
                                    <h6>{{$contact->name}}<small> - <i>{{$contact->created_at->format('j / M / Y')}}</i></small></h6>

                                    <p>{{$contact->message}}</p>
                                </div>
                            </div>
                            <hr>
                            @endforeach

                        </div>

                        <div class="col-md-6">
                            <div class="">
                                @if (session('sendContact'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{session('sendContact')}}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                                @endif

                            </div>
                            <h4 class="mb-4">Please Send Your Contact to our team!</h4>
                            <small class="text-success">Let me know what you need! *</small>

                            <form action="{{route('user#sendContact',Auth::user()->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="message">Enter you contact *</label>
                                    <textarea id="message" cols="30" name="message" rows="5" class="form-control">{{old('message')}}</textarea>
                                    @error('message')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Your Name *</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{old('name',Auth::user()->name)}}">
                                    @error('name')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                    <small class="text-warning">Please enter your still login name! *</small>
                                </div>
                                <div class="form-group">
                                    <label for="email">Your Email *</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{old('email',Auth::user()->email)}}">
                                    @error('email')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                    <small class="text-warning">Please enter your still login email! *</small>
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Send Your Contact" class="btn btn-warning  px-3">
                                </div>
                            </form>
                        </div>
                    </div>


        </div>
    </div>
</div>
@endsection
