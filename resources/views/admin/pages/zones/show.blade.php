@extends('admin.master')


@section('content')
<div class="custom-container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="mb-5">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                            <h1 class="mb-0 h2">Zone Detail of {{ $zone->name }}</h1>
                            <a href="{{ route('admin.zones.edit',$zone) }}" class="btn btn-primary">Edit Zone</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row" class="w-25">Name</th>
                                        <td>{{ $zone->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Description</th>
                                        <td>{{ $zone->description }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Price Range</th>
                                        <td>{{ $zone->price_range }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Image</th>
                                        <td>
                                            @if($zone->image)
                                            <img src="{{ Storage::url($zone->image) }}" alt="{{ $zone->name }}" class="img-fluid rounded" style="max-width: 300px;">
                                            @else
                                            <span class="text-muted">No image</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
