<div class="col-md-9 mb-5">
    <div class="card card-content p-3">
        <div class="d-flex justify-content-between">
            <div class="fs-5">Data blog</div>
            <a href="/dashboard-admin/blog/create" class="btn btn-primary btn-sm shadow">Tambah blog</a>
        </div>
        <div class="bd-example py-3">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Blog</th>
                        <th scope="col">Description</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_blog as $blog)
                        <tr>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->content }}</td>
                            <td>
                                <a href="/dashboard-admin/blog/{{ $blog->slug }}" class="btn btn-success btn-sm"><i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
