
@foreach ($judul as $judulmenu)
<div>
    <a href="/administrasiguru/{{$judulmenu->link}}">{{$judulmenu->judul}}</a>
</div>
 
@endforeach
