@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Yayın Evleri</h4>
                        <p class="category">Burada eklenen yayın evleri listesini bulabilirsiniz.</p>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                                <th>İsim</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Dakota Rice</td>
                                    <td>Niger</td>
                                    <td>Oud-Turnhout</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection