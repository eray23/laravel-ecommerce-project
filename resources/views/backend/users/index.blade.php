@extends("backend.shared.backend_theme")
@section("title", "Kullanıcı Modülü")
@section("subtitle", "Kullanıcılar")
@section("add_new_url", url("/users/create"))
@section("content")
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">Sıra No</th>
                <th scope="col">Ad Soyad</th>
                <th scope="col">Eposta</th>
                <th scope="col">Durum</th>
                <th scope="col">İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @if(count($users)>0)
                @foreach($users as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->is_active}}
                            @if($user->is_active == 1)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Pasif</span>
                            @endif
                        </td>
                        <td>
                            <ul class="nav float-start">
                                <li class="nav-item">
                                    <a class="nav-link text-black" href="{{url("/users/$user->user_id/edit")}}">
                                        <span data-feather="edit"></span>
                                        Güncelle
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link list-item-delete text-black" href="{{url("/users/$user->user_id/delete")}}">
                                        <span data-feather="trash-2"></span>
                                        Sil
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-black" href="{{url("/users/$user->user_id/change-password")}}">
                                        <span data-feather="lock"></span>
                                        Şifre Değiştir
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-black" href="{{url("/users/$user->user_id/addresses")}}">
                                        <span data-feather="lock"></span>
                                        Adreslerim
                                    </a>
                                </li>
                            </ul>
                        </td>

                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">
                        <p class="text-center">Herhangi bir kullanıcı bulunamadı</p>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Users Page</title>
@endsection
