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
                            <th scope="col">Foto</th>
                            <th scope="col">Durum</th>
                            <th scope="col">Başlangıç Tarihi</th>
                            <th scope="col">Bitiş Tarihi</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($campaigns as $campaign)
                        <tr>
                            <td>{{$campaign->title}}</td>
                            <td>
                                @if($campaign->image)
                                    <a href="{{$campaign->image}}" target="_blank" class="btn btn-sm btn-block btn-info">Görüntüle</a>
                                @endif
                            </td>
                            <td>
                                @switch($campaign->status)
                                    @case('publish')
                                        <span class="badge badge-success">Aktif</span>
                                    @break
                                    @case('passive')
                                        <span class="badge badge-danger">Pasif</span>
                                    @break
                                    @case('draft')
                                        <span class="badge badge-warning">Taslak</span>
                                    @break
                                    @default
                                @endswitch
                            </td>
                            <td>
                                <span title="{{$campaign->started_at}}">
                                    {{$campaign->started_at ? $campaign->started_at->diffForHumans() : '-'}}
                                </span>
                            </td>
                            <td>
                                <span title="{{$campaign->finished_at}}">
                                    {{$campaign->finished_at ? $campaign->finished_at->diffForHumans() : '-'}}
                                </span>
                            </td>
                            <td>
                                <a href="{{route('campaigns.edit', $campaign->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="{{route('campaigns.destroy', $campaign->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
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