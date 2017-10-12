@extends('layouts.dashboard')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Hover Data Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Rendering engine</th>
                                    <th>Browser</th>
                                    <th>Platform(s)</th>
                                    <th>Engine version</th>
                                    <th>CSS grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($result as $k => $v)
                                    <tr>
                                        <td>{{ $v.id }}</td>
                                        <td>{{ $v.product_name }}</td>
                                        <td>{{ $v.product_desc }}</td>
                                        <td>{{ $v.amount }}</td>
                                        <td>
                                            <img src="{{ $v.cover_image }}" height="40" alt="">
                                        </td>
                                        <td>{{ $v.count }}</td>
                                        <td>{{ $v.left }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                {{ $page }}
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection