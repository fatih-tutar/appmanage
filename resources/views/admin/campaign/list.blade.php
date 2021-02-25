<x-app-layout>
    <x-slot name="header">Kampanyalar</x-slot>

    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h5 class="card-title float-right">
                    <a href="{{route('campaigns.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Kampanya Oluştur</a>
                </h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Kampanya</th>
                            <th scope="col">Durum</th>
                            <th scope="col">Bitiş Tarihi</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($campaigns as $campaign)
                        <tr>
                            <td>{{$campaign->title}}</td>
                            <td>{{$campaign->status}}</td>
                            <td>{{$campaign->finished_at}}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$campaigns->links()}}
            </div>
        </div>
    </div>
</x-app-layout>