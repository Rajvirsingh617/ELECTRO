<x-layout>
    
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 a_tbdr">
                    <h1 class="m-0">All Units</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 a_tbdr text-right">
                    <a href="{{route('unit.create')}}" class="btn btn-primary">Add New Unit</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Units</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                                <th>#</th>
                                <th>Unit Name</th>
                                <th>Unit Description</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                             @foreach($units as $unit)
                                <tr>
                                    <td>{{ $unit->id }}</td>
                                    <td>{{ $unit->unit_name }}</td>
                                    <td>{{ $unit->unit_desc }}(s)</td>
                                    <td>
                                        <td>
                                            <a href="/admin/unit/{{$unit->id}}/view" class="btn btn-outline-info rounded-circle btn-sm a_viewunit" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="fa-regular fa-eye"></i>   
                                            </a>
                                                <a href="/admin/unit/{{$unit->id}}/edit" class="btn btn-outline-info rounded-circle btn-sm">
                                                    <i class="fa-regular fa-pen-to-square"></i>   
                                                </a>
                                                
                                                
                                        </td>
                                    </td>
                                </tr>
                            @endforeach;
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</x-layout>