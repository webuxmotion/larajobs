<h1>{{$heading}}</h1>

@unless(count($listings) == 0)

@foreach($listings as $listing)
  <h2>
    <a href="/listings/{{$listing['id']}}">{{$listing['title']}}</a>
  </h2>
  <p>{{$listing['description']}}</p>
  <p>{{$listing['company']}}</p>
  <p>{{$listing['website']}}</p>
@endforeach

@else
  <p>No listings found</p>
@endunless