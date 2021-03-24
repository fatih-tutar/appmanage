<x-app-layout>
    <x-slot name="header">Aboneler</x-slot>

    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h5 class="card-title float-right">
                    <a href="{{route('aboneler.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Abone Ekle</a>
                </h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Abone Adı</th>
                            <th scope="col">Telefon</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($aboneler as $abone)
                        <tr>
                            <td>{{$abone->name}}</td>
                            <td>{{$abone->phone_number}}</td>
                            <td>
                                <a href="{{route('aboneler.edit', $abone->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="{{route('aboneler.destroy', $abone->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$aboneler->links()}}
            </div>
        </div>
    </div>
</x-app-layout>