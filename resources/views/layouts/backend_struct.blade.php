@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row rounded">
            <div class="col-lg-9">
                <div class="card p-2">

                    @if (session('editStatus'))
                        <div class="alert alert-success mt-3" role="alert">
                            {{ session('editStatus') }}
                        </div>
                    @endif
                    @if (session('deleteStatus'))
                        <div class="alert alert-success mt-3" role="alert">
                            {{ session('deleteStatus') }}
                        </div>
                    @endif

                    {{-- section list --}}
                    @yield('item_list')

                    {{ $data->onEachSide(5)->links() }}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card p-2">
                    {{-- data insert form --}}
                    @yield('insert_form')

                    @if (session('addStatus'))
                        <div class="alert alert-success mt-3" role="alert">
                            {{ session('addStatus') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
