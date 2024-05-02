@extends('admin.layouts.template')

@section('content')
    <section class="section">
        <div class="page-title">
            <div class="row mb-4">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Article</h3>

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Article</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row mb-2">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('article/create') }}" class="btn btn-outline-primary mb-3">Add
                            Data</a>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="my-3">
                                <div class="alert alert-success">
                                    <ul>
                                        {{ session('success') }}
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <table class='table table-striped' id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                

                                @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>
                                            <a href="{{ url('article/'.$row->id . '/edit') }}"
                                                class="btn btn-outline-warning">
                                                <i class="badge-circle badge-circle-white text-secondary font-medium-1"
                                                    data-feather="edit"></i>
                                            </a>
                                            <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                                data-bs-target="#inlineFormDelete{{ $row->id }}">
                                                <i class="badge-circle badge-circle-white text-secondary font-medium-1"
                                                    data-feather="trash-2"></i>
                                            </button>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </section>
    </section>


    @foreach ($data as $row)
        <div class="modal fade text-left" id="inlineFormDelete{{ $row->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Delete Category </h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="{{ url('article/' . $row->id) }}" method="post">
                        @method('Delete')
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                Are you sure Artikel, Title {{ $row->title }} Delete?
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-danger ml-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Delete</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach


    @push('js')
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap4.js"></script>
@endpush

    @endsection
