<div class="col-md-9 mb-5">
    <div class="card card-content p-3">
        <div class="d-flex justify-content-between">
            <div class="fs-5 text-muted">Data Banksoal</div>
            <a href="/dashboard-admin/banksoal/create" class="btn btn-primary btn-sm"><i
                    class="fa-solid fa-plus mr-2"></i>Tambah Paket</a>
        </div>
        <div class="bd-example mt-4">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th width="5%">No</th>
                        <th scope="col" width="80%">Banksoal</th>

                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($data_banksoal as $banksoal)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $banksoal->title }}</td>
                            {{-- <td>{{ Str::limit($banksoal->content, 100) }} --}}
                            {{-- <td>{{ $banksoal->created_at->format('d M Y, H:i') }}</td> --}}
                            </td>
                            <td>
                                <a href="/dashboard-admin/banksoal/{{ $banksoal->slug }}"
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
