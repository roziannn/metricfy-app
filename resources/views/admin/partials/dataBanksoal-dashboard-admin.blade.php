<div class="col-md-9 mb-5">
    <div class="card card-content p-3">
        <div class="d-flex justify-content-between">
            <div class="fs-5">Data Banksoal</div>
            <a href="/dashboard-admin/banksoal/create" class="btn btn-primary btn-sm shadow">Tambah Paket Soal</a>
        </div>
        <div class="bd-example py-3">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Banksoal</th>
                        <th scope="col">Token</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_banksoal as $banksoal)
                        <tr>
                            <td>{{ $banksoal->title }}</td>
                            <td>{{ Str::limit($banksoal->content,100) }}
                            </td>
                            <td>
                                <a href="/dashboard-admin/banksoal/{{ $banksoal->slug }}" class="btn btn-success btn-sm"><i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
