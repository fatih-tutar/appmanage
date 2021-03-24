<x-app-layout>
    <x-slot name="header">Kampanya Güncelleme</x-slot>
    <div class="card">
        <div class="card-body">
            <form action="{{route('campaigns.update', $campaign->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="">Kampanya Adı</label>
                    <input type="text" name="title" class="form-control" required value="{{$campaign->title}}">
                </div>
                <div class="form-group">
                    <label for="">Kampanya Açıklaması</label>
                    <textarea name="description" id="" cols="30" rows="5" class="form-control" required>{{$campaign->description}}</textarea>
                </div>       
                <div class="form-group">
                    <label for="">Kampanya Durumu</label>
                    <select name="status" class="form-control" id="">
                        <option @if($campaign->status === 'publish') selected @endif value="publish">Aktif</option>
                        <option @if($campaign->status === 'passive') selected @endif value="passive">Pasif</option>
                        <option @if($campaign->status === 'draft') selected @endif value="draft">Taslak</option>
                    </select>
                </div>         
                <div class="form-group">
                    <label for="">Fotoğraf</label>
                    @if($campaign->image)
                        <a href="{{asset($campaign->image)}}" target="_blank">
                            <img src="{{asset($campaign->image)}}" class="img-thumbnail"  alt="" style="width: 200px;">
                        </a>
                    @endif
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Başlangıç Tarihi ve Saati</label>
                    <input type="datetime-local" name="started_at" class="form-control" required value="{{date('Y-m-d\TH:i', strtotime($campaign->started_at))}}">
                </div>
                <div class="form-group">
                    <label for="">Bitiş Tarihi ve Saati</label>
                    <input type="datetime-local" name="finished_at" class="form-control" required value="{{date('Y-m-d\TH:i', strtotime($campaign->finished_at))}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-block btn-success">Kampanya Güncelle</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
        </script>
    </x-slot>
</x-app-layout>