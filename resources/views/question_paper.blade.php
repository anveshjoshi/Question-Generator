
<div style="height: 200px;"></div>
<hr>

@foreach($getRandomQuestion as $row)
    <h2> Q. No. {{ $loop->iteration }}. {{ $row->question }} <br></h2>
@endforeach

