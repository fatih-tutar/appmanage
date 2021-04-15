<x-app-layout>
    <x-slot name="header">Aboneler</x-slot>

    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h5 class="card-title float-right">
                    <a href="{{route('subscribers.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Abone Ekle</a>
                </h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Ad</th>
                            <th scope="col">Telefon</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subscribers as $subscriber)
                        <tr>
                            <td>{{$subscriber->ad}}</td>
                            <td>{{$subscriber->telefon}}</td>
                            <td>
                                <a href="{{route('subscribers.edit', $subscriber->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="{{route('subscribers.destroy', $subscriber->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$subscribers->links()}}
            </div>
        </div>
    </div>
</x-app-layout>