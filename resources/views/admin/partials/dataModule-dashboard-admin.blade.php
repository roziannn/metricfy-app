<div class="col-md-9 mb-5">
    <div class="card card-content p-3">
        <div class="d-flex justify-content-between">
            <div class="fs-5 text-muted">Data Module</div>
            <a href="/dashboard-admin/module/create" class="btn btn-primary btn-sm "><i
                    class="fa-solid fa-plus mr-2"></i>Tambah Module</a>
        </div>
        <div class="bd-example mt-4">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th width="5%">No</th>
                        <th scope="col">Module</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($data_module as $module)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $module->title }}</td>
                            <td>
                                <a href="/dashboard-admin/data-module/{{ $module->slug }}"
                                    class="btn btn-success btn-sm"><i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
