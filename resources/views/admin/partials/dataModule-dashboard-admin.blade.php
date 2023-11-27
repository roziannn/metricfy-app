<div class="col-md-9 mb-5">
    <div class="card card-content p-3">
        <div class="fs-5 font-weight-bold">Data Module</div>
        <div class="text-right">
            <a href="/dashboard-admin/module/create" class="btn btn-primary btn-sm shadow">Tambah Module</a>
        </div>
        <div class="bd-example py-3">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Module</th>
                        <th scope="col">Description</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_module as $module)
                        <tr>
                            <td>{{ $module->title }}</td>
                            <td>{{ $module->description }}</td>
                            <td>
                                <a href="/dashboard-admin/data-module/{{ $module->slug }}" class="btn btn-success btn-sm"><i class="bi bi-eye"></i>
                                </a>    
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
