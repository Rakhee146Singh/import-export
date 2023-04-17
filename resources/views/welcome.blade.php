<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>

<body>

    <div class="container">
        <div class="card bg-light mt-3">

            <div class="card-header">
                Users Import and Export
            </div>
            <div class="card-body">
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if (count($errors) > 0)
                        <div class="row">
                            <div class="col-md-8 col-md-offset-1">
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-ban"></i> Error!</h4>
                                    @foreach ($errors->all() as $error)
                                        {{ $error }} <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (Session::has('success'))
                        <div class="row">
                            <div class="col-md-8 col-md-offset-1">
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    <h5>{!! Session::get('success') !!}</h5>
                                </div>
                            </div>
                        </div>
                    @endif

                    <input type="file" name="file" class="form-control">
                    <br>
                    <button class="btn btn-success">Import User</button>
                    <button action="{{ route('export-users') }}" class="btn btn-primary">Export User</button>
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">City</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users))
                            @foreach ($users as $key => $item)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->city }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">No Data Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- </div> --}}
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
