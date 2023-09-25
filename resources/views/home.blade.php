@extends('layouts.app')
@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-24">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            
                        </div>
                    @endif           
                </div>
                <a href="{{ route('api.request') }}"><button id="getDataButton">Dữ liệu RequestManagerProduct </button></a> 
                <a href="{{ route('api.product') }}"><button id="getDataButton">Dữ liệu ManagerProduct</button></a> 
                <a href="{{ route('api') }}"><button id="getDataButton">auth</button></a> 
                
            </div>
        </div>
    </div>
</div>

@endsection


